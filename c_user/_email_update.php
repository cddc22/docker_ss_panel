<?php
require_once '../lib/config.php';

$mail = $_POST['mail'];
$uid = $_POST['uid'];
$action = $_POST['action'];


function CreateMailToken($uid,$mail){

    $usercheck = new \Ss\User\UserCheck();

    if (!$usercheck->IsEmailLegal($mail)){
        $rs['ok'] = 0 ;
        $rs['msg'] = "邮箱地址无效";
    }
    else if (!$usercheck->IsEmailUsed($mail)){
        $rs['ok'] = 0;
        $rs['msg'] = "邮箱已经被使用啦";
    }

    else{
        $m = new \Ss\User\mail($uid);

        if ($m->CreateNumberValidateMail($mail)){
            $rs['ok'] = 1;
            $rs['msg'] = '已经将验证邮件发送至邮箱里，输入邮件中的六位验证码。（国内邮箱收到可能需要三到五分钟_(:з」∠)_）';
            echo json_encode($rs);
        }
        else{
            $rs['ok'] = 0;
            $rs['msg'] = '发生错误_(:з」∠)_';
            echo json_encode($rs);
        }
    }

}

function GetCurrentMail($uid){
    $u = new Ss\User\UserInfo($uid);
    $rs['ok'] = 1;
    $rs['mail'] = $u->GetEmail();
    echo json_encode($rs);
}

if ($action == "getmail"){
    GetCurrentMail($uid);
}
else if ($action == "create_token"){
    CreateMailToken($uid,$mail);
}