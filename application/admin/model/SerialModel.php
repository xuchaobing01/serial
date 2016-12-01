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

class SerialModel extends Model
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
    public function insertSerials($param)
    {
        try {

            $result = $this->saveAll($param);
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
    public function editSerial($param)
    {
        try {

            //$result = $this->validate('UserValidate')->save($param, ['id' => $param['id']]);
            $result = $this->save($param, ['id' => $param['id']]);

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
     * 根据id获取系列号信息
     * @param $id
     */
    public function getOneSerial($id)
    {
        return $this->where('id', $id)->find();
    }

    /**
     * 删除序列号
     * @param $id
     */
    public function delSerial($id)
    {
        try {

            $this->where('id', $id)->delete();
            return ['code' => 1, 'data' => '', 'msg' => '删除管理员成功'];

        } catch (PDOException $e) {
            return ['code' => 0, 'data' => '', 'msg' => $e->getMessage()];
        }
    }

    /**
     * 生成序列号
     * @param  $numbers 生成数量
     * @param  $length 系列号长度
     * @return  $serialArr 返回数组
     */
    public function createSerial($numbers, $length = 12)
    {

        $str = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $serialArr = array();
        for ($i = 0; $i < $numbers; $i++) {
            $serial = $_SESSION['think']['id'];
            $serial .= substr(str_shuffle($str), 0, $length);
            $serialArr[]['serial'] = $serial;
        }

        return $serialArr;
    }
    /**
     * 补充完善数据
     * @param  [array]   $serialArr 序列号数组
     * @param  [int]     $times     序列号可以使用次数
     * @return [array]              返回数组
     */
    public function completeSerialArr($serialArr, $times)
    {
        foreach ($serialArr as $k => $v) {
            $serialArr[$k]['can_use_num'] = $times;
            $serialArr[$k]['surplus_num'] = $times;
            $serialArr[$k]['createtime'] = time();
            $serialArr[$k]['userid'] = $_SESSION['think']['id'];
        }

        return $serialArr;
    }
}
