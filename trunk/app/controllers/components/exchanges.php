<?php
class ExchangesComponent extends Object {

	
	
	function change($price) { 
		if($price >= 0) {
          $currency = 20000;
          $price = round($price/$currency, 2);
          return $price;
		}
	}
		
}
?>
