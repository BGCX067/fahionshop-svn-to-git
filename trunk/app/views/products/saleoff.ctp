<?php
  $this->pageTitle = __("Khuyến mãi",true);  
  if(!empty($data)) {
    echo $this->element('products', array('data' => $data)); 
  }
?>