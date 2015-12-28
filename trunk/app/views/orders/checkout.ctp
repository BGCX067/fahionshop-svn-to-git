<h1><?php $this->pageTitle = __('Thanh toán', true); ?></h1>

<div id="middle">
 <?php echo $this->Form->create('Order', array('action' => 'check_end'));?>
	<?php $inf = $this->Session->read('order_session'); ?>
<fieldset>
	<?php
		if(isset($address)){
			echo $this->Form->hidden('name',array('value'=>$address['Order']['name']));
			echo $this->Form->hidden('country',array('value'=>$address['Order']['country']));
			echo $this->Form->hidden('province_id',array('value'=>$address['Order']['province_id']));
			echo $this->Form->hidden('address',array('value'=>$address['Order']['address']));
			echo $this->Form->hidden('phone',array('value'=>$address['Order']['phone']));
			echo $this->Form->hidden('email',array('value'=>$address['Order']['email']));
			echo $this->Form->hidden('re_name',array('value'=>$address['Order']['re_name']));
			echo $this->Form->hidden('re_country',array('value'=>$address['Order']['re_country']));
			echo $this->Form->hidden('re_city',array('value'=>$address['Order']['re_city']));
			echo $this->Form->hidden('re_address',array('value'=>$address['Order']['re_address']));
			echo $this->Form->hidden('re_phone',array('value'=>$address['Order']['re_phone']));
			//echo $this->Form->hidden('re_email',array('value'=>$address['Order']['re_email']));
			
			echo $this->Form->hidden('checkout',array('value'=>'2'));
		}
	?>
	
           <b style="margin-bottom: 2px; display: block;">Phương thức vận chuyển</b>
      <div id="content">

      <p>Hãy lựa chọn phương thức vận chuyển cho đơn hàng này.</p>
      <table width="536" cellpadding="3">
        <tbody>
		<tr>
		<td style="align:left">
			<?php
			  $checkout = $this->requestAction("/shipping_methods/index");
			
			  if(isset($checkout)){
										
					$options = array();
					
					foreach($checkout as $ship){
						
						$options[$ship['ShippingMethod']['id']] = "{$ship['ShippingMethod']['name']}"." "."------------ "." ". "<strong id=\"vc\"> Gia chi phi van chuyen:  " . "{$ship['ShippingMethod']['price']}</strong>"."VND";
						
						//echo $ship['ShippingMethod']['price'];
					
					}
					
				}			
				
				$attributes=array('value'=>$checkout[0]['ShippingMethod']['id'],'separator'=>'<br/>','legend'=>false);
				
				//echo $form->label('shipping_method_id'=>"Abc");
				echo $this->Form->radio('shipping_method_id',$options,$attributes);
				//echo $ship['ShippingMethod']['price'];
			 	?> 
			  
         </tbody>
	  </table>

      </div>
	  
        <b style="margin-bottom: 2px; display: block;">Phương thức thanh toán</b>
       <div id="content">
       <p>Bạn hãy lựa chọn phương thức thanh toán cho đơn hàng này.</p>
       <table width="536" cellpadding="3">
          <tbody>
			
			<?php
			  $checkout = $this->requestAction("/payment_methods/index");
			  
			  if(isset($checkout)){
			//var_dump($checkout);}
			$options = array();
					foreach($checkout as $pay){
						$options[$pay['PaymentMethod']['id']] = "{$pay['PaymentMethod']['name']}";
					}
				}
				$attributes=array('value'=>$checkout[0]['PaymentMethod']['id'],'separator'=>'<br/>','legend'=>false);
			   echo $this->Form->radio('payment_method_id',$options,$attributes);
			 
			   ?>				
			
          </tbody>
	   </table>
       </div>
	   
        <b style="margin-bottom: 2px; display: block;">Ghi chú về đơn hàng</b>
         <div id ="comment">
			<?php if(isset($sent_method)){
				echo $this->Form->input('comments',array('value'=>$inf['comments'],'label'=>'','size'=>'30','class'=>'required'));
			}
				else
			{
					echo $this->Form->input('comments',array('label'=>'','size'=>'30','class'=>'required'));}?>
			<!--<textarea style="width: 99%;" rows="8" name="comment"></textarea>-->
        </div>
	  

	  
	  			 <div id="content_di">
					<table style="width:100%;">
					  <tbody>
							<tr>
							<td style="text-align:left;width:30%;"> <a class="button" href="<?php echo $this->webroot;?>orders/payment_address">Quay lại </a>
								</td>
							
								
								<td style="text-align:right;width:30%;"><?php echo $this->Form->end(__('Tiếp tục', true));?>
								</td>
						
					
						
						  </tr>
						</tbody>
					</table>
			</div>
	  
	  
	  
  </fieldset> 
  </div>
 