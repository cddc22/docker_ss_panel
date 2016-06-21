<?php

include_once '../lib/config.php';
require_once '_check.php';

$validate_code = $_POST['mailcode'];
$uid = $_POST['uid'];
$new_mailaddress = $_POST['mail'];

$userinfo = new Ss\User\UserInfo($uid);
$mail = new \Ss\User\mail($uid);

$org_mailaddress = $userinfo->GetEmail();

if ($mail->IsTokenOk($validate_code,"valmail")){
    $mail->DelToken($validate_code);
    if ($new_mailaddress != $org_mailaddress){
        //Update email
        $userinfo->UpdateEmail($new_mailaddress);
        $userinfo->UpdateEnable(1);
        $userinfo->UpdateType("1");
        $rs['ok'] = 1;
        $rs['msg'] = "邮箱地址已经被认证并且更改";
        echo json_encode($rs);
    }
    else{
        $userinfo->UpdateEnable("1");
        $userinfo->UpdateType("1");
        $rs['ok'] = 1;
        $rs['msg'] = "感谢认证邮箱_(:з」∠)_";
        echo json_encode($rs);
    }
}
else {
    $rs['ok'] = 0;
    $rs['msg'] = "无效的验证码，也许过期了，点此重新验证。";
    echo json_encode($rs);
}