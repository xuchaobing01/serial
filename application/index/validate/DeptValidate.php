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
        'deptname' => 'require|unique:dept|max:25',
        //'maxtimes' => 'require|number',
        //'maxnum' => 'require|number',
        'pid' => 'require|number',
    ];

    protected $message = [
        'deptname.require' => '部门名称必须',
        'deptname.unique' => '部门名称已经被使用',
        'deptname.max' => '部门名称不能超过25个字符',
        // 'maxtimes.require' => '系列号使用次数必须',
        // 'maxtimes.number' => '系列号使用次数只能是数字',
        // 'maxnum.require' => '系列号数量必须',
        // 'maxnum.number' => '系列号数量只能是数字',
        'pid.require' => '请选择部门',
        'pid.number' => '选择部门错误',
    ];

    protected $scene = [
        'add' => ['deptname', 'pid'],
        'edit' => ['deptname' => 'require|max:25', 'pid'],
    ];

}
