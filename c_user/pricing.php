<?php
require_once '_main.php';
global $uid;
?>
<!--After the header-->
            <!-- main content -->
            <section class="main-content">
                <span id="uid" style="display: none;"><?php echo $uid?></span>
                <!-- content wrapper -->
                <div class="content-wrap">


                    <div class="row mg-b">
                        <div class="col-xs-12">
                            <h3 class="no-margin">套餐</h3>
                            <small>Find the pricing plan that's right for your MarisaGo</small>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <div class="panel panel-success pricing-table-2">
                                <div class="panel-heading">包月版</div>
                                <div class="panel-body">

                                    <div class="plan-price text-center">
                                        <span>12￥</span>
                                        <p>一个月有效期</p>
                                        <small>可用所有节点</small>
                                    </div>

                                    <ul class="plan-features text-center">
                                        <li>无在线设备数量限制</li>
                                        <li>共50G流量</li>
                                        <li>可靠的技术支持</li>

                                    </ul>

                                </div>
                                <div class="panel-footer text-center">
                                    <button class="btn btn-success btn-block" data-toggle="modal" data-target="#BuyTB" onclick="ClickType('1m')">购买</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <div class="panel panel-danger pricing-table-2">
                                <div class="panel-heading">包季版</div>
                                <div class="panel-body">

                                    <div class="plan-price text-center">
                                        <span>35￥</span>
                                        <p>三个月有效期</p>
                                        <small>可用所有节点</small>
                                    </div>
                                    <ul class="plan-features text-center">
                                        <li>无在线设备数量限制</li>
                                        <li>共200G流量</li>
                                        <li>可靠的技术支持</li>

                                    </ul>
                                </div>
                                <div class="panel-footer text-center">
                                    <button class="btn btn-danger btn-block" data-toggle="modal" data-target="#BuyTB" onclick="ClickType('3m')">购买</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <div class="panel panel-warning pricing-table-2">
                                <div class="panel-heading">包半年版</div>
                                <div class="panel-body">

                                    <div class="plan-price text-center">
                                        <span>59￥</span>
                                        <p>半年有效期</p>
                                        <small>可用所有节点</small>
                                    </div>

                                    <ul class="plan-features text-center">
                                        <li>无在线设备数量限制</li>
                                        <li>共500G流量</li>
                                        <li>可靠的技术支持</li>

                                    </ul>

                                </div>
                                <div class="panel-footer text-center">
                                    <button class="btn btn-warning btn-block" data-toggle="modal" data-target="#BuyTB" onclick="ClickType('6m')">购买</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <div class="panel panel-primary pricing-table-2">
                                <div class="panel-heading">包年版</div>
                                <div class="panel-body">

                                    <div class="plan-price text-center">
                                        <span>89￥</span>
                                        <p>1年有效期</p>
                                        <small>可用所有节点</small>
                                    </div>

                                    <ul class="plan-features text-center">
                                        <li>无在线设备数量限制</li>
                                        <li>共1000G流量</li>
                                        <li>可靠的技术支持</li>

                                    </ul>
                                </div>
                                <div class="panel-footer text-center">
                                    <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#BuyTB" onclick="ClickType('12m')">购买</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /content wrapper -->
            </section>
            <!-- /main content -->

            <!-- TB Modal -->
            <div class="modal fade" id="BuyTB" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">通过淘宝购买（即将开通支付宝方式）</h4>
                        </div>
                        <div class="modal-body">
                            <h4>输入购买的激活码<br><br><a type="button" class="btn btn-warning" id="buy-href" href="http://www.taobao.com">购买链接在这</a></h4>
                            <input type="text" class="form-control" placeholder="在这里输入激活码" id="code">
                        </div>

                        <div class="modal-footer">
                            <div class="alert alert-success alert-dismissible" role="alert" align="left" id="modal-success">
                                <button type="button" class="close" data-dismiss="alert"  aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <strong>你正在成功！</strong> 购入套餐已生效
                            </div>
                            <div class="alert alert-warning alert-dismissible" role="alert" align="left" id="modal-invalid">
                                <button type="button" class="close" data-dismiss="alert"  aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <strong></strong> 看样子是个无效的注册码
                            </div>

                            <div class="alert alert-warning alert-dismissible" role="alert" align="left" id="modal-error">
                                <button type="button" class="close" data-dismiss="alert"  aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <strong>发生错误</strong>
                            </div>

                            <button type="button" class="btn btn-default" data-dismiss="modal" id="validate-dismiss">再看看</button>
                            <button type="button" class="btn btn-warning" id="validate">验证</button>
                        </div>
                    </div>
                </div>
            </div>



<?php require_once'_footer.php';
?>

<script>
    $("#modal-success").hide();
    $("#modal-invalid").hide();
    $("#modal-error").hide();

</script>


<script>

    function ClickType(t){



        if (t == "1m"){
            $("#buy-href").attr("href","https://item.taobao.com/item.htm?spm=a230r.7195193.1997079397.6.rZqt8g&id=523001834231&abbucket=17");
        }
        else if(t == "3m"){
            $("#buy-href").attr("href","https://item.taobao.com/item.htm?spm=a230r.7195193.1997079397.7.h7FqLA&id=523023170371&abbucket=17");
        }
        else if(t == "6m"){
            $("#buy-href").attr("href","https://item.taobao.com/item.htm?spm=a230r.7195193.1997079397.8.h7FqLA&id=523024653246&abbucket=17");
        }
        else if(t == "12m"){
            $("#buy-href").attr("href","https://item.taobao.com/item.htm?spm=a230r.7195193.1997079397.9.h7FqLA&id=523029696488&abbucket=17");
        }
    }

    $(document).ready(function(){
        $("#buy-href").attr("target", "_blank");
        $("#validate").click(function(){
            $.ajax({
                    type:"POST",
                    url:"_ValidateCode.php",
                    dataType:"json",
                    data:{
                        code:$("#code").val(),
                        uid:$("#uid").text()
                    },
                    success:function(data){

                        if(data.msg == '1'){
                            $("#modal-success").show();
                            $("#validate").hide();
                            $("#validate-dismiss").html("关闭");
                        }
                        else if (data.msg == '2'){
                            alert("好像有正在生效的套餐，请失效后再来购买，或者联系管理员手动修改");
                        }
                        else if (data.msg == '-1'){
                            alert("请验证邮箱后再来购买_(:з」∠)_");
                        }
                        else{
                            $("#modal-invalid").show();
                        }
                    },
                    error:function(jqXHR){
                        $("#modal-error").html("我们都有不顺利的时候 ："+jqXHR.status);
                    }
                }
            )

        })


    })
</script>