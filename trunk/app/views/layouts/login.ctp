 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=<?php echo Configure::read('App.encoding'); ?>" />
	<title><?php echo "Fashion Shop"." - ".$title_for_layout; ?></title>
	<?php
		//echo $html->meta('icon');
		echo $html->css('login');
		echo $scripts_for_layout;
	?>
</head>
	<body>
		<div id="wrapper">
			<div id ="mainContent">
				<div id="page">
					<?php echo $content_for_layout; ?>
				</div><!--end #page-->
			</div> <!-- end #mainContent-->
		</div> <!--end #wrapper-->
	</body>
</html>
