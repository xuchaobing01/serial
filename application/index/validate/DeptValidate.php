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
namespace app\index\validate;

use think\Validate;

class DeptValidate extends Validate
{

    protected $rule = [
        'deptname' => 'require|unique:dept|max:32',
    ];

    protected $message = [
        'deptname.require' => '部门名称必须',
        'deptname.unique' => '部门名称已经存在',
        'deptname.max' => '部门名称不能超过32个字符',
    ];

    protected $scene = [
        'add' => ['deptname'],
        'edit' => ['deptname' => 'require|max:32'],
    ];

}
