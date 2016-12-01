<?php
namespace app\index\controller;

use app\index\model\SerialModel;
use think\Controller;
use think\Request;

class Serial extends Controller
{
    public function index()
    {
        return $this->fetch();
    }
    /**
     * 检查系列号是否正确
     */
    public function checkSerial()
    {

        $request = Request::instance();
        $param   = $request->param();
        if (!isset($param['serial']) || (isset($param['serial']) && empty($param['serial']))) {
            return json(['code' => 0, 'msg' => '验证失败']);
        }

        $where['serial']      = $param['serial'];
        $where['surplus_num'] = ['>', '0'];
        $where['status']      = 1;
        $seiral               = new SerialModel();
        $rs                   = $seiral->checkBySerial($where);

        if ($rs > 0) {
            return json(['code' => 1, 'msg' => '可以使用']);
        } else {
            return json(['code' => 0, 'msg' => '不可以使用']);
        }

    }
    /**
     * 使用系列号
     */
    public function useSerial()
    {
        $request = Request::instance();
        $param   = $request->param();
        if (!isset($param['serial']) || (isset($param['serial']) && empty($param['serial']))) {
            return json(['code' => 0, 'msg' => '验证失败']);
        }

        $serial = new SerialModel();

        $where['serial'] = $param['serial'];
        $where['status'] = 1;
        $rs              = $serial->field('used_num,surplus_num')->where($where)->find();
        if (empty($rs)) {
            return json(['code' => 0, 'msg' => '系列号不可以使用']);
        }

        $used_num    = $rs->used_num;
        $surplus_num = $rs->surplus_num;
        if ($surplus_num <= 0) {
            return json(['code' => 0, 'msg' => '系列号不可以使用']);
        }

        $arr['serial']      = $param['serial'];
        $arr['used_num']    = $used_num + 1;
        $arr['surplus_num'] = $surplus_num - 1;
        if ($arr['surplus_num'] == 0) {
            $arr['status'] = 2;
        }

        $flag = $serial->useSerial($arr);
        if ($flag === true) {
            return json(['code' => 1, 'msg' => '系列号使用成功！']);
        } else {
            return json(['code' => 0, 'msg' => '系列号使用失败！']);
        }
    }
}
