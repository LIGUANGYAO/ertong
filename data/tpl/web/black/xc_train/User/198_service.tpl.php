<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html lang="en">
<head><style type="text/css">@charset "UTF-8";[ng\:cloak],[ng-cloak],[data-ng-cloak],[x-ng-cloak],.ng-cloak,.x-ng-cloak,.ng-hide:not(.ng-hide-animate){display:none !important;}ng\:form{display:block;}.ng-animate-shim{visibility:hidden;}.ng-anchor{position:absolute;}</style>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> - 系统 - 公众平台自助引擎 -  Powered by WE7.CC</title>
    <meta name="keywords" content="系统,微信,微信公众平台,we7.cc">
    <meta name="description" content="公众平台自助引擎（www.we7.cc），简称系统，系统是一款免费开源的微信公众平台管理系统，是国内最完善移动网站及移动互联网技术解决方案。">
    <link rel="shortcut icon" href="./resource/images/favicon.ico">
    <link href="./resource/css/bootstrap.min.css?v=20170915" rel="stylesheet">
    <link href="./resource/css/common.css?v=20170915" rel="stylesheet">
    <script src="//tongji.w7.cc/s.php?sid=3"></script><script type="text/javascript">
        if(navigator.appName == 'Microsoft Internet Explorer'){
            if(navigator.userAgent.indexOf("MSIE 5.0")>0 || navigator.userAgent.indexOf("MSIE 6.0")>0 || navigator.userAgent.indexOf("MSIE 7.0")>0) {
                alert('您使用的 IE 浏览器版本过低, 推荐使用 Chrome 浏览器或 IE8 及以上版本浏览器.');
            }
        }
        window.sysinfo = {
            'uniacid': "<?php  echo $_W['uniacid'];?>",		'acid': "<?php  echo $_W['acid'];?>",				'uid': "<?php  echo $_W['uid'];?>",		'isfounder': "<?php  echo $_W['isfounder'];?>",
            'siteroot':"<?php  echo $_W['siteroot'];?>",
            'siteurl': "<?php  echo $_W['siteurl'];?>",
            'attachurl': "<?php  echo $_W['attachurl'];?>",
            'attachurl_local': "<?php  echo $_W['attachurl_local'];?>",
            'attachurl_remote':"<?php  echo $_W['attachurl_remote'];?>",
            'module' : {'url' : "<?php  echo $_W['siteroot'];?>/addons/<?php  echo $_GPC['m'];?>/", 'name' : "<?php  echo $_GPC['m'];?>"},
            'cookie' : "<?php  echo $_W['config']['cookie']['pre'];?>",
            'account' : JSON.parse('<?php  echo json_encode($_W["account"])?>'),
            'server' : {'php' : "<?php  echo phpversion()?>"}
        };
    </script>
    <script>var require = { urlArgs: 'v=20170915' };</script>
    <script type="text/javascript" src="./resource/js/lib/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="./resource/js/lib/bootstrap.min.js"></script>
    <script type="text/javascript" src="./resource/js/app/util.js?v=20170915"></script>
    <script type="text/javascript" src="./resource/js/app/common.min.js?v=20170915"></script>
    <script type="text/javascript" src="./resource/js/require.js?v=20170915"></script>
    <link rel="stylesheet" type="text/css" href="../addons/<?php  echo $_GPC['m']?>/resource/swal/dist/sweetalert2.min.css" />
</head>
<body style="min-width:688px;max-width:688px;width: 688px;background: #fff;font-size: 12px;">
<div class="panel-body" style="font-size: 12px;">
    <div class="ibox-content">
        <form action="<?php  echo url('site/entry/'.$_GPC['do'],array('m'=>$_GPC['m'],'op'=>'service','version_id'=>$_GPC['version_id']));?>" id="searchform" method="post">
            <div class="row" style="padding: 0 15px;">
                <div style="width: 25%;display: inline-block;margin-right: 5px;">
                    <input type="text" class="form-control" placeholder="名字" name="xname" value="<?php  echo $xname;?>">
                </div>
                <div style="width: 25%;display: inline-block;margin-right: 5px;">
                    <button type="submit" class="btn btn-default " style="margin-right:5px;">查询</button>
                </div>
            </div>
        </form>
    </div>
    <form action="" method="post" class="form-horizontal form" style="font-size: 12px;margin-top: 10px;">
        <input type="hidden" name="token" value="<?php  echo $_W['token'];?>">

        <div class="table-responsive panel-body">
            <table class="table-striped table-bordered table-hover dataTables-example table">
                <thead class="navbar-inner">
                <tr>
                    <th>名称</th>
                    <th>排序</th>
                    <th>状态</th>
                    <th style="text-align:right;">操作</th>
                </tr>
                </thead>
                <tbody id="level-list">
                <?php  if(is_array($list)) { foreach($list as $index => $item) { ?>
                <tr>
                    <td><div class="type-parent"><?php  echo $item['name'];?></div></td>
                    <td><div class="type-parent"><?php  echo $item['sort'];?></div></td>
                    <td><div class="type-parent"><?php  echo $item['createtime'];?></div></td>
                    <td style="text-align:right;">
                        <a data-dismiss="modal" class="btn btn-info btn-xs choose" data-id="<?php  echo $item['id'];?>" data-name="<?php  echo $item['name'];?>"><i class="fa fa-check-square-o"></i>绑定</a>
                    </td>
                </tr>
                <?php  } } ?>
                </tbody>
            </table>
            <div style="text-align: right;">
                <?php  echo $pager;?>
            </div>
        </div>
    </form>
</div>
<script>
    require(["../addons/<?php  echo $_GPC['m']?>/resource/swal/dist/sweetalert2.min.js"],function(){
        $(function(){
            $(".choose").click(function(){
                var store=$(this).attr("data-id");
                var name=$(this).attr("data-name");
                $("#shop2",window.parent.document).attr("data-store",store);
                $("#shop2",window.parent.document).attr("data-name",name);
                $("#sort_close",window.parent.document).click();
                $("#shop2",window.parent.document).click();
            });
        })
    })
</script>
</body>
</html>