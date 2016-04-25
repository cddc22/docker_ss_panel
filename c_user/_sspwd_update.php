<?php
require_once '../lib/config.php';
require_once '_check.php';

// $pwd = $_POST['sspwd'];
if($_POST['sspwd'] == ''){
    $pwd = \Ss\Etc\Comm::get_random_char(8);
}else{
    $pwd = $_POST['sspwd'];
}

$oo->update_ss_pass($pwd);

$arr['ok'] = '1';
$arr['msg'] = "success";
//$a['msg'] = "success";
echo json_encode($arr);