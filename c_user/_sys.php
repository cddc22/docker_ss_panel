<?php
require_once '../lib/config.php';
$ssmin = new \Ss\Etc\Ana();

$rs["KeepAlive_now"] = $ssmin->user_time_count(10);
$rs["KeepAlive_Past5Min"] = $ssmin->user_time_count(300);
$rs["KeepAlive_Past1H"] = $ssmin->user_time_count(3600);
$rs["now"] = date("Y-m-d H:i",time());

echo json_encode($rs);


