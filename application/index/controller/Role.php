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

use app\index\model\Node;
use app\index\model\UserType;

class Role extends Base
{
    //角色列表
    public function index()
    {
        if (request()->isAjax()) {

            $user = new UserType();
            $selectResult = $user->getTree();

            foreach ($selectResult as $key => $vo) {

                //操作
                if (1 == $vo['id']) {
                    $selectResult[$key]['operate'] = '';
                } else {
                    $operate = [
                        '编辑' => url('role/roleEdit', ['id' => $vo['id']]),
                        '删除' => "javascript:roleDel('" . $vo['id'] . "')",
                        '分配权限' => "javascript:giveQx('" . $vo['id'] . "')",
                    ];
                    $selectResult[$key]['operate'] = showOperate($operate);
                }

                //分层显示
                $selectResult[$key]['rolename'] = '<span class="lev" >' . str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;', $vo['lev']) . ($vo['lev'] > 0 ? '└' : '') . str_repeat('----', $vo['lev']) . '</span>' . $vo['rolename'];

            }

            $return['total'] = $user->getAllRole(); //总数据
            $return['rows'] = $selectResult;

            return json($return);
        }

        return $this->fetch();
    }

    //添加角色
    public function roleAdd()
    {
        if (request()->isPost()) {

            $param = input('param.');
            $param = parseParams($param['data']);

            $role = new UserType();
            $flag = $role->insertRole($param);

            return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
        }

        $user = new UserType();
        $selectResult = $user->getTree();

        foreach ($selectResult as $key => $vo) {

            $selectResult[$key]['rolename'] = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;', $vo['lev']) . ($vo['lev'] > 0 ? '└----' : '') . $vo['rolename'];
        }

        $this->assign([
            'role' => $selectResult,
        ]);

        return $this->fetch();
    }

    //编辑角色
    public function roleEdit()
    {
        $role = new UserType();

        if (request()->isPost()) {

            $param = input('post.');
            $param = parseParams($param['data']);

            //所属上级不能是自己的下级
            $roled = $role->getOneRole($param['id']);
            $selectResult = $role->getTree($param['id']);
            $selectResult[] = $roled;
            foreach ($selectResult as $key => $vo) {
                if ($param['pid'] == $vo['id']) {
                    return json(['code' => 0, 'data' => '', 'msg' => '上级角色不能是自己或自己的下级']);
                    die();
                }
            }

            $flag = $role->editRole($param);

            return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
        }

        $selectResult = $role->getTree();

        foreach ($selectResult as $key => $vo) {
            $selectResult[$key]['rolename'] = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;', $vo['lev']) . ($vo['lev'] > 0 ? '└----' : '') . $vo['rolename'];
        }

        $id = input('param.id');
        $this->assign([
            'role' => $role->getOneRole($id),
            'roles' => $selectResult,
        ]);
        return $this->fetch();
    }

    //删除角色
    public function roleDel()
    {
        $id = input('param.id');

        $role = new UserType();

        $rs = $role->getSonById($id);
        if (!empty($rs)) {
            return json(['code' => 2, 'data' => '', 'msg' => '该部门下面有用户不可以删除']);
            die();
        }

        $flag = $role->delRole($id);
        return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
    }

    //分配权限
    public function giveAccess()
    {
        $param = input('param.');
        $node = new Node();
        //获取现在的权限
        if ('get' == $param['type']) {

            $nodeStr = $node->getNodeInfo($param['id']);
            return json(['code' => 1, 'data' => $nodeStr, 'msg' => 'success']);
        }
        //分配新权限
        if ('give' == $param['type']) {

            $doparam = [
                'id' => $param['id'],
                'rule' => $param['rule'],
            ];
            $user = new UserType();
            $flag = $user->editAccess($doparam);
            return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
        }
    }
}
