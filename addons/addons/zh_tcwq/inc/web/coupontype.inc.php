<?php
global $_GPC, $_W;
$GLOBALS['frames'] = $this->getMainMenu();
$list = pdo_getall('zhtc_coupontype',array('uniacid' => $_W['uniacid']),array(),'','num ASC');
if($_GPC['op']=='delete'){
    $res=pdo_delete('zhtc_coupontype',array('id'=>$_GPC['id']));
    if($res){
        message('删除成功',$this->createWebUrl('coupontype',array()),'success');
    }else{
        message('删除失败','','error');
    }
}
if($_GPC['op']=='change'){
	 $res=pdo_update('zhtc_coupontype',array('state'=>$_GPC['state']),array('id'=>$_GPC['id']));
    if($res){
        message('操作成功',$this->createWebUrl('coupontype',array()),'success');
    }else{
        message('操作失败','','error');
    }
}
include $this->template('web/coupontype');