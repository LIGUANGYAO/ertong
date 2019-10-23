<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/header', TEMPLATE_INCLUDEPATH)) : (include template('public/header', TEMPLATE_INCLUDEPATH));?>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/comhead', TEMPLATE_INCLUDEPATH)) : (include template('public/comhead', TEMPLATE_INCLUDEPATH));?>

<link rel="stylesheet" type="text/css" href="../addons/zh_cjdianc/template/public/ygcsslist.css">

<style type="text/css">

    .yg5_key>div{float: left;line-height: 34px;}

    .store_td1{height: 45px;}

    .store_list_img{width: 60px;height: 60px;}

    .yg5_tabel{border-color: #e5e5e5;outline: 1px solid #e5e5e5;}

    .yg5_tr2>td{padding: 10px 15px;border: 1px solid #e5e5e5;text-align: center;}

    .yg5_tr1>td{

        border: 1px solid #e5e5e5;

        padding-left: 15px;

        background-color: #FAFAFA;

        font-weight: bold;

        text-align: center;

    }

    .yg5_btn{background-color: #EEEEEE;color: #333;border: 1px solid #E4E4E4;border-radius: 6px;width: 100px;height: 34px;}

</style>

<ul class="nav nav-tabs">    
    <li class="active"><a href="<?php  echo $this->createWebUrl('rzqx')?>">入驻期限</a></li>
    <li><a href="<?php  echo $this->createWebUrl('addrzqx')?>">添加入驻期限</a></li>
</ul>
<div class="main">
    <!-- 门店列表部分开始 -->
     <div class="panel panel-default">
            <div class="panel-heading">
               入驻期限设置
            </div>
            <div class="panel-body" style="padding: 0px 15px;">
                <div class="row">
                    <table class="yg5_tabel col-md-12">

                        <tr class="yg5_tr1">

                            <td class="store_td1 col-md-1">排序</td>

                            <td class="col-md-2">天数</td>

                            <td class="col-md-2">价格</td>

                            <td class="col-md-3">操作</td>

                        </tr>

                        <?php  if(is_array($list)) { foreach($list as $row) { ?>

                        <tr class="yg5_tr2">

                            <td><div><?php  echo $row['num'];?></div></td>

                            <td>

                            <?php  echo $row['days'];?>             

                            </td>

                            <td><?php  echo $row['money'];?></td>

                            <td>
                             <a href="<?php  echo $this->createWebUrl('addrzqx', array('id' => $row['id']))?>" class="storespan btn btn-xs">
                                <span class="fa fa-pencil"></span>
                                <span class="bianji">编辑<span class="arrowdown"></span>
                                </span>
                            
                            </a>
                            <a href="javascript:void(0);" class="storespan btn btn-xs" data-toggle="modal" data-target="#myModal<?php  echo $row['id'];?>">
                                <span class="fa fa-trash-o"></span>
                                <span class="bianji">删除<span class="arrowdown"></span>
                                </span>
                            </a>

                            </td>

                        </tr>

                         <div class="modal fade" id="myModal<?php  echo $row['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

                      <div class="modal-dialog" role="document">

                        <div class="modal-content">

                          <div class="modal-header">

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                            <h4 class="modal-title" id="myModalLabel" style="font-size: 20px;">提示</h4>

                        </div>

                        <div class="modal-body" style="font-size: 20px">

                            确定删除么？

                        </div>

                        <div class="modal-footer">

                        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>

                            <a href="<?php  echo $this->createWebUrl('rzqx', array('id' => $row['id']))?>" type="button" class="btn btn-info" >确定</a>

                        </div>

                    </div>

                </div>

            </div>

                        <?php  } } ?>

                    <?php  if(empty($list)) { ?>

                    <tr class="yg5_tr2">

                        <td colspan="7">

                          暂无入驻期限

                        </td>

                    </tr>             

                    <?php  } ?>

                </table>

            </div>

        </form>

    </div>

    <?php  echo $pager;?>

</div>

<script type="text/javascript">

    $(function(){

        $("#frame-0").show();

        $("#yframe-0").addClass("wyactive");

    })

</script>