<?php
require_once '../lib/config.php';

$code = $_POST['code'];
$uid = $_POST['uid'];


$IsCode = new Ss\User\Code($code);
$oo = new \Ss\User\Ss($uid);


if($IsCode->IsCodeOk()){

    if ($oo->get_type() == '0'){
        $rs['msg'] = '-1';//需要验证邮箱
        echo json_encode($rs);
    }
    else{
        $UpdateUser = new Ss\User\UserInfo($uid);
        if($UpdateUser->UserArray()['plan'] != 'ss_trail' && $UpdateUser->UserArray()['plan'] != 'ss_null'){
            $rs['msg'] = '2'; //有正在生效的套餐
            echo json_encode($rs);
        }
        else{
            //UpdateUser
            $UpdateUser->UpdateUser($code);
            $IsCode->Del();
            $rs['msg'] = '1';
            echo json_encode($rs);
        }
    }

}
else{
    $rs['msg'] = '0';
    echo json_encode($rs);
}

