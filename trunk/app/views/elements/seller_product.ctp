<?php 
	// khoi tao mang chua thong tin san pham ban chay
	$products = $this->requestAction('/products/index/');
	$line_items = $this->requestAction('/line_items/index/');
	//var_dump($line_item);
	$list_product[] = array();
	$sale_product = array();
	
			foreach ($products as $product ){
			
				$sale_product['id'] = $product['Product']['id'];
				$sale_product['name'] = $product['Product']['name'];
				$sale_product['quantity'] = 0;
				foreach ($line_items as $line_item) {
					if ($sale_product['id'] == $line_item['LineItem']['product_id']){
					
						$sale_product['quantity'] = $sale_product['quantity'] + $line_item['LineItem']['quantity'];
						
					}
				
				
				}
				$list_product[] = $sale_product;
				
			}
			$this->set($list_product);
		
			//$he =$this->array_sort($list_product,'quantity',SORT_DESC);
			//var_dump($he);
	//var_dump($list_product);
	
?>
<?php

//function array_sort($array, $on, $order=SORT_ASC)
//{
	$array=$list_product;
	$on='quantity';
	$order=SORT_DESC;
    $new_array = array();
    $sortable_array = array();

    if (count($array) > 0) {
        foreach ($array as $k => $v) {
            if (is_array($v)) {
                foreach ($v as $k2 => $v2) {
                    if ($k2 == $on) {
                        $sortable_array[$k] = $v2;
                    }
                }
            } else {
                $sortable_array[$k] = $v;
            }
        }

        switch ($order) {
            case SORT_ASC:
                asort($sortable_array);
            break;
            case SORT_DESC:
                arsort($sortable_array);
            break;
        }

        foreach ($sortable_array as $k => $v) {
            $new_array[$k] = $array[$k];
        }
    }
	//var_dump($new_array);

    //return $new_array;
//}
?>
	
<ul id="categoriesmenu">
  <?php //foreach ($list_product as $row){
  $count = count($new_array);
  $gh =6 ;
  $n =0;
	if ($count >$gh ){
		$n=$gh;
	  }else{
	  
	   $n =$count;}
	  
	for($i=1;$i<$n;$i++){
  
  
  ?>
  <li><?php			
		echo $html->link($new_array[$i]['name'],"/products/show/".$new_array[$i]['id']);?>
		
		<!--echo $html->link($row['Category']['name'] ,"/categories/show/" . $row['Category']['id']);?-->
  </li>
  <?php } ?>
</ul>