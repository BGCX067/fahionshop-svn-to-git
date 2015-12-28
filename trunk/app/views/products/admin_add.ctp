<div id="content">


<?php echo $this->Form->create('Product',array('type'=>'file'));?>
		<div class="grid_9">
			<h2 class="dashboard">Thêm mới sản phẩm</h2>
		</div>
		
	<fieldset>
	<div id="fixed"><img src="<?php echo $this->webroot;?>img/icons/package.gif" width="16" height="16" alt="" /> Vui lòng nhập đủ dữ liệu cho các mục có đánh dấu &nbsp;<font color="#ff0000">*</font></div>

		<!--<legend><?php// __('Admin Add Product'); ?></legend>-->
		<!--<h1 class="dashboard">Thêm sản phẩm mới</h1>-->
	<table cellspacing="5" cellpadding="0" border="0" id="payblock" style="display: block;">
	  <tbody>
		  <tr>
				<td width="120" align="right" class="line_light"><strong>Nhãn hiệu:</strong> &nbsp;<font color="#ff0000">*</font></td>
				<td class="line_light"><?php echo $this->Form->input('brand_id');?></td>
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
				<td class="line_light"><?php echo $this->Form->input('category',array('options'=>$categories,'empty'=>'--Select--'));?></td>
		   </tr>
		  	<tr>
				<td width="120" align="right" class="line_light"><strong>Hình chính: </strong></td>
				<!--
				<fieldset>
					<div class="input file"><label for="ProductFile">File</label>
					<input type="file" id="ProductFile" value="" name="imageFile">
					</div>
				</fieldset>-->
				
				<td class="line_light"><?php echo $this->Form->input('images',array('type'=>'file'));?></td>
			<!--	echo $this->Form->input('images',array('type'=>'file'))-->
		   </tr>
		  	<tr>
				<td width="120" align="right" class="line_light"><strong>Hình chi tiết 1: </strong> </td>
				<td class="line_light"><?php echo $this->Form->input('detail_image_1',array('type'=>'file'));?></td>
		   </tr>
		  	<tr>
				<td width="120" align="right" class="line_light"><strong>Hình chi tiết 2: </strong></td>
				<td class="line_light"><?php echo $this->Form->input('detail_image_2',array('type'=>'file'));?></td>
		   </tr>
		  	<tr>
				<td width="120" align="right" class="line_light"><strong>Hình chi tiết 3: </strong></td>
				<td class="line_light"><?php echo $this->Form->input('detail_image_3',array('type'=>'file'));?></td>
		   </tr>
		  
	</tbody>
	</table>
	
	
		
	</fieldset>
<?php echo $this->Form->submit('Lưu', array('class'=>'button_submit'));?>

</div>
