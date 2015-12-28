<div id="content">
<?php echo $this->Form->create('Province');?>
		<div class="grid_9">
			<h2 class="dashboard">Thêm mới tỉnh thành</h2>
		</div>
		
	<fieldset>
	<div id="fixed"><img src="<?php echo $this->webroot;?>img/icons/package.gif" width="16" height="16" alt="" /> Vui lòng nhập đủ dữ liệu cho các mục có đánh dấu &nbsp;<font color="#ff0000">*</font></div>

	<table cellspacing="5" cellpadding="0" border="0" id="payblock" style="display: block;">
	  <tbody>
		  
		  	<tr>
				<td width="120" align="right" class="line_light"><strong>Quốc gia: </strong>&nbsp;<font color="#ff0000">*</font></td>
				<td class="line_light"><?php echo $this->Form->input('country_id');?></td>
		   </tr>
		  	<tr>
				<td width="120" align="right" class="line_light"><strong>Tên tỉnh thành: </strong> &nbsp;<font color="#ff0000">*</font></td>
				<td class="line_light"><?php echo $this->Form->input('name');?></td>
		   </tr>
	</tbody>
	</table>
	 <div id="inputfile"></div>
	</fieldset>
<?php //echo $this->Form->end(__('Submit', true));?>
<?php echo $this->Form->submit('Lưu', array('class'=>'button_submit'));?>
<?php echo $this->Html->link('<span>Quay lại</span>', array('controller'=>$this->params['controller'], 'action'=>'index'), array('class'=>'button', 'escape'=>false));?>
</div>
