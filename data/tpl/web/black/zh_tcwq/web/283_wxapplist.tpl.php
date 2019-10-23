<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/header', TEMPLATE_INCLUDEPATH)) : (include template('public/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/comhead', TEMPLATE_INCLUDEPATH)) : (include template('public/comhead', TEMPLATE_INCLUDEPATH));?>
<link rel="stylesheet" type="text/css" href="../addons/zh_tcwq/template/public/ygcsslist.css">
<style type="text/css">
    .yg5_key>div{float: left;line-height: 34px;}
    .store_td1{height: 45px;}
    .store_list_img{width: 60px;height: 60px;}
    .yg5_tabel{border-color: #e5e5e5;outline: 1px solid #e5e5e5;}
    .yg5_tr2>td{padding: 10px 15px;border: 1px solid #e5e5e5;text-align:center;}
    .yg5_tr1>th{
        border: 1px solid #e5e5e5;
        padding-left: 15px;
        background-color: #FAFAFA;
        font-weight: bold;
        text-align: center;
    }
    .yg5_btn{background-color: #EEEEEE;color: #333;border: 1px solid #E4E4E4;border-radius: 6px;width: 100px;height: 34px;}
    /*#frame-2{display: block;visibility: visible;}*/
</style>
<ul class="nav nav-tabs">
    <span class="ygxian"></span>
    <div class="ygdangq">当前位置:</div>    
    <li class="active"><a href="<?php  echo $this->createWebUrl('wxapplist')?>">小程序列表</a></li>
</ul>
<div class="main">
    <div class="panel panel-default">
        <div class="panel-body">
        <form action="" method="get" class="col-md-4">
              <input type="hidden" name="c" value="site" />
                   <input type="hidden" name="a" value="entry" />
                   <input type="hidden" name="m" value="zh_tcwq" />
                 <input type="hidden" name="do" value="wxapplist" />
            <div class="input-group" style="width: 300px">
                <input type="text" name="keywords" class="form-control" placeholder="请输入小程序名称">
                <span class="input-group-btn">
                    <input type="submit" class="btn btn-default" name="submit" value="查找"/>
                </span>
            </div>
            <input type="hidden" name="token" value="<?php  echo $_W['token'];?>"/>
        </form>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            小程序列表
        </div>
        <div class="panel-body" style="padding: 0px 15px;">
            <div class="row">
                <table class="yg5_tabel col-md-12">
                    <tr class="yg5_tr1">
                        <th class="store_td1 col-md-1">小程序id</th>                      
                        <th class="col-md-1">小程序名称</th>
                        <th class="col-md-2">操作</th>
                    </tr>
                    <?php  if(is_array($list)) { foreach($list as $row) { ?>
                    <tr class="yg5_tr2">
                        <td><div class="type-parent"><?php  echo $row['uniacid'];?>&nbsp;&nbsp;</div></td>                        
                        <td><?php  echo $row['name'];?></td>
                        <td>
                          <a href="<?php  echo $this->createWebUrl('copyright',array('uniacid'=>$row['uniacid']))?>" ><span class="btn btn-xs ygyouhui2">版权设置</span> </a>
                          <a href="<?php  echo $this->createWebUrl('powers',array('uniacid'=>$row['uniacid']))?>" ><span class="btn btn-xs ygshouqian2">权限设置</span> </a>
                        </td>
                    </tr>
                    <?php  } } ?>
                </table>
            </div>
        </form>
    </div>
</div>
<div class="text-right we7-margin-top">
     <?php  echo $pager;?>
</div>
<script type="text/javascript">
    $(function(){
        $("#frame-21").show();
        $("#yframe-21").addClass("wyactive");
    })
</script>