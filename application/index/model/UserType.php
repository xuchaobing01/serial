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
namespace app\index\model;

use think\Model;

class UserType extends Model
{
    protected $table = 'snake_role';

    /**
     * 根据搜索条件获取角色列表信息
     * @param $where
     * @param $offset
     * @param $limit
     */
    public function getRoleByWhere($where, $offset, $limit)
    {

        return $this->where($where)->limit($offset, $limit)->order('id desc')->select();
    }

    //获取角色栏目树
    public function getTree($parent_id = 0, $lev = 0)
    {
        $tree = array();
        $cats = $this->order('id desc')->select();

        foreach ($cats as $c) {
            if ($c['pid'] == $parent_id) {
                $c['lev'] = $lev;
                $tree[] = $c; // 手机类型
                $tree = array_merge($tree, $this->getTree($c['id'], $lev + 1));
            }
        }

        return $tree;
    }
    /**
     * getFamily 获取上级,上上级,... 面包屑导航
     */
    public function getFamily($cat_id)
    {
        $fm = array();

        $cats = $this->order('id desc')->select();

        while ($cat_id > 0) {
            foreach ($cats as $c) {
                if ($c['id'] == $cat_id) {
                    $fm[] = $c;
                    $cat_id = $c['pid'];
                    break;
                }
            }
        }

        return array_reverse($fm);
    }

    /**
     * 根据搜索条件获取所有的角色数量
     * @param $where
     */
    public function getAllRole($where = "")
    {
        return $this->where($where)->count();
    }

    /**
     * 插入角色信息
     * @param $param
     */
    public function insertRole($param)
    {
        try {

            $result = $this->validate('RoleValidate')->save($param);
            if (false === $result) {
                // 验证失败 输出错误信息
                return ['code' => -1, 'data' => '', 'msg' => $this->getError()];
            } else {

                return ['code' => 1, 'data' => '', 'msg' => '添加角色成功'];
            }
        } catch (PDOException $e) {

            return ['code' => -2, 'data' => '', 'msg' => $e->getMessage()];
        }
    }

    /**
     * 编辑角色信息
     * @param $param
     */
    public function editRole($param)
    {
        try {

            $result = $this->validate('RoleValidate')->save($param, ['id' => $param['id']]);

            if (false === $result) {
                // 验证失败 输出错误信息
                return ['code' => 0, 'data' => '', 'msg' => $this->getError()];
            } else {

                return ['code' => 1, 'data' => '', 'msg' => '编辑角色成功'];
            }
        } catch (PDOException $e) {
            return ['code' => 0, 'data' => '', 'msg' => $e->getMessage()];
        }
    }

    /**
     * 根据角色id获取角色信息
     * @param $id
     */
    public function getOneRole($id)
    {
        return $this->where('id', $id)->find();
    }

    /**
     * 根据角色id获取角色信息
     * @param $id
     */
    public function getSonById($id)
    {
        return $this->where('pid', $id)->find();
    }

    /**
     * 删除角色
     * @param $id
     */
    public function delRole($id)
    {
        try {

            $this->where('id', $id)->delete();
            return ['code' => 1, 'data' => '', 'msg' => '删除角色成功'];

        } catch (PDOException $e) {
            return ['code' => 0, 'data' => '', 'msg' => $e->getMessage()];
        }
    }

    //获取所有的角色信息
    public function getRole()
    {
        return $this->select();
    }

    //获取角色信息
    public function getRoleByWhere1($where)
    {
        return $this->where($where)->select();
    }

    //获取角色的权限节点
    public function getRuleById($id)
    {
        $res = $this->field('rule')->where('id', $id)->find();

        return $res['rule'];
    }

    /**
     * 分配权限
     * @param $param
     */
    public function editAccess($param)
    {
        try {
            $this->save($param, ['id' => $param['id']]);
            return ['code' => 1, 'data' => '', 'msg' => '分配权限成功'];

        } catch (PDOException $e) {
            return ['code' => 0, 'data' => '', 'msg' => $e->getMessage()];
        }
    }

    /**
     * 获取角色信息
     * @param $id
     */
    public function getRoleInfo($id)
    {

        $result = db('role')->where('id', $id)->find();
        if (empty($result['rule'])) {
            $where = '';
        } else {
            $where = 'id in(' . $result['rule'] . ')';
        }
        $res = db('node')->field('control_name,action_name')->where($where)->select();
        foreach ($res as $key => $vo) {
            if ('#' != $vo['action_name']) {
                $result['action'][] = $vo['control_name'] . '/' . $vo['action_name'];
            }
        }

        return $result;
    }
}
