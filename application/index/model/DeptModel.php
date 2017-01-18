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

class DeptModel extends Model
{
    protected $table = 'snake_dept';

    /**
     * 根据搜索条件获取角色列表信息
     * @param $where
     * @param $offset
     * @param $limit
     */
    public function getDeptByWhere($where, $offset, $limit)
    {

        return $this->where($where)->limit($offset, $limit)->order('id desc')->select();
    }

    /**
     * 根据搜索条件获取所有的角色数量
     * @param $where
     */
    public function getAllDept($where = "")
    {
        return $this->where($where)->count();
    }

    /**
     * 插入角色信息
     * @param $param
     */
    public function insertDept($param)
    {
        try {

            $result = $this->validate('DeptValidate')->save($param);
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
    public function editDept($param)
    {
        try {

            $result = $this->validate('DeptValidate')->save($param, ['id' => $param['id']]);

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
    public function getOneDept($id)
    {
        return $this->where('id', $id)->find();
    }

    /**
     * 删除角色
     * @param $id
     */
    public function delDept($id)
    {
        try {

            $this->where('id', $id)->delete();
            return ['code' => 1, 'data' => '', 'msg' => '删除部门成功'];

        } catch (PDOException $e) {
            return ['code' => 0, 'data' => '', 'msg' => $e->getMessage()];
        }
    }

    public function getAllDeptArr($where = "")
    {
        $dataArr = array();
        $rs      = $this->field('id,deptname')->where($where)->select();
        foreach ($rs as $k => $v) {
            $dataArr[$v['id']] = $v['deptname'];
        }
        return $dataArr;
    }
    public function getAllDepts($where = "")
    {
        return $this->where($where)->select();
    }
    public function updateNum($id)
    {
        $result = $this->where('id', $id)->setInc('num');
    }
    public function downNum($id)
    {
        $num = $this->where('id', $id)->find()['num'];
        if ($num >= 1) {
            $result = $this->where('id', $id)->setDec('num');
        } else {
            $result = $this->where('id', $id)->update(['num' => 0]);
        }
    }
    public function updateNumByNum($id, $num)
    {
        return $result = $this->where('id', $id)->update(['num' => $num]);
    }

}
