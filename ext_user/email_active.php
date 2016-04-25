
<?php
require_once '_main.php';
global $uid;
?>

<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->

<section class="main-content">
    <div class="content-wrap">
        <div class="center-wrapper text-center">
            <div class="center-content">
                <div class="subscription col-md-6 col-md-offset-3 bg-white">
                    <i class="fa icon-envelope fa-2x"></i>
                    <h4>Email地址已经认证！</h4>
                    <p>请进入主页选择服务器，也可以查看使用方法或者购买套餐。</p>
                    <button class="btn btn-success btn-sm mg-t-md" data-toggle="modal" data-target=".bs-modal">进入主页</button>

                    <div class="mg-t-lg">

                        <div class="row">
                            <div class="col-xs-6">
                                <div class="pd-md">
                                    <a href="javascript:;" class="pull-left mg-r-md">
                                                        <span class="fa-stack fa-lg">
                                                            <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                                            <i class="fa fa-anchor fa-stack-1x fa-inverse"></i>
                                                        </span>
                                    </a>
                                    <p class="text-left">
                                        <a href="help.php"><span class="text-success">使用方法</span></a>
                                        <small class="center-block">Tutorial</small>
                                    </p>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="pd-md">
                                    <a href="javascript:;" class="pull-left mg-r-md">
                                                        <span class="fa-stack fa-lg">
                                                            <i class="fa fa-circle fa-stack-2x text-color"></i>
                                                            <i class="fa fa-download fa-stack-1x fa-inverse"></i>
                                                        </span>
                                    </a>
                                    <div class="text-left">
                                        <a href="#"><span class="text-success">下载客户端</span></a>
                                        <small class="center-block">For Windows</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-6">
                                <div class="pd-md">
                                    <a href="javascript:;" class="pull-left mg-r-md">
                                                        <span class="fa-stack fa-lg">
                                                            <i class="fa fa-circle fa-stack-2x text-color"></i>
                                                            <i class="fa fa-download fa-stack-1x fa-inverse"></i>
                                                        </span>
                                    </a>
                                    <div class="text-left">
                                        <a href="#"><span class="text-success">下载客户端</span></a>
                                        <small class="center-block">For Android</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="pd-md">
                                    <a href="javascript:;" class="pull-left mg-r-md">
                                                        <span class="fa-stack fa-lg">
                                                            <i class="fa fa-circle fa-stack-2x text-info"></i>
                                                            <i class="fa fa-microphone fa-stack-1x fa-inverse"></i>
                                                        </span>
                                    </a>
                                    <div class="text-left">
                                        <a href="#"><span class="text-success">购买套餐</span></a>
                                        <small class="center-block">Choose your plan</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <p class="text-left mg-l-md">
                        <small>
                            <i>使用过程中请遵守相关法律法规.</i>
                        </small>
                    </p>
                </div>
            </div>
        </div>
    </div>



<?php
require_once '_footer.php';
?>