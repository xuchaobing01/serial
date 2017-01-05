<?php
// +----------------------------------------------------------------------
// | snake
// +----------------------------------------------------------------------
// | Copyright (c) 2016~2022 http://baiyf.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: NickBai <1902822973@qq.com>
// +----------------------------------------------------------------------
namespace app\index\controller;

use app\index\model\SerialModel;
use app\index\model\UserModel;

class Serial extends Base
{
    //系列号列表
    public function index()
    {
        if (request()->isAjax()) {

            //获取一个用户信息
            $userModel = new UserModel();
            $self      = $userModel->getOneUser(session('id'));

            if ($self['typeid'] == 3) {
                $param = input('param.');

                $limit  = $param['pageSize'];
                $offset = ($param['pageNumber'] - 1) * $limit;

                $where = [];
                if (!empty($self['son'])) {
                    $self['son'] .= ',' . $self['id'];
                } else {
                    $self['son'] = $self['id'];
                }
                $where['snake_serial.userid'] = ['in', $self['son']];

                if (isset($param['searchText']) && !empty($param['searchText'])) {
                    $where['serial'] = ['like', '%' . $param['searchText'] . '%'];
                }

                $serial       = new SerialModel();
                $selectResult = $serial->getSerialsByWhere($where, $offset, $limit);

                $status = config('serial_status');

                foreach ($selectResult as $key => $vo) {

                    $selectResult[$key]['createtime'] = date('Y-m-d H:i:s', $vo['createtime']);

                    if ($vo['status'] == 1) {
                        $selectResult[$key]['status'] = '<span class="label label-success">' . $status[$vo['status']] . '</span>';
                    } else {
                        $selectResult[$key]['status'] = '<span class="label label-danger">' . $status[$vo['status']] . '</span>';
                    }
                    $selectResult[$key]['checkall'] = '<input type="checkbox" class="checkhand" name="subChk" value="' . $vo['id'] . '" >';

                    $operate = [
                        //'编辑' => url('serial/serialEdit', ['id' => $vo['id']]),
                        '删除' => "javascript:serialDel('" . $vo['id'] . "')",
                    ];

                    $selectResult[$key]['operate'] = showOperate($operate);

                }

                $return['total'] = $serial->getAllSerials($where); //总数据
                $return['rows']  = $selectResult;

                return json($return);
            } else {
                $param = input('param.');

                $limit  = $param['pageSize'];
                $offset = ($param['pageNumber'] - 1) * $limit;

                $where = [];
                if (isset($param['searchText']) && !empty($param['searchText'])) {
                    $where['serial'] = ['like', '%' . $param['searchText'] . '%'];
                }
                $serial       = new SerialModel();
                $selectResult = $serial->getSerialsByWhere($where, $offset, $limit);

                $status = config('serial_status');

                foreach ($selectResult as $key => $vo) {

                    $selectResult[$key]['createtime'] = date('Y-m-d H:i:s', $vo['createtime']);

                    if ($vo['status'] == 1) {
                        $selectResult[$key]['status'] = '<span class="label label-success">' . $status[$vo['status']] . '</span>';
                    } else {
                        $selectResult[$key]['status'] = '<span class="label label-danger">' . $status[$vo['status']] . '</span>';
                    }

                    $selectResult[$key]['checkall'] = '<input type="checkbox" class="checkhand" name="subChk" value="' . $vo['id'] . '" >';

                    $operate = [
                        //'编辑' => url('serial/serialEdit', ['id' => $vo['id']]),
                        '删除' => "javascript:serialDel('" . $vo['id'] . "')",
                    ];

                    $selectResult[$key]['operate'] = showOperate($operate);

                }

                $return['total'] = $serial->getAllSerials($where); //总数据
                $return['rows']  = $selectResult;

                return json($return);
            }
        }

        return $this->fetch();
    }

    //系列号生成
    public function serialAdd()
    {

        if (request()->isPost()) {

            $param = input('param.');
            $param = parseParams($param['data']);

            $userid    = $_SESSION['think']['id'];
            $serial    = new SerialModel();
            $serialArr = $serial->createSerial($param['number']);
            $serialArr = $serial->completeSerialArr($serialArr, $param['times']);

            $flag = $serial->insertSerials($serialArr);

            $user = new UserModel();
            $num  = $user->where('id=' . $_SESSION['think']['id'])->column('serialnum');
            $num  = $num[0];
            $num += $param['number'];
            $user->updateSerialNum($num);

            return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
        }

        //获取一个用户信息
        $userModel = new UserModel();
        $self      = $userModel->getOneUser(session('id'));
        $this->assign([
            'self' => $self,
        ]);
        return $this->fetch();
    }

    //编辑序列号
    public function serialEdit()
    {
        $serial = new SerialModel();

        if (request()->isPost()) {

            $param = input('post.');
            $param = parseParams($param['data']);

            $flag = $serial->editSerial($param);

            return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
        }

        $id = input('param.id');
        $this->assign([
            'serial' => $serial->getOneSerial($id),
            'status' => config('serial_status'),
        ]);
        return $this->fetch();
    }

    //删除系列号
    public function serialDel()
    {
        $id = input('param.id');

        $serial = new SerialModel();

        $flag = $serial->delSerial($id);

        $user   = new UserModel();
        $num    = $user->where('id=' . $_SESSION['think']['id'])->column('serialnum');
        $num    = $num[0];
        $number = ($num > 0) ? ($num - 1) : 0;
        $user->updateSerialNum($number);

        return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
    }
    //批量删除系列号
    public function serialDels()
    {
        $serial = new SerialModel();

        $ids = input("param.delitems");

        $flag = $serial->delSerials($ids);

        return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
    }
}
