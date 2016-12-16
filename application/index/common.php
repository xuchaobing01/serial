<?php
/**
 * 生成操作按钮
 * @param array $operate 操作按钮数组
 */
function showOperate($operate = [])
{
    if (empty($operate)) {
        return '';
    }
    $option = <<<EOT
<div class="btn-group" >
    <button class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
        操作 <span class="caret"></span>
    </button>
    <ul class="dropdown-menu">
EOT;

    foreach ($operate as $key => $vo) {

        $option .= '<li><a href="' . $vo . '">' . $key . '</a></li>';
    }
    $option .= '</ul></div>';

    $option .= '<div class="btn-group1">';
    foreach ($operate as $key => $vo) {

        if ($key == '编辑') {
            $option .= '<a href="' . $vo . '">' . '<button class="btn btn-primary btn-sm" type="button" style="border-radius: 3px;margin-right: 5px;"><i class="fa fa-pencil"></i> ' . $key . '</button></a>';
        } else if ($key == '删除') {
            $option .= '<a href="' . $vo . '">' . '<button class="btn btn-danger btn-sm" type="button" style="border-radius: 3px;margin-right: 5px;"><i class="fa fa-trash-o"></i> ' . $key . '</button></a>';
        } else if ($key == '分配权限') {
            $option .= '<a href="' . $vo . '">' . '<button class="btn btn-success btn-sm" type="button" style="border-radius: 3px;margin-right: 5px;"><i class="fa fa-key"></i> ' . $key . '</button></a>';
        } else if ($key == '备份') {
            $option .= '<a href="' . $vo . '">' . '<button class="btn btn-primary btn-sm" type="button" style="border-radius: 3px;margin-right: 5px;"><i class="fa fa-copy"></i> ' . $key . '</button></a>';
        } else if ($key == '还原') {
            $option .= '<a href="' . $vo . '">' . '<button class="btn btn-info btn-sm" type="button" style="border-radius: 3px;margin-right: 5px;"><i class="fa fa-share-square-o"></i> ' . $key . '</button></a>';
        } else if ($key == '设置') {
            $option .= '<a href="' . $vo . '">' . '<button class="btn btn-primary btn-sm" type="button" style="border-radius: 3px;margin-right: 5px;"><i class="fa fa-cog"></i> ' . $key . '</button></a>';
        } else {
            $option .= '<a href="' . $vo . '">' . '<button class="btn btn-info btn-sm" type="button" style="border-radius: 3px;margin-right: 5px;"><i class="fa fa-paste"></i> ' . $key . '</button></a>';
        }
    }
    $option .= '</div>';

    return $option;
}

/**
 * 将字符解析成数组
 * @param $str
 */
function parseParams($str)
{
    $arrParams = [];
    parse_str(html_entity_decode(urldecode($str)), $arrParams);
    return $arrParams;
}

/**
 * 子孙树 用于菜单整理
 * @param $param
 * @param int $pid
 */
function subTree($param, $pid = 0)
{
    static $res = [];
    foreach ($param as $key => $vo) {

        if ($pid == $vo['pid']) {
            $res[] = $vo;
            subTree($param, $vo['id']);
        }
    }

    return $res;
}

/**
 * 整理菜单住方法
 * @param $param
 * @return array
 */
function prepareMenu($param)
{
    $parent = []; //父类
    $child = []; //子类

    foreach ($param as $key => $vo) {

        if ($vo['typeid'] == 0) {
            $vo['href'] = '#';
            $parent[] = $vo;
        } else {
            $vo['href'] = url($vo['control_name'] . '/' . $vo['action_name']); //跳转地址
            $child[] = $vo;
        }
    }

    foreach ($parent as $key => $vo) {
        foreach ($child as $k => $v) {

            if ($v['typeid'] == $vo['id']) {
                $parent[$key]['child'][] = $v;
            }
        }
    }
    unset($child);

    return $parent;
}

/**
 * 解析备份sql文件
 * @param $file
 */
function analysisSql($file)
{
    // sql文件包含的sql语句数组
    $sqls = array();
    $f = fopen($file, "rb");
    // 创建表缓冲变量
    $create = '';
    while (!feof($f)) {
        // 读取每一行sql
        $line = fgets($f);
        // 如果包含空白行，则跳过
        if (trim($line) == '') {
            continue;
        }
        // 如果结尾包含';'(即为一个完整的sql语句，这里是插入语句)，并且不包含'ENGINE='(即创建表的最后一句)，
        if (!preg_match('/;/', $line, $match) || preg_match('/ENGINE=/', $line, $match)) {
            // 将本次sql语句与创建表sql连接存起来
            $create .= $line;
            // 如果包含了创建表的最后一句
            if (preg_match('/ENGINE=/', $create, $match)) {
                // 则将其合并到sql数组
                $sqls[] = $create;
                // 清空当前，准备下一个表的创建
                $create = '';
            }
            // 跳过本次
            continue;
        }

        $sqls[] = $line;
    }
    fclose($f);

    return $sqls;
}
