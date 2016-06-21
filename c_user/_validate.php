<?php
require_once '../lib/config.php';
require_once '_check.php';
//邀请模式参考微林大概



$node_id = $_POST['node_id'];
$uid=$_POST['uid'];


rs($uid,$node_id);



function rs($uid,$node_id){ //写入json
    $node = new Ss\Node\Node();
    $oo = new \Ss\User\Ss($uid);
    $node_rs =  $node->SelectNode($node_id);
    $port = $oo->get_port();
    $pass = $oo->get_pass();
    $exp = $oo->get_exp_date();
    $plan = $oo->get_plan();
    $enable = $oo->getEnableStatus();
    $type = $oo->get_type();

    $rs['port'] = $port;
    $rs['pass'] = $pass;
    $rs['exp_date'] = date("Y-m-d",strtotime($exp));
    $rs['msg'] = '1';
    $rs['server'] = $node_rs[0]['node_server'];
    $rs['method'] = $node_rs[0]['node_method'];
    $rs['node_name'] = $node_rs[0]['node_name'];
    $rs['ssurl'] =  $rs['method'].":".$rs['pass']."@".$rs['server'].":".$rs['port'];
    $rs['ssqr'] = "ss://".base64_encode($rs['ssurl']);
    $rs['plan'] = $plan;
    $rs['enable'] = $enable;
    $rs['type'] = $type;//if type is 0 email is un registered;

//计算流量

    global $tokb, $tomb, $togb;

    if($oo->get_transfer()<1000000)
    {
        $transfers=0;}else{ $transfers = $oo->get_transfer();
    }
//计算流量并保留2位小数
    if( $oo->get_transfer_enable()<=0){
        echo json_encode($rs);
        exit();
    }

    $all_transfer = $oo->get_transfer_enable()/$togb;
    $unused_transfer =  $oo->unused_transfer()/$togb;
    $used_100 = $oo->get_transfer()/$oo->get_transfer_enable();
    $used_100 = round($used_100,2);
    $used_100 = $used_100*100;
//计算流量并保留2位小数
    $transfers = $transfers/$tomb;
    $transfers = round($transfers,2);
    $all_transfer = round($all_transfer,2);
    $unused_transfer = round($unused_transfer,2);


    $rs['used_100'] = $used_100;
    $rs['transfers'] = $transfers;
    $rs['all_transfer'] = $all_transfer;
    $rs['unused_transfer'] = $unused_transfer;


    echo json_encode($rs);

}





