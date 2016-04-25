<?php
require_once '../lib/config.php';

$token = $_GET['token'];
$mail = new \Ss\User\Mail();
if ($mail->IsTokenOk($token)){
    $mail->DelToken($token);
}
else{
    echo '<script>alert("无效的注册链接，可能已经过期，请重新验证你的Email地址")</script>';
    echo "<script>window.location='../c_user/signin.html'</script>";
    exit();
}