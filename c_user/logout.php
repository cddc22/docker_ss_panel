<?php
session_start();
setcookie("username", "", time()-3600);
setcookie("user_pwd", "", time()-3600);
setcookie("uid", "", time()-3600);
setcookie("user_email", "", time()-3600);
header("Location:signin.html");
exit;