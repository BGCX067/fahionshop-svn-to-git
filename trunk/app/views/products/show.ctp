<?php echo $html->css('products-show');?>
<?php echo $html->css('jquery.galleryview-3.0');?>
<script type="text/javascript" src="<?php echo $this->webroot;?>js/fanbox/jquery.mousewheel-3.0.2.pack.js"></script>
<script type="text/javascript" src="<?php echo $this->webroot;?>js/fanbox/jquery.fancybox-1.3.1.pack.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $this->webroot;?>js/fanbox/jquery.fancybox-1.3.1.css" media="screen" />
<?php  $this->pageTitle = $data['Product']['name']; ?>
<div id="product_detail">

<script type="text/javascript" src="<?php echo $this->webroot;?>js/js_slide_img/jquery.galleryview-3.0.js"></script>
<script type="text/javascript" src="<?php echo $this->webroot;?>js/js_slide_img/jquery.timers-1.2.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#myGallery').galleryView({
			transition_speed: 800,				//INT - duration of panel/frame transition (in milliseconds)
			transition_interval: 27000,
			pause_on_hover: true,			//INT - delay between panel/frame transitions (in milliseconds)
			//paused:true;
			panel_width: 225,
			panel_height: 300,
			frame_width: 30,			
			pause_on_hover: true,				//INT - width of filmstrip frames (in pixels)
			frame_height: 50,					//INT - width of filmstrip frames (in pixels)
			start_frame: 1,						//INT - index of panel/frame to show first when gallery loads
			filmstrip_size: 4,					//INT - number of frames to show in filmstrip-only gallery
			frame_opacity: 1					//FLOAT - transparency of non-active frames (1.0 = opaque, 0.0 = transparent)

		});
	});
</script>
<style type="text/css">
#myGallery {
		margin: 0 auto;
	}
	pre {
		background: #eee;
		border: 2px solid #ccc;
		padding: 1em;
		overflow: auto;
		margin: 1em;
		max-height: 250px;
	}
div.input label {
    float: left;
    font-size: 1.2em;
    padding-right: 0.5em;
    text-align: left;
    width: 8.5em;
}

input#productQuantity {
    font-size: 18px;
    height: 18px;
    width: 90px;
}
.gv-strip_wrapper{
 margin-top: 10px !important;
}
.gv-img_wrap{
border: blue;
}
.gv-img_wrap img{
border: blue;
}
ul.gv-filmstrip{

}
ul.gv-filmstrip li{

}
ul.gv-filmstrip li.gv-frame{

}
.gv-nav-prev,.gv-nav-next,.gv-panel-nav-prev,.gv-panel-nav-next,.gv-pointer{
	 display: none !important;
	}
<form accept-charset="utf-8" action="/fash/products/shopping_cart" method="post" id="productShoppingCartForm">
</style>

		<div id="pro_img">
			
			<ul id="myGallery">
				<?php if(!empty($data['Product']['detail_image_1'])){ ?>
				<li><img src="<?php echo $this->webroot;?><?php echo $data['Product']['detail_image_1']; ?>"/></li>
				<?php }else{?>
					<li><img src="<?php echo $this->webroot;?>no_image.jpg"/></li>
				<?php }?>
				<?php if(!empty($data['Product']['detail_image_2'])){ ?>
				<li><img src="<?php echo $this->webroot;?><?php echo $data['Product']['detail_image_2']; ?>"/></li>
				<?php }?>
				
				<?php if(!empty($data['Product']['detail_image_3'])){ ?>
				<li><img src="<?php echo $this->webroot;?><?php echo $data['Product']['detail_image_3']; ?>"/></li>
				<?php }?>


			</ul>
		</div>
	
		
		<div id="pro_info">
			<div class="pro_info_detail">

				<b><?php echo ($data['Product']['name']); ?></b>

				<div id="pro_table">
							<table>
							<tr>
								<th style="width:100px;"><span>Mã sản phẩm</span></th>
								<td>:&nbsp;<?php echo $data['Product']['code']; ?></td>
							</tr>
							<tr>
								<th><span>Tình trạng</span></th>
								<td>:&nbsp;<?php 
								if ($data['Product']['quantity']==0)
									echo "Hết hàng";
								else
									echo "Còn hàng";
								?></td>
							</tr>
							
							<tr>
								<th><span>Giá</span></th>
								<td>:&nbsp;<?php echo $price->format($data); ?></td>
							</tr>
							<tr>
								<th><span>Mô tả</span></th>
								<td>:&nbsp;<?php echo $data['Product']['description']; ?></td>
							</tr>
			
							</table>

				</div>

			</div>
				<div id="pro_info_cart">
									<!-- <b>Số lượng :</b> <input type="text" value="1" size="3" name="quantity"></br>-->
					<script src="<?php echo $this->webroot?>js/SimplyButtons.js" type="text/javascript"></script>   
					<?php echo $html->css('SimplyButtons');?>    
					<?php echo $form->create('product',array('action' => 'shopping_cart')); ?>
						<fieldset>
							<?php echo $form->hidden('LineItem.product_id', array('value' => $data['Product']['id'])); ?>
							<div id="pro_table">
									   <p style="float: left; padding: 5px;">Số lượng: </p>
										<?php echo $form->input('quantity', array('label' =>'')); ?>
										<?php if(!empty($data['Product']['quantity'])) {?>
										<div style="text-align:right;">
											<?php echo $form->end('Chọn mua');?>
											<?php } else {?>
												<span class="error"><?php __('Hết hàng');?></span>
												<?php }?>
										</div>
							</div>
				</div>					
						</fieldset>
									
				</div>
		</div><!--#end pro_info-->
	</div>
