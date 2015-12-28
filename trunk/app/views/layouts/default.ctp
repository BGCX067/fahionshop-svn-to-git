<?php
/**
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.cake.libs.view.templates.layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
		<meta http-equiv="Content-Type" content="text/html; charset=<?php echo Configure::read('App.encoding'); ?>" />
		<title><?php echo "ShopOnline - Mua sam truc tuyen"." - ".$title_for_layout; ?></title>
		<?php
				//echo $html->meta('icon');
				echo $html->css('style');
				echo $html->css('common');
				echo $scripts_for_layout;
				
		?>
				<script src="<?php echo $this->webroot?>js/1_jquery.js" type="text/javascript"></script>
				<script src="<?php echo $this->webroot?>js/2_layout.js" type="text/javascript"></script>
				<script src="<?php echo $this->webroot?>js/3_tooltip.min.js" type="text/javascript"></script>
				<script src="<?php echo $this->webroot?>js/shop_1_base.js" type="text/javascript"></script>
				<script src="<?php echo $this->webroot?>js/jquery-1.2.6.min.js" type="text/javascript"></script>
					
<script type="text/javascript">

/*** 
    Simple jQuery Slideshow Script
    Released by Jon Raasch (jonraasch.com) under FreeBSD license: free to use or modify, not responsible for anything, etc.  Please link out to me if you like it :)
***/

function slideSwitch() {
    var $active = $('#slideshow IMG.active');

    if ( $active.length == 0 ) $active = $('#slideshow IMG:last');

    // use this to pull the images in the order they appear in the markup
    var $next =  $active.next().length ? $active.next()
        : $('#slideshow IMG:first');

    // uncomment the 3 lines below to pull the images in random order
    
    // var $sibs  = $active.siblings();
    // var rndNum = Math.floor(Math.random() * $sibs.length );
    // var $next  = $( $sibs[ rndNum ] );


    $active.addClass('last-active');

    $next.css({opacity: 0.0})
        .addClass('active')
        .animate({opacity: 1.0}, 1000, function() {
            $active.removeClass('active last-active');
        });
}

$(function() {
    setInterval( "slideSwitch()", 9000 );
});

</script>

<style type="text/css">

/*** set the width and height to match your images **/

#slideshow {
    position:relative;
    height:150px;
}

#slideshow IMG {
    position:absolute;
    top:0;
    left:0;
    z-index:8;
    opacity:0.0;
}

#slideshow IMG.active {
    z-index:10;
    opacity:1.0;
}

#slideshow IMG.last-active {
    z-index:9;
}
</style>
	
</head>
<body>
<div id="wrap">
	<div id="wrapper">
				<div id="header">
					
					
		        </div>
				<div id = "nav">
						<div id="main_menu">
								<?php echo $this->element('main_menu'); ?>
						</div>
						<div id="searchbox">
							<!--<form action="search_products" method="get">
									<input name="keywords" id="keywords" type="text" />
									<input type="submit" value="" />
							</form>-->
							<?php echo $form->create('Products',array('action' =>'search_products')); ?>
							<?php echo $form->input('key',array('label'=>'','size'=>'80')); ?>
							<?php echo $form->end('',array('label'=>'','class'=>'input_submitlayout')); ?>
							<!--<input type="submit" value="" />-->
						</div>
					
					
				</div>
				<div id="content">
					
					
				<div id="center">
					<div id="left">
						<div class="box categories">
										<h2><?php __('Thời Trang Nữ');?></h2>
										<?php echo $this->element('categories_woman'); ?>
						</div>
						<div class="box categories">
										<h2><?php __('Thời Trang Nam');?></h2>
										<?php echo $this->element('categories_men'); ?>
						</div>	
						<div class="box categories">
										<h2><?php __('Phụ Kiện Thời Trang');?></h2>
										<?php echo $this->element('spare_parts'); ?>
						</div>	
						<div class="box categories">
										<h2><?php __('Sản Phẩm Bán Chạy');?></h2>
										<?php echo $this->element('seller_product'); ?>
						</div>	
										
									
					</div>
					<div id="right">
						<?php echo $this->element('shopping_cart'); ?>
						
						
						
						
						
						<div class="bo">
							<h2>Hỗ Trợ</h2>
								<ul class ="support">
								<li ><a  href="/"><?php echo $html->image('img/yahooIcon.jpg',array('alt'=>'main logo'));?></a></li>
								<li class ="supportli"><a href="ymsgr:sendIM?nhathanhthanh" target="_blank"><img border="0" title="YM:nhathanhthanh" src="http://opi.yahoo.com/online?u=nhathanhthanh&amp;m=g&amp;t=2&amp;l=us" alt="YM:nhathanhthanh" ></a></li>
								<li class ="supportli"><a href="ymsgr:sendIM?bluesky.tk88" target="_blank"><img border="0" title="YM:bluesky.tk88" src="http://opi.yahoo.com/online?u=bluesky.tk88&amp;m=g&amp;t=2&amp;l=us" alt="YM:bluesky.tk88"></a></li>
								<li class="hotline" ><?php echo $html->image('img/mobile.gif',array('alt'=>'main logo'));?> Hot line</li>
													
								<li class ="supportli"> Ms.Thắm : 01266.69.49.44</li>
								<li class ="supportli"> Ms.Nhân: 01205.12.11.33</li>
								</ul>
						</div>
										
										
						<div class="bo">
							<h2>Chia Sẻ Trang Này</h2>
							<ul>
							
							<!-- AddThis Button BEGIN -->
								<div class="addthis_toolbox addthis_default_style ">
								<a class="addthis_button_preferred_1"></a>
								<a class="addthis_button_preferred_2"></a>
								<a class="addthis_button_preferred_3"></a>
								<a class="addthis_button_preferred_4"></a>
								<a class="addthis_button_compact"></a>
								<a class="addthis_counter addthis_bubble_style"></a>
								</div>
								<script type="text/javascript">var addthis_config = {"data_track_clickback":true};</script>
								<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4dd4cbb30ce29a14"></script>
					<!-- AddThis Button END -->
					</ul>
							<ul>				
							<div class="share" style="text-align:center;" stylr="">
							<!--<a class="addthis_button_facebook at300b" href="http://www.addthis.com/bookmark.php?v=250&amp;winname=addthis&amp;pub=quanaoredep&amp;source=tbx-250&amp;lng=vi&amp;s=facebook&amp;url=http%3A%2F%2Fquanaoredep.com%2Fdo-bay-jumpsuit&amp;title=%C4%90%E1%BB%93%20Bay%20-%20Jumpsuit&amp;ate=AT-quanaoredep/-/-/4d9379a4ef5ebe16/1&amp;uid=4d9379a446968e89&amp;CXNID=2000001.5215456080540439074NXC&amp;pre=http%3A%2F%2Fquanaoredep.com%2Fkhan-choang-co-k37&amp;tt=0" target="_blank" title="Send to Facebook"><span class="at300bs at15nc at15t_facebook"></span></a>-->
											
							<a onclick="return ! window.open(this.href);" href="http://www.facebook.com/fashionshop" rel="nofollow"><?php echo $html->image('img/logo_facebook.jpg',array('alt'=>'main logo'));?></a>
							<a onclick="return ! window.open(this.href);" href="http://twitter.com/fashionshop" rel="nofollow"><?php echo $html->image('img/logo_twitter.jpg',array('alt'=>'main logo'));?></a><br>
							</div>
											
							</ul>
						</div>
										
						<div class="bo">
							<h2> Khách Truy Cập</h2>
								<ul>
								<li class ="cus"> Khách: 0 </li>
								</ul>
						</div>						
							
					</div>
					<div id="wrapslider">
								
						<div id="slideshow">
							<img height="100%" width="100%" src="<?php echo $this->webroot;?>img/slide_img/h1.jpg" class="active" />
							<img height="100%" width="100%" src="<?php echo $this->webroot;?>img/slide_img/h2.jpg"/>
							<img height="100%" width="100%" src="<?php echo $this->webroot;?>img/slide_img/h3.jpg"/>
							<img height="100%" width="100%" src="<?php echo $this->webroot;?>img/slide_img/h4.jpg"/>
						</div>

								
					</div>
					<div id="centerwrap">
					<?php //echo $this->element('breadcrumbs'); ?>
													 
					<?php echo $content_for_layout; ?>		

										
					</div>
					</div>							   
				
	
			</div>
				<div id="footer">
				</div>
	</div>
</div>

<!-- end layout-->


</body>
</html>
