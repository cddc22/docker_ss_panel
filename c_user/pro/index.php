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
                    <div class="col-xs-6">
                        <h3 class="no-margin">Dashboard</h3>
                        <small>Welcome back , <?php echo $U->GetUserName()?></small>
                    </div>
                    <div class="col-xs-6 text-right">
                        <a href="javascript:;" class="fa fa-flash pull-right pd-sm toggle-sidebar" data-toggle="off-canvas" data-move="rtl">
                            <span class="badge bg-danger animated flash"></span>
                        </a>
                    </div>
                    <div class="col-xs-6 text-right hidden-md hidden-lg hidden-sm"><a href="#">android客户端下载</a></div>
                </div>
                <div class = "row">
                    <div class = "col-md-8">
                         <div class="row">

                        <div class="col-md-6 col-sm-6 col-xs-12">
                                 <section class="panel no-border overflow-hidden widget-social">
                                     <div class="ribbon ribbon-danger">
                                         <div class="banner">
                                             <div class="text">专业版</div>
                                         </div>
                                     </div>
                                     <div class="panel-body bg-white">

                                         <h4><?php echo $U->GetUserName()?>

                                         </h4>
                                         <p class="mg-t-xs">

                                             <span class="label label-primary" id="box-plan">loading...</span>
                                             <span class="label label-info" id="box-all_transfer">loading...</span>
                                             <span class="label label-danger">有效期至<span id="box-exp_date">loading...</span></span>
                                         </p>
                                         <i class="fa fa-circle text-primary mg-r-xs"></i>请在合法的范围内使用ShadowSocks服务，遵守相关法律法规。
                                     </div>

                                     <div class="col-md-9">
                                        <div class="panel-body no-padding">

                                        <table class="table no-margin">
                                         <tbody>
                                         <tr>
                                             <td>服务器：</td>
                                             <td><span class="label label-primary" id="box-server">loading...</span></td>
                                         </tr>
                                            <tr>
                                                 <td>端口：</td>
                                                 <td><span class="label label-primary" id="box-port">loading...</span></td>
                                            </tr>
                                            <tr>
                                                <td>连接密码：</td>
                                                <td><span class="label label-success" id="box-pass">loading...</span></td>
                                            </tr>
                                            <tr>
                                                <td>加密方式</td>
                                                <td><span class="label label-danger" id="box-method">loading...</span></td>
                                            </tr>
                                         <tr style="display: none;" >
                                             <td>uid</td>
                                             <td id="uid"><?php echo $uid ?></td>
                                         </tr>


                                         </tbody>
                                     </table>

                                     <br/>
                                     </div>
                                     </div>
                                 </section>
                             </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="panel">
                                <div class="panel-heading">流量使用情况</div>
                                <div class="panel-body text-center">
                                    <div class="piechart" style="width:200px;height: 200px;">
                                        <span class="visits" data-percent="10" id="used_100">
                                            <span>
                                                <div class="percent"></div>
                                                <small id="transfers">loading...</small>
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                                 <section class="panel panel-success dashboard-chart">
                                     <div class="panel-heading">
                                         <small class="pull-left text-white">
                                             <a class="fa fa-chevron-down panel-collapsible pd-r-xs" href="javascript:;"></a>
                                             <a class="fa fa-refresh panel-refresh pd-r-xs" href="javascript:;"></a>
                                            &nbsp;&nbsp;服务器列表
                                         </small>
                                     </div>
                                     <div class="panel-body no-padding">

                                         <div class="col-md-12">
                                             <section class="panel">
                                                 <br/>
                                                 <div class="col-md-12">
                                                    <div class="panel-body no-padding">
                                                     <table class="table table-striped">
                                                         <thead>
                                                         <tr>
                                                             <th class="col-md-2 pd-l-lg">
                                                                 <span class="pd-l-sm"></span>服务器名称</th>
                                                             <th class="col-md-1">编号</th>
                                                             <th class="col-md-2">类型</th>
                                                             <th class="col-md-1">状态</th>
                                                             <th class="col-md-1">操作</th>
                                                         </tr>
                                                         </thead>
                                                         <tbody>

                                                         <?php
                                                         $n = new \Ss\Node\Node();
                                                         $nodes = $n->NodesArray("pro");
                                                         foreach($nodes as $rs){ ?>
                                                             <tr>
                                                                 <td> <span class="pd-l-sm"></span><?php echo $rs['node_name']; ?></td>
                                                                 <td>#<span id="node_id"><?php echo $rs['id']; ?></span></td>
                                                                 <td><?php echo $rs['node_info']; ?></td>
                                                                 <td>畅通</td>
                                                                 <td><a type="button" onclick="Switch(<?php echo $rs['id']; ?>)" class="btn-sm btn-primary" id="Switch" >切换</a></td>
                                                             </tr>
                                                         <?php } ?>


                                                         </tbody>
                                                     </table>
                                                 </div>
                                                 </div>
                                             </section>
                                         </div>
                                     </div>
                                     <div class="panel-footer text-center">
                                         <div class="row text-center">
                                             <div class="col-xs-6 col-sm-3">
                                                 <i class="fa fa-circle text-default"></i>
                                                 <span class="h4 mg-r-xs" id="KeepAlive_now">loading...</span>
                                                 <small class="text-muted">服务器在线人数</small>
                                             </div>
                                             <div class="col-xs-6 col-sm-3">
                                                 <i class="fa fa-circle text-primary"></i>
                                                 <span class="h4 mg-r-xs" id="KeepAlive_Past1H">loading...</span>
                                                 <small class="text-muted" >过去一小时在线人数</small>
                                             </div>
                                             <div class="col-xs-6 col-sm-3">
                                                 <span class="h4 mg-r-xs" id="KeepAlive_Past5Min">loading...</span>
                                                 <small class="text-muted" >过去五分钟在线人数</small>
                                             </div>
                                             <div class="col-xs-6 col-sm-3">
                                                 <span class="h4 mg-r-xs" id="now">loading...</span>
                                                 <small class="text-muted">当前系统时间</small>
                                             </div>
                                         </div>
                                     </div>
                                 </section>
                             </div>
                    </div>

                </div>
                    <div class="col-md-4 col-sm-12 col-xs-12">

                        <div class="panel panel-danger">
                            <div class="panel-heading">
                                服务器公告
                                <small class="pull-right text-white">
                                    <a class="fa fa-chevron-down panel-collapsible pd-r-xs" href="javascript:;"></a>
                                    <a class="fa fa-refresh panel-refresh pd-r-xs" href="javascript:;"></a>
                                    <a class="fa fa-times panel-remove" href="javascript:;"></a>
                                </small>
                            </div>
                            <div class="panel-body">

                                <p> <i class="fa fa-circle text-primary mg-r-xs"></i>页面最底下有使用教程，可以根据自己的需求配置SS服务。</p>
                                <p> <i class="fa fa-circle text-primary mg-r-xs"></i>新增了新加坡机房线路，电信是可以流畅观看油管720p。</p>
                                <p> <i class="fa fa-circle text-primary mg-r-xs"></i>如有问题可以联系微信号axer0910或者私信微博http://weibo.com/axer1226</p>

                            </div>
                        </div>



                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                二维码
                                <small class="pull-right text-white">
                                    <a class="fa fa-chevron-down panel-collapsible pd-r-xs" href="javascript:;"></a>
                                    <a class="fa fa-refresh panel-refresh pd-r-xs" href="javascript:;"></a>
                                    <a class="fa fa-times panel-remove" href="javascript:;"></a>
                                </small>
                            </div>
                            <div class="panel-body" id="qrcode" style="height: 285px;">
                                读取二维码中...
                            </div>
                        </div>
                    </div>

            </div>

            <!-- /content wrapper -->
        </section>
        <!-- /main content -->


<?php
require_once '_footer.php';
?>

<script src="../../asset/js/jquery.qrcode.min.js"></script>
<script type="text/javascript">

    Switch(12);
    GetSys();

    function Switch(id){

        $("#qrcode").html("读取二维码中");

        $.ajax({
            type: "POST",
            url: "_validate.php",
            dataType: "json",
            data: {
                uid: $("#uid").text(),
                node_id: id
            },
            success: function (data) {

                if (data.msg == '1') {
                    if(data.enable == 0){
                        alert("套餐失效了，点击确定购买套餐");
                        window.location = 'pricing.php';
                    }

                    else{
                        $("#taocan").hide();
                    }

                    $("#qrcode").html("");

                    jQuery('#qrcode').qrcode(data.ssqr);


                    $("#box-node_name").html(data.node_name);
                    $("#box-port").html(data.port);
                    $("#box-pass").html(data.pass);
                    $("#box-plan").html(data.plan);
                    $("#box-server").html(data.server);
                    $("#box-exp_date").html(data.exp_date);
                    $("#box-method").html(data.method);
                    $("#transfers").html("已用流量：" + data.transfers + "MB");
                    $("#used_100").attr("data-percent", data.used_100);
                    pie();
                    $("#box-all_transfer").html("可用" + data.all_transfer + "GB");
                    $("#unused_transfer").html("剩余流量：" + data.unused_transfer + "GB");

                }
                if (data.msg == '-1') {
                    alert("查询node失败!");
                    $("#qrcode").html("");
                }
                if (data.msg == '-2') {
                    $("#qrcode").html("输入正确的使用码...");
                    $("#info-box").attr("style", "display:none;");
                }
                else {

                }
            }
        })
    }

    function GetSys(){
        $.ajax(
            {
                type: "POST",
                url: "../_sys.php",
                dataType: "json",
                data: {
                },
                success: function(data){
                    $("#KeepAlive_Past1H").html(data.KeepAlive_Past1H);
                    $("#KeepAlive_now").html(data.KeepAlive_now);
                    $("#KeepAlive_Past5Min").html(data.KeepAlive_Past5Min);
                    $("#now").html(data.now);
                },
                error: function(jqXHR){
                    alert("发生错误"+jqXHR.status);
                }
            }
        );
    }

    function pie(){
        $('#used_100').easyPieChart({
            size: 200,
            lineWidth: 20,
            barColor: '#2dcb73',
            trackColor: false,
            lineCap: 'round',
            easing: 'easeOutBounce',
            onStep: function (from, to, percent) {
                $(this.el).find('.percent').text(Math.round(percent));
            }
        });
    }


</script>
