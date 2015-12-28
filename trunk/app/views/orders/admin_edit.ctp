<div id="content">
<?php echo $this->Form->create('Order');?>
		<div class="grid_9">
			<h2 class="dashboard">Chỉnh sửa thông tin đơn hàng</h2>
		</div>
	<fieldset>
	<div id="fixed"><img src="<?php echo $this->webroot;?>img/icons/package.gif" width="16" height="16" alt="" /> Chọn trường cần chỉnh sửa thông tin</font></div>
	<div id="infor">
		<table cellspacing="5" cellpadding="0" border="0" id="payblock" style="display: block;">
	  <tbody><tr>
				<td width="120" align="right" class="line_light">Thông tin người gửi:</td>
			  <tr>
					<td width="120" align="right" class="line_light"><strong>Họ tên: </strong></td>
					<td class="line_light">
						<?php 
							echo $this->Form->input('id');
							echo $this->Form->input('name');
						?>
					</td>
			  </tr>
				<tr>
					<td width="120" align="right" class="line_light"><strong>Số điện thoại: </strong> </td>
					<td width="120" class="line_light"><?php echo $this->Form->input('phone'); ?></td>
			   </tr>
				<tr>
					<td width="120" align="right" class="line_light"><strong>Email: </strong></td>
					<td class="line_light"><?php echo $this->Form->input('email');?></td>
			   </tr>			   
			</tr>
			<tr>
			<td width="120" align="right" class="line_light">Thông tin người nhận:</td>
			  <tr>
					<td width="120" align="right" class="line_light"><strong>Họ tên: </strong></td>
					<td class="line_light"><?php echo $this->Form->input('re_name');?></td>
			  </tr>
				<tr>
					<td width="120" align="right" class="line_light"><strong>Số điện thoại: </strong> </td>
					<td width="120" class="line_light"><?php echo $this->Form->input('re_phone'); ?></td>
			   </tr>  
			</tr>	
	</tbody>
	</table>
	</div>
 <div id="inputfile"></div>
	</fieldset>
	<?php echo $this->Form->submit('Lưu', array('class'=>'button_submit'));?>
<?php echo $this->Html->link('<span>Quay lại</span>', array('controller'=>$this->params['controller'], 'action'=>'index'), array('class'=>'button', 'escape'=>false));?>
</div>