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

use app\index\model\DeptModel;
use app\index\model\UserModel;

class Dept extends Base
{
    //部门列表
    public function index()
    {
        if (request()->isAjax()) {

            $param = input('param.');

            $limit = $param['pageSize'];
            $offset = ($param['pageNumber'] - 1) * $limit;

            $where = [];
            if (isset($param['searchText']) && !empty($param['searchText'])) {
                $where['deptname'] = ['like', '%' . $param['searchText'] . '%'];
            }

            $deptmodel = new DeptModel();
            $selectResult = $deptmodel->getDeptByWhere($where, $offset, $limit);

            foreach ($selectResult as $key => $vo) {

                $operate = [
                    '编辑' => url('Dept/deptEdit', ['id' => $vo['id']]),
                    '删除' => "javascript:deptDel('" . $vo['id'] . "')",
                ];

                $selectResult[$key]['operate'] = showOperate($operate);

            }

            $return['total'] = $deptmodel->getAllDept($where); //总数据
            $return['rows'] = $selectResult;

            return json($return);
        }

        return $this->fetch();
    }

    //添加部门
    public function deptAdd()
    {
        if (request()->isPost()) {

            $param = input('param.');
            $param = parseParams($param['data']);

            $deptmodel = new DeptModel();
            $flag = $deptmodel->insertDept($param);

            return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
        }

        return $this->fetch();
    }

    //编辑部门
    public function deptEdit()
    {
        $deptmodel = new DeptModel();

        if (request()->isPost()) {

            $param = input('post.');
            $param = parseParams($param['data']);

            $flag = $deptmodel->editDept($param);

            return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
        }

        $id = input('param.id');
        $this->assign([
            'dept' => $deptmodel->getOneDept($id),
        ]);
        return $this->fetch();
    }

    //删除部门
    public function deptDel()
    {
        $id = input('param.id');

        $usermodel = new UserModel();
        $rs = $usermodel->getByDeptId($id);
        if (!empty($rs)) {
            return json(['code' => 0, 'data' => '', 'msg' => '该部门下面有用户不可以删除']);
            die();
        }

        $deptmodel = new DeptModel();

        $flag = $deptmodel->delDept($id);
        return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
    }
}
