<?php

namespace Ss\User;


class Code extends Invite
{

    private $db;
    private $table = "ss_code";

    function __construct($code = 0)
    {
        global $db;
        $this->code = $code;
        $this->db = $db;
    }

    //激活码是否有效检测
    function IsCodeOk(){
        if($this->db->has($this->table,[
            "code" => $this->code
        ])){
            return 1;
        }else{
            return 0;
        }
    }


    //删除激活码
    function Del(){
        $this->db->delete($this->table,[
            "code[=]" => $this->code,
            "LIMIT" => 1
        ]);
    }

    //根据


}