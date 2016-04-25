<?php

namespace Ss\Node;
// extends Ss\Etc\Db
class NodePro {

    public  $uid;
    public  $db;

    function __construct($uid=0){
        global $db;
        $this->uid  = $uid;
        $this->db  = $db;
    }

    function NodeProPort($uid,$node_id){
        $uid = (int)($uid);
        $node_id = (int)($node_id);

        $data = $this->db->select("pro_port_list","sport",[
            "and" =>[
                "uid[=]" => $uid,
                "node_id[=]" => $node_id
            ]
        ]);

        return $data[0];
    }//取得中转服务器所使用的端口

    function TServerArray($tid){
        $data = $this->db->select("ss_node_pro_transfer","*",[
            "tnode_id" => $tid
        ]);
        return $data[0]['tnode_server'];
    }//返回中转服务器地址

    function GetProConnServer($node_id,$uid){
        $data = $this->db->select("pro_port_list","t_server_id",[
            "AND" => [
                "node_id" => $node_id,
                "uid" =>$uid
            ]
        ]);

        $tid = $data[0];

        return $this->TServerArray($tid);

    }


}