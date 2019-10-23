<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/header', TEMPLATE_INCLUDEPATH)) : (include template('public/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/comhead', TEMPLATE_INCLUDEPATH)) : (include template('public/comhead', TEMPLATE_INCLUDEPATH));?>
<link rel="stylesheet" type="text/css" href="../addons/zh_cjdianc/template/public/ygcss.css">
<style type="text/css">

    input[type="radio"] + label::before {
        content: "\a0"; /*不换行空格*/
        display: inline-block;
        vertical-align: middle;
        font-size: 16px;
        width: 1em;
        height: 1em;
        margin-right: .4em;
        border-radius: 50%;
        border: 2px solid #ddd;
        text-indent: .15em;
        line-height: 1; 
    }
    input[type="radio"]:checked + label::before {
        background-color: #44ABF7;
        background-clip: content-box;
        padding: .1em;
        border: 2px solid #44ABF7;
    }
    input[type="radio"] {
        position: absolute;
        clip: rect(0, 0, 0, 0);
    }
</style>
<style type="text/css">
    .multi-img-details .multi-item{height: auto;}
    .ygmargin{margin-top: 10px;color: #999;}
      .dizhi{margin-top: 10px;color: #44ABF7;}
</style>
<ul class="nav nav-tabs">
    <span class="ygxian"></span>
    <div class="ygdangq">当前位置:</div>    
    <li class="active"><a href="javascript:void(0);">门店信息</a></li>
</ul>
<div class="main">
    <form action="" method="post" class="form-horizontal form" enctype="multipart/form-data">
        <!--<input type="hidden" name="parentid" value="<?php  echo $parent['id'];?>" />-->
        <div class="panel panel-default ygdefault">
            <div class="panel-heading wyheader">
                系统信息&nbsp;&nbsp;>&nbsp;&nbsp;门店信息
            </div>
            <div class="panel-body">
<!--                 <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">风格颜色</label>
                    <div class="col-sm-9">
                        <?php  echo tpl_form_field_color('color', $info['color'])?> 
                         <div class="ygmargin">*不填写会默认选中蓝色</div>
                    </div>
                </div>   -->              
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">店铺LOGO</label>
                    <div class="col-sm-9">
                        <?php  echo tpl_form_field_image('logo', $info['logo'])?>

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">商家名称</label>
                    <div class="col-sm-9">
                        <input type="text" name="name" class="form-control" value="<?php  echo $info['name'];?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">商家电话</label>
                    <div class="col-sm-9">
                        <input type="text" name="tel" class="form-control" value="<?php  echo $info['tel'];?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">商家地址</label>
                    <div class="col-sm-9">
                        <input type="text" name="address" class="form-control" value="<?php  echo $info['address'];?>" />
                    </div>
                </div>
                  <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">地址坐标</label>
                    <div class="col-sm-10">
                     <!-- <?php  echo tpl_form_field_coordinate('op',$list['coordinates'])?> -->
                     <input type="text" name="coordinates" class="form-control dizhiname" value="<?php  echo $info['coordinates'];?>" placeholder="例如:30.527540,114.346430" />
                     <a href="http://lbs.qq.com/tool/getpoint/" target="_blank">
                     <p class="dizhi">*点击获取地理位置</p></a>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">人均价</label>
                    <div class="col-sm-10">
                        <input type="number" name="capita" value="<?php  echo $info['capita'];?>" class="form-control" id="inputEmail3"
                               placeholder="请填写人均价,单位元">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">起送价</label>
                    <div class="col-sm-10">
                        <input type="number" name="start_at" value="<?php  echo $info['start_at'];?>" class="form-control" id="inputEmail3"
                               placeholder="请填写起送价格,单位元">
                    </div>
                </div>
                <div class="form-group">

                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">是否开启新用户优惠</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="xyh_open">
                            <?php  if($info2['xyh_open']==1) { ?>
                            <option value="1" selected="selected">是</option>
                            <option value="2">否</option>
                            <?php  } else if($info2['xyh_open']==2) { ?>
                            <option value="1">是</option>
                            <option value="2" selected="selected">否</option>
                            <?php  } else { ?>
                            <option value="1">是</option>
                            <option value="2">否</option>
                            <?php  } ?>
                        </select>
                    </div>
                </div>
                 <div class="form-group">

                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">新用户立减金额</label>

                    <div class="col-sm-10">

                        <input type="number" name="xyh_money" value="<?php  echo $info2['xyh_money'];?>" class="form-control" id="inputEmail3"
                               placeholder="请填写立减金额,单位元">

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">门店公告</label>
                    <div class="col-sm-9">
                        <input type="text" name="announcement" class="form-control" value="<?php  echo $info['announcement'];?>" />
                    </div>
                </div>         
      
              
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">商家环境</label>
                    <div class="col-sm-9">
                       <?php  echo tpl_form_field_multi_image('environment',$environment);?>
                       <span class="ygmargin">* 建议尺寸大小:750*360px</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">营业资质</label>
                    <div class="col-sm-9">
                        <?php  echo tpl_form_field_multi_image('yyzz', $yyzz)?>
                        <span class="ygmargin">* 建议尺寸大小:750*360px</span>
                    </div>
                </div>  
                      <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">商家二维码</label>
                    <div class="col-sm-9">
                        <?php  echo tpl_form_field_image('qrcode', $info['qrcode'])?>
                    <span class="ygmargin">* 建议尺寸大小:300*300px</span>
                    </div>
                </div>
                 <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">商家点菜页顶部风格
                        <span class="timeygbox"></span>
                    </label>
                    <div class="col-sm-9">
                        <label class="radio-inline">
                            <input type="radio" id="emailwy1" name="top_style" value="1" <?php  if($info2['top_style']==1 || empty($info2['top_style'])) { ?>checked<?php  } ?> />
                            <label for="emailwy1">风格一</label>
                        </label>
                        <label class="radio-inline">
                            <input type="radio" id="emailwy2" name="top_style" value="2" <?php  if($info2['top_style']==2) { ?>checked<?php  } ?> />
                            <label for="emailwy2">风格二</label>
                        </label>
                        <div class="ygmargin">*默认为风格一,选择风格二请注意添加商家幻灯片(单店点菜版有效)</div>

                    </div>

                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">点菜页是否显示优惠券
                        <span class="timeygbox"></span>
                    </label>
                    <div class="col-sm-9">
                        <label class="radio-inline">
                            <input type="radio" id="is_dcyhq1" name="is_dcyhq" value="1" <?php  if($info2['is_dcyhq']==1 || empty($info2['is_dcyhq'])) { ?>checked<?php  } ?> />
                            <label for="is_dcyhq1">显示</label>
                        </label>
                        <label class="radio-inline">
                            <input type="radio" id="is_dcyhq2" name="is_dcyhq" value="2" <?php  if($info2['is_dcyhq']==2) { ?>checked<?php  } ?> />
                            <label for="is_dcyhq2">隐藏</label>
                        </label>
                        <div class="ygmargin">*默认为显示,选择隐藏则点菜时商品列表上方不显示优惠券</div>

                    </div>

                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">商家导航风格
                        <span class="timeygbox"></span>
                    </label>
                    <div class="col-sm-9">
                        <label class="radio-inline">
                            <input type="radio" id="emailwy3" name="info_style" value="1" <?php  if($info2['info_style']==1 || empty($info2['info_style'])) { ?>checked<?php  } ?> />
                            <label for="emailwy3">风格一</label>
                        </label>
                        <label class="radio-inline">
                            <input type="radio" id="emailwy4" name="info_style" value="2" <?php  if($info2['info_style']==2) { ?>checked<?php  } ?> />
                            <label for="emailwy4">风格二</label>
                        </label>
                        <div class="ygmargin">*默认为风格一,风格二为左右版块布局</div>
                    </div>

                </div>     
                   
                
            <!--     <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label" style="margin-right: 15px;">是否休息</label>
                    <select class="col-sm-8" name="is_rest">
                        <?php  if($info['is_rest']==1) { ?>
                        <option value="1" selected="selected">是</option>
                        <option value="2">否</option>
                        <?php  } else if($info['is_rest']==2) { ?>
                        <option value="1">是</option>
                        <option value="2" selected="selected">否</option>
                        <?php  } else { ?>
                        <option value="1">是</option>
                        <option value="2">否</option>
                        <?php  } ?>
                    </select>
                </div> -->
                
                <!-- <div class="form-group" style="width: 100%;">

                <label class="col-xs-12 col-sm-3 col-md-2 control-label">优惠条件设置</label>
                <label for="inputEmail3" class="col-sm-1 control-label">满</label>
                <div class="col-sm-2">

                    <input type="number" name="conditions" value="<?php  echo $info['conditions'];?>" class="form-control" id="inputEmail3"
                           placeholder="请填写金额">

                </div>
                <label for="inputEmail3" class="col-sm-1 control-label">减</label>

                <div class="col-sm-2">

                    <input type="number" name="preferential" value="<?php  echo $info['preferential'];?>" class="form-control" id="inputEmail3"
                           placeholder="请填写金额">

                </div>
                <label for="inputEmail3" class="col-sm-3" style="margin-top: 7px;color: #999;">(请设置满减优惠,例如满50减10)</label>
                </div> -->

                <!-- 
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">店铺音乐</label>
                    <div class="col-sm-10">
                    <?php  echo tpl_form_field_video('mp3')?>
                    </div>
                </div> -->
                <!-- <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">分享海报背景图片</label>
                    <div class="col-sm-9">
                        <?php  echo tpl_form_field_image('hb_img', $info['hb_img'])?>
                        *不填为默认图片 尺寸大小1080*1517
                    </div>
                </div> -->
              <!--   <?php  if($img!='') { ?>
<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">店铺小程序码</label>
    <?php  if(strlen($img)>200) { ?>
    <?php  echo "<img src='data:image/png;base64,".$img."'>"?>
    <?php  } else { ?> 
    <div class="col-sm-10">
 <input type="text" style="color:red" name="orderby" value="该二维码必须在小程序发布后才能生成" class="form-control" id="inputEmail3" readonly>
   </div>
 <?php  } ?>
  </div>
    <?php  } ?> -->


                    <?php  if($img2!='') { ?>
<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">店铺收银小程序码</label>
    <?php  if(strlen($img2)>200) { ?>
    <?php  echo "<img src='data:image/png;base64,".$img2."'>"?>
    <?php  } else { ?> 
    <div class="col-sm-10">
 <input type="text" style="color:red" name="orderby" value="该二维码必须在小程序发布后才能生成" class="form-control" id="inputEmail3" readonly>
   </div>
 <?php  } ?>
  </div>
    <?php  } ?>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">商家简介</label>
                    <div class="col-sm-10">
                    <?php  echo tpl_ueditor('details',$info['details']);?>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <input type="submit" name="submit" value="提交" class="btn col-lg-3" style="color: white;background-color: #44ABF7;"/>
            <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
        </div>
    </form>
</div>
<script type="text/javascript">
    $(function(){
        // $("#frame-0").addClass("in");
        $("#frame-0").show();
        $("#yframe-0").addClass("wyactive");
    })
</script>