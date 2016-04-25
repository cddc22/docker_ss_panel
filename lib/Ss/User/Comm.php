<?php

namespace Ss\User;


class Comm {

    //pwd on cookies
    static function CoPW($pw){
        $x =  base64_encode($pw);
        $x = substr($x,6,12);
        return $x;
    }

    //pwd on db
    static function SsPW($pwd){
        $pwd = md5($pwd);
        return $pwd;
    }

    //Gravatar
    static function Gravatar( $email, $s = 80, $d = 'mm', $r = 'g', $img = false, $atts = array() ) {
        //$url = 'http://gravatar.duoshuo.com/avatar/';
        $url = 'https://secure.gravatar.com/avatar/';
        $url .= md5( strtolower( trim( $email ) ) );
        $url .= "?s=$s&d=$d&r=$r";
        if ( $img ) {
            $url = '<img src="' . $url . '"';
            foreach ( $atts as $key => $val )
                $url .= ' ' . $key . '="' . $val . '"';
            $url .= ' />';
        }
        return $url;
    }

    static function _validatecode($_width = 75,$_height = 25,$_rnd_code = 4,$_flag = false) {
        //创建随机码
        $_nmsg = "";
        for ($i=0;$i<$_rnd_code;$i++) {
            $_nmsg = dechex(mt_rand(0,15)).$_nmsg;
        }
        //保存在session
        $_SESSION['code'] = $_nmsg;
        //创建一张图像
        $_img = imagecreatetruecolor($_width,$_height);
        //白色
        $_white = imagecolorallocate($_img,255,255,255);
        //填充
        imagefill($_img,0,0,$_white);
        if ($_flag) {
            //黑色,边框
            $_black = imagecolorallocate($_img,0,0,0);
            imagerectangle($_img,0,0,$_width-1,$_height-1,$_black);
        }
        //随即画出6个线条
        for ($i=0;$i<6;$i++) {
            $_rnd_color = imagecolorallocate($_img,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
            imageline($_img,mt_rand(0,$_width),mt_rand(0,$_height),mt_rand(0,$_width),mt_rand(0,$_height),$_rnd_color);
        }
        //随机雪花
        for ($i=0;$i<100;$i++) {
            $_rnd_color = imagecolorallocate($_img,mt_rand(200,255),mt_rand(200,255),mt_rand(200,255));
            imagestring($_img,1,mt_rand(1,$_width),mt_rand(1,$_height),'*',$_rnd_color);
        }
        //输出验证码
        for ($i=0;$i<strlen($_SESSION['code']);$i++) {
            $_rnd_color = imagecolorallocate($_img,mt_rand(0,100),mt_rand(0,150),mt_rand(0,200));
            imagestring($_img,5,$i*$_width/$_rnd_code+mt_rand(1,10),mt_rand(1,$_height/2),$_SESSION['code'][$i],$_rnd_color);
        }
        //输出图像
        header('Content-Type: image/png');
        imagepng($_img);
        //销毁
        imagedestroy($_img);
    }



}