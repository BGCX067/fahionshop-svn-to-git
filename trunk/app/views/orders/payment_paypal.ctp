<?php echo $html->css('checkout');?>
<div id="content_paypal">
	<div class="body clearfix" id="miniCartContent" style="height: 510px;">
		
			
								<?php if(isset($step))
											if ($step==1) {
									?>
								<!--tham so--->

		<div id="miniCart">
			<h3>Your order summary</h3>
			<?php if(isset ($set_order_by_id)){
			?>
			<div id="format">
			<table>
				<tr>
				<td><b>Payment Adress</b></td>
				<td>&nbsp;</td>
				<td></td>
				</tr><br>
			
				<tr>
				<td>Name:</td>
				<td>&nbsp;</td>
				<td><?php echo $set_order_by_id['Order']['name'];?></td>
				</tr><br>
				<tr>
				<td>Adress:</td>
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
				
			</table>
			<?php }
			?>
		</div>
			<div class="small head wrap">Descriptions<span class="amount">Amount</span></div>
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
															 <span class="amount"><?php echo $price->currency_usd($special_price*$item['quantity']);?> </span></b></li>
															 <li class="secondary">Item number: <?php echo $product['Product']['code']?></li>
															 <li class="secondary">Item price:<?php echo $price->currency_usd($special_price);?></li>
															 <li class="secondary">Quantity:<?php echo $item['quantity'] ?></li>
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
                                                <li class="small heavy"><b>Item total</b> <span class="amount"><b><?php echo $price->currency_usd($total);?></b></span></li>
                                             
                                                
                                             </ul>
                                          </div>
                                 <div class="small wrap items totals item1">
                                             <ul>
                                              
                                                <li class="heavy highlight finalTotal"><span class="grandTotal amount highlight"><b>Total <?php echo $price->currency_usd($total);?> USD</b></span></li>
                                             </ul>
                                     
											
									
									
								<!--skfjk-->	
									
							
												<form action="" method="post" enctype="multipart/form-data">
												<fieldset>
													<?php e ($form->hidden('currencyCodeType',array('value'=>"USD",'label'=>'Currency')));?>
												
													
													<br/>
													<div id="paypal">
													<input type="image" name="submit" src="https://www.paypal.com/en_US/i/btn/btn_xpressCheckout.gif" />
													</div>
								</fieldset>
									</form>
								</div>

							</div>			
									
							
									<?php 
											}elseif ($step ==3){
									?>
										<br/>
									
									<?php echo __('Thank you for buying our products  <a href ="http://www.fashionshoptn.tk"> fashionshoptn.tk </a>');?>
									<br/>
									If the information below is correct, click <b>Pay</b> button to confirmed your Payment.
									<br/>
									<div id="minicart">
									<table class="api" width=400>
									<?php 
										echo 'First Name: ' . $resArray['FIRSTNAME'] . '<br/>';
										echo 'Last Name: ' . $resArray['LASTNAME'] . '<br/>';
										echo 'Country Code: ' . $resArray['COUNTRYCODE'] . '<br/>';
										echo '------------------------------------' . '<br/>';
										echo 'Ship to Name: ' . $resArray['SHIPTONAME'] . '<br/>';
										echo 'Ship to street: ' . $resArray['SHIPTOSTREET'] . '<br/>';
										echo 'Ship to City: ' . $resArray['SHIPTOCITY'] . '<br/>';
										echo 'Country Code: ' . $resArray['SHIPTOCOUNTRYCODE'] . '<br/>';
										echo 'City: ' . $resArray['SHIPTOCOUNTRYNAME'] . '<br/>';
										echo 'Amount: ' . $resArray['AMT'] . 'USD' . '<br/>';
										
										
										
										
									?>
									</table>
									<form action="" method="post" enctype="multipart/form-data">
										<fieldset>
													<?php e ($form->hidden('dopayment',array('value'=>true))); ?>
												
								<div id="paypal">	<?php e ($form->submit('Pay')); ?> </div>
										</fieldset>
									</form>
								</div>
									<?php 
											}elseif ($step ==4){
									?>
									<table>
											<tr>
											<b>Thank you for your payment! </b></tr> <br>
											<tr>Your order has been processed successfully! You will receive the product within 2-5 business days</tr>
											<br><br>
										
									</table>
									<?php
											}else{
												echo "There is any error, please try again.";
											}//endif
									?>
										<!--hdjfhdj-->
										
										
									
										
																

								
								</div>
                                         
										  <!--fsdgd-->
										 
	
	</div>
  
 
</div>

 