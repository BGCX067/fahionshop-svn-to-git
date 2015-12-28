<?php
/* ShippingMethods Test cases generated on: 2011-03-26 00:01:45 : 1301122905*/
App::import('Controller', 'ShippingMethods');

class TestShippingMethodsController extends ShippingMethodsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class ShippingMethodsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.shipping_method', 'app.order', 'app.user', 'app.role', 'app.product', 'app.brand', 'app.line_item', 'app.category', 'app.categories_product', 'app.content', 'app.content_category', 'app.users_product', 'app.payment_method', 'app.country', 'app.province', 'app.shipping_rule');

	function startTest() {
		$this->ShippingMethods =& new TestShippingMethodsController();
		$this->ShippingMethods->constructClasses();
	}

	function endTest() {
		unset($this->ShippingMethods);
		ClassRegistry::flush();
	}

	function testIndex() {

	}

	function testView() {

	}

	function testAdd() {

	}

	function testEdit() {

	}

	function testDelete() {

	}

	function testAdminIndex() {

	}

	function testAdminView() {

	}

	function testAdminAdd() {

	}

	function testAdminEdit() {

	}

	function testAdminDelete() {

	}

}
?>