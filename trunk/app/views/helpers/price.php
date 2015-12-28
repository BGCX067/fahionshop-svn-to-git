<?php

/**
 * Calculate, style and format price
 *
 * @author Matti Putkonen,  matti.putkonen@fi3.fi
 * @copyright Copyright (c); 2006, Matti Putkonen, Helsinki, Finland
 * @package BakeSale
 * @version $Id: price.php 518 2007-10-28 23:40:50Z matti $
 */

class PriceHelper extends Helper
{
	var $helpers = array('Number','Session');

/**
 * Calculate price
 * 
 * @param $data
 * @param $type
 * @param $subproduct_price
 */

	function format($data, $type = 'flat', $subproduct_price = 0) {	

		if(isset($data['Product'])) {
			$data = $data['Product'];
		}
	
		if($data['special_price'] > 0) {
			$special_price = true;
			$price = $data['special_price'];
		} else {
			$price = $data['price'];
		}
		
		$price = $price + $subproduct_price;
		if($type != 'internal') {
			if(isset($special_price)) {
				$price = $this->_style($data);
			} else {
				$price = $this->currency($price);
			}
		}
		return $price;
    }


/**
 * Calculate price for subproduct
 * 
 * @param $data
 * @param $subproduct_price
 */

	function subproduct($data, $subproduct_price = 0) {	
		if(isset($data['Product'])) {
			$data = $data['Product'];
		} 
	
		if($data['special_price'] > 0) {
			$special_price = true;
			$price = $data['special_price'];
		} else {
			$price = $data['price'];
		}
		
		if(($subproduct_price != 0)) {
			$price = $price + $subproduct_price;
			$price = $this->currency($price);
		} else {
			$price = '';
		}
		return $price;
    }

/**
 * Add currency formatting
 * 
 * @param $value
 * @return String
 */
 
	function currency($price = 0, $type = 'html') { 
		if($price >= 0) {
            $code = "VNĐ";
           
			
			$price = $this->currency_format($price) ." ". $code;
			return $price;
		}
	}

/**
 * Style price complex with special
 *
 * @param $data
 * @return String
 * @protected 
 */
 
function currency_usd($price = 0, $type = 'html') { 
		if($price >= 0) {
            $code = "$";
           
                $currency = 20000;
                $price = round($price/$currency, 2);
				$price = $code ." " .$price; 
				return $price;
          
			
			
			
			
		}
	}
 

	function _style($data) { 
		$price = $this->oldprice($data);
		$price .= " ".$this->newprice($data);
		return $price;
	}

/**
 * Style normal price
 *
 * @param $data
 * @return String
 */

	function oldprice($data) { 
		$price = $this->currency($data['price']);
		if($data['special_price'] > 0) {
			$price = '<del>' . $price . '</del>';
		}
		return $price;
	}


/**
 * Style special price
 *
 * @param $data
 * @return String
 */

	function newprice($data) { 
		$price = $this->currency($data['special_price']);
		if($data['special_price'] > 0) {
			$price = '<ins>' . $price . '</ins>';
		}
		return $price;
	}

/**
 * TODO
 *
 */

	function currency_format($price) {
        
            return number_format($price, 0, ',', '.');
       
	}
}
?>