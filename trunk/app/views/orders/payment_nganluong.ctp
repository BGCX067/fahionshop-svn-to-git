<?php echo $html->css('checkout');?>
<div id="content_paypal">
	<div id="miniCart">
				<h3>Thông tin đơn hàng</h3>
				<?php if(isset ($set_order_by_id)){
			?>
			<div id="format">
			<table>
				<tr>
				<td><b>Địa chỉ thanh toán</b></td>
				<td>&nbsp;</td>
				<td></td>
				</tr><br>
			
				<tr>
				<td>Họ tên:</td>
				<td>&nbsp;</td>
				<td><?php echo $set_order_by_id['Order']['name'];?></td>
				</tr><br>
				<tr>
				<td>Địa chỉ:</td>
				<td>&nbsp;</td>
				<td><?php echo $set_order_by_id['Order']['address'];?></td>
				</tr><br>
				<tr>
				<td>Email:</td>
				<td>&nbsp;</td>
				<td><?php echo $set_order_by_id['Order']['email'];?></td>
				</tr><br>
				<tr>
				<td>Phone:</td>
				<td>&nbsp;</td>
				<td><?php echo $set_order_by_id['Order']['phone'];?></td>
				</tr><br>
				<?php $ship = $this->requestAction("/shipping_methods/view/{$set_order_by_id['Order']['shipping_method_id']}");
					
					$fee_ship= $ship['ShippingMethod']['price'];
					//var_dump($fee_ship);
					//die();
				?>
				
			</table>
			<?php }
			?>
			</div>
			<div class="small head wrap">Mô tả<span class="amount">Số lượng</span></div>
				<ol class="small wrap items limit">
							<li class="seller1">
                                                <ul>
                                                   <li class="itmdet" id="multiitem1">
												   <!--doc session-->
													<?php  $curItem = $this->Session->read('items');
														$total = 0;
														if(isset($curItem)){
															foreach($curItem as $item):
																$product = $this->requestAction("/products/show/{$item['id']}");
																if(($product['Product']['special_price'])>0){
																$total = $total + $item['quantity']*$product['Product']['special_price'];
																}
																else{
																$total = $total + $item['quantity']*$product['Product']['price'];
																}
																if($item['quantity'] > 0){
															?>
															<ul class="item1">
														  <!--kiem tra gia dac biet-->
														  <?php 
														  $special_price=0;
														  if(($product['Product']['special_price'])>0){
															 $special_price = $product['Product']['special_price'];}
															 else {
															 $special_price =  $product['Product']['price'];}
														?>
														  
														  
															 <li class="dark"><b><span class="accessAid"><?php echo $product['Product']['name']?></span> 
															 <span class="amount"><?php echo $price->currency($special_price*$item['quantity']);?> </span></b></li>
															 <li class="secondary">Mã sản phẩm: <?php echo $product['Product']['code']?></li>
															 <li class="secondary">Giá:<?php echo $price->currency($special_price);?></li>
															 <li class="secondary">Số lượng:<?php echo $item['quantity'] ?></li>
														  </ul>
                                                    <?php
													}													
                                                    endforeach;
													}?>
													  
                                                      
                                                   </li>
                                                </ul>
												
						 </li>
				</ol>
				
				<div class="wrap items totals item1">
					 <ul>
						<li class="small heavy"><b>Tổng hàng</b> <span class="amount"><b><?php echo $price->currency($total);?></b></span></li>
					 
						
					 </ul>
				 </div>
				 <div class="wrap items totals item1">
					  <ul>
						<li class="small heavy"><b>Phí vận chuyển</b> <span class="amount"><b><?php echo $price->currency($fee_ship);?></b></span></li>
					 
						
					 </ul>
				</div>
				
				
				 <div class="small wrap items totals item1">
					<ul>
                                              
                     <li class="heavy highlight finalTotal"><span class="grandTotal amount highlight"><b>Tổng:  <?php echo $price->currency($total+$fee_ship);?> </b></span></li>
                    </ul>
                                     
				
					
					
					<form method="post" action="https://www.nganluong.vn/advance_payment.php">
					<fieldset>
					<input type=hidden name=receiver value="duongthitham.88@gmail.com" />
					<input type=hidden name=product value="<?php echo $set_order_by_id['Order']['id'];?>" />
					<input type=hidden name=price value="<?php echo $price->currency($total+$fee_ship);?>" />
					<input type=hidden name=return_url value="<?php echo $returnURL ?>" />
					<input type=hidden name=comments value="thich gi thi ghi vao day" />
					<div id="paypal">
					<input type=image src="https://www.nganluong.vn/data/images/buttons/11.gif" />
					</div>
					</fieldset>
					</form> 
                                     
				</div>							
									
									
									
							
												
								
									
		
		
	</div>
</div>