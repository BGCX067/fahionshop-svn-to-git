<div id="content">
<?php echo $this->Form->create('Order');?>
<div class="grid_9">
			<h2 class="dashboard">Thông tin đơn hàng chi tiết</h2>
</div>
<?php echo $this->Session->flash();?>
	<fieldset>
		
	<div id="fixed"><img src="<?php echo $this->webroot;?>img/icons/package.gif" width="16" height="16" alt="" /> &nbsp; Chi tiết đơn hàng số  <?php echo $order['Order']['id']; ?></div>
		<div id="infor">
					
		<div class="DH">
		
		
				<table width="100%">
        <tbody>
		<tr>
				<td width="55%" height="55%" valign="top" align="left">
					<Strong>Ngày tạo lập: </strong><?php echo $order['Order']['created']; ?><br/>		
				</td>

				<td width="="45%" height="45%" valign="top" align="right">
			 
					<strong>Mã đơn hàng: </strong><?php echo $order['Order']['id']; ?><br/>			
				</td>	
		</tr>
		<tr><td><br/></td></tr>
		
		<td width="50%" height="50%" valign="top" align="right" ><H2>ĐƠN HÀNG</h2></td>

		<tr> 
		
			  <td width="50%" height="50%" valign="top"><h4>&nbsp;Thông tin người thanh toán</h4><br/>
					<Strong>Họ tên:&nbsp;  </strong><?php echo $order['Order']['name']; ?><br/>
					<Strong>Quốc gia: &nbsp; </strong><?php echo $order['Order']['country']; ?><br/>
					<Strong>Tỉnh/thành phố: &nbsp; </strong> <?php echo $order['Province']['name'];?><br/>
					<Strong>Ðịa chỉ: &nbsp; </strong> <?php echo $order['Order']['address']; ?><br/>
					<Strong>Số điện thoại: &nbsp; </strong><?php echo $order['Order']['phone']; ?><br/>		
					<Strong>Email: &nbsp; </strong><?php echo $order['Order']['email']; ?><br/><br/><br/>		
					<h4> &nbsp;Phương thức thanh toán</h4><br/><?php echo $order['PaymentMethod']['name']; ?>
			 </td>

			  <td width="50%" height="50%" valign="top"><h4>&nbsp;Thông tin người nhận hàng</h4><br/>
			 
					<Strong>Họ tên: &nbsp; </strong><?php echo $order['Order']['re_name']; ?><br/>
					<Strong>Quốc gia: &nbsp; </strong><?php echo $order['Order']['re_country']; ?><br/>
					<Strong>Tỉnh/thành phố:  &nbsp;</strong><?php echo $order['Order']['re_city']; ?><br/>
					<Strong>Ðịa chỉ:&nbsp;  </strong> <?php echo $order['Order']['re_address']; ?><br/>
					<Strong>Số điện thoại: &nbsp; </strong><?php echo $order['Order']['re_phone']; ?><br/><br/><br/><br/>	
					<h4>&nbsp;Phương thức vận chuyển</h4><br/><?php echo $order['ShippingMethod']['name'];?>					
			 </td>
		</tr>
		  </tbody></table>
		  </div>

	<!---Thông tin bảng sp--->
		 <div class="spc"><br/>
	
	
		 <td width="50%" height="50%" valign="top"><h4>&nbsp;&nbsp;&nbsp;Thông tin sản phẩm: </h4></td><br/>
			<table class="cart">
					<thead>
					<tr>			
						<th align="left">Mã sản phẩm</th>
						<th align="center">Hình  </th>
						<th align="center">Tên</th>			
						<th align="center">Đơn giá </th>
						<th align="center">Số lượng </th>
						<th align="right">Thành tiền </th>		
					</tr>
					</thead>
					<tbody>
						<?php 
							if(!empty($list_products_by_order_id)){
								$sum_price = 0;
								foreach($list_products_by_order_id as $set_product){ ?>
									<tr>
										<td align="left"><?php echo $set_product['Product']['code']  ;?>&nbsp;</td>
										<td align="left"><img src='<?php echo $this->webroot;?><?php echo $set_product['Product']['detail_image_1']; ?>' width="50px" height="50px"></img></td>
										<td align="left"><?php echo $set_product['Product']['name']  ;?>&nbsp;</td>		
										<td align="left">
											<?php
												$i = $set_product['LineItem']['price'];
												echo $price->currency($i);
											?>&nbsp;
										</td>
										<td align="center"><?php echo $set_product['LineItem']['quantity']  ;?>&nbsp; </td>
										<td align="center">
											<?php
												$u = $set_product['LineItem']['quantity']*$set_product['LineItem']['price'];
												echo $price->currency($u);
												$sum_price = $sum_price + $u;
												//var_dump($sum_price);
											?>&nbsp;
										</td>	
									</tr>
							<?php }}
							else{ ?>
							<tr>
								<td colspan="6">Không có mặt hàng</td>
							</tr>
							<?php
							}
						?>
					</tbody>
			</table>
			
			<table class="tbsum" width="100%">
					<tr>
							<td width="100%" align="right" class="line_light"><h4>Tổng tiền: </h4></td>
							<td class="line_light"><?php echo $price->currency($sum_price); ?></td><br/>	
					</tr>
					<tr>
							<td width="100%" align="right" class="line_light"><h4>Chi phí vận chuyển:</h4></td>
							<td class="line_light">
								<?php
									$sp = $order['ShippingMethod']['price']; 
									echo $price->currency($sp);
								?>
							</td><br/>	
					</tr>
					<tr>
							<td width="100%" align="right" class="line_light"><h5>Tổng giá trị đơn hàng:</h5></td>
							<td class="line_light">
							<?php
								$s = $sum_price + $sp;
								echo $price->currency($s); 
							?>
							</td><br/>	
					</tr>
			</table>
			
		</div>
<!--Kkết thúc thông tin về sp--->
	</div>
<?php echo $this->Html->link('<span>Quay lại</span>', array('controller'=>$this->params['controller'], 'action'=>'index'), array('class'=>'button', 'escape'=>false));?>

</div>
