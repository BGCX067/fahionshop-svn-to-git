 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=<?php echo Configure::read('App.encoding'); ?>" />
	<title><?php echo "Fashion Shop - Admin"." - ".$title_for_layout; ?></title>
	<?php
		//echo $html->meta('icon');
		echo $html->css('adminstyle');
		echo $scripts_for_layout;
		
	?>
</head>
	<body>
		<div id="wrapper">
			<div id="header">
				<h1 id ="logo"><a href="#">fashion shop</a>	</h1>
				<ul id="top_panner">
					<li>				
					<?php 
						if(isset($loginIn)){
							if (!empty($loginIn['User']))
								
					?>
						<a href="<?php $this->webroot;?>users/edit/<?php echo $loginIn['User']['id'];?>"><strong>
					<?php	echo $loginIn['User']['name'];	
						}
					;?>
					</li>
					<li><a href="<?php $this->webroot;?>users/logout"><strong>Sign out</strong></a></li>
				</ul>
			</div> <!--end #header-->
			<div id ="mainContent">

				<div id="sidebar">
					<h1>Trình Quản Lý</h1>
					<ul>
						<li><a href="<?php echo $this->webroot;?>admin/categories">Quản lý danh mục</a></li>
						<li><a href="<?php echo $this->webroot;?>admin/products">Quản lý sản phẩm</a></li>
						<li><a href="<?php echo $this->webroot;?>admin/orders">Quản lý đơn hàng</a></li>
						<li><a href="<?php echo $this->webroot;?>admin/countries">Nước/tỉnh thành</a></li>
						<!--<li><a href="<?php// echo $this->webroot;?>admin/products">Thống kê</a></li>-->
					</ul>
				</div><!--and #sidebar-->
				<div id="page">
					<?php echo $content_for_layout; ?>
				</div><!--end #page-->
			</div> <!-- end #mainContent-->
			<div id= "footer">
				<p>&copy;Copyright by Fashionshop.com </p>
			</div><!--end #footer-->
		</div> <!--end #wrapper-->
	</body>
</html>
