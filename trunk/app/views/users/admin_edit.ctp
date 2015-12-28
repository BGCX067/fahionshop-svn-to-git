<div id="content">
<?php echo $this->Form->create('User');?>
		<div class="grid_9">
			<h2 class="dashboard">Thông tin người dùng</h2>
		</div>
		
	<fieldset>
	<div id="fixed"><img src="<?php echo $this->webroot;?>img/icons/package.gif" width="16" height="16" alt="" /> Thông tin  người dùng</font></div>
	<div>
	<table cellspacing="5" cellpadding="0" border="0" id="payblock" style="display: block;">
	  <tbody>
		  <tr>
				<td width="120" align="right" class="line_light"><strong>Quyền:</strong></td>
				<td class="line_light"><?php echo $this->Form->input('name');?></td>
		  </tr> 
		  	<tr>
				<td width="120" align="right" class="line_light"><strong>Tên đăng nhập: </strong></td>
				<td class="line_light"><?php echo $this->Form->input('username');?></td>
		   </tr>
		  	<tr>
				<td width="120" align="right" class="line_light"><strong>Mật khẩu: </strong> &nbsp;<font color="#ff0000">*</font></td>
				<td class="line_light"><?php echo $this->Form->input('password'); ?></td>
		   </tr>
		   	<tr>
				<td width="120" align="right" class="line_light"><strong>E-mail: </strong> &nbsp;<font color="#ff0000">*</font></td>
				<td class="line_light"><?php echo $this->Form->input('email'); ?></td>
		   </tr>		   	
		   <tr>
				<td width="120" align="right" class="line_light"><strong>Name: </strong> &nbsp;<font color="#ff0000">*</font></td>
				<td class="line_light"><?php echo $this->Form->input('name'); ?></td>
		   </tr>
		   	<tr>
				<td width="120" align="right" class="line_light"><strong>Số điện thoại: </strong> &nbsp;<font color="#ff0000">*</font></td>
				<td class="line_light"><?php echo $this->Form->input('telephone');?></td>
		   </tr>
		   
	</tbody>
	</table>
  <div id="inputfile"></div>
	</fieldset>
<?php echo $this->Form->submit('Lưu', array('class'=>'button_submit'));?>
</div>
