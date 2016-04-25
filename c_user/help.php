<?php
require_once '../lib/config.php';
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $site_name;  ?></title>
    <!-- Bootstrap core CSS -->
    <link href="../asset/css/bootstrap.min.css" rel="stylesheet">
    <link href="../asset/css/flat-ui.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../asset/css/sticky-footer-navbar.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<!-- Fixed navbar -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><?php echo $site_name;  ?></a>
        </div>

    </div>
</nav>

<!-- Begin page content -->
<div class="container">
    <div class="page-header">
        <h2>简单使用教程 </h2>



    </div>
    <h5>首先下载一个客户端</h5>

    <ul>
        <li>双击解压，打开shadowsocks.exe （图标是蓝色纸飞机）然后添加服务器信息</li>
    </ul>

    <h5>二维码方式（推荐）</h5>
    <ul>
        <li>建议不要启用360等程序，如果阻止全部点允许</li>
        <li>右键桌面右下角纸飞机图标，选择服务器-》扫描二维码</li>
    </ul>

    <img src="../help/1.png" />
    <br /><br /><br /><br />
    <img src="../help/2.png" />
    <br /><br />
    <p>点击确定</p>

    <ul>
        <li>然后右键打开托盘 点击启用系统代理，就可以上境外网站了</li>
        <li>这里的境外网站指的是被GFW干扰的网站（如youtube，google等）</li>
        <li>如果觉得上其他不是中国的网站很卡，可以在服务器里选择全局模式</li>
    </ul>
    <br />
    <img src="../help/3.png" />
    <br /><br />
    <ul>
        <li>在编辑服务器里也可以选择手动添加信息：</li>
    </ul>

    <img src="../help/4.png" />


    <h6>勾选了启用系统代理的话每次开机请运行shadowsocks否则可能出现上不了网的情况</h6>




</div>

<footer class="footer">
    <div class="container">
        <p class="text-muted"><strong>Copyright &copy; <?php echo date('Y'); ?> <a href="#"><?php echo $site_name;  ?></a>.</strong> All rights reserved. Powered by  <b>ss-panel</b> <?php echo $version; ?> </p>
    </div>
</footer>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="../asset/js/jQuery.min.js"></script>
<script src="../asset/js/bootstrap.min.js"></script>

</body>
</html>
