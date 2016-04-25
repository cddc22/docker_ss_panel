<?php
require_once '../lib/config.php';

$action = $_POST['action'];
$valicode = $_POST['code'];
$email = $_POST['email'];

$pwd = $_POST['pwd'];
$repwd = $_POST['repwd'];
$mailcode = $_POST['mailcode'];

session_start();
//session is code

function GenValCode(){
    Ss\User\Comm::_validatecode(125,25,5,false);
}

function CheckValCode($valicode,$mail){
    if ($valicode == $_SESSION['code']){
        $rs['ok'] = 1;
        _CheckEmail($mail);
    }
    else{
        $rs['ok'] = 0;
        $rs['msg'] = "验证码打错啦";
        echo json_encode($rs);
    }
}

function _CheckEmail($email){
    $u = new \Ss\User\UserCheck();
    $info = new \Ss\User\UserInfo();
    if ($u->IsEmailUsed($email)){
        $rs['ok'] = 1;
        $_SESSION['uid'] = $info->GetUidByEmail($email);
        echo json_encode($rs);
    }
    else{
        $rs['ok'] = 0;
        $rs['msg'] = "好像这个邮箱没有注册过_(:з」∠)_";
        echo json_encode($rs);
    }
}

function sendmail(){
    if(isset($_SESSION['uid'])){
        $uid = $_SESSION['uid'];
        $m = new \Ss\User\mail($uid);
        if ($m->CreateNumberResetPwdMail()){
            $rs['ok'] = 1;
            $rs['msg'] = "已经将认证邮件发送至邮箱，请在十分钟内完成修改密码。（认证邮件大概要三到五分钟发送成功qwq）";
            echo json_encode($rs);
        }
        else{
            $rs['ok'] = 0;
            $rs['msg'] = "可能发送邮件有一点问题，联系一下旺旺吧";
            echo json_encode($rs);
        }
    }
    else{
        $rs['ok'] = 0 ;
        $rs['msg'] = "还没有取得uid！";
        echo json_encode($rs);
    }
}

function UpdatePwd($uid,$code,$pwd,$repwd){
    $m = new \Ss\User\mail($uid);
    if ($m->IsTokenOk($code,"resetpwd")){
        if ($pwd != $repwd){
            $rs['ok'] = 0;
            $rs['msg'] = "两次输入密码不一致";
            echo json_encode($rs);
        }
        else if (strlen($pwd)<8){
            $rs['ok'] = 0;
            $rs['msg'] = "密码请大于八位";
            echo json_encode($rs);
        }
        else{
            $u = new \Ss\User\User($uid);
            $u->UpdatePWd($pwd);
            $rs['ok'] = 1;
            $rs['msg'] = "现在可以用新密码登陆了。";
            echo json_encode($rs);
        }
    }
    else{
        $rs['ok'] = 0;
        $rs['msg'] = "无效的邮箱验证码，可能过期了，重新验证邮箱看看。";
        echo json_encode($rs);
    }
}

if ($action == 'check'){
    CheckValCode($valicode,$email);
}
else if ($action == 'sendmail'){
    sendmail();
}
else if ($action == 'updatepwd'){
    if (isset($_SESSION['uid'])){
        $uid = $_SESSION['uid'];
        UpdatePwd($uid,$mailcode,$pwd,$repwd);
    }
    else{
        $rs['ok'] = 0;
        $rs['msg'] = "还未取得uid请重新验证邮箱！";
        echo json_encode($rs);
    }
}
else {//default is genvalcode
    GenValCode();
}