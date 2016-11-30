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
namespace app\admin\model;

use think\Model;

class Node extends Model
{

    protected $table = "snake_node";

    /**
     * 获取节点数据
     */
    public function getNodeInfo($id)
    {
        $result = $this->field('id,node_name,typeid')->select();
        $str = "";

        $role = new UserType();
        $rule = $role->getRuleById($id);

        if (!empty($rule)) {
            $rule = explode(',', $rule);
        }
        foreach ($result as $key => $vo) {
            $str .= '{ "id": "' . $vo['id'] . '", "pId":"' . $vo['typeid'] . '", "name":"' . $vo['node_name'] . '"';

            if (!empty($rule) && in_array($vo['id'], $rule)) {
                $str .= ' ,"checked":1';
            }

            $str .= '},';

        }

        return "[" . substr($str, 0, -1) . "]";
    }

    /**
     * 根据节点数据获取对应的菜单
     * @param $nodeStr
     */
    public function getMenu($nodeStr = '')
    {
        //超级管理员没有节点数组
        $where = empty($nodeStr) ? 'is_menu = 2' : 'is_menu = 2 and id in(' . $nodeStr . ')';

        $result = db('node')->field('id,node_name,typeid,control_name,action_name,style')
            ->where($where)->select();
        $menu = prepareMenu($result);

        return $menu;
    }

    /**
     * 获取格式化成无限级分类后的栏目树
     * @param int $parent_id 从哪级开始查找
     */
    public function getTree($parent_id = 0, $lev = 0)
    {
        $tree = array();
        $cats = $this->order('id asc')->select();

        foreach ($cats as $c) {
            if ($c['typeid'] == $parent_id) {
                $c['lev'] = $lev;
                $tree[] = $c; // 手机类型
                $tree = array_merge($tree, $this->getTree($c['id'], $lev + 1));
            }
        }

        return $tree;
    }

    /**
     * 根据搜索条件获取所有的用户数量
     * @param $where
     */
    public function getAllNodes()
    {
        return $this->count();
    }

    /**
     * 根据节点id获取节点信息
     * @param $id
     */
    public function getOneNode($id)
    {
        return $this->where('id', $id)->find();
    }

    public function insertNode($param)
    {
        try {

            $rs = $this->validate('NodeValidate')->save($param);

            if (false === $rs) {

                return ['code' => -1, 'data' => '', 'msg' => $this->getError()];

            } else {

                return ['code' => 1, 'data' => '', 'msg' => '添加节点成功'];

            }

        } catch (PDOException $e) {

            return ['code' => -2, 'data' => '', 'msg' => $e->getMssage()];

        }
    }

    /**
     * 编辑角色信息
     * @param $param
     */
    public function editNode($param)
    {
        try {

            $result = $this->validate('NodeValidate')->save($param, ['id' => $param['id']]);

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
     * [delNode 删除节点]
     *
     * @author xuchaobing
     *
     * @date   2016-10-26
     *
     * @param  [int]     $id [节点id]
     *
     * @return [array]   [删除节点结果的数组]
     */
    public function delNode($id)
    {
        try {
            $this->where('id', $id)->delete($id);
            return ['code' => 1, 'data' => '', 'msg' => '删除节点成功'];
        } catch (PDOException $e) {
            return ['code' => 0, 'data' => '', 'msg' => $e->getMessage()];
        }
    }

}
