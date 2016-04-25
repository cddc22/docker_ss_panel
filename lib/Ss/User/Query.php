<?php


namespace Ss\User;


class Query {

    public  $uid;
    private $dbc;
    private $db;

    function __construct($uid=0){
        global $dbc;
        global $db;
        $this->uid = $uid;
        $this->dbc = $dbc;
        $this->db  = $db;
    }

    //根据email返回UID
    function GetUidByEmail($email){
        $datas = $this->db->select("user","*",[
            "email" => $email,
            "LIMIT" => 1
        ]);
        return $datas['0']['uid'];
    }

    //根据username返回uid
    function GetUidByUsername($username){
        $datas = $this->db->select("user","*",[
            "user_name" => $username,
            "LIMIT" => 1
        ]);
        return $datas['0']['uid'];
    }

    //根据username返回uid
    function GetUid($username){
        $datas = $this->db->select("user","*",[
            "OR" => [
                "user_name" => $username,
                "email" => $username,
            ],
            "LIMIT" => 1
        ]);
        return $datas['0']['uid'];
    }



}