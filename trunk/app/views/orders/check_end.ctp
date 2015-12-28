<h1><?php $this->pageTitle = __('Xác nhận thanh toán', true); ?></h1>
<div class="middle">
			<?php
			$oo = $this->Session->read('order_session');
			//var_dump($oo);
			//die();
			//
			//echo $oo['name']
			if(isset($address_payment)){
			?>
     <div id="content">
      <table width="100%">
        <tbody><tr> 
		
          <td width="50%" height="50%" valign="top"> <b>Địa chỉ thanh toán</b><br>
            <Strong>Họ tên: </strong><?php $address_payment['Order']['name'] ;?><br>
			<Strong>Địa chỉ: </strong> <?php echo $address_payment['Order']['address'];?><br>
			<Strong>Quốc gia: </strong>  <?php echo $address_payment['Order']['country'];?><br>
			<Strong>Tỉnh/Thành phố: </strong>  
			<?php 
			$hh= $this->requestAction("/provinces/view/{$address_payment['Order']['province_id']}");
			
			echo $hh['Province']['name'];
		
			?><br>
			<Strong>Số điện thoại: </strong><?php echo $address_payment['Order']['phone'];?><br>
			<Strong>Email: </strong><?php echo $address_payment['Order']['email'];?><br><br/>
           	<a href="<?php echo $this->webroot;?>/orders/payment_address/resend:true" class="button"><span>Thay đổi</span></a><br><br/><br/>
			
			   <b>Phương thức thanh toán</b><br>
			  <?php
			  $checkout = $this->requestAction("/payment_methods/view/{$address_payment['Order']['payment_method_id']}");
			  //var_dump($checkout); 
			  echo  $checkout['PaymentMethod']['name'];?>
				<br><br/>
				<a href="<?php echo $this->webroot;?>/orders/checkout/sent:true" class="button"><span>Thay đổi</span></a>
			
		 </td>

          <td width="50%" height="50%" valign="top"><b>Địa chỉ giao hàng</b><br>
           <Strong>Họ tên: </strong> <?php echo $address_payment['Order']['re_name'];?><br>
		   <Strong>Địa chỉ: </strong> <?php echo $address_payment['Order']['re_address'];?><br>
		   <Strong>Quốc gia: </strong><?php echo $address_payment['Order']['re_country'];?><br>
		   <Strong>Quốc gia: </strong><?php echo $address_payment['Order']['re_city'];?><br>
			<Strong>Số điện thoại: </strong> <?php echo $address_payment['Order']['re_phone'];?><br>
			<br><br>
           <a href="<?php echo $this->webroot;?>/orders/payment_address/resend:true"class="button"><span>Thay đổi</span></a><br><br/><br/>
			
			<?php
			  $check = $this->requestAction("/shipping_methods/view/{$address_payment['Order']['shipping_method_id']}");
			  //var_dump($checkout); 
			  
			  //echo  $checkout['PaymentMethod']['name'];?>
				<b>Phương thức vận chuyển</b><br>
				<?php echo $check['ShippingMethod']['name'];?><br><br/>
				<a href="<?php echo $this->webroot;?>/orders/checkout/sent:true" class="button"><span>Thay đổi</span></a>
          </td>
			

			
			<?php 
			}
			?>
        </tr>
      </tbody></table>
    </div>

	<div class="spc">
    
			<table class="cart">
				<thead>
				<tr>
				 <!-- <th align="center">Loại bỏ</th>-->
				  <th align="center">Hình </th>
				  <th align="center">Tên</th>
				  <th align="center">Model</th>
				  
				  <th align="center">Đơn giá</th>
				  <th align="right">Số lượng</th>
				  <th align="right">Thành tiền</th>
				 <!--<th align="right">T?ng</th>-->
				</tr>
				</thead>
				<?php $curItem = $this->Session->read('items');
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
				<tr class="even">
				 <!-- <td align="center">
				   <?php// echo $this->Form->checkbox("remove{$item['id']}", array('hiddenField' => false)); ?>
				 </td>-->
				  <td align="center"><img src='<?php echo $this->webroot;?><?php echo $product['Product']['detail_image_1']; ?>' width="50px" height="50px"></img></td>
				  <td valign="top" align="center"><?php echo $product['Product']['name'];?></td>
				  <td valign="top" align="center"><?php echo $product['Product']['code'];?></td>
				  <td valign="top" align="center"><?php echo $price->format($product);?></td>
				   
				   
				  <td valign="top" align="center">
				  <?php echo $this->Form->input("{$item['id']}",array('value'=>$item['quantity'],'label'=>'','style'=>'width: 30px;'));?>
				  </td>       
				  <td valign="top" align="right">
				  <?php
								$amount=0;
								if(($product['Product']['special_price'])>0){
								$amount =  $item['quantity']*$product['Product']['special_price'];
								}
								else{
								$amount = $item['quantity']*$product['Product']['price'];
								}
								 echo $price->currency($amount); 
					  ?>
				  </td>
			  
			  <?php
			  }
				endforeach;
				echo $this->Form->hidden('action',array('value'=>'update'));
				}?>
			</tr>			
              
		 </table>
				<div style="width: 100%; display: inline-block;">
					<table style="float: right; display: inline-block;">
						<tbody><tr>
						<td align="right"><b>Tạm tính: </b></td>
						<td align="right"><b style="color:black"><?php echo $price->currency($total);?></b></td>
					  </tr>
					  <tr>
						<td align="right"><b>Giao hàng tính phí theo khu vực: </b></td>
						<td align="right"><b style="color:black"><?php echo $price->currency($check['ShippingMethod']['price']);?></b></td>
					  </tr>
					  
					  
						<tr>
						<td align="right"><b>Tổng: </b></td>
						<td align="right"><b style="color:black"><?php echo $price->currency($total+$check['ShippingMethod']['price']);?></b></td>
					  </tr>
							  </tbody>
					</table>
					<br>
				</div>


	</div> <!-- closed class="spc"-->
	
	
	
        <div id="payment">
<?php echo $this->Form->create('Order', array('id' => 'form_adress', 'action' => 'check_end'));?>
			
			<fieldset>
		<?php
			if(isset($address_payment)){
			echo $this->Form->hidden('name',array('value'=>$address_payment['Order']['name']));
			echo $this->Form->hidden('country',array('value'=>$address_payment['Order']['country']));
			echo $this->Form->hidden('province_id',array('value'=>$address_payment['Order']['province_id']));
			echo $this->Form->hidden('address',array('value'=>$address_payment['Order']['address']));
			echo $this->Form->hidden('phone',array('value'=>$address_payment['Order']['phone']));
			echo $this->Form->hidden('email',array('value'=>$address_payment['Order']['email']));
			echo $this->Form->hidden('re_name',array('value'=>$address_payment['Order']['re_name']));
			echo $this->Form->hidden('re_country',array('value'=>$address_payment['Order']['re_country']));
			echo $this->Form->hidden('re_city',array('value'=>$address_payment['Order']['re_city']));
			echo $this->Form->hidden('re_address',array('value'=>$address_payment['Order']['re_address']));
			echo $this->Form->hidden('re_phone',array('value'=>$address_payment['Order']['re_phone']));
			//echo $this->Form->hidden('re_email',array('value'=>$address['Order']['re_email']));
			
			echo $this->Form->hidden('shipping_method_id',array('value'=>$address_payment['Order']['shipping_method_id']));
			
			echo $this->Form->hidden('payment_method_id',array('value'=>$address_payment['Order']['payment_method_id']));
			echo $this->Form->hidden('comments',array('value'=>$address_payment['Order']['comments'])); 
			
			echo $this->Form->hidden('check_end',array('value'=>'3'));
				
	 } ?>
<div id="content_di">
  <table style="width: 100%;">
    <tbody><tr>
      <td align="left"><a class="button" onclick="location = 'http://localhost/fash254/orders/check_end'"><span>Quay lại</span></a></td>
      <td align="right"><?php echo $this->Form->end(__('Xác nhận thanh toán',true));?></td>
	  
    </tr>
  </tbody></table>
</div>
		</fieldset>  
    </form>
</div>

  </div>