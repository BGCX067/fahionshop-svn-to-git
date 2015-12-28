<div id="content">
		
<?php echo $this->Form->create('Order');?>
<div class="grid_9">
			<h2 class="dashboard">Chi tiết thư mục</h2>
</div>
	<fieldset>
	<div id="fixed"><img src="<?php echo $this->webroot;?>img/icons/package.gif" width="16" height="16" alt="" /> &nbsp; Chi tiết thư mục <?php echo $category['Category']['name']; ?></div>
		<div id="infor">
		<table width="100%">
        <tbody>
		<tr>
					<td width="120" align="left" class="line_light"><strong>Mã thư mục: </strong></td>
					<td class="line_light"><?php echo $category['Category']['id']; ?></td>
		</tr>
		<tr>
					<td width="120" align="left" class="line_light"><strong>Trạng thái: </strong></td>
					<td class="line_light">
						<?php 
							if($category['Category']['active']=1){
								echo "Đã kích hoạt";
							}
							else {
								echo "Chưa kích hoạt";
							}
						?></td>
		</tr>
		<tr>
					<td width="120" align="left" class="line_light"><strong>Ngày tạo lập: </strong></td>
					<td class="line_light"><?php echo $category['Category']['created']; ?></td>
		</tr>
		  </tbody>
		</table>
		<!--Thông tin chung về thư mục--->
		 <div class="spc"><br/>
		 <td width="120" align="right" class="line_light"><b>&nbsp;Sản phẩm hiện có trong thư mục</b></td><br/><br/>
			<table class="cart">
					<thead>
					<tr>			
						<th align="left">Mã sản phẩm</th>
						<th align="center">Hình  </th>
						<th align="center">Tên</th>			
						<th align="center">Giá</th>
						<th align="center">Giá khuyến mãi</th>
						<th align="center">Số lượng</th>
						<th align="right">Trạng thái</th>		
					</tr>
					</thead>
					<tbody>
						<?php //var_dump($list_products_by_cate_id);
							if ($list_products_by_cate_id!=null){
								foreach ($list_products_by_cate_id as $items){
									$id_product = $items['CategoriesProduct']['product_id'];
									$info_product = $this->requestAction("/products/display/{$id_product}");?>
								
						
							
									<tr>
										<td align="left"><?php echo $info_product['Product']['code']  ;?>&nbsp;</td>
										<td align="left"><img src='<?php echo $this->webroot;?><?php echo $info_product['Product']['detail_image_1']; ?>' width="50px" height="50px"></img></td>
										<td align="left"><?php echo $info_product['Product']['name']  ;?>&nbsp;</td>			
										<td align="left"><?php echo $price->currency($info_product['Product']['price'])  ;?> VNĐ&nbsp;</td>
										<td align="left"><?php echo $price->currency($info_product['Product']['special_price']) ;?> VNĐ&nbsp;</td>
										<td align="center"><?php echo $info_product['Product']['quantity']  ;?>&nbsp; </td>
										<td align="center"><?php if($info_product['Product']['active'] == 1)
										{
											echo 'Đã kích hoạt';
										}
										else
										{
											echo 'Chưa kích hoạt'; 
										}
										
										?> &nbsp;</td>	
									</tr>
									
							<?php	
								}
							
							}

						 ?>
							
							<tr>
								<td colspan="6">Không có sản phẩm nào</td>
							</tr>
							
					</tbody>
			</table>
		</div>
<!--Kết thúc chi tiết sản phẩm--->

	
	</div>
<?php echo $this->Html->link('<span>Quay lại</span>', array('controller'=>$this->params['controller'], 'action'=>'index'), array('class'=>'button', 'escape'=>false));?>

</div>
