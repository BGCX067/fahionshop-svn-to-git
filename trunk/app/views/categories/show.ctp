<!--<h2 style="color: Blue;"><?php //echo $category['Category']['name']; ?></h2>-->
<?php  $this->pageTitle = $data['Category']['name'];?>
<?php 
echo $this->element('products_by_category', array('id' => $data['Category']['id'], 'header' => true));
?>


