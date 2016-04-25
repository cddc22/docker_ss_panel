<?php

namespace Ss\User;

class ml_user
{

    private $db;
    private $uid;

    function __construct($uid = 0)
    {
        global $db;
        $this->db = $db;
        $this->uid = $uid;
        $this->table = "ml_user";//port_list Îªml_portÊı¾İ¿â
    }

    function GetMlTransfer(){
        $datas = $this->db->select($this->table,"transfer",[
            "uid" => $this->uid]
        );
        return $datas['0']['transfer'];
    }

    function GetMlExpDate(){
        $datas = $this->db->select($this->table,"exp_date",[
                "uid" => $this->uid]
        );
        return $datas['0']['exp_date'];
    }


}