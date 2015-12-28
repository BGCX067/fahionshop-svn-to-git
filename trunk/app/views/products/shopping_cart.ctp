 
﻿<h1><?php  $this->pageTitle = __('Giỏ hàng', true); ?></h1>
<div class="middle">
    <form id="shopping_cart" method="post" action="shopping_cart">
		<fieldset>
			<table class="cart">
				<thead>
				<tr>
				  <th align="center">Loại bỏ</th>
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
				  <td align="center">
				   <?php echo $this->Form->checkbox("remove{$item['id']}", array('hiddenField' => false)); ?>
				 </td>
				  <td align="center"><img src='<?php echo $this->webroot;?><?php echo $product['Product']['detail_image_1']; ?>' width="50px" height="50px"></img></td>
				  <td valign="top" align="center"><?php echo $product['Product']['name'];?></td>
				  <td valign="top" align="center"><?php echo $product['Product']['code'];?></td>
				  <td valign="top" align="center"><?php echo $price->format($product);?></td>
				   
				   
				  <td valign="top" align="center">
				  <?php echo $this->Form->input("{$item['id']}",array('value'=>$item['quantity'],'label'=>'','class'=>'soluong'));?>
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
						<td align="right"><b>Tổng: </b></td>
						<td align="right"><b style="color:black"><?php echo $price->currency($total);?></b></td>
					  </tr>
							  </tbody>
					</table>
					<br>
				</div>
				 <div id="content_di">
					<table style="width:100%;">
					  <tbody>
					  <tr>
								<td style="text-align:left;width:30%;"><?php echo $this->Form->end(__('Cập nhật', true));?>
								</td>
									<!-- <td style="text-align:center;width:28%;"><a class="button" href="<?php //echo $this->webroot;?>products/recent" style="-moz-user-select: none; cursor: default;"> <span><span>Tiếp tục mua hàng <strong></strong></span></span>-->
								<td style="text-align:center;width:30%;"><a class="button" href="<?php echo $this->webroot;?>products/recent">Tiếp tục mua hàng</a>
								</td>
								<td style="text-align:right;width:30%;"> <a class="button" href="<?php echo $this->webroot;?>orders/payment_address">Thanh toán </a>
								</td>
								
						 
						
					
						 <!-- <td align="left"></td>
						<td align="center"></td>
						<td align="middle"><input type="submit" value="Thanh toán"></td>-->
						  </tr>
						</tbody>
					</table>
				</div>
		</fieldset>  
    </form>
  </div>
