<div id="content">
<?php echo $this->Form->create('Product',array('type'=>'file'));?>
		<div class="grid_9">
			<h2 class="dashboard">Chỉnh sửa thông tin sản phẩm</h2>
		</div>
		
	<fieldset>
	<div id="fixed"><img src="<?php echo $this->webroot;?>img/icons/package.gif" width="16" height="16" alt="" /> Chọn trường cần chỉnh sửa thông tin</font></div>
	<div>
	<table cellspacing="5" cellpadding="0" border="0" id="payblock" style="display: block;">
	  <tbody>
		  <tr>
				<td width="120" align="right" class="line_light"><strong>Nhãn hiệu:</strong> &nbsp;<font color="#ff0000">*</font></td>
				<td class="line_light">
					<?php
						echo $this->Form->input('id');
						echo $this->Form->input('brand_id');
					?>
				</td>
		  </tr> 
		  <tr>
				<td width="120" align="right" class="line_light"><strong>Kích hoạt: </strong></td>
				<td class="line_light"><?php echo $this->Form->input('active',array('label'=>'','size'=>'1'));?></td>
		  </tr>
		  	<tr>
				<td width="120" align="right" class="line_light"><strong>Mã sản phẩm: </strong> &nbsp;<font color="#ff0000">*</font></td>
				<td width="120" class="line_light"><?php echo $this->Form->input('code');?></td>
		   </tr>
		  	<tr>
				<td width="120" align="right" class="line_light"><strong>Tên: </strong> &nbsp;<font color="#ff0000">*</font></td>
				<td class="line_light"><?php echo $this->Form->input('name');?></td>
		   </tr>	
		  	<tr>
				<td width="120" align="right" class="line_light"><strong>Giá: </strong> &nbsp;<font color="#ff0000">*</font></td>
				<td class="line_light"><?php echo $this->Form->input('price',array('label'=>'','size'=>'0'));?></td>
		   </tr>
		  	<tr>
				<td width="120" align="right" class="line_light"><strong>Giá đặc biệt: </strong> </td>
				<td class="line_light"><?php echo $this->Form->input('special_price');?></td>
		   </tr>
		  	<tr>
				<td width="120" align="right" class="line_light"><strong>Số lượng: </strong> &nbsp;<font color="#ff0000">*</font></td>
				<td class="line_light"><?php echo $this->Form->input('quantity');?></td>
		   </tr>
		  	<tr>
				<td width="120" align="right" class="line_light"><strong>Mô tả: </strong></td>
				<td class="line_light"><?php echo $this->Form->input('description');?></td>
		   </tr>
		  	<tr>
				<td width="120" align="right" class="line_light"><strong>Thuộc thư mục </strong> &nbsp;<font color="#ff0000">*</font></td>
				<td class="line_light"><?php echo $this->Form->input('cates',array('options'=>$categories,'empty'=>'__Chon__'));?></td>
		   </tr>
		   	<tr>
				<td width="120" align="right" class="line_light"><strong>Thay đổi hình chính </strong> &nbsp;<font color="#ff0000">*</font></td>
				<td class="line_light"><?php echo $this->Form->input('images_new',array('type'=>'file'));?></td>
		   </tr>
		    
		  	<tr>
				<td width="120" align="right" class="line_light"><strong>Hình chi tiết 1: </strong> </td>
				<td class="line_light"><?php echo $this->Form->input('detail_image_1_new',array('type'=>'file'));?></td>
		   </tr>
		    	<tr>
				<td width="120" align="right" class="line_light"><strong>Hình chi tiết 2: </strong></td>
				<td class="line_light"><?php echo $this->Form->input('detail_image_2_new',array('type'=>'file'));?></td>
		   </tr>
		   	<tr>
				<td width="120" align="right" class="line_light"><strong>Hình chi tiết 3: </strong></td>
				<td class="line_light"><?php echo $this->Form->input('detail_image_3_new',array('type'=>'file'));?></td>
		   </tr>
		   
	</tbody>
	</table>
  <div id="inputfile"></div>
	</fieldset>
<?php echo $this->Form->submit('Lưu', array('class'=>'button_submit'));?>
<?php echo $this->Html->link('<span>Quay lại</span>', array('controller'=>$this->params['controller'], 'action'=>'index'), array('class'=>'button', 'escape'=>false));?>
</div>
