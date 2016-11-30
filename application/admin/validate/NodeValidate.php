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
namespace app\admin\validate;

use think\Validate;

class NodeValidate extends Validate
{
    // protected $rule = [
    //     ['node_name', 'unique:node', '节点名称已经存在'],
    // ];

    protected $rule = [
        'node_name' => 'require|unique:node|max:25',
        'module_name' => 'require|max:25',
        'control_name' => 'require|max:25',
        'action_name' => 'require|max:25',
        'is_menu' => 'require|in:1,2',
        'typeid' => 'require|number',
        'style' => 'max:25',
    ];

    protected $message = [
        'node_name.require' => '节点名称必须',
        'node_name.unique' => '节点名称已经存在',
        'node_name.max' => '节点名称不能超过25个字符',
        'module_name.require' => '模块名必须',
        'module_name.max' => '模块名不能超过25个字符',
        'control_name.require' => '控制器名必须',
        'control_name.max' => '控制器名不能超过25个字符',
        'action_name.require' => '方法名必须',
        'action_name.max' => '方法名不能超过25个字符',
        'is_menu.require' => '类型必须',
        'is_menu.in' => '类型不合法',
        'typeid.require' => '父节点必须',
        'typeid.number' => '父节点不合法',
        'style.max' => '菜单样式不能超过25个字符',
    ];

    protected $scene = [
        'add' => ['node_name', 'module_name', 'control_name', 'action_name', 'is_menu', 'typeid', 'style'],
        'edit' => ['node_name' => 'require|max:25', 'module_name', 'control_name', 'action_name', 'is_menu', 'typeid', 'style'],
    ];

}
