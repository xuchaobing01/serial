<?php
namespace app\index\controller;

use app\index\model\DeptModel;
use app\index\model\UserModel;

class Dept extends Base
{
    //部门列表
    public function index()
    {

        if (request()->isAjax()) {

            $deptModel = new DeptModel();
            $selectResult = $deptModel->getTree();

            foreach ($selectResult as $key => $vo) {

                $selectResult[$key]['deptname'] = '<span class="lev" >' . str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;', $vo['lev']) . ($vo['lev'] > 0 ? '└' : '') . str_repeat('----', $vo['lev']) . '</span>' . $vo['deptname'];

                $operate = [
                    '编辑' => url('dept/deptEdit', ['id' => $vo['id']]),
                    '删除' => "javascript:deptDel('" . $vo['id'] . "')",
                ];

                $selectResult[$key]['operate'] = showOperate($operate);

            }

            $return['total'] = $deptModel->getAllDepts(); //总数据
            $return['rows'] = $selectResult;

            return json($return);
        }

        return $this->fetch();

    }

    //添加部门
    public function deptAdd()
    {
        //提交表单
        if (request()->isPost()) {

            $param = input('param.');

            $param = parseParams($param['data']);

            $deptModel = new DeptModel();

            $flag = $deptModel->insertDept($param);

            return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
            die();
        }

        $deptModel = new DeptModel();
        $selectResult = $deptModel->getTree();

        foreach ($selectResult as $key => $vo) {

            $selectResult[$key]['deptname'] = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;', $vo['lev']) . ($vo['lev'] > 0 ? '└----' : '') . $vo['deptname'];
        }

        $this->assign([
            'dept' => $selectResult,
        ]);

        return $this->fetch();
    }

    //编辑部门
    public function deptEdit()
    {
        $deptModel = new deptModel();

        if (request()->isPost()) {

            $param = input('post.');
            $param = parseParams($param['data']);

            $flag = $deptModel->editDept($param);

            return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
            die();
        }

        $id = input('param.id');

        $selectResult = $deptModel->getTree();

        foreach ($selectResult as $key => $vo) {
            $selectResult[$key]['deptname'] = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;', $vo['lev']) . ($vo['lev'] > 0 ? '└----' : '') . $vo['deptname'];
        }

        $this->assign([
            'dept' => $deptModel->getOneDept($id),
            'depts' => $selectResult,
        ]);
        return $this->fetch();
    }

    //删除部门
    public function deptDel()
    {
        $id = input('param.id');

        $deptmodel = new DeptModel();
        $UserModel = new UserModel();

        $rs = $UserModel->getByDeptId($id);
        if (!empty($rs)) {
            return json(['code' => 0, 'data' => '', 'msg' => '该部门下面有用户不可以删除']);
            die();
        }

        $flag = $deptmodel->delDept($id);
        return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
    }

}
