<?php
require_once '../lib/config.php';
require_once '_check.php';

$nowpwd = $_POST['nowpwd'];
$pwd = $_POST['pwd'];
$repwd = $_POST['repwd'];

$nowpwd = \Ss\User\Comm::SsPW($nowpwd);
if($U->GetPasswd() != $nowpwd) {
    $arr['error'] = '1';
    $arr['msg'] = "密码错误";
}elseif($pwd != $repwd){
    $arr['error'] = '1';
    $arr['msg'] = "两次密码输入不同";
}elseif(strlen($pwd)<8){
    $arr['error'] = '1';
    $arr['msg'] = "密码太短啦";
}else{
    $pwd = \Ss\User\Comm::SsPW($pwd);
    $U->UpdatePwd($pwd);
    $arr['ok'] = '1';
    $arr['msg'] = "修改成功";
}
//echo
echo json_encode($arr);