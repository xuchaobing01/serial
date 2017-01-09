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

use app\index\model\UserModel;
use app\index\model\UserType;

class User extends Base
{
    //用户列表
    public function index()
    {
        if (request()->isAjax()) {
            //获取一个用户信息
            $userModel = new UserModel();
            $self = $userModel->getOneUser(session('id'));

            if ($self['typeid'] != 1) {
                $param = input('param.');

                $limit = $param['pageSize'];
                $offset = ($param['pageNumber'] - 1) * $limit;

                $where = [];
                $where['snake_user.id'] = ['in', $self['son']];

                if (isset($param['searchText']) && !empty($param['searchText'])) {
                    $where['username'] = ['like', '%' . $param['searchText'] . '%'];
                }
                $user = new UserModel();
                $selectResult = $user->getUsersByWhere($where, $offset, $limit);

                $status = config('user_status');

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
                $return['rows'] = $selectResult;

                return json($return);

            } else {

                $param = input('param.');

                $limit = $param['pageSize'];
                $offset = ($param['pageNumber'] - 1) * $limit;

                $where = [];
                if (isset($param['searchText']) && !empty($param['searchText'])) {
                    $where['username'] = ['like', '%' . $param['searchText'] . '%'];
                }
                $user = new UserModel();
                $selectResult = $user->getUsersByWhere($where, $offset, $limit);

                $status = config('user_status');

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
                $return['rows'] = $selectResult;

                return json($return);
            }

        }

        return $this->fetch();
    }

    //添加用户
    public function userAdd()
    {
        if (request()->isPost()) {

            $param = input('param.');
            $param = parseParams($param['data']);

            //获取一个用户信息
            $user = new UserModel();
            $self = $user->getOneUser(session('id'));

            //限制最大值
            $parent = $user->getOneUser($param['pid']);
            if ($self['typeid'] != 1) {

                //所属角色不能是自己的下级
                $role = new UserType();
                $selectResult = $role->getTree($self['typeid']);
                $rolestatus = 1;
                foreach ($selectResult as $k => $v) {
                    if ($param['typeid'] == $v['id']) {
                        $rolestatus = 2;
                        break;
                    }
                }
                if ($rolestatus == 1) {
                    return json(['code' => 0, 'data' => '', 'msg' => '所属角色不合法']);
                    die();
                }

                //所属用户
                $usered = $user->getOneUser($self['id']);
                if (!empty($usered['son'])) {
                    $usered['son'] .= ',' . $usered['id'];
                } else {
                    $usered['son'] = $usered['id'];
                }
                if (!preg_match('/' . $param['pid'] . '/', $usered['son'])) {
                    return json(['code' => 0, 'data' => '', 'msg' => '所属用户不合法']);
                    die();
                }

                if ($param['maxtimes'] > $parent['maxtimes']) {
                    $param['maxtimes'] = $parent['maxtimes'];
                }
                if ($param['maxnum'] > $parent['maxnum']) {
                    $param['maxnum'] = $parent['maxnum'];
                }
            }

            $param['password'] = md5($param['password']);
            $flag = $user->insertUser($param);

            if (($flag['code'] == 1) && ($flag['data'] > 0) && ($param['typeid'] != 1)) {
                $user->getFamily($flag['data']);
            }
            return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
        }

        //获取一个用户信息
        $userModel = new UserModel();
        $self = $userModel->getOneUser(session('id'));

        //角色
        $role = new UserType();
        if ($self['typeid'] == 1) {
            $roles = $role->getTree();
        } else {
            $roles = $role->getTree($self['typeid']);
        }
        foreach ($roles as $key => $vo) {

            $roles[$key]['rolename'] = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;', $vo['lev']) . ($vo['lev'] > 0 ? '└----' : '') . $vo['rolename'];
        }

        //查询所属用户
        if ($self['typeid'] == 1) {
            $where = [];
            $where['status'] = 1;
            $where['typeid'] = ['<>', 1];
            $users = $userModel->getAllUser($where);
        } else {
            $where = [];
            $where['status'] = 1;
            $where['typeid'] = ['<>', 1];
            $self['son'] = empty($self['son']) ? $self['id'] : $self['son'] . "," . $self['id'];
            $where['id'] = ['in', $self['son']];
            $users = $userModel->getAllUser($where);
        }

        $this->assign([
            'roles' => $roles,
            'status' => config('user_status'),
            'users' => $users,
            'self' => $self,
        ]);

        return $this->fetch();
    }

    //编辑角色
    public function userEdit()
    {
        //获取一个用户信息
        $userModel = new UserModel();
        $self = $userModel->getOneUser(session('id'));

        if (request()->isPost()) {

            $user = new UserModel();

            $param = input('post.');
            $param = parseParams($param['data']);

            $usered = $userModel->getOneUser($param['id']);
            if (!empty($usered['son'])) {
                $usered['son'] .= ',' . $usered['id'];
            } else {
                $usered['son'] = $usered['id'];
            }

            if (preg_match('/' . $param['pid'] . '/', $usered['son'])) {
                return json(['code' => 0, 'data' => '', 'msg' => '所属用户不能是自己或自己的下级用户']);
                die();
            }

            $parent = $userModel->getOneUser($param['pid']);
            if ($self['typeid'] != 1) {

                //所属角色
                $role = new UserType();
                $selectResult = $role->getTree($self['typeid']);
                $rolestatus = 1;
                foreach ($selectResult as $k => $v) {
                    if ($param['typeid'] == $v['id']) {
                        $rolestatus = 2;
                        break;
                    }
                }
                if ($rolestatus == 1) {
                    return json(['code' => 0, 'data' => '', 'msg' => '所属角色不合法']);
                    die();
                }

                //所属用户
                $usered1 = $user->getOneUser($self['id']);
                if (!empty($usered1['son'])) {
                    $usered1['son'] .= ',' . $usered1['id'];
                } else {
                    $usered1['son'] = $usered1['id'];
                }
                if (!preg_match('/' . $param['pid'] . '/', $usered1['son'])) {
                    return json(['code' => 0, 'data' => '', 'msg' => '所属用户不合法']);
                    die();
                }

                if ($param['maxtimes'] > $parent['maxtimes']) {
                    $param['maxtimes'] = $parent['maxtimes'];
                }
                if ($param['maxnum'] > $parent['maxnum']) {
                    $param['maxnum'] = $parent['maxnum'];
                }
            }

            if (($param['typeid'] != 1) && ($param['pid'] != $param['pided'])) {

                $res = $user->delFamily($param['id']);
                if (!$res) {
                    return json(['code' => 0, 'data' => '', 'msg' => '编辑用户失败']);
                    die();
                }
                $res1 = $user->getFamily1($param['pid'], $param['id']);
                if (!$res1) {
                    return json(['code' => 0, 'data' => '', 'msg' => '编辑用户失败']);
                    die();
                }
            }
            unset($param['pided']);

            if (empty($param['password'])) {
                unset($param['password']);
            } else {
                $param['password'] = md5($param['password']);
            }
            $flag = $user->editUser($param);

            return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
        }

        $id = input('param.id');
        $user = $userModel->getOneUser($id);

        //角色
        $role = new UserType();
        if ($self['typeid'] == 1) {
            $roles = $role->getTree();
        } else {
            $roles = $role->getTree($self['typeid']);
        }
        foreach ($roles as $key => $vo) {

            $roles[$key]['rolename'] = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;', $vo['lev']) . ($vo['lev'] > 0 ? '└----' : '') . $vo['rolename'];
        }

        //查询所属用户
        if ($self['typeid'] == 1) {
            $where = [];
            $where['status'] = 1;
            $where['typeid'] = ['<>', 1];
            $users = $userModel->getAllUser($where);
        } else {
            $where = [];
            $where['status'] = 1;
            $where['typeid'] = ['<>', 1];
            $self['son'] = empty($self['son']) ? $self['id'] : $self['son'] . "," . $self['id'];
            $where['id'] = ['in', $self['son']];
            $users = $userModel->getAllUser($where);
        }

        $this->assign([
            'roles' => $roles,
            'status' => config('user_status'),
            'users' => $users,
            'self' => $self,
            'user' => $user,
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

        $res = $UserModel->delFamily($id);
        if ($res) {
            $flag = $UserModel->delUser($id);
        } else {
            return json(['code' => 0, 'data' => '', 'msg' => '删除用户失败']);
            die();
        }

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
