<?php
require_once '../lib/config.php';
$email = $_POST['email'];
$email = strtolower($email);
$passwd = $_POST['passwd'];
$name = $_POST['name'];
$repasswd = $_POST['repasswd'];
//$agree = $_POST['agree'];
$code = $_POST['code'];

$c = new \Ss\User\UserCheck();
$code = new \Ss\User\Code($code);
if(!$c->IsEmailLegal($email)){
    $a['msg'] = "邮箱无效";
}elseif($c->IsEmailUsed($email)){
    $a['msg'] = "邮箱已被使用";
}elseif($repasswd != $passwd){
    $a['msg'] = "两次密码输入不符";
}elseif(strlen($passwd)<8){
    $a['msg'] = "密码太短";
}elseif(strlen($name)<5){
    $a['msg'] = "用户名太短";
}elseif($c->IsUsernameUsed($name)){
    $a['msg'] = "用户名已经被使用";
}else{
        // get value
        //$ref_by = $code->GetCodeUser();
        $passwd = \Ss\User\Comm::SsPW($passwd);
        $plan = "ss_trail";
        $transfer = $a_transfer;
        $invite_num = rand($user_invite_min, $user_invite_max);
        //do reg
        $reg = new \Ss\User\Reg();
        $reg->Reg($name, $email, $passwd, $plan, $transfer, $invite_num,3);

        $a['ok'] = '1';
        $a['msg'] = "注册成功";

        //write cookie

        $q = new \Ss\User\Query();
        $id = $q->GetUidByUsername($name);
        setcookie("user_pwd",$passwd,time()+3600);
        setcookie("uid",$id,time()+3600);
        setcookie("username",$name,time()+3600);

}
echo json_encode($a);
