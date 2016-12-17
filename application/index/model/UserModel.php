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

class UserModel extends Model
{
    protected $table = 'snake_user';

    /**
     * 根据搜索条件获取用户列表信息
     * @param $where
     * @param $offset
     * @param $limit
     */
    public function getUsersByWhere($where, $offset, $limit)
    {
        return $this->field('snake_user.*,snake_role.rolename')
            ->join('snake_role', 'snake_user.typeid = snake_role.id')
            ->where($where)->limit($offset, $limit)->order('id desc')->select();
    }

    /**
     * 根据搜索条件获取所有的用户数量
     * @param $where
     */
    public function getAllUsers($where)
    {
        return $this->where($where)->count();
    }

    /**
     * 插入管理员信息
     * @param $param
     */
    public function insertUser($param)
    {
        try {

            $result = $this->validate('UserValidate')->save($param);
            if (false === $result) {
                // 验证失败 输出错误信息
                return ['code' => -1, 'data' => '', 'msg' => $this->getError()];
            } else {

                return ['code' => 1, 'data' => $this->id, 'msg' => '添加用户成功'];
            }
        } catch (PDOException $e) {

            return ['code' => -2, 'data' => '', 'msg' => $e->getMessage()];
        }
    }

    /**
     * 编辑管理员信息
     * @param $param
     */
    public function editUser($param)
    {
        try {

            $result = $this->validate('UserValidate')->save($param, ['id' => $param['id']]);

            if (false === $result) {
                // 验证失败 输出错误信息
                return ['code' => 0, 'data' => '', 'msg' => $this->getError()];
            } else {

                return ['code' => 1, 'data' => '', 'msg' => '编辑用户成功'];
            }
        } catch (PDOException $e) {
            return ['code' => 0, 'data' => '', 'msg' => $e->getMessage()];
        }
    }

    /**
     * 根据管理员id获取角色信息
     * @param $id
     */
    public function getOneUser($id)
    {
        return $this->where('id', $id)->find();
    }

    /**
     * 删除管理员
     * @param $id
     */
    public function delUser($id)
    {
        try {

            $this->where('id', $id)->delete();
            return ['code' => 1, 'data' => '', 'msg' => '删除管理员成功'];

        } catch (PDOException $e) {
            return ['code' => 0, 'data' => '', 'msg' => $e->getMessage()];
        }
    }
    /**
     * 更新用户的系列号数量
     */
    public function updateSerialNum($num)
    {

        try {

            $result = $this->save(['serialnum' => $num], ['id' => $_SESSION['think']['id']]);

            if (false === $result) {
                // 验证失败 输出错误信息
                return ['code' => 0, 'data' => '', 'msg' => $this->getError()];
            } else {

                return ['code' => 1, 'data' => '', 'msg' => '更新数据成功！'];
            }
        } catch (PDOException $e) {
            return ['code' => 0, 'data' => '', 'msg' => $e->getMessage()];
        }
    }

    public function editPWD($param)
    {
        try {

            $result = $this->save($param, ['id' => $_SESSION['think']['id']]);

            if (false === $result) {
                // 验证失败 输出错误信息
                return ['code' => 0, 'data' => '', 'msg' => $this->getError()];
            } else {

                return ['code' => 1, 'data' => '', 'msg' => '修改密码成功!'];
            }
        } catch (PDOException $e) {
            return ['code' => 0, 'data' => '', 'msg' => $e->getMessage()];
        }
    }

    /**
     * 根据部门id获取用户信息
     * @param $id
     */
    public function getByDeptId($id)
    {
        return $this->where('deptid', $id)->find();
    }

    public function getUsersByTeptId($id)
    {
        return $this->field('id,username')->where('deptid', $id)->select();
    }

    public function getFamily($cat_id)
    {
        $id = $cat_id;
        while ($cat_id > 0) {
            $pid = $this->field('pid')->where('id', $cat_id)->find();
            $pid = $pid['pid'];
            if ($pid != 0) {
                $this->query('UPDATE `snake_user` SET son = CONCAT(son, CASE son WHEN "" THEN "' . $id . '" ELSE ",' . $id . '" END ) where id=' . $pid);
            }
            $cat_id = $pid;
        }
        return true;
    }

    public function getUserNameByUserId($id)
    {
        $user = $this->field('username')->where('id', $id)->find();
        return $user->username;
    }

}
