<?php

namespace Ss\User;


class mail {

    public  $uid;
    private $dbc;
    private $db;

    function __construct($uid=0){

        global $dbc;
        global $db;
        global $phpmailer;
        $this->uid = $uid;
        $this->dbc = $dbc;
        $this->db  = $db;
        $this->phpmailer =$phpmailer;
    }

    function CreateMailHrefToken($tomail){//$passwd is md5 char
        $passwd = $this->db->select("user","pass",[
           "uid" => $this->uid
        ]);
        $regtime = time();
        $token = md5($this->uid.$passwd.$regtime);
        $token_exptime = time()+60*60*24;//过期时间为24小时后

        $this->db->insert("ss_reg_reset_validate",[
           "user_id" => $this->uid,
            "init_time" => time(),
            "expire_time" => $token_exptime,
            "uni_char" => $token
        ]);


        $href = SITE_ADDRESS."/ext_user/email_active.php?token=".$token;
        $mail_content = "<h1>欢迎使用MarisaGo</h1><a href='$href'>请点击这里激活<a> <p>如果不能点击链接，从这里把链接复制到浏览器里</p><p>$href</p>";

        return $this->_SendMail($tomail,"",$mail_content);
    }

    function CreateNumberValidateMail($tomail){//action is valmail
        $mail_subject = "激活MarisaGo";
        $validate_code = rand(100000,999999);
        $token_exptime = time()+60*60*24;//过期时间为24小时后
        $this->_InsertToken($token_exptime,$validate_code,"valmail");

        $mail_content = "<h1>欢迎使用MarisaGo</h1> <p>邮箱验证认证码是</p><p><strong>$validate_code</strong></p>";

        return $this->_SendMail($tomail,$mail_subject,$mail_content);
    }

    function CreateNumberResetPwdMail(){//action is resetpwd
        $mail_subject = "MarisaGo找回密码";
        $tomail = $this->db->select("user","email",[
            "uid" => $this->uid
        ]);
        $tomail = $tomail[0];
        $validate_code = rand(100000,999999);
        $token_exptime = time()+60*10;//过期时间为10分钟
        $this->_InsertToken($token_exptime,$validate_code,"resetpwd");

        $mail_content = "<h1>重置MarisaGo的密码</h1> <p>找回密码的认证码是</p><p><strong>$validate_code</strong></p>";

        return $this->_SendMail($tomail,$mail_subject,$mail_content);
        //return true;
    }


    function IsTokenOk($token,$action){
        if($this->db->has("ss_reg_reset_validate",[
            "AND" => [
                "uni_char" => $token,
                "user_id" => $this->uid,
                "action" => $action,
                "expire_time[>]" => time()
            ]
        ])){
            return true;
        }
        else{
            return false;
        }

    }

    function DelToken($token){
        $this->db->delete("ss_reg_reset_validate",[
            "AND" => [
                "uni_char" => $token,
                "user_id" => $this->uid
            ]

        ]);
    }


    private function _InsertToken($token_exptime,$validate_code,$action){
        if ($this->db->has("ss_reg_reset_validate",[
            "user_id" => $this->uid
        ])){
            $this->db->delete("ss_reg_reset_validate",[
                "user_id" => $this->uid
            ]);
        }//if there is code in database regen a new token.

        $this->db->insert("ss_reg_reset_validate",[
            "user_id" => $this->uid,
            "init_time" => time(),
            "expire_time" => $token_exptime,
            "uni_char" => $validate_code,
            "action" => $action
        ]);
    }


    private function _SendMail($to,$subject,$content)
    {
        header("content-type:text/html;charset=utf-8");
        ini_set("magic_quotes_runtime", 0);
        try{
            $this->phpmailer->IsSMTP();
            $this->phpmailer->CharSet = 'UTF-8'; //设置邮件的字符编码，这很重要，不然中文乱码
            //$this->phpmailer->SMTPSecure = "ssl";
            $this->phpmailer->SMTPAuth = true; //开启认证
            $this->phpmailer->Port = MAIL_PORT;
            $this->phpmailer->Host = MAIL_HOST;
            $this->phpmailer->Username = MAIL_USERNAME;
            $this->phpmailer->Password = MAIL_PASSWD;
//$this->phpmailer->IsSendmail(); //如果没有sendmail组件就注释掉，否则出现“Could not execute: /var/qmail/bin/sendmail ”的错误提示
            $this->phpmailer->AddReplyTo(MAIL_FROM, "MarisaGo");//回复地址
            $this->phpmailer->From = MAIL_FROM;
            $this->phpmailer->FromName = MAIL_FROM_NAME;
            $this->phpmailer->AddAddress($to);
            $this->phpmailer->Subject = $subject;
            $this->phpmailer->Body = $content;
            $this->phpmailer->AltBody = "To view the message, please use an HTML compatible email viewer!"; //当邮件不支持html时备用显示，可以省略
            $this->phpmailer->WordWrap = 80; // 设置每行字符串的长度
//$this->phpmailer->AddAttachment("f:/test.png"); //可以添加附件
            $this->phpmailer->IsHTML(true);
            $this->phpmailer->send();
            return true;
        }
        catch (\phpmailerException $e){
            $this->db->insert("mail_log",[
                "log" => $e->errorMessage()
            ]);
            return false;
        }



    }



}