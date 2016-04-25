<?php
require_once '_main.php';
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
            </div>
            <span>&nbsp;</span>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                            <header class="panel-heading">验证邮箱（即将开通）</header>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="col-sm-1 control-label">邮箱地址</label>

                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" placeholder="可以在此输入新邮箱"/>
                                        <p class="help-block">只有验证了邮箱才能获得3天试用以及密码找回功能，强烈推荐验证邮箱。</p>
                                        <button type="submit" class="btn btn-default">验证</button>
                                    </div>
                                </div>
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
                        <header class="panel-heading">ShadowSocks密码修改</header>
                        <div class="panel-body">

                                <div class="form-group">
                                    <label >输入新的ShadowSocks密码</label>
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

<?php
require_once '_footer.php'
?>

    <script>
        $("#msg-success").hide();
        $("#msg-error").hide();
        $("#ss-msg-success").hide();
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
                            window.setTimeout("location.href='../signin.html'", 2000);
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
