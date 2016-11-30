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

use think\Controller;
use think\Request;

class Error extends Controller
{

    public function index(Request $request)
    {
        $name = $request->controller();
        $this->error("控制器" . $name . "不存在");

    }

    // public function _empty()
    // {
    //     $this->error('服务器还在维护中...');
    // }

}
