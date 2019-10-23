<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('../../../addons/'.MODULE.'/template/web/common/myheader', TEMPLATE_INCLUDEPATH)) : (include template('../../../addons/'.MODULE.'/template/web/common/myheader', TEMPLATE_INCLUDEPATH));?>

<?php  if($op == 'create' || $op == 'edit') { ?>

	
<?php  } else if($op == 'list' || $op == 'class1' || $op == 'class2') { ?>

<div class="tr fr">
	<a href="javascript:;" class="add_form_btn topbar_jsbtn" js="addgoodsort">添加表单</a>
</div>
<?php  if(!empty( $list )) { ?>
  <table class="table" cellspacing="0"> 
   <thead class="thead"> 
    	<tr> 
     		<th class="table_cell title td_col_1"> 
     			<label class="frm_checkbox_label" for="selectAll"> 
     				<i class="icon_checkbox"></i> 
     				<span class="lbl_content">id</span> 
     				<input type="checkbox" class="frm_checkbox" id="selectAll" /> 
     			</label>
     		</th> 
     		<th class="table_cell tl td_col_1">表单名称</th>
     		<th class="table_cell tl td_col_1">表单类型</th> 		
     		<th class="table_cell tl td_col_1">排序序号</th>
     		<th class="table_cell tr td_col_1">操作</th>
    	</tr> 
   </thead> 
   <tbody class="tbody" id="js_goods">
   <form method="post">
	   <?php  if(is_array($list)) { foreach($list as $item) { ?>
	    	<tr> 
	     		<td class="table_cell title"> 
	      			<div class="goods_info">
	      			 	<label class="frm_checkbox_label" > 
	       					<i class="icon_checkbox"></i> 
	       					<input type="checkbox" name="checkall[]" class="frm_checkbox" value="<?php  echo $item['id'];?>" /> 
	       					<?php  echo $item['id'];?>
	       				</label>
	      			</div>
	     		</td>
	     		<td class="table_cell price tl">
	    			<?php  echo $item['name'];?>
	     		</td>
	     		<td class="table_cell price tl">
	    			<?php  if($item['type'] == 0) { ?>
	    				输入框
	    			<?php  } else if($item['type'] == 1) { ?>
	    				多行输入框
	    			<?php  } else if($item['type'] == 2) { ?>
	    				日期选择器
	    			<?php  } else if($item['type'] == 3) { ?>
	    				时间选择器
	    			<?php  } else if($item['type'] == 4) { ?>
	    				省市选择器
	    			<?php  } else if($item['type'] == 5) { ?>
	    				单项选择器
	    			<?php  } else if($item['type'] == 6) { ?>
	    				多项选择器    				
	    			<?php  } ?>
	     		</td>
	     		<td class="table_cell price tl">
	    			<span class="edit_number">
	    				<input type="text" id="<?php  echo $item['id'];?>" inputname="orderformnumber" inputtype="text" value="<?php  echo $item['number'];?>" class="edit_number_input tl">
	    			</span>
	     		</td>
			    <td class="table_cell oper last_child tr opclass" style="position: relative;">
			    	<a  href="javascript:;" class="edit_listitem" id="<?php  echo $item['id'];?>">编辑</a>
			    	<a href="<?php  echo self::pwUrl('shop','orderform',array('op'=>'delete','id'=>$item['id']))?>" onclick="return confirm('删除不能恢复，确定要删除吗？');">删除</a>
			    </td>
	    	</tr>
	    <?php  } } ?>
   	</tbody>
  	</table>
  	<p class="frm_tips">订单表单是在确认订单的时候填写的表单数据功能，当有表单的时候，备注框将不显示</p>
	<div class="bottom_page item_cell_box">
		<div class="dib tl">
     			<label class="frm_checkbox_label" for="selectAll"> 
     				<i class="icon_checkbox"></i> 
     				<span class="lbl_content">全选</span> 
     				<input type="checkbox" class="frm_checkbox" id="selectAll" /> 
     			</label>
  			<div class="filter_content dropdown_topbar"> 
		   		<div class="dropdown_menu ">
		    		<a href="javascript:;" class="btn dropdown_switch jsDropdownBt">
		    			<label class="jsBtLabel">批量操作</label>
		    			<i class="arrow"></i>
		    		</a> 
		    		<div class="dropdown_data_container jsDropdownList" > 
			     		<ul class="dropdown_data_list"> 
			      			<li class="dropdown_data_item "> 
			      				<input name="deleteall" class="alldeal_btn" value="删除所选" onclick="return confirm('确定要删除选择的吗？');" type="submit">
			      			</li>			      			
			    		</ul> 
		    		</div> 
		   		</div>
  			</div>
		</div>
		<div class="tr dib item_cell_flex">
			<?php  echo $pager;?>
		</div>
	</div>
		<input name="token" type="hidden" value="<?php  echo $_W['token'];?>" />
	</form>
<?php  } else { ?>
	<div class="no_data">
		<p>没有找到数据</p>
		<p>订单表单是在确认订单的时候填写的表单数据功能，当有表单的时候，备注框将不显示</p>
	</div>
<?php  } ?>

<div class="my_model" addgoodsort style="display: none;position: relative;z-index: 111">
    <div class=" ui-draggable " >
        <div class="dialog">
            <div class="dialog_hd">
                <a href="javascript:;" class="icon16_opr closed pop_closed model_close" >关闭</a>
            </div>
            <div class="dialog_bd info_box" >
                <form>
					<div class="frm_control_group">
						<label for="" class="frm_label">表单名称</label>
						<div class="frm_controls msg">
							<span class="frm_input_box">
								<input type="text" class="frm_input"  name="name" value="">
							</span>
						</div>
					</div>
					<div class="frm_control_group">
						<label for="" class="frm_label">提示文字</label>
						<div class="frm_controls msg">
							<span class="frm_input_box">
								<input type="text" class="frm_input"  name="pla" value="">
							</span>
						</div>
					</div>					
					<div class="frm_control_group">
						<label for="" class="frm_label">排序序号</label>
						<div class="frm_controls msg">
							<span class="frm_input_box">
								<input type="text" class="frm_input"  name="number" value="">
							</span>
							<p class="frm_tips frm_tips_default">填入数字，越大越前</p>
						</div>
					</div>
					<div class="frm_control_group" >
			  			<label for="" class="frm_label">是否必填</label>
			   			<div class="frm_controls">
			    			<label class="frm_radio_label" >
			    				<i class="icon_radio"></i>
			    				<span class="lbl_content">必填选项</span>
			    				<input type="radio" name="ismust" value="0" class="frm_radio" <?php  if($info['parent'] == 0) { ?>checked="checked"<?php  } ?> />
			    			</label>
			    			<label class="frm_radio_label" >
			    				<i class="icon_radio"></i>
			    				<span class="lbl_content">选填选项</span>
			    				<input type="radio" name="ismust" value="1" class="frm_radio" <?php  if($info['parent'] > 0) { ?>checked="checked"<?php  } ?> />
			    			</label>
			   			</div>
			  		</div>
					<div class="frm_control_group" >
			  			<label for="" class="frm_label">表单类型</label>
			   			<div class="frm_controls">
			    			<label class="frm_radio_label hide_item" hideitem=".formtype">
			    				<i class="icon_radio"></i>
			    				<span class="lbl_content">输入框</span>
			    				<input type="radio" name="type" value="0" class="frm_radio" <?php  if($info['parent'] == 0) { ?>checked="checked"<?php  } ?> />
			    			</label>
			    			<label class="frm_radio_label hide_item" hideitem=".formtype">
			    				<i class="icon_radio"></i>
			    				<span class="lbl_content">多行输入框</span>
			    				<input type="radio" name="type" value="1" class="frm_radio" <?php  if($info['parent'] > 0) { ?>checked="checked"<?php  } ?> /> 
			    			</label>
			    			<label class="frm_radio_label hide_item" hideitem=".formtype">
			    				<i class="icon_radio"></i>
			    				<span class="lbl_content">日期选择器</span>
			    				<input type="radio" name="type" value="2" class="frm_radio" <?php  if($info['parent'] > 0) { ?>checked="checked"<?php  } ?> /> 
			    			</label>
			    			<label class="frm_radio_label hide_item" hideitem=".formtype">
			    				<i class="icon_radio"></i>
			    				<span class="lbl_content">时间选择器</span>
			    				<input type="radio" name="type" value="3" class="frm_radio" <?php  if($info['parent'] > 0) { ?>checked="checked"<?php  } ?> /> 
			    			</label>
			    			<label class="frm_radio_label hide_item" hideitem=".formtype">
			    				<i class="icon_radio"></i>
			    				<span class="lbl_content">省市选择器</span>
			    				<input type="radio" name="type" value="4" class="frm_radio" <?php  if($info['parent'] > 0) { ?>checked="checked"<?php  } ?> /> 
			    			</label>
			    			<label class="frm_radio_label show_item" showitem=".formtype">
			    				<i class="icon_radio"></i>
			    				<span class="lbl_content">单项选择器</span>
			    				<input type="radio" name="type" value="5" class="frm_radio" <?php  if($info['parent'] > 0) { ?>checked="checked"<?php  } ?> /> 
			    			</label>
			    			<label class="frm_radio_label show_item" showitem=".formtype">
			    				<i class="icon_radio"></i>
			    				<span class="lbl_content">多项选择器</span>
			    				<input type="radio" name="type" value="6" class="frm_radio" <?php  if($info['parent'] > 0) { ?>checked="checked"<?php  } ?> />
			    			</label>
			   			</div>
			  		</div>

					<div class="frm_control_group formtype hideitem"> 
			  			<label for="" class="frm_label">选择项</label> 
			   			<div class="frm_controls"> 
							<div class="edit_right_list width_500 group_formorder_box">
								<span id="add_select" class="btn btn_primary btn_small edit_right_btn">添加一项</span>
								<div class="edit_right_item">
									选项名称<span class="frm_input_box frm_input_box_300">
										<input type="text" class="frm_input"  name="formname" value="">
									</span>
									<a href="javascript:;" class="delete_params">删除</a>
								</div>
							</div>
			   			</div>
			  		</div>

                </form>
            </div>
            <div class="dialog_ft">
                <span class="btn btn_primary btn_input js_btn_p" id="confirm_addform" >
                    <button type="button" class="js_btn">保存</button>
                </span>
                <span class="btn btn_default btn_input js_btn_p model_close" >
                    <button type="button" class="js_btn">取消</button>
                </span>
            </div>
        </div>
    </div>
    <div class="mask ui-draggable" style="display: block;"></div>
</div>


<script type="text/javascript">
	$(function(){

		var fid = 0;
		$('.edit_listitem').click(function(){
			var nowfid = $(this).attr('id');
			Http('post','json','findorderform',{fid:nowfid},function(data){
				if(data.status == 200){
					fid = nowfid; // 防止取消后再添加异常
					$('input[name=name]').val(data.obj.name);
					$('input[name=number]').val(data.obj.number);
					$('input[name=pla]').val(data.obj.pla);
					
					var act = $('input[name="type"][value="'+data.obj.type+'"]');
					act.prop('checked',true).parents('.frm_controls').find('.frm_radio_label').removeClass('selected');
					act.parent().addClass('selected');

					var act = $('input[name="ismust"][value="'+data.obj.ismust+'"]');
					act.prop('checked',true).parents('.frm_controls').find('.frm_radio_label').removeClass('selected');
					act.parent().addClass('selected');

					if( data.obj.type == 5 || data.obj.type == 6 ){
					
						$('.edit_right_item').remove();
						var str = '';
						for (var i = 0; i < data.obj.sitem.length; i++) {
							str += '<div class="edit_right_item">'
											+'选项名称<span class="frm_input_box frm_input_box_300">'
												+'<input type="text" class="frm_input"  name="formname" value="'+data.obj.sitem[i]+'">'
											+'</span>'
											+'<a href="javascript:;" class="delete_params"> 删除</a>'
										+'</div>';
						}
						$('.group_formorder_box').append( str );
						$('.formtype').show();
					}else{
						$('.formtype').hide();
					}

					$('.my_model[addgoodsort]').show();

				}else{
					webAlert(data.res);
				}
			},true);
		});
		
		$('#confirm_addform').click(function(){
			var postdata = {
				fid : fid,
				name : $('input[name=name]').val(),
				number : $('input[name=number]').val(),
				type : $('input[name=type]:checked').val()*1,
				ismust : $('input[name=ismust]:checked').val()*1,
				pla : $('input[name=pla]').val(),
				plug : 0,
			};

			var arr = [];
			$('input[name=formname]').each(function(){
				arr.push( $(this).val() );
			});
			postdata.arr = arr;

			Http('post','json','addorderform',postdata,function(data){
				if(data.status == 200){
					webAlert(data.res);
					setTimeout(function(){
						location.href = '';
					},500);
				}else{
					webAlert(data.res);
				}
			},true);

		});
		$('.topbar_jsbtn').click(function(){
			fid = 0;
		});

		$('#add_select').click(function(){
			var str = '<div class="edit_right_item">'
							+'选项名称<span class="frm_input_box frm_input_box_300">'
								+'<input type="text" class="frm_input"  name="formname" value="">'
							+'</span>'
							+'<a href="javascript:;" class="delete_params"> 删除</a>'
						+'</div>';
			$(this).parent().append( str );
		});

	});
</script>

<?php  } ?>
	
	
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('../../../addons/'.MODULE.'/template/web/common/myfooter', TEMPLATE_INCLUDEPATH)) : (include template('../../../addons/'.MODULE.'/template/web/common/myfooter', TEMPLATE_INCLUDEPATH));?>