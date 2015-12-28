<div id="content">
<?php echo $this->Form->create('Category');?>
		<div class="grid_9">
			<h2 class="dashboard">Thêm mới thư mục</h2>
		</div>
		
	<fieldset>
	<div id="fixed"><img src="<?php echo $this->webroot;?>img/icons/package.gif" width="16" height="16" alt="" /> Vui lòng nhập đủ dữ liệu cho các mục có đánh dấu &nbsp;<font color="#ff0000">*</font></div>

	<table cellspacing="5" cellpadding="0" border="0" id="payblock" style="display: block;">
		<tbody>
		  <tr>
				<td width="120" align="right" class="line_light"><strong>Thư mục:</strong> </td>
				<td class="line_light"><?php echo $this->Form->input('parent_id',array('options'=>$parentCategories,'empty'=>'__Chon__'));?></td>
		  </tr> 
		  <tr>
				<td width="120" align="right" class="line_light"><strong>Tên: </strong>&nbsp;<font color="#ff0000">*</font></td>
				<td class="line_light"><?php echo $this->Form->input('name');?></td>
		  </tr>
		  	<tr>
				<td width="120" align="right" class="line_light"><strong>Kích hoạt: </strong> </td>
				<td width="120" class="line_light"><?php echo $this->Form->input('active');?></td>
		   </tr>
		  	<tr>
				<td width="120" align="right" class="line_light"><strong>Mô tả: </strong></td>
				<td class="line_light"><?php echo $this->Form->input('descripton');?></td>
		   </tr>	
		</tbody>
	</table>
		<div id="inputfile">
		</div><br/><br/>
	</fieldset>
<?php echo $this->Form->submit('Lưu', array('class'=>'button_submit'));?>

</div>