<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<ul class="nav nav-tabs" xmlns="http://www.w3.org/1999/html">
    <li <?php  if($op=='display') { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('credit',array('op' =>'display'))?>">商品管理</a></li>
    <li<?php  if(empty($item['id']) && $op== 'post') { ?> class="active" <?php  } ?>><a href="<?php  echo $this->createWebUrl('credit',array('op' =>'post'))?>">添加商品管理</a></li>
    <?php  if(!empty($item['id']) &&  $op== 'post') { ?><li
        class="active"><a href="<?php  echo $this->createWebUrl('credit',array('op' =>'post','id'=>$item['id']))?>">编辑商品管理</a></li><?php  } ?>
    <li<?php  if($op== 'log') { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('credit',array('op' =>'log','id'=>$item['id']))?>">兑换记录管理</a></li>
</ul>

<?php  if($op == 'display') { ?>
<div class="panel panel-info">
    <div class="panel-heading">筛选</div>
    <div class="panel-body">
        <form role="form" class="form-horizontal" method="get" action="./index.php">
            <input type="hidden" name="m" value="amouse_wxapp_card" >
            <input type="hidden" name="do" value="credit" >
            <input type="hidden" name="c" value="site" />
            <input type="hidden" name="a" value="entry" />
            <input type="hidden" value="display" name="op">
            <div class="form-group">
                <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">关键字</label>
                <div class="col-sm-8">
                    <input type="text" placeholder="搜索商品管理名称" value="<?php  echo $_GPC['keyword'];?>" id="" name="keyword" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div class="pull-right col-xs-12 col-sm-2 col-lg-1">
                    <button class="btn btn-block"><i class="fa fa-search"></i> 搜索</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div style="padding: 0 15px 0  15px;">
    <div class="row-fluid">
        <div class="span8 control-group">
            <a class="btn btn-default <?php  if(empty($type)) { ?>active<?php  } ?>" href="<?php  echo $this->createWebUrl('credit',array('op' => 'display'))?>">全部</a>
            <a class="btn btn-default <?php  if($type==0) { ?>active<?php  } ?>" href="<?php  echo $this->createWebUrl('credit',array('op' => 'display','type'=>0))?>">实物商品</a>
            <!--<a class="btn btn-default <?php  if($type==1) { ?>active<?php  } ?>" href="<?php  echo $this->createWebUrl('credit',array('op' => 'display','type'=>1))?>">兑换虚拟商品</a>
            <a class="btn btn-default <?php  if($type==2) { ?>active<?php  } ?>" href="<?php  echo $this->createWebUrl('credit',array('op' => 'display','type'=>2))?>">兑换VIP</a>
            <a class="btn btn-default <?php  if($type==3) { ?>active<?php  } ?>" href="<?php  echo $this->createWebUrl('credit',array('op' => 'display','type'=>3))?>">兑换红包</a>-->
        </div>
    </div>
</div>

<div style="padding:15px;">
    <form id="form2" class="form-horizontal" method="post">
        <table class="table table-hover">
            <thead class="navbar-inner">
            <tr>
                <th style="width:40%;">标题</th>
                <th style='width:10%;'>状态</th>
                <th style='width:10%;'>类型</th>
                <th style="width:20%;">操作</th>
            </tr>
            </thead>
            <tbody>
            <?php  if(is_array($list)) { foreach($list as $item) { ?>
            <tr>
                <td><?php  if($item['thumb']) { ?>
                    <?php  $urls =  iunserializer($item['thumb']) ?>
                    <img src="<?php  echo tomedia($urls['0']);?>" style='width:30px;height:30px;padding:1px;border:1px solid #ccc' /><?php  } ?>
                    <?php  echo $item['title'];?>
                    <br/> <label class='label label-danger'> 积分: <?php  echo $item['credit'];?></label>
                    <br/><label class='label label-info'>状态： <?php  if($item['status']=='0') { ?>开启<?php  } ?> <?php  if($item['status']=='1') { ?> 暂停 <?php  } ?></label>
                    <br/>
                </td>
                <td>
                    <label data="<?php  echo $item['status'];?>" class='label label-default <?php  if($item['status']==1) { ?>label-success<?php  } ?>' onclick="setProperty(this,<?php  echo $item['id'];?>)"><?php  if($item['status']==0) { ?>开启<?php  } else { ?>暂停<?php  } ?>
                    </label>
                </td>
                <td><label class="label label-default <?php  if($item['type']==1) { ?>label-success<?php  } ?>">
                    <?php  if($item['type']==0) { ?>实物商品<?php  } else if($item['type']==1) { ?>兑换虚拟商品<?php  } else if($item['type']==2) { ?>兑换VIP<?php  } else if($item['type']==3) { ?>兑换红包<?php  } ?>
                    </label>
                </td>
                <td style="text-align:left;">
                    <a href="<?php  echo $this->createWebUrl('credit', array('op' => 'log', 'goodsid' => $item['id']))?>" class="btn btn-default"><i class="fa fa-list">兑换记录</i></a>
                    <a href="<?php  echo $this->createWebUrl('credit', array('op' => 'post','page'=>$pindex, 'id' => $item['id']))?>" class="btn btn-default"><i class="fa fa-edit">编辑</i></a>
                    <a onclick="return confirm('此操作不可恢复，确认吗？'); return false;" href="<?php  echo $this->createWebUrl('credit', array('id' => $item['id'],'op'=>'delete'))?>" title="删除" class="btn btn-default">
                        <i class="fa fa-times">删除</i>
                    </a>
                </td>
            </tr>
            <?php  } } ?>
            </tbody>
        </table>
        <div style="margin:0 auto;margin-right: auto;vertical-align: middle;text-align: center;" >
            <?php  echo $pager;?>
        </div>
    </form>
    <script language='javascript'>
        function setProperty(obj, id) {
            $(obj).html($(obj).html() + "...");
            $.post("<?php  echo $this->createWebUrl('credit',array('op'=>'setstatus'))?>",{id: id,data: obj.getAttribute("data")},function (d) {
                $(obj).html($(obj).html().replace("...", ""));

                $(obj).html(d.data == '1' ? '暂停' : '开启');
                console.log(d.data);
                $(obj).attr("data", d.data);
                if (d.result == 1) {
                    $(obj).toggleClass("label-info");
                }
            }, "json");
        }
    </script>
</div>
<?php  } else if($op == 'post') { ?>
<div class="main">
    <form action="" method="post" class="form-horizontal form" enctype="multipart/form-data" onsubmit='return formcheck()'>
        <input type="hidden" name="id" value="<?php  echo $item['id'];?>" />
        <input type="hidden" name="page" value="<?php  echo $pindex;?>" />
        <div class="panel panel-default">
            <div class="panel-heading">
                商品管理设置
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">排序</label>
                    <div class="col-sm-9 col-xs-12">
                        <input type="text" class="form-control" name="displayorder" value="<?php  echo $item['displayorder'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style="color:red">*</span>标题</label>
                    <div class="col-sm-9">
                        <input type="text" id='title' name="title" class="form-control" value="<?php  echo $item['title'];?>" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">商品类型</label>
                    <div class="col-sm-9 col-xs-12">
                        <input type="radio" name="type" id="form-type-0" value="0" <?php  if($item['type']==0) { ?>checked="true"<?php  } ?>  />
                        <label for="form-type-0">实物商品</label>
                        <input type="radio" name="type" id="form-type-1" value="1" <?php  if($item['type']==1) { ?>checked="true"<?php  } ?>  />
                        <label for="form-type-1">虚拟商品</label>
                        <!-- <input type="radio" name="type" id="form-type-4" value="2" <?php  if($item['type']==2) { ?>checked="true"<?php  } ?>  />
                        <label for="form-type-4">兑换VIP</label>
                       <input type="radio" id="form-type-5" name="type" value="3" <?php  if($item['type']==3) { ?>checked="true"<?php  } ?>  />
                        <label for="form-type-5">兑换红包</label>
                        <span class="help-block">可以兑换的商品类型，默认为实物。</span>-->
                    </div>
                </div>

                <!--<div class="form-group" id="form-type-vir">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">置顶天</label>
                    <div class="col-sm-9 col-xs-12">
                        <div class="input-group">
                            <input type="text" id='totalday' name="totalday" class="form-control" value="<?php  echo $item['totalday'];?>" />
                            <span class="input-group-addon">天</span>

                        </div>
                        <span class="help-block">置顶天 < 虚拟商品专用，比如兑换VIP></span>
                    </div>
                </div>-->
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">库存</label>
                    <div class="col-sm-9 col-xs-12">
                        <div class="input-group">
                            <input type="text" id='stock' name="stock" class="form-control" value="<?php  echo $item['stock'];?>" />
                            <span class="input-group-addon">件</span>
                        </div>
                        <span class="help-block">&#x65B0;&#x777F;&#x793E;&#x533A;&#x63D0;&#x793A;&#xFF1A;0&#x4E3A;&#x4E0D;&#x9650;&#x5236;</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">商品原价</label>
                    <div class="col-sm-9 col-xs-12">
                        <div class="input-group">
                            <input type="text" id='money' name="money" class="form-control" value="<?php  echo $item['money'];?>" />
                            <span class="input-group-addon">元</span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">兑换积分</label>
                    <div class="col-sm-9 col-xs-12">
                        <div class="input-group">
                            <input type="text" id='credit' name="credit" class="form-control" value="<?php  echo $item['credit'];?>" />
                            <span class="input-group-addon">分</span>
                        </div>
                         <span class="help-block">兑换红包  100积分 = 1元 </span>
                    </div>
                </div>
                <div class="form-group model1">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">实际到账红包金额</label>
                    <div class="col-sm-9 col-xs-12">
                        <div class="input-group">
                            <input type="text" id='credit2' name="credit2" class="form-control" value="<?php  echo $item['credit2'];?>" />
                            <span class="input-group-addon">元</span>
                        </div>
                        <span class="help-block">兑换红包到账金额  1元 </span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">商品图片</label>
                    <div class="col-sm-9">
                        <?php  echo tpl_form_field_multi_image('thumb',$piclist)?>
                        <span class="help-block"> 建议图片大小为： 320*240   </span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">结束时间</label>
                    <div class="col-sm-4 col-xs-6"><?php  echo tpl_form_field_date('endtime', date('Y-m-d H:i',$item['endtime']), 1)?></div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">兑换说明</label>
                    <div class="col-sm-9">
                        <textarea  class="form-control" name="detail"><?php  echo $item['detail'];?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">商品描述说明</label>
                    <div class="col-sm-9">
                        <textarea  class="form-control" name="description"><?php  echo $item['description'];?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">是否显示</label>
                    <div class="col-sm-9 col-xs-12">
                        <input type="radio" name="status" value="0" id="form-oauth-0"<?php  if($item['status']==0) { ?>checked="true"<?php  } ?>  />
                        <label for="form-oauth-0">开启</label>
                        <input type="radio" name="status" value="1" id="form-oauth-1"<?php  if($item['status']==1) { ?>checked="true"<?php  } ?>  />
                        <label for="form-oauth-1">暂停</label>
                        <span class="help-block">可以随时上下架此兑换商品。</span>
                    </div>
                </div>

            </div>
        </div>
        <div class="form-group col-sm-12">
            <input type="submit" name="submit" value="提交" class="btn btn-primary col-lg-1" />
            <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
        </div>
    </form>
</div>

<script language='javascript'>
    function formcheck() {
        if ($("#title").isEmpty()) {
            Tip.focus("title", "请填写商品名称!");
            return false;
        }
        if ($("#credit").isEmpty()) {
            Tip.focus("credit", "请填写兑换积分!");
            return false;
        }
        return true;
    }

    require(['jquery', 'util'], function ($, u) {
        $("#form-type-<?php  echo $item['type'];?>").attr("checked", true);
        var type =<?php  echo $item['type'];?>;
        if(type==0){
            $("#form-type-vir").hide();
            $(".model1").hide();
        }else if(type==5){
            $("#form-type-vir").hide();
            $(".model1").show();
        }else{
            $("#form-type-vir").show();
            $(".model1").hide();
        }
        $("input[name='type']").on("change", function(){
            var type = $("input[name='type']:checked").val();
            if(type==0){
                $("#form-type-vir").hide();
                $(".model1").hide();
            }else if(type==5){
                $("#form-type-vir").hide();
                $(".model1").show();
            }else{
                $("#form-type-vir").show();
                $(".model1").hide();
            }
        });
    });
</script>
<?php  } else if($op == 'log') { ?>
<div class="panel panel-info">
    <div class="panel-heading">筛选</div>
    <div class="panel-body">
        <form role="form" class="form-horizontal" method="get" action="./index.php">
            <input type="hidden" name="m" value="amouse_wxapp_card" >
            <input type="hidden" name="do" value="credit" >
            <input type="hidden" name="c" value="site" />
            <input type="hidden" name="a" value="entry" />
            <input type="hidden" value="display" name="op">

            <div class="form-group">
                <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">兑换商品</label>
                <div class="col-sm-8">
                    <select name="goodsids" class="form-control">
                        <option value="" >请选择兑换商品</option>
                        <?php  if(is_array($glist)) { foreach($glist as $g) { ?>
                        <option value="<?php  echo $g['id'];?>" ><?php  echo $g['title'];?></option>
                        <?php  } } ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="pull-right col-xs-12 col-sm-2 col-lg-1">
                    <button class="btn btn-block"><i class="fa fa-search"></i> 搜索</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="table-responsive panel-body" style="overflow:visible;">

    <table class="table table-hover">
        <thead class="navbar-inner">
        <tr>
            <th style="width:30%">详细信息</th>
            <th style="width:30%">兑换人信息</th>
            <th style="width:10%">物流码</th>
            <th style='width:12%;'>状态</th>
            <th style="width:20%;">操作</th>
        </tr>
        </thead>
        <tbody>
        <?php  if(is_array($list)) { foreach($list as $item) { ?>
        <tr>
            <td>  <?php  echo $item['title'];?>
                <br/> <label class='label label-danger'>兑换<?php  if($custom_set['credittxt']) { ?><?php  echo $custom_set['credittxt'];?><?php  } else { ?>积分<?php  } ?>:<?php  echo $item['credit'];?></label>
                <br/><label class='label label-info'>兑换时间：<?php  echo date('Y-m-d H:i',$item['createtime'])?>  </label>
                <br/>
                <label class='label label-default <?php  if($item['type']==0) { ?>label-success<?php  } else { ?>label-info<?php  } ?>'>
                <?php  if($item['type']==0) { ?>实物商品<?php  } else if($item['type']==1) { ?>兑换名片VIP<?php  } else if($item['type']==4) { ?>兑换名片超级VIP<?php  } else if($item['type']==2) { ?>兑换公众号
                <?php  } else if($item['type']==3) { ?>兑换微信群<?php  } else if($item['type']==5) { ?>现金红包 <?php  } ?>
                </label>
            </td>
            <td>
                <p class="form-control-static form-control-static-list" style="line-height:1.8em;">
                    <span class="label label-primary"> <?php  echo $item['nickname'];?></span> <br>
                    <span class="label label-success"><?php  echo $item['address_phone'];?></span>
                </p>
            </td>
            <td><?php  if($item['status']==1) { ?><?php  echo $item['expresssn'];?><?php  } ?></td>
            <td style='width:12%;' >
                <label class='label label-default <?php  if($item['status']==1) { ?>label-success<?php  } else { ?>label-info<?php  } ?>'>
                <?php  if($item['type']==0) { ?> <?php  if($item['status']==1) { ?>已发货<?php  } else if($item['status']==0) { ?>未发货<?php  } ?><?php  } else { ?>虚拟商品<?php  } ?>
                </label>
            </td>

            <td style="text-align:center;width:20%;">
                <?php  if($item['status']==0 && $item['type']==0) { ?>
                <a class="btn btn-primary btn-sm" href="javascript:;" onclick="$('#modal-confirmsend').find(':input[name=logid]').val('<?php  echo $item['id'];?>')" data-toggle="modal" data-target="#modal-confirmsend">确认发货</a>
                <?php  } ?>
                <a onclick="return confirm('此操作不可恢复，确认吗？'); return false;"
                   href="<?php  echo $this->createWebUrl('credit', array('logid' => $item['id'],'op'=>'del'))?>" title="删除" class="btn btn-default">
                    <i class="fa fa-times">删除</i>
                </a>
                <?php  if($item['type']==0) { ?>
                <div class="btn-group btn-group-sm">
                    <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="javascript:;">联系人地址 <span
                            class="caret"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right" role="menu">
                        <li role="presentation">
                            <a href="javascript:;" onclick="displayUrl('<?php  echo $item['address'];?>');"><i class="fa fa-link fa-fw"></i>
                                查看链接
                            </a>
                        </li>
                    </ul>
                </div>
                <?php  } ?>
            </td>
        </tr>
        <?php  } } ?>
        </tbody>
    </table>
    <div style="margin:0 auto;margin-right: auto;vertical-align: middle;text-align: center;" >
        <?php  echo $pager;?>
    </div>


    <script>
        function displayUrl(address) {
            require(['jquery', 'util'], function($, u) {
                var content = '<p class="form-control-static" style="word-break:break-all">兑换人详细信息: <br>' + address+ '</p>';

                var footer =
                        '<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>' +
                        '<button type="button" class="btn btn-success">复制地址信息</button>';
                var diaobj = u.dialog('地址信息', content, footer);
                diaobj.find('.btn-default').click(function() {
                    diaobj.modal('hide');
                });
                diaobj.on('shown.bs.modal', function(){
                    u.clip(diaobj.find('.btn-success')[0], address);
                });
                diaobj.modal('show');
            });
        }
    </script>
</div>

<!-- 确认发货 -->
<div id="modal-confirmsend" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="width:600px;margin:0px auto;">
    <form class="form-horizontal form" action="<?php  echo $this->createWebUrl('credit',array('op'=>'log'))?>" method="post" enctype="multipart/form-data">
        <input type='hidden' name='logid' value='' />

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                    <h3>快递信息</h3>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label class="col-xs-10 col-sm-3 col-md-3 control-label">快递公司</label>
                        <div class="col-xs-12 col-sm-9 col-md-8 col-lg-8">
                            <select class="form-control" name="express" id="express">
                                <option value="" data-name="">其他快递</option>
                                <option value="shunfeng" data-name="顺丰">顺丰</option>
                                <option value="shentong" data-name="申通">申通</option>
                                <option value="yunda" data-name="韵达快运">韵达快运</option>
                                <option value="tiantian" data-name="天天快递">天天快递</option>
                                <option value="yuantong" data-name="圆通速递">圆通速递</option>
                                <option value="zhongtong" data-name="中通速递">中通速递</option>
                                <option value="ems" data-name="ems快递">ems快递</option>
                                <option value="huitongkuaidi" data-name="汇通快运">汇通快运</option>
                                <option value="quanfengkuaidi" data-name="全峰快递">全峰快递</option>
                                <option value="zhaijisong" data-name="宅急送">宅急送</option>
                                <option value="aae" data-name="aae全球专递">aae全球专递</option>
                                <option value="anjie" data-name="安捷快递">安捷快递</option>
                                <option value="anxindakuaixi" data-name="安信达快递">安信达快递</option>
                                <option value="biaojikuaidi" data-name="彪记快递">彪记快递</option>
                                <option value="bht" data-name="bht">bht</option>
                                <option value="baifudongfang" data-name="百福东方国际物流">百福东方国际物流</option>
                                <option value="coe" data-name="中国东方（COE）">中国东方（COE）</option>
                                <option value="changyuwuliu" data-name="长宇物流">长宇物流</option>
                                <option value="datianwuliu" data-name="大田物流">大田物流</option>
                                <option value="debangwuliu" data-name="德邦物流">德邦物流</option>
                                <option value="dhl" data-name="dhl">dhl</option>
                                <option value="dpex" data-name="dpex">dpex</option>
                                <option value="dsukuaidi" data-name="d速快递">d速快递</option>
                                <option value="disifang" data-name="递四方">递四方</option>
                                <option value="fedex" data-name="fedex（国外）">fedex（国外）</option>
                                <option value="feikangda" data-name="飞康达物流">飞康达物流</option>
                                <option value="fenghuangkuaidi" data-name="凤凰快递">凤凰快递</option>
                                <option value="feikuaida" data-name="飞快达">飞快达</option>
                                <option value="guotongkuaidi" data-name="国通快递">国通快递</option>
                                <option value="ganzhongnengda" data-name="港中能达物流">港中能达物流</option>
                                <option value="guangdongyouzhengwuliu" data-name="广东邮政物流">广东邮政物流</option>
                                <option value="gongsuda" data-name="共速达">共速达</option>
                                <option value="hengluwuliu" data-name="恒路物流">恒路物流</option>
                                <option value="huaxialongwuliu" data-name="华夏龙物流">华夏龙物流</option>
                                <option value="haihongwangsong" data-name="海红">海红</option>
                                <option value="haiwaihuanqiu" data-name="海外环球">海外环球</option>
                                <option value="jiayiwuliu" data-name="佳怡物流">佳怡物流</option>
                                <option value="jinguangsudikuaijian" data-name="京广速递">京广速递</option>
                                <option value="jixianda" data-name="急先达">急先达</option>
                                <option value="jjwl" data-name="佳吉物流">佳吉物流</option>
                                <option value="jymwl" data-name="加运美物流">加运美物流</option>
                                <option value="jindawuliu" data-name="金大物流">金大物流</option>
                                <option value="jialidatong" data-name="嘉里大通">嘉里大通</option>
                                <option value="jykd" data-name="晋越快递">晋越快递</option>
                                <option value="kuaijiesudi" data-name="快捷速递">快捷速递</option>
                                <option value="lianb" data-name="联邦快递（国内）">联邦快递（国内）</option>
                                <option value="lianhaowuliu" data-name="联昊通物流">联昊通物流</option>
                                <option value="longbanwuliu" data-name="龙邦物流">龙邦物流</option>
                                <option value="lijisong" data-name="立即送">立即送</option>
                                <option value="lejiedi" data-name="乐捷递">乐捷递</option>
                                <option value="minghangkuaidi" data-name="民航快递">民航快递</option>
                                <option value="meiguokuaidi" data-name="美国快递">美国快递</option>
                                <option value="menduimen" data-name="门对门">门对门</option>
                                <option value="ocs" data-name="OCS">OCS</option>
                                <option value="peisihuoyunkuaidi" data-name="配思货运">配思货运</option>
                                <option value="quanchenkuaidi" data-name="全晨快递">全晨快递</option>
                                <option value="quanjitong" data-name="全际通物流">全际通物流</option>
                                <option value="quanritongkuaidi" data-name="全日通快递">全日通快递</option>
                                <option value="quanyikuaidi" data-name="全一快递">全一快递</option>
                                <option value="rufengda" data-name="如风达">如风达</option>
                                <option value="santaisudi" data-name="三态速递">三态速递</option>
                                <option value="shenghuiwuliu" data-name="盛辉物流">盛辉物流</option>
                                <option value="sue" data-name="速尔物流">速尔物流</option>
                                <option value="shengfeng" data-name="盛丰物流">盛丰物流</option>
                                <option value="saiaodi" data-name="赛澳递">赛澳递</option>
                                <option value="tiandihuayu" data-name="天地华宇">天地华宇</option>
                                <option value="tnt" data-name="tnt">tnt</option>
                                <option value="ups" data-name="ups">ups</option>
                                <option value="wanjiawuliu" data-name="万家物流">万家物流</option>
                                <option value="wenjiesudi" data-name="文捷航空速递">文捷航空速递</option>
                                <option value="wuyuan" data-name="伍圆">伍圆</option>
                                <option value="wxwl" data-name="万象物流">万象物流</option>
                                <option value="xinbangwuliu" data-name="新邦物流">新邦物流</option>
                                <option value="xinfengwuliu" data-name="信丰物流">信丰物流</option>
                                <option value="yafengsudi" data-name="亚风速递">亚风速递</option>
                                <option value="yibangwuliu" data-name="一邦速递">一邦速递</option>
                                <option value="youshuwuliu" data-name="优速物流">优速物流</option>
                                <option value="youzhengguonei" data-name="邮政包裹挂号信">邮政包裹挂号信</option>
                                <option value="youzhengguoji" data-name="邮政国际包裹挂号信">邮政国际包裹挂号信</option>
                                <option value="yuanchengwuliu" data-name="远成物流">远成物流</option>
                                <option value="yuanweifeng" data-name="源伟丰快递">源伟丰快递</option>
                                <option value="yuanzhijiecheng" data-name="元智捷诚快递">元智捷诚快递</option>
                                <option value="yuntongkuaidi" data-name="运通快递">运通快递</option>
                                <option value="yuefengwuliu" data-name="越丰物流">越丰物流</option>
                                <option value="yad" data-name="源安达">源安达</option>
                                <option value="yinjiesudi" data-name="银捷速递">银捷速递</option>
                                <option value="zhongtiekuaiyun" data-name="中铁快运">中铁快运</option>
                                <option value="zhongyouwuliu" data-name="中邮物流">中邮物流</option>
                                <option value="zhongxinda" data-name="忠信达">忠信达</option>
                                <option value="zhimakaimen" data-name="芝麻开门">芝麻开门</option>
                            </select>
                            <input type='hidden' name='expresscom' id='expresscom' />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-10 col-sm-3 col-md-3 control-label">快递单号</label>
                        <div class="col-xs-12 col-sm-9 col-md-8 col-lg-8">
                            <input type="text" name="expresssn" class="form-control" />
                        </div>
                    </div>
                    <div id="module-menus"></div>
                </div>
                <div class="modal-footer">
                    <input name="token" type="hidden" value="<?php  echo $_W['token'];?>"/>
                    <button type="submit" class="btn btn-success col-sm-2" name="submit" value="确认发货">
                        <i class="fa fa-check-circle"></i> 确认发货
                    </button>

                    <a href="#" class="btn btn-default" data-dismiss="modal" aria-hidden="true">关闭</a>
                </div>
            </div>
        </div>
    </form>
</div>
<script language='javascript'>
    $(function (){
        $("#express").change(function () {
            var obj = $(this);
            var sel = obj.find("option:selected").attr("data-name");
            $("#expresscom").val(sel);
        });
    })
</script>
<?php  } ?>