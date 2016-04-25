<?php
//检测是否登录，若没登录则转向登录界面
if(isset($_COOKIE['uid'])|| $_COOKIE['uid'] != ''){
        //co
        $uid = $_COOKIE['uid'];
        $username = $_COOKIE['username'];
        $user_pwd  = $_COOKIE['user_pwd'];

        $U = new \Ss\User\UserInfo($uid);
        //验证cookie
        $pwd = $U->GetPasswd();
        $pw = \Ss\User\Comm::CoPW($pwd);
        if($pw != $user_pwd){
            echo "<script>window.location='signin.html'</script>";
            //header("Location:signin.html");
        }
}else{
    echo "<script>window.location='signin.html'</script>";
    //header("Location:login.php");
    exit();
}

$oo = new Ss\User\Ss($uid);
$a = $oo->get_type();

if ($a == "pro") {
    echo "<script>window.location='./pro/index.php'</script>";
    //header("Location:./pro/index.php");
}