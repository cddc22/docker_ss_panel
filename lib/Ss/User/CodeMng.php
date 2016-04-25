<?php


namespace Ss\User;


class CodeMng extends InviteCode
{

    private $db;
    private $table = "ss_code";

    function __construct($code = 0)
    {
        global $db;
        $this->code = $code;
        $this->db = $db;
    }

    function CodeArray()
    {
        $datas = $this->db->select($this->table, "*", [
            "code" => $this->code
        ]);
        return $datas;
    }

    function Del(){
        $this->db->delete($this->table,[
            "code[=]" => $this->code,
            "LIMIT" => 1
        ]);
    }



    function SelectCode($type = 0)
    {
        if ($type) {
            $datas = $this->db->select($this->table, "*", [
                "code_type" => $type
            ]);
            $this->db->last_query();
            return $datas;
        } else {
            $datas = $this->db->select($this->table, "*");
            return $datas;
        }
    }


    function AddCode($type,$num)
    {
        for ($a = 0; $a < $num; $a++) {
            $x = rand(10, 1000);
            $z = rand(10, 1000);
            $x = md5($x) . md5($z);
            $x = base64_encode($x);
            $code = $type.substr($x, rand(1, 13), 18);
            $this->db->insert($this->table, [
                "code" => $code,
                "code_type" => $type,
            ]);
        }
        if(!$this->db->error()){
            return true;
        }
        else{
            return $this->db->error();
        }

       // $debug = $this->db->last_query();
       // echo $debug;
    }
}