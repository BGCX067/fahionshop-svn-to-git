<div class="bo">
	<h2>Giỏ Hàng</h2>
	<ul id="shop">
		<div class = "cart"  onclick="show_cart();"title=<?php __("Click here to view your cart");?>" >
			<li><a href="/"><?php echo $html->image('img/cart.png',array('alt'=>'main logo'));?></a></li>
		</div>
		<?php $curItem = $this->Session->read('items');
			if(isset($curItem)){
				$amount =0;
				foreach($curItem as $item):
					$product = $this->requestAction("/products/show/{$item['id']}");
					if (($product['Product']['special_price'])>0){
					$amount += $product['Product']['special_price']*$item['quantity'];
					}
					else{
					$amount += $product['Product']['price']*$item['quantity'];
					}
					if($item['quantity']>0){
		?>
			<li><?php echo $item['quantity'];echo " x ";echo $product['Product']['name'];?></li>
		<?php
					}
				endforeach;
			
		?>
		<li class="tc"> <?php __('Tổng tiền: ');echo $price->currency($amount);}?></li> 
		<li class ="view"><a href="<?php echo $this->webroot;?>/products/shopping_cart">Xem giỏ |</a> <a href="<?php echo $this->webroot;?>/orders/payment_address">Thanh toán</a></li>

		
		
	</ul>
					
					
</div>