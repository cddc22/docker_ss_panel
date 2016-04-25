<?php

namespace Ss\User;

class ml_port
{

    private $db;
    private $uid;

    function __construct($uid = 0)
    {
        global $db;
        $this->db = $db;
        $this->uid = $uid;
        $this->table = "port_list";//port_list 为ml_port数据库
    }

    function SelectPortInfo($pid = 0){
        if($pid){
            $dates = $this->db->select($this->table,"*",[
                "port_id" => $pid
            ]);
            return $dates[0];
        }
        else {
            $dates = $this->db->select($this->table, "*", [
                "uid" => $this->uid
            ]);
            return $dates;
        }
    }

    function GetSportByPortId($pid){
        return $this->SelectPortInfo($pid)['sport'];
    }

    function GetLastSport(){
        $dates = $this->db->select($this->table,"sport",[
            "ORDER" => "sport DESC",
            "LIMIT" => 1
        ]);
        return $dates['0']['sport'];
    }

    function  InsertPort($name,$uid,$dport,$dst_address,$host,$transfer){
        $this->db->insert($this->table,[
            "name" => $name,
            "uid" => $uid,
            "sport" => $this->GetLastSport(),
            "dport" => $dport,
            "dst_address" => $dst_address,
            "status" => 1,
            "transfer_enabled" => $transfer,
            "host" => $host
        ]);
    }



}