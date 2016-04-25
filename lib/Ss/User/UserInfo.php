<?php

namespace Ss\User;


class UserInfo {

    public  $uid;
    private $db;

    private $table = "user";

    function __construct($uid=0){
        global $db;
        $this->uid = $uid;
        $this->db  = $db;
    }

    //user info array
    function UserArray(){
        $datas = $this->db->select($this->table,"*",[
            "uid" => $this->uid,
            "LIMIT" => "1"
        ]);

        return $datas['0'];
    }

    //获得激活码类型字串
    function TypeArray($code){
        $datas = $this->db->select("ss_code_type",[
            "[>]ss_code" =>"code_type"
        ],[
            "code_type","code_expdays","code_transfer"
        ],[
           "ss_code.code" => $code
        ]);

        return $datas[0];
    }

    function UpdateUser($code){
            $typearr = $this->TypeArray($code);

            $exp_days = $typearr['code_expdays'];//$carr['code_expdays']
            $plan = $typearr['code_type'];
            $trans = $typearr['code_transfer'];

            date_default_timezone_set("Asia/Shanghai");
            $days = "+" . $exp_days . " Days";
            $days = strtotime($days);
            $exp_date = date("Y-m-d H:i:s", $days);

            $this->db->update("user", [
                "plan" => $plan,
                "u" => 0,
                "d" => 0,
                "enable" => 1,//1为正常套餐
                "transfer_enable" => $trans,
                "exp_date" => $exp_date
            ], [
                "uid" => $this->uid
            ]);
    }


    function UpdateEnable($enable_number){
        $this->db->update("user",[
            "enable" => $enable_number
        ],[
            "uid" => $this->uid
        ]);
    }

    function UpdateType($type_number){
        $this->db->update("user",[
            "type" => $type_number
        ],[
            "uid" => $this->uid
        ]);
    }


    function GetPasswd(){
        return $this->UserArray()['pass'];
    }

    function GetEmail(){
        return $this->UserArray()['email'];
    }

    function GetUserName(){
        return $this->UserArray()['user_name'];
    }

    function RegDate(){
        return $this->UserArray()['reg_date'];
    }

    function RegDateUnixTime(){
        return strtotime($this->RegDate());
    }

    function InviteNum(){
        return $this->UserArray()['invite_num'];
    }

    function InviteNumToZero(){
        $this->db->update("user",[
            "invite_num" => '0'
        ],[
            "uid" => $this->uid
        ]);
    }

    function GetUidByEmail($mail){
        $data = $this->db->select("user","uid",[
            "email" => $mail
        ]);
        return $data[0];
    }

    function Money(){
        return $this->UserArray()['money'];
    }

    function AddMoney($money){
        $this->db->update("user",[
            "money[+]" => $money
        ],[
            "uid" => $this->uid
        ]);
    }

    function GetRefCount(){
        $c = $this->db->count($this->table,"uid",[
            "ref_by" => $this->uid
        ]);
        return $c;
    }

    function UpdatePwd($pass){
        $this->db->update("user",[
            "pass" => $pass
        ],[
            "uid" => $this->uid
        ]);
    }

    function UpdateEmail($new_email){
        $this->db->update("user",[
            "email" => $new_email
        ],[
            "uid" => $this->uid
        ]);
    }

    function IsAdmin(){
        if($this->db->has("ss_user_admin",[
            "uid" => $this->uid
        ])){
            return true;
        }else{
            return false;
        }
    }

    function DelMe(){
        $this->db->delete($this->table,[
            "uid" => $this->uid
        ]);
    }
}