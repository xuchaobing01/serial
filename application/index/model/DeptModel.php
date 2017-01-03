<?php
namespace app\index\model;

use think\Model;

class DeptModel extends Model
{

    protected $table = "snake_dept";

    /**
     * 获取格式化成无限级分类后的栏目树
     * @param int $parent_id 从哪级开始查找
     */
    public function getTree($parent_id = 0, $lev = 0)
    {
        $tree = array();
        $cats = $this->order('id asc')->select();

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
     * 根据搜索条件获取所有的用户数量
     * @param $where
     */
    public function getAllDepts()
    {
        return $this->count();
    }

    /**
     * 根据节点id获取节点信息
     * @param $id
     */
    public function getOneDept($id)
    {
        return $this->where('id', $id)->find();
    }

    public function insertDept($param)
    {
        try {

            $rs = $this->validate('DeptValidate')->save($param);

            if (false === $rs) {

                return ['code' => -1, 'data' => '', 'msg' => $this->getError()];

            } else {

                return ['code' => 1, 'data' => '', 'msg' => '添加部门成功'];

            }

        } catch (PDOException $e) {

            return ['code' => -2, 'data' => '', 'msg' => $e->getMssage()];

        }
    }

    /**
     * 编辑角色信息
     * @param $param
     */
    public function editDept($param)
    {
        try {

            $result = $this->validate('DeptValidate')->save($param, ['id' => $param['id']]);

            if (false === $result) {
                // 验证失败 输出错误信息
                return ['code' => 0, 'data' => '', 'msg' => $this->getError()];
            } else {

                return ['code' => 1, 'data' => '', 'msg' => '编辑部门成功'];
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
    public function delDept($id)
    {
        try {
            $result = $this->where('id', $id)->delete($id);
            if (false === $result) {
                // 验证失败 输出错误信息
                return ['code' => 0, 'data' => '', 'msg' => $this->getError()];
            } else {

                return ['code' => 1, 'data' => '', 'msg' => '删除部门成功!'];
            }

        } catch (PDOException $e) {
            return ['code' => 0, 'data' => '', 'msg' => $e->getMessage()];
        }
    }

    public function getDeptsByTeptId($id)
    {
        return $this->field('id,deptname')->where('pid', $id)->select();
    }
    public function getMaxsByTeptId($id)
    {
        return $this->field('maxnum,maxtimes')->where('id', $id)->find();
    }

    public function getDeptNameById($id)
    {
        $user = $this->field('deptname')->where('id', $id)->find();
        return $user->deptname;
    }

}
