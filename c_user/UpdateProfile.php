<?php
require_once '_main.php';
global $uid;
?>
    <!--After the header-->
    <!-- main content -->
<section class="main-content">
    <!-- content wrapper -->
    <div class="content-wrap">
        <div class="row mg-b">
            <div class="col-xs-12">
                <h3 class="no-margin">修改资料</h3>
                <small>About Your Profile</small>
                <small id="uid" style="display: none;"><?php echo $uid?></small>
            </div>
            <span>&nbsp;</span>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                            <header class="panel-heading">验证邮箱</header>
                            <div class="panel-body">
                                <form>
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">邮箱地址</label>
                                        <div class="col-sm-8 col-md-8">
                                            <input type="text" id="mail-input" class="form-control" placeholder="可以在此输入新邮箱"/>
                                            <p class="help-block" id="validate-msg">只有验证了邮箱才能获得3天试用以及密码找回功能，强烈推荐验证邮箱。</p>
                                            <div class="col-sm-3 col-md-3 no-padding" id="validate-code-area">
                                                <input type="text" id="mailcode-input" class="form-control" placeholder="验证码" />
                                                <p class="help-block">输入验证码</p>
                                                <button type="button" class="btn btn-default" id="validate-mailcode-btn">验证</button><a>&nbsp重新发送</a>
                                            </div>
                                            <button type="button" class="btn btn-default" id="validate-mail-btn">发送邮件</button>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </section>
                    </div>
                </div>
                <div class="row">
                <div class="col-lg-6">
                    <section class="panel">
                        <header class="panel-heading">登陆密码修改</header>
                        <div class="panel-body">
                            <form>
                                <div class="form-group">
                                    <label >当前密码（必须）</label>
                                    <input type="password" class="form-control"  id="nowpwd">
                                </div>
                                <div class="form-group">
                                    <label >新密码</label>
                                    <input type="password" class="form-control" id="pwd" placeholder="新密码">
                                </div>
                                <div class="form-group">
                                    <label>确认密码</label>
                                    <input type="password" class="form-control" id="repwd" placeholder="再输一遍">
                                </div>

                                <div id="msg-success">
                                    <strong>修改成功<p></p></strong>
                                </div>

                                <div id="msg-error">
                                    <strong>出错了<p id="msg-error-p"></p></strong>
                                </div>
                                <button type="button" id="pwd-update" class="btn btn-default">提交</button>
                            </form>
                        </div>
                    </section>
                </div>
                <div class="col-lg-6">
                    <section class="panel">
                        <header class="panel-heading">ShadowSocks与anyconnect密码修改</header>
                        <div class="panel-body">
                                <div class="form-group">
                                    <label >输入新的连接密码</label>
                                    <input type="text" class="form-control" id="sspwd" placeholder="新密码（建议大于6位）">
                                </div>

                                <div id="ss-msg-success">
                                    <strong>修改成功<p></p></strong>
                                </div>

                                <button type="submit" id="ss-pwd-update" class="btn btn-default">提交</button>
                        </div>
                    </section>
                </div>
            </div>

            </div>
        </div>
    </div>
    <!--/content wrapper-->
    <!--/main content-->


    <!-- Validate success Modal -->
    <div class="modal fade" id="mail-validate-success" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">邮箱验证成功</h4>
                </div>
                <div class="modal-body" align="center">
                    <i class="fa fa-envelope fa-2x"></i>
                    <h4>Email地址已经认证！</h4>
                    <p>请进入主页选择服务器，或者<a href="help.php"><strong>点这看看</strong></a>怎么使用MarisaGo来科学上网。</p>
                    <a class="btn btn-success btn-lg mg-t-md"  href="./index.php">进入主页</a>

                    <div class="mg-t-lg" align="center">
                        <div class="row">
                            <div class="col-xs-6">
                                <div class="pd-md">
                                    <a href="javascript:;" class="pull-left mg-r-md">
                                                        <span class="fa-stack fa-lg">
                                                            <i class="fa fa-circle fa-stack-2x text-info"></i>
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
                                                            <i class="fa fa-circle fa-stack-2x text-success"></i>
                                                            <i class="fa fa-download fa-stack-1x fa-inverse"></i>
                                                        </span>
                                    </a>
                                    <div class="text-left">
                                        <a href="#"><span class="text-success">下载客户端</span></a>
                                        <small class="center-block">Client for Windows</small>
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
                                        <small class="center-block">Client for Android</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="pd-md">
                                    <a href="javascript:;" class="pull-left mg-r-md">
                                                        <span class="fa-stack fa-lg">
                                                            <i class="fa fa-circle fa-stack-2x text-warning"></i>
                                                            <i class="fa fa-shopping-cart fa-stack-1x fa-inverse"></i>
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

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" id="validate-dismiss">关闭</button>
                </div>
            </div>
        </div>
    </div>


<?php
require_once '_footer.php'
?>

    <script>
        $("#msg-success").hide();
        $("#msg-error").hide();
        $("#ss-msg-success").hide();
        $("#validate-code-area").hide();
        $("validate-mailcode-btn").hide();

    </script>

    <script>
        $(document).ready(function(){
            $("#pwd-update").click(function(){
                $.ajax({
                    type:"POST",
                    url:"_pwd_update.php",
                    dataType:"json",
                    data:{
                        nowpwd: $("#nowpwd").val(),
                        pwd: $("#pwd").val(),
                        repwd: $("#repwd").val()
                    },
                    success:function(data){
                        if(data.ok){
                            $("#msg-error").hide();
                            $("#msg-success").show();
                            $("#msg-success-p").html(data.msg);
                            window.setTimeout("location.href='signin.html'", 2000);
                        }else{
                            $("#msg-error").show();
                            $("#msg-error-p").html(data.msg);
                        }
                    },
                    error:function(jqXHR){
                        alert("发生错误："+jqXHR.status);
                    }
                })
            })
        })
    </script>

    <script>
        $(document).ready(function(){
            $("#ss-pwd-update").click(function(){

                $.ajax({
                    type:"POST",
                    url:"_sspwd_update.php",
                    dataType:"json",
                    data:{
                        sspwd: $("#sspwd").val()
                    },
                    success:function(data){
                        if(data.ok){

                            $("#ss-msg-success").show();
                            $("#ss-msg-success-p").html(data.msg);
                        }else{
                            $("#ss-msg-error").show();
                            $("#ss-msg-error-p").html(data.msg);
                        }
                    },
                    error:function(jqXHR){
                        alert("发生错误："+jqXHR.status);
                    }
                })
            })
        })
    </script>

    <script>
        $(document).ready(function(){
            $("#ss-pwd-update").click(function(){
                $.ajax({
                    type:"POST",
                    url:"_sspwd_update.php",
                    dataType:"json",
                    data:{
                        sspwd: $("#sspwd").val()
                    },
                    success:function(data){
                        if(data.ok){

                            $("#ss-msg-success").show();
                            $("#ss-msg-success-p").html(data.msg);
                        }else{
                            $("#ss-msg-error").show();
                            $("#ss-msg-error-p").html(data.msg);
                        }
                    },
                    error:function(jqXHR){
                        alert("发生错误："+jqXHR.status);
                    }
                })
            })
        })
    </script>


    <script>
        $(document).ready(function(){

            $.ajax({
                type:"POST",
                url:"_email_update.php",
                dataType:"json",
                data:{
                    action:"getmail",
                    uid:$("#uid").text()
                },
                success:function(data){
                    if(data.ok){
                        $("#mail-input").val(data.mail);
                    }
                },
                error:function(jqXHR){
                    alert("发生错误："+jqXHR.status);
                }
            });


            $("#validate-mail-btn").click(function(){
                $("#validate-mail-btn").html("处理中...");
                $("#validate-mail-btn").attr("class","btn btn-default disabled");
                $.ajax({
                    type:"POST",
                    url:"_email_update.php",
                    dataType:"json",
                    data:{
                        action:"create_token",
                        uid:$("#uid").text(),
                        mail:$("#mail-input").val()
                    },
                    success:function(data){
                        if(data.ok){
                            $("#validate-mail-btn").hide();
                            $("#validate-mailcode-btn").show();
                            $("#validate-code-area").show();
                            $("#validate-msg").html(data.msg);
                        }
                        else {
                            alert("有错误发生_(:з」∠)_");
                        }
                    },
                    error:function(jqXHR){
                        alert("发生错误："+jqXHR.status);
                    }
                });
            });

            $("#validate-mailcode-btn").click(function(){

                $.ajax({
                    type:"POST",
                    url:"_email_check.php",
                    dataType:"json",
                    data:{
                        uid:$("#uid").text(),
                        mail:$("#mail-input").val(),
                        mailcode:$("#mailcode-input").val()
                    },
                    success:function(data){
                        if(data.ok){
                            $("#validate-mailcode-btn").attr("class","btn btn-success disabled");
                            $("#validate-mailcode-btn").html("邮箱验证成功！");
                            $('#mail-validate-success').modal('show');
                        }
                        else{
                            $("#validate-mailcode-btn").attr("class","btn btn-default");
                            $("#validate-mailcode-btn").html(data.msg);
                        }
                    },
                    error:function(jqXHR){
                        alert("发生错误："+jqXHR.status);
                    }
                });

            })
        })
    </script>
