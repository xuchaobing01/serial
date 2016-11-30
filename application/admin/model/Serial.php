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

class Serial extends Model
{
    protected $table = 'snake_serial';

    /**
     * 根据搜索条件获取系列号列表信息
     * @param $where
     * @param $offset
     * @param $limit
     */
    public function getSerialsByWhere($where, $offset, $limit)
    {
        return $this->field('snake_serial.*,username')
            ->join('snake_user', 'snake_user.id = snake_serial.userid')
            ->where($where)->limit($offset, $limit)->order('id desc')->select();
    }

    /**
     * 根据搜索条件获取所有的系列号数量
     * @param $where
     */
    public function getAllSerials($where)
    {
        return $this->where($where)->count();
    }

    /**
     * 插入系列号
     * @param $param
     */
    public function insertSerial($param)
    {
        try {

            $result = $this->validate('UserValidate')->save($param);
            if (false === $result) {
                // 验证失败 输出错误信息
                return ['code' => -1, 'data' => '', 'msg' => $this->getError()];
            } else {

                return ['code' => 1, 'data' => '', 'msg' => '添加用户成功'];
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
}
