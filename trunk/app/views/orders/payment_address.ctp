<script src="<?php echo $this->webroot?>js/jquery.validate.js" type="text/javascript"></script>    
<h1><?php  $this->pageTitle = __('Địa chỉ thanh toán và giao hàng', true); ?></h1>
 <b style="margin-bottom: 10px; display: block;">Địa chỉ thanh toán</b>

<?php echo $this->Form->create('Order', array('id' => 'form_adress', 'action' => 'checkout'));?>
		<?php $infor=$this->Session->read('order_session');
			//var_dump($infor);
		?>
			<fieldset>
					<div id="content_di">
						<table cellspacing="5" cellpadding="0" border="0" id="payblock" style="display: block;">
						
                                  <tbody>
                                      <tr>
                                        <td width="120" align="right" class="line_light"><strong>Họ và tên:</strong> &nbsp;<font color="#ff0000">*</font></td>
                                        <td><?php if(isset($send)){
												echo $this->Form->input('name',array('value'=>$infor['name'],'label'=>'','size'=>'30','class'=>'required lettersonly'));
										}
										else
										{
											echo $this->Form->input('name',array('label'=>'','size'=>'30','class'=>'required lettersonly'));}?>
											
                                          </td>
                                      </tr>
									  <!-- Tham chieu bang Country de truy xuat du lieu-->
                                      <tr>
                                        <td width="120" align="right" class="line_light"><strong>Quốc gia:</strong> &nbsp;<font color="#ff0000">*</font></td>
											
                                        <td>
											 <?php
										  // 2. $options = array('M' => 'Male', 'F' => 'Female');
										  // 3. echo $this->Form->select('gender', $options)
											//4. ?>
											<?php
												$countries = $this->requestAction("/countries/index");
												if(isset($countries)){
													//var_dump($countries);
													$options = array();
													foreach($countries as $country){
														$options[$country['Country']['name']] = $country['Country']['name'];
													}
												}
												echo $this->Form->select('country',$options);
											?>

										</td>
									 </tr>
                                      <tr>
                                        <td width="120" align="right" class="line_light"><strong>Tỉnh/Thành phố:</strong> &nbsp;<font color="#ff0000">*</font></td>
                                        <td><?php if(isset($send)){
											echo $this->Form->input('province_id',array('value'=>$infor['province_id'],'label'=>''));
											}
											else
											{
											echo $this->Form->input('province_id',array('label'=>''));} ?>  </td>
                                        
                                      </tr>
                                      
                                    
                                      <tr>
                                        <td width="120" align="right" class="line_light"><strong>Địa chỉ:</strong> &nbsp;<font color="#ff0000">*</font></td>
                                        <td>
										<table cellspacing="0" cellpadding="0">
										<tr>
										<td> <?php if(isset($send)){
											echo $this->Form->input('address',array('value'=>$infor['address'],'label'=>'','size'=>'30','class'=>'required'));
											}
										else
										{
											echo $this->Form->input('address',array('label'=>'','size'=>'30','class'=>'required'));
										}
										?></td>
										
										
                                         <td align="center"></td>
										 </tr>
										 </table>
										</td>
                                      </tr>

									  <tr>
										<td>&nbsp;</td>
										
									  </tr>

                                      
                                      <tr>
                                        <td width="120" align="right" class="line_light"><strong>Điện thoại:</strong> &nbsp;<font color="#ff0000">*</font></td>
                                        <td><?php if(isset($send)){
											echo $this->Form->input('phone',array('value'=>$infor['phone'],'label'=>'','size'=>'30','class'=>'required number'));
										}
										else
										{
											echo $this->Form->input('phone',array('label'=>'','size'=>'30','class'=>'required number'));}?>
                                          </td>
                                      </tr>

									  <tr>
									  	<td>&nbsp;</td>
										
									  </tr>
									  <tr>
                                        <td width="120" align="right" class="line_light"><strong>Email:</strong> &nbsp;<font color="#ff0000">*</font></td>
                                        <td><?php if(isset($send)){
											echo $this->Form->input('email',array('value'=>$infor['email'],'label'=>'','class'=>'required email'));
										}
										else
										{
											echo $this->Form->input('email',array('label'=>'','class'=>'required email')); }?>  </td>
											
											<td><?php echo $this->Form->hidden('betham5',array('label'=>'')); ?>  </td>
                                        <?php //echo $this->Form->input('re_email',array('label'=>'','size'=>'30','class'=>'required email')); ?> 
                                      </tr>
									 
        
	                       
						 
						</table>
			
									
						</div>
						<!-- dia chi thanh toan giong dia chi giao hang-->
						<div class="order_fpage_text_b_green" >
							<table>
								<tr>
									<td class="order_fpage_text_b_green">
									<!--<input type="checkbox" onclick="bill_as_user()" value="1" name="as_above" id="as_above">
										Địa chỉ giao hàng giống địa chỉ thanh toán-->
										<?php //echo $this->Form->checkbox('is_check',array('onclick'=>'set_data_payment(this.value);','label'=>'')); ?>
									
									</td>
									<!--<td>Địa chỉ giao hàng giống địa chỉ thanh toán</td>-->
								</tr>
							</table>
						</div>
						
							
						<!-- dia chi giao hang-->
						<b style="margin-bottom: 10px; display: block;">Địa chỉ giao hàng</b>
						<div id="content_di">
	
								<table cellspacing="5" cellpadding="0" border="0" id="payblock" style="display: block;">
                                  
                                      <tr>
                                        <td width="120" align="right" class="line_light"><strong>Họ và tên:</strong> &nbsp;<font color="#ff0000">*</font></td>
                                        <td><?php if(isset($send)){
											echo $this->Form->input('re_name',array('value'=>$infor['re_name'],'label'=>'','size'=>'30','class'=>'required lettersonly'));
										}
										else
										{
										echo $this->Form->input('re_name',array('label'=>'','size'=>'30','class'=>'required lettersonly'));}?>
                                          </td>
                                      </tr>
									  <!-- Tham chieu bang Country de truy xuat du lieu-->
                                      <tr>
                                        <td width="120" align="right" class="line_light"><strong>Quốc gia:</strong> &nbsp;<font color="#ff0000">*</font></td>

                                        <td> <?php
												$countries = $this->requestAction("/countries/index");
												if(isset($countries)){
													//var_dump($countries);
													$options = array();
													foreach($countries as $country){
														$options[$country['Country']['name']] = $country['Country']['name'];
													}
												}
												echo $this->Form->select('re_country',$options);
											?></td>
									 </tr>
                                      <tr>
                                        <td width="120" align="right" class="line_light"><strong>Tỉnh/Thành phố:</strong> &nbsp;<font color="#ff0000">*</font></td>
                                        <td><?php
												$provi = $this->requestAction("/provinces/index");
												if(isset($provi)){
													//var_dump($countries);
													$options = array();
													foreach($provi as $pro){
													$options[$pro['Province']['name']] = $pro['Province']['name'];
													}
												}
												
												echo $this->Form->select('re_city',$options);
										?>  </td>
                                        
                                      </tr>
                                      
                                    
                                      <tr>
                                        <td width="120" align="right" class="line_light"><strong>Địa chỉ:</strong> &nbsp;<font color="#ff0000">*</font></td>
                                        <td>
										<table cellspacing="0" cellpadding="0">
										<tr>
										<td> <?php if(isset($send)){
											echo $this->Form->input('re_address',array('value'=>$infor['re_address'],'label'=>'','size'=>'30','class'=>'required'));
										}
										else
										{
											echo $this->Form->input('re_address',array('label'=>'','size'=>'30','class'=>'required'));}?></td>
										
										
                                         <td align="center"></td>
										 </tr>
										 </table>
										</td>
                                      </tr>

									  <tr>
										<td>&nbsp;</td>
										
									  </tr>

                                      
                                      <tr>
                                        <td width="120" align="right" class="line_light"><strong>Điện thoại:</strong> &nbsp;<font color="#ff0000">*</font></td>
                                        <td><?php if(isset($send)){
											echo $this->Form->input('re_phone',array('value'=>$infor['re_phone'],'label'=>'','size'=>'30','class'=>'required number'));
										}
										else
										{
											echo $this->Form->input('re_phone',array('label'=>'','size'=>'30','class'=>'required number'));}?>
                                          </td>
                                      </tr>

									  <tr>
									  	<td>&nbsp;</td>
									</tr>
										
									  <tr>
                                        
										
                                        <?php echo $this->Form->hidden('payment_address',array('value'=>'1')); ?>
                                      </tr>
        
	                       </table>
			</div>	
			<!---submit form-->
			 <div id="content_di">
					<table style="width:100%;">
					  <tbody>
							<tr>
								
									<!-- <td style="text-align:center;width:28%;"><a class="button" href="<?php //echo $this->webroot;?>products/recent" style="-moz-user-select: none; cursor: default;"> <span><span>Tiếp tục mua hàng <strong></strong></span></span>-->
								
								<td style="text-align:left;width:30%;"> <a class="button" href="<?php echo $this->webroot;?>products/shopping_cart">Quay lại </a>
								</td>
								
								<td style="text-align:right;width:30%;"><?php echo $this->Form->end(__('Tiếp tục', true),array('class'=>"button"));?>
								</td>
						
					
						
						  </tr>
						</tbody>
					</table>
			</div>
			
			
		</fieldset>  
		

		</form>	
				
						 					

<script type="text/javascript">
$(document).ready(function(){     
    $("#form_adress").validate();
	
	

jQuery.extend(jQuery.validator.messages, {
    required: "<?php __("Thông tin bắt buộc phải điền.");?>",
    remote: "<?php __("Please fix this field.");?>",
    email: "<?php __("Email bạn nhập không hợp lệ.");?>",
    number: "<?php __("Vui lòng nhập số.");?>",
    
});

jQuery.validator.addMethod("phone", function(phone_number, element) {
    phone_number = phone_number.replace(/\s+/g, ""); 
    return this.optional(element) || phone_number.length > 9 &&
        phone_number.match(/^(1-?)?(\([2-9]\d{2}\)|[2-9]\d{2})-?[2-9]\d{2}-?\d{4}$/);
}, "<?php __("Số điện thoại bạn nhập không hợp lệ.");?>");

jQuery.validator.addMethod("lettersonly", function(value, element) {
    return this.optional(element) || /^[a-z ]+$/i.test(value);
}, "<?php __("Vui lòng nhập ký tự");?>"); 

</script>