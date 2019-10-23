<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('../../../addons/'.MODULE.'/template/web/common/myheader', TEMPLATE_INCLUDEPATH)) : (include template('../../../addons/'.MODULE.'/template/web/common/myheader', TEMPLATE_INCLUDEPATH));?>


	<?php  if($_GPC['op'] == 'add' || $_GPC['op'] == 'edit') { ?>	
		<form method="post" id="add" style="margin-left: 100px">
			<div class="frm_control_group">
				<label for="" class="frm_label"></label>
				<div class="frm_controls">
				</div>
			</div>
			<div class="frm_control_group">
				<label for="" class="frm_label">项目名称</label>
				<div class="frm_controls msg">
					<span class="frm_textarea_box textarea_60px">
						<textarea  name="title" class="frm_textarea" rows="6" placeholder=""><?php  echo $info['name'];?></textarea>
					</span>
				</div>
			</div>
			<div class="frm_control_group">
				<label for="" class="frm_label">项目描述</label>
				<div class="frm_controls msg">
					<span class="frm_textarea_box textarea_60px">
						<textarea  name="desc" class="frm_textarea" rows="6" placeholder=""><?php  echo $info['desc'];?></textarea>
					</span>
				</div>
			</div>
			<div class="frm_control_group">
				<label for="" class="frm_label">预约后提示</label>
				<div class="frm_controls msg">
					<span class="frm_textarea_box textarea_60px">
						<textarea  name="tips" class="frm_textarea" rows="6" placeholder=""><?php  echo $info['tips'];?></textarea>
					</span>
					<p class="frm_tips">这个是在预约订单内的提示内容</p>
				</div>
			</div>			
			<div class="frm_control_group">
				<label for="" class="frm_label">排序序号</label>
				<div class="frm_controls">
					<span class="frm_input_box frm_input_200">
						<input type="text" class="frm_input"  name="number" value="<?php  echo $info['number'];?>">
					</span>
					<p class="frm_tips">填入数字,越大越排前</p>
				</div>
			</div>
			<div class="frm_control_group">
				<label for="" class="frm_label">虚假预约量</label>
				<div class="frm_controls">
					<span class="frm_input_box frm_input_200">
						<input type="text" class="frm_input"  name="num" value="<?php  echo $info['num'];?>">
					</span>
					<p class="frm_tips">填入数字,虚假显示的数量</p>
				</div>
			</div>
			<div class="frm_control_group">
				<label for="" class="frm_label">接收通知手机号</label>
				<div class="frm_controls">
					<span class="frm_input_box frm_input_200">
						<input type="text" class="frm_input"  name="tel" value="<?php  echo $info['tel'];?>">
					</span>
					<p class="frm_tips">您的小程序当前剩余短信量：<font class="font_ff5f27"><?php  echo $auth['sms'];?></font></p>
				</div>
			</div>
			<div class="frm_control_group" >
	  			<label for="" class="frm_label">所属分类</label>
	   			<div class="frm_controls">
		  			<div class="filter_content dropdown_topbar"> 
				   		<div class="dropdown_menu ">
				    		<a href="javascript:;" class="btn dropdown_switch jsDropdownBt width_200">
				    			<label class="jsBtLabel">
				    				<?php  if(is_array($appsort)) { foreach($appsort as $item) { ?>
				    					<?php  if($item['id'] == $info['sortid']) { ?>
				    						<?php  echo $item['name'];?>
				    					<?php  } ?>
				    				<?php  } } ?>
				    			</label>
				    			<i class="arrow"></i>
				    		</a> 
				    		<div class="dropdown_data_container jsDropdownList width_200" > 
					     		<ul class="dropdown_data_list">
					     			<?php  if(is_array($appsort)) { foreach($appsort as $item) { ?>
					      				<li class="dropdown_data_item "> <a href="javascript:;" id="<?php  echo $item['id'];?>" class="select_item"><?php  echo $item['name'];?></a> </li> 
					      			<?php  } } ?>
					    		</ul>
				    		</div> 
				    		<input type="hidden" name="sortid" value="<?php  echo $info['sortid'];?>">
				   		</div>
		  			</div>
	   			</div>
	  		</div>
			<div class="frm_control_group single_img_upload">
				<label for="" class="frm_label">封面图片</label>
				<div class="frm_controls">
					<?php  echo  WebCommon::tpl_form_field_image('thumb',$info['thumb'])?>
					<p class="frm_tips">建议设置正方形图片</p>
				</div>
			</div>
			<div class="frm_control_group single_img_upload">
				<label for="" class="frm_label">轮播图片</label>
				<div class="frm_controls good_images">
					<?php  echo WebCommon::tpl_form_field_multi_image('pic', $info['pic'],'');?>
					<p class="frm_tips">可拖拽图片排序</p>
				</div>
			</div>
			<div class="frm_control_group" >
	  			<label for="" class="frm_label">授权手机号</label>
	   			<div class="frm_controls">
	    			<label class="frm_radio_label " >
	    				<i class="icon_radio"></i>
	    				<span class="lbl_content">不需授权</span>
	    				<input type="radio" name="istel" value="0" class="frm_radio" <?php  if($info['istel'] == 0) { ?>checked="checked"<?php  } ?> />
	    			</label>
	    			<label class="frm_radio_label "  >
	    				<i class="icon_radio"></i>
	    				<span class="lbl_content">必须授权手机号</span>
	    				<input type="radio" name="istel" value="1" class="frm_radio" <?php  if($info['istel'] == 1) { ?>checked="checked"<?php  } ?> /> 
	    			</label>
	    			<p class="frm_tips">如果必须授权，前端会要求会员授权手机号。</p>			
	   			</div>
	  		</div>
			<div class="frm_control_group" >
	  			<label for="" class="frm_label">是否支付</label>
	   			<div class="frm_controls">
	    			<label class="frm_radio_label  hide_item" hideitem=".ispay">
	    				<i class="icon_radio"></i>
	    				<span class="lbl_content">不需支付</span>
	    				<input type="radio" name="ispay" value="0" class="frm_radio" <?php  if($info['ispay'] == 0) { ?>checked="checked"<?php  } ?> />
	    			</label>
	    			<label class="frm_radio_label  show_item"  showitem=".ispay" >
	    				<i class="icon_radio"></i>
	    				<span class="lbl_content">必须支付</span>
	    				<input type="radio" name="ispay" value="1" class="frm_radio" <?php  if($info['ispay'] == 1) { ?>checked="checked"<?php  } ?> /> 
	    			</label>	    			
	   			</div>
	  		</div>

			<div class="frm_control_group hideitem ispay" <?php  if($info['ispay'] == 1) { ?>style="display:block"<?php  } ?>>
				<label for="" class="frm_label">支付金额</label>
				<div class="frm_controls">
					<span class="frm_input_box frm_input_200">
						<input type="text" class="frm_input"  name="price" value="<?php  echo $info['price'];?>">
					</span>
				</div>
			</div>
			<div class="frm_control_group" >
	  			<label for="" class="frm_label">预约时间</label>
	   			<div class="frm_controls">
	    			<label class="frm_radio_label  hide_item" hideitem=".istime">
	    				<i class="icon_radio"></i>
	    				<span class="lbl_content">不设置预约时间</span>
	    				<input type="radio" name="istime" value="0" class="frm_radio" <?php  if($info['istime'] == 0) { ?>checked="checked"<?php  } ?> />
	    			</label>
	    			<label class="frm_radio_label  show_item"  showitem=".istime" >
	    				<i class="icon_radio"></i>
	    				<span class="lbl_content">设置预约时间</span>
	    				<input type="radio" name="istime" value="1" class="frm_radio" <?php  if($info['istime'] == 1) { ?>checked="checked"<?php  } ?> />
	    			</label>
	    			<p class="frm_tips">设置预约时间的作用是，可限制同一时间段内预约的人次</p>
	   			</div>
	  		</div>
	  		<div class="istime hideitem" <?php  if($info['istime'] == 1) { ?>style="display:block"<?php  } ?>>
				<div class="frm_control_group">
					<label for="" class="frm_label">提前预约时间</label>
					<div class="frm_controls">
						<span class="frm_input_box frm_input_200">
							<input type="text" class="frm_input"  name="aheadtime" value="<?php  echo $info['timedata']['aheadtime'];?>">
						</span>
						<p class="frm_tips">填数字，单位/小时。例填12,可预约12小时后的时间段。</p>
					</div>
				</div>
				<div class="frm_control_group">
					<label for="" class="frm_label">显示可选预约的天数</label>
					<div class="frm_controls">
						<span class="frm_input_box frm_input_200">
							<input type="text" class="frm_input"  name="days" value="<?php  echo $info['timedata']['days'];?>">
						</span>
						<p class="frm_tips">填数字，单位/天。例填5，可选择预约5天的时间段</p>
					</div>
				</div>
				<div class="frm_control_group">
					<label for="" class="frm_label">预约时间段人次限制</label>
					<div class="frm_controls">
						<span class="frm_input_box frm_input_200">
							<input type="text" class="frm_input"  name="numlimit" value="<?php  echo $info['timedata']['numlimit'];?>">
						</span>
						<p class="frm_tips">填入数字，填0不限人次。例填1：每个时间段限1人次。</p>
					</div>
				</div>
				<div class="frm_control_group" >
		  			<label for="" class="frm_label">周末限制</label>
		   			<div class="frm_controls">
		    			<label class="frm_radio_label">
		    				<i class="icon_radio"></i>
		    				<span class="lbl_content">周六周日都可预约</span>
		    				<input type="radio" name="weektype" value="0" class="frm_radio" <?php  if($info['timedata']['weektype'] == 0) { ?>checked="checked"<?php  } ?> />
		    			</label>
		    			<label class="frm_radio_label">
		    				<i class="icon_radio"></i>
		    				<span class="lbl_content">周六可预约，周日不可预约</span>
		    				<input type="radio" name="weektype" value="1" class="frm_radio" <?php  if($info['timedata']['weektype'] == 1) { ?>checked="checked"<?php  } ?> />
		    			</label>
		    			<label class="frm_radio_label">
		    				<i class="icon_radio"></i>
		    				<span class="lbl_content">周六不可预约，周日可预约</span>
		    				<input type="radio" name="weektype" value="2" class="frm_radio" <?php  if($info['timedata']['weektype'] == 2) { ?>checked="checked"<?php  } ?> />
		    			</label>		    			
		    			<label class="frm_radio_label">
		    				<i class="icon_radio"></i>
		    				<span class="lbl_content">周六周日都不可预约</span>
		    				<input type="radio" name="weektype" value="3" class="frm_radio" <?php  if($info['timedata']['weektype'] == 3) { ?>checked="checked"<?php  } ?> />
		    			</label>		    			
		   			</div>
		  		</div>
				<div class="frm_control_group" >
		  			<label for="" class="frm_label">预约时间段方式</label>
		   			<div class="frm_controls">
		    			<label class="frm_radio_label  hide_item" hideitem=".timetype">
		    				<i class="icon_radio"></i>
		    				<span class="lbl_content">按日期预约</span>
		    				<input type="radio" name="timetype" value="0" class="frm_radio" <?php  if($info['timedata']['timetype'] == 0) { ?>checked="checked"<?php  } ?> />
		    			</label>
		    			<label class="frm_radio_label  show_item"  showitem=".timetype" >
		    				<i class="icon_radio"></i>
		    				<span class="lbl_content">按日期+小时预约</span>
		    				<input type="radio" name="timetype" value="1" class="frm_radio" <?php  if($info['timedata']['timetype'] == 1) { ?>checked="checked"<?php  } ?> />
		    			</label>
		   			</div>
		  		</div>

				<div class="frm_control_group timetype hideitem" <?php  if($info['timedata']['timetype'] == 1) { ?>style="display:block"<?php  } ?>>
		  			<label for="" class="frm_label">设置时间段</label>
		   			<div class="frm_controls" style="max-width: 550px">
						<div class="rule_append_box">
							<div class="item_cell_box good_rule_body">
								<div class="input_title"></div>
								<div class="input_form item_cell_flex">
									<div class="good_rule_list appointtime_list multi-img-details">
										<?php  if(is_array($info['timedata']['limittime'])) { foreach($info['timedata']['limittime'] as $item) { ?>
										<div class="appointtime_item">
											<span class="frm_input_box frm_input_box_100">
												<input type="text" class="frm_input"  name="ltimesh[]" value="<?php  echo $item['ltimesh'];?>">
											</span>点<span class="frm_input_box frm_input_box_100">
												<input type="text" class="frm_input"  name="ltimesm[]" value="<?php  echo $item['ltimesm'];?>">
											</span>分 - 
											<span class="frm_input_box frm_input_box_100">
												<input type="text" class="frm_input"  name="ltimeh[]" value="<?php  echo $item['ltimeh'];?>">
											</span>点<span class="frm_input_box frm_input_box_100">
												<input type="text" class="frm_input"  name="ltimeem[]" value="<?php  echo $item['ltimeem'];?>">
											</span>分 <a href="javascript:;" class="delete_appointtime">删除</a>
										</div>
										<?php  } } ?>
									</div>
									<div class="add_a_rule_box">
										<a href="javascript:;" class="add_appointtime" >添加一项</a>
										<!-- <div>
											<span class="frm_input_box frm_input_box_50">
												<input type="text" class="frm_input"  name="easys" value="8">
											</span>点-<span class="frm_input_box frm_input_box_50">
												<input type="text" class="frm_input"  name="easye" value="18">
											</span>点,间隔<span class="frm_input_box frm_input_box_50">
												<input type="text" class="frm_input"  name="easystep" value="60">
											</span>分钟<a href="javascript:;"> 一键设置时间段</a>
										</div> -->
									</div>
									
								</div>
							</div>
						</div>
						<p class="frm_tips">填数字，按24小时制算，时间需要从早到晚填写，不要填写重叠时间。<!-- <a href="">填写示例</a> --></p>
		   			</div>
		  		</div>	


	  		</div>

			<div class="frm_control_group" >
	  			<label for="" class="frm_label">状态</label>
	   			<div class="frm_controls">
	    			<label class="frm_radio_label   " >
	    				<i class="icon_radio"></i>
	    				<span class="lbl_content">正常</span>
	    				<input type="radio" name="status" value="0" class="frm_radio" <?php  if($info['status'] == 0) { ?>checked="checked"<?php  } ?> />
	    			</label>
	    			<label class="frm_radio_label  "  >
	    				<i class="icon_radio"></i>
	    				<span class="lbl_content">下架</span>
	    				<input type="radio" name="status" value="1" class="frm_radio" <?php  if($info['status'] == 1) { ?>checked="checked"<?php  } ?> /> 
	    			</label>	    			
	   			</div>
	  		</div>

			<div class="frm_control_group">
	  			<label for="" class="frm_label">预约表单</label>
	   			<div class="frm_controls" style="max-width: 550px">
					<div class="rule_append_box">
						<div class="item_cell_box good_rule_body">
							<div class="input_title"></div>
							<div class="input_form item_cell_flex">
								<div class="good_rule_list appoint_list multi-img-details">

									<!-- <div class="good_rule_item appoint_box_item" ng-repeat="item in rule">
										<div class="appoint_form_item">
											<div>
												名称<span class="frm_input_box frm_input_150">
													<input type="text" class="frm_input"  name="name[]" >
												</span>
												提示文字<span class="frm_input_box frm_input_150">
													<input type="text" class="frm_input"  name="pla[]" >
												</span>	<span class="font_mini">(时间)</span>
												<a href="javascript:;" class="delete_appoint_item">删除</a>	
											</div>
											<div class="appoint_additem">
												<span class="appoint_additem_item">发完全放</span>
											</div>
											<div class="appoint_additem">
												<span class="frm_input_box frm_input_150">
													<input type="text" class="frm_input editvalue_{{item.pro.id}}"  name="editvalue" >
												</span>
												<a href="javascript:;" ng-click="addRuleData(item.pro.id)">添加选项</a>
											</div>
										</div>
									</div> -->
									<?php  if(is_array($info['form'])) { foreach($info['form'] as $item) { ?>
										<div class="good_rule_item appoint_box_item">
											<input type="hidden" name="aid[]" value="<?php  echo $item['id'];?>">
											<input type="hidden" name="type[<?php  echo $item['id'];?>]" value="<?php  echo $item['type'];?>">
											<div class="appoint_form_item">
												<div>
													名称<span class="frm_input_box frm_input_150">
														<input type="text" class="frm_input"  name="name[<?php  echo $item['id'];?>]" value="<?php  echo $item['name'];?>">
													</span>
													<?php  if($item['type'] == 'img') { ?>
													最多图片<span class="frm_input_box frm_input_150">
														<input type="text" class="frm_input"  name="maxnum[<?php  echo $item['id'];?>]" value="<?php  echo $item['maxnum'];?>">
													</span>
													<?php  } else { ?>
														提示文字<span class="frm_input_box frm_input_150">
															<input type="text" class="frm_input"  name="pla[<?php  echo $item['id'];?>]" value="<?php  echo $item['pla'];?>">
														</span>
													<?php  } ?>
													<span class="font_mini">
													( <?php  if($item['type'] == 'input') { ?>输入框
													<?php  } else if($item['type'] == 'text') { ?>多行输入框
													<?php  } else if($item['type'] == 'date') { ?>日期选择器
													<?php  } else if($item['type'] == 'time') { ?>时间选择器
													<?php  } else if($item['type'] == 'city') { ?>省市选择器
													<?php  } else if($item['type'] == 'single') { ?>单项选择器
													<?php  } else if($item['type'] == 'multi') { ?>多项选择器
													<?php  } else if($item['type'] == 'img') { ?>上传图片
													<?php  } ?>)</span>
													<a href="javascript:;" class="delete_appoint_item">删除</a>	
												</div>
												<?php  if($item['type'] == 'single' || $item['type'] == 'multi') { ?>
												<div class="appoint_additem">
													<?php  if(is_array($item['sitem'])) { foreach($item['sitem'] as $in) { ?>
													<span class="appoint_additem_item">
														<?php  echo $in;?>
														<input type="hidden" name="sitem[<?php  echo $item['id'];?>][]" value="<?php  echo $in;?>">
													</span>
													<?php  } } ?>
												</div>
												<div class="appoint_additem">
													<span class="frm_input_box frm_input_150">
														<input type="text" class="frm_input "  name="editvalue" >
													</span>
													<a href="javascript:;" class="add_appoint_item">添加选项</a>
												</div>
												<?php  } ?>
											</div>
										</div>
									<?php  } } ?>
								</div>
								<div class="add_a_rule_box">
									<p class="font_999">添加表单</p>
									<a href="javascript:;" class="add_appoint" type="input">输入框</a>
									<a href="javascript:;" class="add_appoint" type="text">多行输入框</a>
									<a href="javascript:;" class="add_appoint" type="time">时间选择器</a>
									<a href="javascript:;" class="add_appoint" type="city">省市选择器</a>
									<a href="javascript:;" class="add_appoint" type="single">单项选择器</a>
									<a href="javascript:;" class="add_appoint" type="multi">多项选择器</a>
									<a href="javascript:;" class="add_appoint" type="img">上传图片</a>
								</div>
								
							</div>
						</div>
					</div>
	   			</div>
	  		</div>	
			<div class="frm_control_group textarea_item">
				<label for="" class="frm_label">预约详情</label>
				<div class="frm_controls">
					<?php  echo Util::tpl_ueditor('content', htmlspecialchars_decode($info['content']));?>
				</div>
			</div>

			<div class="tool_bar">
				<input type="submit" name="create" class="btn btn_primary" value="保存" >
				<input name="token" type="hidden" value="<?php  echo $_W['token'];?>" />
			</div>
		</form>




<?php  } else if($_GPC['op'] == 'list') { ?>
	
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
	     		<th class="table_cell tl td_col_2">名称</th>
	     		<th class="table_cell tl td_col_1">分类</th>
	     		<th class="table_cell tl td_col_1">被预约</th>
	     		<th class="table_cell tl td_col_1">排序</th>
	     		<th class="table_cell tl td_col_1">状态</th>
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
	    				<?php  if(is_array($appsort)) { foreach($appsort as $in) { ?>
	    					<?php  if($in['id'] == $item['sortid']) { ?>
	    						<?php  echo $in['name'];?>
	    					<?php  } ?>
	    				<?php  } } ?>
		     		</td>     		
		     		<td class="table_cell price tl">
		     			<p class="font_mini">虚假：<?php  echo $item['num'];?></p>
		     			<p class="font_mini">真实：<?php  echo $item['realnum'];?></p>
		     		</td>
		     		<td class="table_cell price tl">
		    			<span class="edit_number">
		    				<input type="text" id="<?php  echo $item['id'];?>" inputname="appointnumber" inputtype="text" value="<?php  echo $item['number'];?>" class="edit_number_input tl">
		    			</span>
		     		</td>	     			
		    		<td class="table_cell count tl">
		    			<?php  if($item['status'] == 0) { ?>
		    				正常
		    			<?php  } else if($item['status'] == 1 ) { ?>
		    				<p class="font_ff5f27">已下架</p>
		    			<?php  } ?>
		    		</td>		    		
				    <td class="table_cell oper last_child tr opclass" style="position: relative;">
				    	<a href="<?php  echo self::pwUrl('appoint','item',array('op'=>'edit','id'=>$item['id']))?>">编辑</a>
				    	<a href="<?php  echo self::pwUrl('appoint','item',array('op'=>'delete','id'=>$item['id']))?>" onclick="return confirm('删除不能恢复，且订单内的商品数据也不显示，确定要删除吗？');">删除</a>
				    	<?php  if($item['status'] == 0) { ?>
				    		<a href="<?php  echo self::pwUrl('appoint','item',array('op'=>'down','id'=>$item['id']))?>" onclick="return confirm('确定要下架吗？');">下架</a>
				    	<?php  } ?>
				    	<?php  if($item['status'] == 1) { ?>
				    		<a href="<?php  echo self::pwUrl('appoint','item',array('op'=>'up','id'=>$item['id']))?>" onclick="return confirm('确定要上架吗？');">上架</a>
				    	<?php  } ?>
				    	<!-- <p class="good_qrcode_box">
				    		<a target="_blank" href="javascript:;" class="show_good_qrcode">绑定操作员</a>
				    		<img src="<?php  echo $item['urlimg'];?>" width="200px" height="200px">
				    	</p> -->
				    	<p>
				    		<a href="javascript:;" class="copy_url" data-href="<?php echo '/zofui_sitetemp/pages/appoint/info?aid='.$item['id']?>">复制路径</a>
				    	</p>
				    </td>
		    	</tr>
		    <?php  } } ?>
	   	</tbody> 
	  	</table>
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
				      			<?php  if(empty( $_GPC['status'] )) { ?>
				      			<li class="dropdown_data_item ">
				      				<input name="downall" class="alldeal_btn" value="批量下架" onclick="return confirm('确定要下架所选吗？');" type="submit">
				      			</li>
				      			<?php  } ?>
				      			<?php  if($_GPC['status'] == 1) { ?>
				      			<li class="dropdown_data_item "> 
				      				<input name="upall" class="alldeal_btn" value="批量上架" onclick="return confirm('确定要上架所选吗？');" type="submit">
				      			</li>
				      			<?php  } ?>
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
		<div class="no_data">没有数据</div>
	<?php  } ?>

<div class="my_model" loadgood style="display: none" ng-app="myyapp" ng-controller="loadgood">
    <div class=" ui-draggable " >
        <div class="dialog">
            <div class="dialog_hd" style="line-height: initial;">
            	<div class="item_cell_box loadsort_top">
            		<div class="loadsort_item {{topid == 1 ? 'loadsort_item_act' : ''}}" ng-click="changetype(1,1)">生鲜日常类</div>
            		<div class="loadsort_item {{topid == 2 ? 'loadsort_item_act' : ''}}" ng-click="changetype(1,2)">外卖餐饮类</div>
            	</div>
                <a href="javascript:;" class="icon16_opr closed pop_closed model_close" >关闭</a>
            </div>
            <div class="dialog_bd info_box item_cell_box" >
                <div class="setlink_l">
                	<li ng-show="topid == 1" class="{{ actid == item.id || ( $index == 0 && !actid ) ? 'setlink_act' : ''}}" ng-repeat="item in gooddata" ng-click="changetype(2,item.id)">{{item.name}}</li>

                	<li ng-show="topid == 2" class="{{ actid == item.id || ( $index == 0 && !actid ) ? 'setlink_act' : ''}}" ng-repeat="item in gooddata1" ng-click="changetype(2,item.id)">{{item.name}}</li>
                </div>
                <div class="setlink_r item_cell_flex" ng-show="topid == 1">
                	
                	<div ng-repeat="item in gooddata" ng-show="actid == item.id || ($index == 0 && !actid)">
                		<div class="item_cell_box setlink_r_item" style="margin-top: 10px;">
                			<div class="model_temp_name">{{item.name}}</div>
                			<div class="setlink_r_box item_cell_flex" style="padding-right: 5px;"></div>
                		</div>
	                	<div class="item_cell_box setlink_r_item">
	                		<div class="setlink_r_box item_cell_flex needdealimg{{item.id}}1" >
	                			
	                			<div class="loadsort_item item_cell_box setlink_r_item" ng-repeat="inn in item.product">
	                				<div>
	                					<img data-src="{{inn.thumb}}" isload="0" width="30px" height="30px">
	                				</div>
	                				<div style="width: 200px; text-align: left;">{{inn.title}}</div>
	                				<div>
							  			<div class="filter_content dropdown_topbar"> 
									   		<div class="dropdown_menu ">
									    		<a href="javascript:;" class="btn dropdown_switch jsDropdownBt width_100">
									    			<label class="jsBtLabel">
									    				选择分类
									    			</label>
									    			<i class="arrow"></i>
									    		</a> 
									    		<div class="dropdown_data_container jsDropdownList width_100" > 
										     		<ul class="dropdown_data_list">
										     			<?php  if(is_array($goodsort)) { foreach($goodsort as $item) { ?>
										     				<?php  if(is_array($item['down'])) { foreach($item['down'] as $in) { ?>
										      				<li class="dropdown_data_item "> <a href="javascript:;" id="<?php  echo $in['id'];?>" class="select_item"><?php  echo $in['name'];?></a> </li> 
										     				<?php  } } ?>
										      			<?php  } } ?>
										    		</ul>
									    		</div> 
									    		<input type="hidden" name="sortid" value="">
									   		</div>
							  			</div>
	                				</div>
	                				<div class="setlink_r_box item_cell_flex " >
					      			 	<label class="frm_checkbox_label" > 
					       					<i class="icon_checkbox"></i> 
					       					<input type="checkbox" name="checkall" class="frm_checkbox" stype="1" oid="{{item.id}}" iid="{{inn.id}}" /> 
					       					选择
					       				</label>
	                				</div>
	                			</div>

	                		</div>
	                	</div>
                	</div>
                </div>
                <div class="setlink_r item_cell_flex" ng-show="topid == 2">
                	
                	<div ng-repeat="item in gooddata1" ng-show="actid == item.id || ($index == 0 && !actid)">
                		<div class="item_cell_box setlink_r_item" style="margin-top: 10px;">
                			<div class="model_temp_name">{{item.name}}</div>
                			<div class="setlink_r_box item_cell_flex" style="padding-right: 5px;"></div>
                		</div>
	                	<div class="item_cell_box setlink_r_item">
	                		<div class="setlink_r_box item_cell_flex needdealimg{{item.id}}2" >
	                			
	                			<div class="loadsort_item item_cell_box setlink_r_item" ng-repeat="inn in item.product">
	                				<div>
	                					<img data-src="{{inn.thumb}}" isload="0" width="30px" height="30px">
	                				</div>
	                				<div style="width: 200px; text-align: left;">{{inn.title}}</div>
	                				<div>
							  			<div class="filter_content dropdown_topbar"> 
									   		<div class="dropdown_menu ">
									    		<a href="javascript:;" class="btn dropdown_switch jsDropdownBt width_100">
									    			<label class="jsBtLabel">
									    				选择分类
									    			</label>
									    			<i class="arrow"></i>
									    		</a> 
									    		<div class="dropdown_data_container jsDropdownList width_100" > 
										     		<ul class="dropdown_data_list">
										     			<?php  if(is_array($goodsort)) { foreach($goodsort as $item) { ?>
										     				<?php  if(is_array($item['down'])) { foreach($item['down'] as $in) { ?>
										      				<li class="dropdown_data_item "> <a href="javascript:;" id="<?php  echo $in['id'];?>" class="select_item"><?php  echo $in['name'];?></a> </li> 
										     				<?php  } } ?>
										      			<?php  } } ?>
										    		</ul>
									    		</div> 
									    		<input type="hidden" name="sortid" value="">
									   		</div>
							  			</div>
	                				</div>
	                				<div class="setlink_r_box item_cell_flex " >
					      			 	<label class="frm_checkbox_label" > 
					       					<i class="icon_checkbox"></i> 
					       					<input type="checkbox" name="checkall" class="frm_checkbox" stype="2" oid="{{item.id}}" iid="{{inn.id}}" /> 
					       					选择
					       				</label>
	                				</div>
	                			</div>

	                		</div>
	                	</div>
                	</div>
                </div>

            </div>
            <div class="dialog_ft">
            	<span class="btn btn_primary btn_input js_btn_p" id="confirm_load">
            		<button type="button" class="js_btn">导入选择的</button>
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
	
	var app = angular.module('myyapp',[]);
	app.controller('loadgood',['$scope',function($scope){

		$scope.topid = 1,
		$scope.actid = null;

		$scope.gooddata = null;
		$scope.gooddata1 = null;

		$('.topbar_jsbtn[js="loadgood"]').click(function(){
			if( !$scope.gooddata ){
				Http('post','json','loadgoodtemp',{},function(data){
					$scope.gooddata = data.obj;
					
					setTimeout(function(){
						$scope.changetype(2,data.obj[0].id);
					},1200);
					

					$scope.$apply();
				},true);
			}
		});



		$scope.changetype = function(type,id){
			if( type == 1 ){
				$scope.topid = id;
				$scope.actid = null;

				// 加载餐饮类
				if( !$scope.gooddata1 ){
					Http('post','json','loadgoodtemp1',{},function(data){
						$scope.gooddata1 = data.obj;

						setTimeout(function(){
							$scope.changetype(2,data.obj[0].id);
						},1200);

						$scope.$apply();
					},true);
				}

			}else if( type == 2 ){
				$scope.actid = id;

				$('.needdealimg'+id+$scope.topid).find('img').each(function(){

					var _this = $(this);
					if( _this.attr('isload') == '0' ){
						_this.attr('src', _this.attr('data-src') ).attr('isload','1');
					}
				})

			}
		}

		$('#confirm_load').click(function(){
			var arr = [];
			
			$('input[name=checkall]:checked').each(function(){
				
				var _this = $(this);
				var type = _this.attr('stype');
				var oid = _this.attr('oid');
				var iid = _this.attr('iid');
				var pid = _this.parents('.loadsort_item').find('input[name=sortid]').val();

				var aaa = $scope.gooddata;
				if( type == 2 ) aaa = $scope.gooddata1;

				var con = true;
			    angular.forEach(aaa,function(m,i){
			       	if(m.id == oid && con){
					    angular.forEach(m.product,function(n,i){
					       	if(n.id == iid && con){
					        	arr.push({type:type,pid:pid,good:n});
					        	con = false;
					        }
					    });
			        }
			    });
				
			});
			
			if( confirm('确定导入吗？') ) {
				Http('post','json','loadgood',{data:arr},function(data){
					webAlert(data.res);
					if(data.status == 200){
						setTimeout(function(){
							location.href = '';
						},500);
					}
				},true);
			}
		});

	}]);

</script>

<?php  } else if($_GPC['op'] == 'gettb') { ?>
	<form>
		
		<div class="frm_control_group">
			<label for="" class="frm_label"></label>
			<div class="frm_controls">
			</div>
		</div>

		<div class="frm_control_group"> 
			<label for="" class="frm_label">商品链接</label> 
			<div class="frm_controls"> 
			<div class="edit_right_list width_750 group_tb_box">
				<span id="add_tb" class="btn btn_primary btn_small edit_right_btn">添加一项</span>
				<div class="edit_right_item">
					链接<span class="frm_input_box frm_input_box_500">
						<input type="text" class="frm_input"  name="tburl" value="">
					</span>
					<a href="javascript:;" class="delete_params">删除</a>
				</div>
			</div>
			</div>
		</div>
		<div class="frm_control_group" >
			<label for="" class="frm_label">存进分类</label>
			<div class="frm_controls">
  			<div class="filter_content dropdown_topbar"> 
		   		<div class="dropdown_menu ">
		    		<a href="javascript:;" class="btn dropdown_switch jsDropdownBt width_200">
		    			<label class="jsBtLabel">
		    				<?php  if(is_array($goodsort)) { foreach($goodsort as $item) { ?>
		    					<?php  if(is_array($item['down'])) { foreach($item['down'] as $in) { ?>
			    					<?php  if($in['id'] == $info['sortid']) { ?>
			    						<?php  echo $in['name'];?>
			    					<?php  } ?>
		    					<?php  } } ?>
		    				<?php  } } ?>
		    			</label>
		    			<i class="arrow"></i>
		    		</a> 
		    		<div class="dropdown_data_container jsDropdownList width_200" > 
			     		<ul class="dropdown_data_list">
			     			<?php  if(is_array($goodsort)) { foreach($goodsort as $item) { ?>
			     				<?php  if(is_array($item['down'])) { foreach($item['down'] as $in) { ?>
			      					<li class="dropdown_data_item "> <a href="javascript:;" id="<?php  echo $in['id'];?>" class="select_item"><?php  echo $in['name'];?></a> </li> 
			      				<?php  } } ?>
			      			<?php  } } ?>
			    		</ul>
		    		</div> 
		    		<input type="hidden" name="sortid" value="<?php  echo $info['sortid'];?>" value="">
		   		</div>
  			</div>
			</div>
		</div>

		<div class="tool_bar">
			<div class="btn btn_primary" id="gettb">采集</div>
		</div>

	</form>

	<?php  } ?>
	
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('../../../addons/'.MODULE.'/template/web/common/myfooter', TEMPLATE_INCLUDEPATH)) : (include template('../../../addons/'.MODULE.'/template/web/common/myfooter', TEMPLATE_INCLUDEPATH));?>
