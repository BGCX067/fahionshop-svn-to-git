<?php
/* ShippingRules Test cases generated on: 2011-03-26 00:01:59 : 1301122919*/
App::import('Controller', 'ShippingRules');

class TestShippingRulesController extends ShippingRulesController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class ShippingRulesControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.shipping_rule', 'app.shipping_method', 'app.order', 'app.user', 'app.role', 'app.product', 'app.brand', 'app.line_item', 'app.category', 'app.categories_product', 'app.content', 'app.content_category', 'app.users_product', 'app.payment_method', 'app.country', 'app.province');

	function startTest() {
		$this->ShippingRules =& new TestShippingRulesController();
		$this->ShippingRules->constructClasses();
	}

	function endTest() {
		unset($this->ShippingRules);
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