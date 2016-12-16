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
namespace app\api\model;

use think\Model;

class SerialModel extends Model
{
    protected $table = 'snake_serial';

    public function checkBySerial($where)
    {
        return $this->where($where)->count();
    }

    public function useSerial($param)
    {
        try {

            $result = $this->save($param, ['serial' => $param['serial']]);

            if (false === $result) {
                // 使用失败 输出错误信息
                return false;
            } else {

                return true;
            }
        } catch (PDOException $e) {
            return false;
        }

    }
}
