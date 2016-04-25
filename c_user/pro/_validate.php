<?php
require_once '../../lib/config.php';




$node_id = $_POST['node_id'];
$uid=mysqli_real_escape_string($dbc,trim($_POST['uid']));


rs($uid,$node_id);



function rs($uid,$node_id){ //写入json
    $node = new Ss\Node\Node();
    $oo = new \Ss\User\Ss($uid);
    $nodep = new \Ss\Node\NodePro();

    $node_rs =  $node->SelectNode($node_id);
    $port = $nodep->NodeProPort($uid,$node_id);
    $server = $nodep->GetProConnServer($node_id,$uid);


    $pass = $oo->get_pass();
    $exp = $oo->get_exp_date();
    $plan = $oo->get_plan();

    $rs['port'] = $port;
    $rs['pass'] = $pass;
    $rs['exp_date'] = $exp;
    $rs['msg'] = '1';
    $rs['server'] = $server;
    $rs['method'] = $node_rs[0]['node_method'];
    $rs['node_name'] = $node_rs[0]['node_name'];
    $rs['ssurl'] =  $rs['method'].":".$rs['pass']."@".$rs['server'].":".$rs['port'];
    $rs['ssqr'] = "ss://".base64_encode($rs['ssurl']);
    $rs['plan'] = $plan;


//计算流量

    global $tokb, $tomb, $togb;

    if($oo->get_transfer()<1000000)
    {
        $transfers=0;}else{ $transfers = $oo->get_transfer();
    }
//计算流量并保留2位小数
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





