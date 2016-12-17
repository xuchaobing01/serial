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
use think\Controller;

class Api extends Controller
{

    public function getUserByTeptId()
    {
        $id = input('param.id');

        $userModel = new UserModel();
        $users     = $userModel->getUsersByTeptId($id);
        return json($users);
    }

    public function getDeptByTeptId()
    {
        $id = input('param.id');

        $deptModel = new DeptModel();
        $depts     = $deptModel->getDeptsByTeptId($id);
        return json($depts);
    }

    public function getMaxByTeptId()
    {
        $id = input('param.id');

        $deptModel = new DeptModel();
        $dept      = $deptModel->getMaxsByTeptId($id);
        return json($dept);
    }
}
