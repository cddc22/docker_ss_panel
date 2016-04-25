<?php


namespace Ss\User;


class Reg {

    private $db;

    private $table = "user";

    function __construct(){
        global $db;
        $this->db = $db;
    }

    function GetLastPort(){
        $datas = $this->db->select($this->table,"*",[
            "ORDER" => "uid DESC",
            "LIMIT" => 1
        ]);
        return $datas['0']['port'];
    }

    function Reg($username,$email,$pass,$plan,$transfer,$invite_num,$exp_days,$ref_by = '0'){

        $sspass = \Ss\Etc\Comm::get_random_char(8);

        date_default_timezone_set("Asia/Shanghai");
        $days = "+".$exp_days." Days";
        $days = strtotime($days);
        $exp_date = date("Y-m-d H:i:s",$days);

        $this->db->insert($this->table,[
           "user_name" => $username,
            "email" => $email,
            "pass" => $pass,
            "passwd" =>  $sspass,
            "t" => '0',
            "u" => '0',
            "d" => '0',
            "plan" => $plan,
            "transfer_enable" => $transfer,
            "port" => $this->GetLastPort()+rand(1,5),
            "invite_num" => $invite_num,
            "money" => '0',
            "#reg_date" =>  'NOW()',
            "exp_date" => $exp_date,
            "ref_by" => $ref_by,
            "enable" => -1 ,//需要验证邮箱参数
            "type" => 0
        ]);

    }




}