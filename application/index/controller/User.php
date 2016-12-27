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
use app\index\model\UserType;

class User extends Base
{
    //用户列表
    public function index()
    {
        if (request()->isAjax()) {

            $param = input('param.');

            $limit  = $param['pageSize'];
            $offset = ($param['pageNumber'] - 1) * $limit;

            $where = [];
            if (isset($param['searchText']) && !empty($param['searchText'])) {
                $where['username'] = ['like', '%' . $param['searchText'] . '%'];
            }
            $user         = new UserModel();
            $selectResult = $user->getUsersByWhere($where, $offset, $limit);
            $dept         = new DeptModel();
            $status       = config('user_status');

            foreach ($selectResult as $key => $vo) {
                if ($vo['last_login_time']) {
                    $selectResult[$key]['last_login_time'] = date('Y-m-d H:i:s', $vo['last_login_time']);
                } else {
                    $selectResult[$key]['last_login_time'] = '';
                }

                $selectResult[$key]['serialnum'] = '<span class="label label-warning">' . $vo['serialnum'] . '</span>';

                if ($selectResult[$key]['pid'] != 0) {
                    $selectResult[$key]['pid'] = $user->getUserNameByUserId($selectResult[$key]['pid']);
                }

                if ($selectResult[$key]['deptid'] != 0) {
                    $selectResult[$key]['deptid'] = $dept->getDeptNameById($selectResult[$key]['deptid']);
                }

                if ($vo['status'] == 1) {
                    $selectResult[$key]['status'] = '<span class="label label-success">' . $status[$vo['status']] . '</span>';
                } else {
                    $selectResult[$key]['status'] = '<span class="label label-danger">' . $status[$vo['status']] . '</span>';
                }

                $operate = [
                    '编辑' => url('user/userEdit', ['id' => $vo['id']]),
                    '删除' => "javascript:userDel('" . $vo['id'] . "')",
                ];

                $selectResult[$key]['operate'] = showOperate($operate);

                if (1 == $vo['id']) {
                    $selectResult[$key]['operate'] = '';
                }
            }

            $return['total'] = $user->getAllUsers($where); //总数据
            $return['rows']  = $selectResult;

            return json($return);
        }

        return $this->fetch();
    }

    //添加用户
    public function userAdd()
    {
        if (request()->isPost()) {

            $param = input('param.');
            $param = parseParams($param['data']);

            $param['password'] = md5($param['password']);
            $user              = new UserModel();
            $flag              = $user->insertUser($param);

            if (($flag['code'] == 1) && ($flag['data'] > 0)) {
                $user->getFamily($flag['data']);
            }
            return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
        }
        //部门
        $deptModel = new DeptModel();
        $dept      = $deptModel->getTree();
        foreach ($dept as $key => $vo) {
            $dept[$key]['deptname'] = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;', $vo['lev']) . ($vo['lev'] > 0 ? '└----' : '') . $vo['deptname'];
        }

        //角色
        $role = new UserType();
        $userModel = new UserModel();
        $user      = $userModel->getOneUser(session('id'));

        $this->assign([
            'role'   => $role->getRole(),
            'status' => config('user_status'),
            'dept'   => $dept,
            'user'   => $user,
        ]);

        return $this->fetch();
    }

    //编辑角色
    public function userEdit()
    {
        $user = new UserModel();

        if (request()->isPost()) {

            $param = input('post.');
            $param = parseParams($param['data']);
            if (empty($param['password'])) {
                unset($param['password']);
            } else {
                $param['password'] = md5($param['password']);
            }
            $flag = $user->editUser($param);

            return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
        }

        $deptModel = new DeptModel();
        $dept      = $deptModel->getTree();
        $dept1     = $dept;
        foreach ($dept as $key => $vo) {

            $dept[$key]['deptname'] = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;', $vo['lev']) . ($vo['lev'] > 0 ? '└----' : '') . $vo['deptname'];
        }

        $id   = input('param.id');
        $user = $user->getOneUser($id);
        $role = new UserType();
        $this->assign([
            'user'   => $user,
            'status' => config('user_status'),
            'role'   => $role->getRole(),
            'parent' => $user['pid'] != 0 ? $user->getOneUser($user['pid']) : '',
            'self'   => $user->getOneUser(session('id')),
            'dept'   => $dept,
            'dept1'  => $dept1,
        ]);
        return $this->fetch();
    }

    //删除角色
    public function UserDel()
    {
        $id = input('param.id');

        $UserModel = new UserModel();

        $rs = $UserModel->getOneUser($id);
        if (!empty($rs['son'])) {
            return json(['code' => 0, 'data' => '', 'msg' => '该用户下面有用户不可以删除']);
            die();
        }

        $flag = $UserModel->delUser($id);
        return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
    }
    /**
     * 修改密码
     */
    public function editPWD()
    {
        $user = new UserModel();

        if (request()->isPost()) {

            $param = input('post.');
            $param = parseParams($param['data']);

            if (empty($param['password']) || empty($param['comfirm_password'])) {
                return json(['code' => 0, 'data' => '', 'msg' => '密码不能为空！']);
            }
            if ($param['password'] != $param['comfirm_password']) {
                return json(['code' => 0, 'data' => '', 'msg' => '两次密码不一致！']);
            }
            unset($param['comfirm_password']);
            $param['password'] = md5($param['password']);

            $flag = $user->editPWD($param);

            return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
        }
        $this->assign('username', $_SESSION['think']['username']);

        return $this->fetch();
    }

}
