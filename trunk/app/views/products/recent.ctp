<?php
  $this->pageTitle = __("Hàng mới",true);  
  if(!empty($data)) {
    echo $this->element('products', array('data' => $data)); 
  }
?>