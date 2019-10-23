<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<ul class="nav nav-tabs">
    <li <?php  if($op =='post' && empty($id)) { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('navs', array('op' => 'post'));?>">添加导航</a> </li>
    <li <?php  if($op =='display') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('navs',array('op'=>'display'));?>">管理导航</a> </li>
    <?php  if(!empty($id) && $op == 'post') { ?> <li class="active"> <a href="<?php  echo $this->createWebUrl('navs',array('op'=>'post','id'=>$id));?>">编辑导航</a> </li> <?php  } ?>
</ul>
<style>
    .checkbox input[type=checkbox], .checkbox-inline input[type=checkbox], .radio input[type=radio], .radio-inline input[type=radio]{ margin-left:-25px;}
   .checkbox label, .radio label{ padding-left:25px;}
   input[type=checkbox], input[type=radio]{ margin:1px;}
    input[type=checkbox],input[type=radio]{ position: relative; width: 18px; height:18px; background-clip: border-box; -webkit-appearance: none; -moz-appearance: none; appearance: none; vertical-align:top; border-radius: 2px; -webkit-transition: background-color .25s; transition: background-color .25s; background-color: #fff; border: 1px solid #d7d7d7; }
    input[type=checkbox]:hover,input[type=radio]:hover{ border:1px solid #09bb07;}
    input[type=checkbox]:checked:after,input[type=radio]:checked:after{ content: ''; display: block; height: 6px; width: 10px; border: 0 solid #333; border-width: 0 0 2px 2px; -webkit-transform: rotate(-45deg); transform: rotate(-45deg); position: absolute; top: 4px; left: 3px; border-color:#fff;}
    input[type=checkbox]:checked,input[type=radio]:checked{ color:#fff; background-color: #5cb85c; border-color: #5cb85c; }
    ul.unstyled, ol.unstyled { list-style: none outside none; margin-left: 0;  }
    .t-theme{ font-size: 0; padding: 4px 0;}
    .t-theme li{ display:inline-block; width: 20px; height: 20px; overflow: hidden; outline: 1px solid #fff; font-size: 14px; color: #fff; cursor: pointer;}
    .t-theme li:hover{ opacity: 0.8;}
    .t-theme li.active:hover{ opacity: 1;}
    .t-theme li i{ display: none;}
    .t-theme li.active i{ display: block; line-height: 20px;}
</style>
<?php  if($op == 'display') { ?>
<div style="padding:15px;">
    <form id="form2" class="form-horizontal" method="post">
        <table class="table">
            <thead>
            <tr>
                <th style="width:100px;">排序</th>
                <th>小程序名称</th>
                <th>logo图标</th>
                <th>类型</th>
                <th style="text-align:right;">操作</th>
            </tr>
            </thead>
            <tbody>
            <?php  if(is_array($list)) { foreach($list as $item) { ?>
            <tr>
                <td class="text-center">
                    <input type="text" class="form-control" name="displayorder[<?php  echo $item['id'];?>]" value="<?php  echo $item['displayorder'];?>">
                </td>
                <td>
                    <?php  echo $item['title'];?>
                </td>
                <td>
                    <img src="<?php echo strpos($item['thumb'],'http://')===FALSE?tomedia($item['thumb']):$item['thumb']?>" style="width: 150px;height: 50px;" />
                </td>
                <td>
                    <label   data="<?php  echo $item['status'];?>" class='label label-default <?php  if($item['status']==0) { ?>label-success<?php  } ?>' ><?php  if($item['status']==0) { ?>小程序<?php  } else if($item['status']==1) { ?>web网页<?php  } ?>
                    </label>
                </td>
                <td style="text-align:right;">
                    <a href="<?php  echo $this->createWebUrl('navs', array('op' => 'post', 'id' => $item['id']))?>" title="编辑" data-toggle="tooltip" data-placement="top" class="btn btn-default btn-sm"><i class="fa fa-edit"></i>
                    </a>
                    <a onclick="return confirm('此操作不可恢复，确认吗？'); return false;"
                       href="<?php  echo $this->createWebUrl('navs', array('op' => 'delete', 'id' => $item['id']))?>"
                       title="删除" data-toggle="tooltip" data-placement="top" class="btn btn-default btn-sm"><i class="fa fa-times"></i></a>
                </td>
            </tr>
            <?php  } } ?>
            </tbody>
        </table>
        <div class="form-group col-sm-12">
            <input name="submit" type="submit" class="btn btn-primary col-lg-1" value="更新排序">
            <input type="hidden" name="token" value="<?php  echo $_W['token'];?>"/>
        </div>
    </form>
</div>
<script type="text/javascript">
    function setProperty(obj, id,type) {
        $(obj).html($(obj).html() + "...");
        $.post("<?php  echo $this->createWebUrl('navs',array('op'=>'setstatus','version_id'=>$_GPC['version_id']))?>",{id: id,type: type,data: obj.getAttribute("data")},function (d) {
            $(obj).html($(obj).html().replace("...", ""));
            $(obj).html(d.data == '0' ? "正常" : "禁用");
            $(obj).attr("data", d.data);
            if (d.result == 1) {
                $(obj).toggleClass("label-info");
            }
        }, "json");
    }
</script>
<?php  } else if($op == 'post') { ?>

<div class="clearfix">
    <form class="form-horizontal form" action="" method="post" enctype="multipart/form-data">
        <div class="panel panel-default">
            <div class="panel-heading">导航管理</div>
            <div class="panel-body">
                <input type="hidden" name="id" value="<?php  echo $item['id'];?>">
                <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">排序</label>
                    <div class="col-sm-8 col-xs-12">
                        <input type="text" name="displayorder" class="form-control" value="<?php  echo $item['displayorder'];?>" />
                    </div>
                </div>
                 <div class="form-group" >
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">小程序/web页 名称</label>
                    <div class="col-sm-9 col-xs-12">
                        <input type="text" name="title" class="form-control" value="<?php  echo $item['title'];?>" />
                        <span class="help-block">
						  外链需要配置好业务域名 登录小程序后台，选择设置-开发设置-业务域名，新增配置域名模块
					    </span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">logo图标</label>
                    <div class="col-sm-9 col-xs-12">
                        <?php  echo tpl_form_field_image('thumb', $item['thumb']);?>
                        <span class="help-block">宽高比例1：1, 建议尺寸 120px*120px </span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">是否推荐:</label>
                    <div class="col-sm-10">
                        <label class="radio-inline">
                            <input type="radio" value="0" onclick="setRecommendStatus()" name="recommend"  <?php  if($item['recommend'] == 0) { ?>checked="true"<?php  } ?> >是
                        </label>
                        <label class="radio-inline">
                            <input type="radio" value="1" onclick="setRecommendStatus()" name="recommend" <?php  if($item['recommend'] == 1) { ?>checked="true"<?php  } ?> >否
                        </label>
                    </div>
                </div>

                <div class="form-group" style="display: none;padding:2px 10px;" id="color">
                    <label class="col-sm-2 control-label">背景色 ：</label>
                    <div class="col-sm-10">
                        <ul class="t-theme " id="allcolor" >
                            <li style="background: #009aff;margin-right: 10px;" title="#009aff"><i class="fa fa-check" style="text-align: center;"></i></li>
                            <li style="background: #09bb07;margin-right: 10px;" title="#09bb07"><i class="fa fa-check" style="text-align: center;"></i></li>
                            <li style="background: #fea512;margin-right: 10px;" title="#fea512"><i class="fa fa-check" style="text-align: center;"></i></li>
                            <li style="background: #f35150;margin-right: 10px;" title="#f35150"><i class="fa fa-check" style="text-align: center;"></i></li>
                            <li style="background: #312e43;margin-right: 10px;" title="#312e43"><i class="fa fa-check" style="text-align: center;"></i></li>
                            <li style="background: #1ca27e;margin-right: 10px;" title="#1ca27e"><i class="fa fa-check" style="text-align: center;"></i></li>
                            <li style="background: #df4ecc;margin-right: 10px;" title="#df4ecc"><i class="fa fa-check" style="text-align: center;"></i></li>
                            <li style="background: #6430ba;margin-right: 10px;" title="#6430ba"><i class="fa fa-check" style="text-align: center;"></i></li>
                            <li style="background: #9bd3d3;margin-right: 10px;" title="#9bd3d3"><i class="fa fa-check" style="text-align: center;"></i></li>
                            <li style="background: #492c19;" title="#492c19"><i class="fa fa-check"></i></li>
                        </ul>
                        <input type="hidden"  name="bgcolor" value="<?php  echo $item['bgcolor'];?>" id="bgcolor">
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">跳转类型</label>
                    <div class="col-sm-9 col-xs-12">
                        <label class="radio-inline" for="form-oauth-0">
                            <input type="radio" name="status" value="0" onclick="setProStatus()"  id="form-oauth-0"  <?php  if($item['status'] == 0) { ?>checked="true"<?php  } ?>  /> 小程序</label>
                        <label class="radio-inline" for="form-oauth-1">
                            <input type="radio" name="status" value="1" onclick="setProStatus()"  id="form-oauth-1"  <?php  if($item['status'] == 1) { ?>checked="true"<?php  } ?>  /> web网页</label>
                    </div>
                </div>

                <div class="form-group show_xcx_div" >
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">小程序点击类型</label>
                    <div class="col-sm-9 col-xs-12">
                        <label class="radio-inline" for="form-click-0">
                        <input type="radio" name="click" value="0" onclick="toClickApl()" id="form-click-0"  <?php  if($item['click'] == 0) { ?>checked="true"<?php  } ?>  />
                         直接进入小程序
                        </label>
                            <label class="radio-inline" for="form-click-1">
                        <input type="radio" name="click" value="1"  onclick="toClickApl()" id="form-click-1"  <?php  if($item['click'] == 1) { ?>checked="true"<?php  } ?>  />
                         弹出小程序二维码</label>
                    </div>
                </div>
                <div class="form-group appid" >
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">小程序Appid</label>
                    <div class="col-sm-9 col-xs-12">
                        <input type="text" name="appid" class="form-control" value="<?php  echo $item['appid'];?>" />
                        <span class="help-block">
						加入的小程序必须在同一公众号下关联，详细操作请参考 微信小程序接入指南——公众号关联小程序
					    </span>
                    </div>
                </div>
                <div class="form-group define-icon qrcode2">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">小程序二维码 </label>
                    <div class="col-sm-9 col-xs-12">
                        <?php  echo tpl_form_field_image('qrcode', $item['qrcode']);?>

                        <span class="help-block">比例1：1, 最佳尺寸200*200 请上传已上线的小程序二维码）</span>
                    </div>
                </div>
                <div class="form-group web_div" >
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">网页链接</label>
                    <div class="col-sm-9 col-xs-12">
                        <input type="text" name="followurl" class="form-control" value="<?php  echo $item['followurl'];?>" />
                        <span class="help-block">
						  webview指向网页的链接需要配置好业务域名 登录小程序后台，选择设置-开发设置-业务域名，新增配置域名模块
					    </span>
                    </div>
                </div>

                <div class="form-group " >
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">介绍</label>
                    <div class="col-sm-9 col-xs-12">
                        <textarea rows="3" class="form-control" name="info" placeholder=""><?php  echo $item['info'];?></textarea>
                    </div>
                </div>

            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-12">
                <input name="submit" type="submit" value="提交" class="btn btn-primary col-lg-1">
                <input type="hidden" name="token" value="<?php  echo $_W['token'];?>"/>
            </div>
        </div>
    </form>
</div>
<script>
    $(function(){
        var color = '';
        var lis = document.getElementsByTagName('li');
        var recommend_val=$('input:radio[name="recommend"]:checked').val();
        if(recommend_val ==0){
            $("#color").show();
            /*for(var i=0;i<lis.length;i++){
                var check_color = lis.item(i).title;
                if(check_color==color){
                    lis.item(i).className = 'active';
                }
            }*/
        }else{
            $("#color").hide();
        }

        var status_val=$('input:radio[name="status"]:checked').val();
        var click=$('input:radio[name="click"]:checked').val();
        if(status_val == 0){
            $(".show_xcx_div").show();
            $(".web_div").hide();
            if(click==0){
                $(".appid").show();
                $(".qrcode2").hide();
            }else if(click==1){
                $(".appid").hide();
                $(".qrcode2").show();
            }
        }else{
            $(".show_xcx_div").hide();
            $(".web_div").show();
            $(".appid").hide();
            $(".qrcode2").hide();
        }
        var click=$('input:radio[name="click"]:checked').val();
        if(click == 0){
            $(".appid").show();
            $(".qrcode2").hide();
        }else if(click == 1){
            $(".appid").hide();
            $(".qrcode2").show();
        }
    })
    //选择是否推荐
    function setRecommendStatus() {
        //清除对应类型信息
        $('input[name="bgcolor"]').val('');
        var rmp_val=$('input:radio[name="recommend"]:checked').val();
        if(rmp_val == 0){
            $("#color").show();
        }else{
            $("#color").hide();
        }
    }
    $("#allcolor li").click(function(){
        var back_color = $(this).context.title;
        $(this).siblings('li').removeClass('active');
        $(this).addClass('active');
        $("#bgcolor").val(back_color);
    })
    function setProStatus(){
        var pro_val=$('input:radio[name="status"]:checked').val();
        var click=$('input:radio[name="click"]:checked').val();
        console.log(click);
        if(pro_val == 0){
            $(".show_xcx_div").show();
            $(".web_div").hide();
            if(click==0){
                $(".appid").show();
                $(".qrcode2").hide();
            }else if(click==1){
                $(".appid").hide();
                $(".qrcode2").show();
            }
        }else{
            $(".show_xcx_div").hide();
            $(".web_div").show();
            $(".appid").hide();
            $(".qrcode2").hide();
        }
    }
    function toClickApl(){
        var click=$('input:radio[name="click"]:checked').val();
        if(click == 0){
            $(".appid").show();
            $(".qrcode2").hide();
        }else if(click == 1){
            $(".appid").hide();
            $(".qrcode2").show();
        }
    }
</script>
<?php  } ?>