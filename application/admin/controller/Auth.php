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
namespace app\admin\controller;

use app\admin\model\Node;
use app\admin\model\UserType;

class Auth extends Base
{
    //节点列表
    public function index()
    {

        if (request()->isAjax()) {

            //$param = input('param.');

            //$limit = $param['pageSize'];
            //$offset = ($param['pageNumber'] - 1) * $limit;

            //$where = [];
            // if (isset($param['searchText']) && !empty($param['searchText'])) {
            //     $where['node_name'] = ['like', '%' . $param['searchText'] . '%'];
            // }

            $node = new Node();
            $selectResult = $node->getTree();

            $type = config('authtype');

            foreach ($selectResult as $key => $vo) {

                $selectResult[$key]['node_name'] = '<span class="lev" >' . str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;', $vo['lev']) . ($vo['lev'] > 0 ? '└' : '') . str_repeat('----', $vo['lev']) . '</span>' . $vo['node_name'];

                if ($vo['is_menu'] == 1) {
                    $selectResult[$key]['is_menu'] = '<span class="label label-danger">' . $type[$vo['is_menu']] . '</span>';

                } else {
                    $selectResult[$key]['is_menu'] = '<span class="label label-success">' . $type[$vo['is_menu']] . '</span>';
                }

                $operate = [
                    '编辑' => url('auth/authEdit', ['id' => $vo['id']]),
                    '删除' => "javascript:authDel('" . $vo['id'] . "')",
                ];

                $selectResult[$key]['operate'] = showOperate($operate);

            }

            $return['total'] = $node->getAllNodes(); //总数据
            $return['rows'] = $selectResult;

            return json($return);
        }

        return $this->fetch();

    }

    //添加节点
    public function authAdd()
    {
        //提交表单
        if (request()->isPost()) {

            $param = input('param.');

            $param = parseParams($param['data']);

            $node = new Node();

            $flag = $node->insertNode($param);

            return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
            die();
        }

        $node = new Node();
        $selectResult = $node->getTree();

        $type = config('authtype');

        foreach ($selectResult as $key => $vo) {

            $selectResult[$key]['node_name'] = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;', $vo['lev']) . ($vo['lev'] > 0 ? '└----' : '') . $vo['node_name'];
        }

        $this->assign([
            'auth' => $selectResult,
            'authtype' => $type,
        ]);

        return $this->fetch();
    }

    //编辑节点
    public function authEdit()
    {
        $node = new Node();

        if (request()->isPost()) {

            $param = input('post.');
            $param = parseParams($param['data']);

            $flag = $node->editNode($param);

            return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
            die();
        }

        $selectResult = $node->getTree();
        foreach ($selectResult as $key => $vo) {
            $selectResult[$key]['node_name'] = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;', $vo['lev']) . ($vo['lev'] > 0 ? '└----' : '') . $vo['node_name'];
        }

        $id = input('param.id');
        $this->assign([
            'node' => $node->getOneNode($id),
            'authtype' => config('authtype'),
            'auth' => $selectResult,
        ]);
        return $this->fetch();
    }

    //删除节点
    public function authDel()
    {
        $id = input('param.id');

        $node = new Node();
        $flag = $node->delNode($id);
        return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
    }

    //分配权限
    public function giveAccess()
    {
        //$param = input('param.');
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
