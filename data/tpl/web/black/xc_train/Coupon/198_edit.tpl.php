<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<style>
    .daterangepicker select.ampmselect, .daterangepicker select.hourselect, .daterangepicker select.minuteselect{
        width: auto;!important;
    }
</style>
<link rel="stylesheet" type="text/css" href="../addons/<?php  echo $_GPC['m']?>/resource/css/style.css?v=1.0.0" />
<link rel="stylesheet" type="text/css" href="../addons/<?php  echo $_GPC['m']?>/resource/swal/dist/sweetalert2.min.css" />
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            优惠券>编辑
        </h3>
    </div>
    <div class="panel-body">
        <form id="sign-form" class="form-horizontal" role="form" method="post" action="<?php  echo url('site/entry/'.$_GPC['do'],array('m'=>$_GPC['m'],'op'=>'savemodel','version_id'=>$_GPC['version_id']));?>" name="submit" style="padding: 20px 0;">
            <div class="form-group">
                <label class="col-sm-2 control-label">优惠价格</label>
                <div class="col-sm-8">
                    <input type="text" placeholder="单位（元）" class="form-control"  name="name" id="name" value="<?php  echo $list['name'];?>">
                    <input type="hidden" name="id" value="<?php  echo $list['id'];?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">满足价格使用</label>
                <div class="col-sm-8">
                    <input type="text" placeholder="单位（元）" class="form-control"  name="condition" id="condition" value="<?php  echo $list['condition'];?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">属性</label>
                <div class="col-sm-8">
                    <label for="istotal" class="checkbox-inline">
                        <input type="checkbox" name="istotal" value="1" id="istotal" <?php  if($list['total']!=-1) { ?>checked<?php  } ?> aria-invalid="false" class="valid">限量
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">有效期</label>
                <div class="col-sm-8">
                    <?php  echo tpl_form_field_daterange('times',$list['times'],true);?>
                </div>
            </div>
            <div class="form-group istotal" style="display: none;">
                <label class="col-sm-2 control-label">总量</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control"  name="total" value="<?php  echo $list['total'];?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">状态</label>
                <div class="col-sm-8">
                    <?php  if($list['status']==1) { ?>
                    <input type="checkbox" checked class="js-switch" value="1" name="status">
                    <?php  } else { ?>
                    <input type="checkbox" class="js-switch" name="status" value="1">
                    <?php  } ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">排序</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control"  name="sort" value="<?php  echo $list['sort'];?>">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="button" name="submit" class="btn btn-default" value="提交">
                    <a class="btn btn-default" href="<?php  echo url('site/entry/'.$_GPC['do'],array('m'=>$_GPC['m']));?>">返回</a>
                    <input id="res" name="res" type="reset" style="display:none;" />
                </div>
            </div>
        </form>
    </div>
</div>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
<script>
    if($("#istotal").is(":checked")){
        $(".istotal").show();
    }
    if($("#islimit").is(":checked")){
        $(".islimit").show();
    }
    $(function(){
        $(".selectpicker").change(function(){
            if($(this).val()==3){
                $(".score").show();
            }else{
                $(".score").hide();
            }
        });
        $("#istotal").change(function(){
            $(".istotal").toggle();
        });
        $("#islimit").change(function(){
            $(".islimit").toggle();
        });
    })
</script>
<script>
    require(["../addons/<?php  echo $_GPC['m']?>/resource/swal/dist/sweetalert2.min.js"],function(){
        $(function(){
            $("input[name='submit']").click(function(){
                var data=$(".form-horizontal").serialize();
                $.ajax({
                    type:"post",
                    url:"<?php  echo url('site/entry/'.$_GPC['do'],array('m'=>$_GPC['m'],'op'=>'savemodel','version_id'=>$_GPC['version_id']));?>",
                    data:data,
                    dataType:'json',
                    success:function(res){
                        if(res.status==1){
                            if($("input[name='id']").val()==""){
                                $("input[name='res']").click();
                                $("body").find(".img-responsive.img-thumbnail").attr("src","");
                            }
                            swal('操作成功!', '操作成功!', 'success');
                        }else{
                            swal('操作失败!', '操作失败!', 'error');
                        }
                    }
                })
            });
        })
    })
</script>