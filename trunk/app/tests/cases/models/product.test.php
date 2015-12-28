<?php
/* Product Test cases generated on: 2011-04-10 06:54:22 : 1302443662*/
App::import('Model', 'Product');

class ProductTestCase extends CakeTestCase {
	var $fixtures = array('app.product', 'app.brand', 'app.line_item', 'app.order', 'app.user', 'app.role', 'app.users_product', 'app.shipping_method', 'app.shipping_rule', 'app.payment_method', 'app.country', 'app.province', 'app.category', 'app.categories_product');

	function startTest() {
		$this->Product =& ClassRegistry::init('Product');
	}

	function endTest() {
		unset($this->Product);
		ClassRegistry::flush();
	}

}
?>