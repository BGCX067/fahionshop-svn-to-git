<?php
/* PaymentMethods Test cases generated on: 2011-03-26 00:00:51 : 1301122851*/
App::import('Controller', 'PaymentMethods');

class TestPaymentMethodsController extends PaymentMethodsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class PaymentMethodsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.payment_method', 'app.order', 'app.user', 'app.role', 'app.product', 'app.brand', 'app.line_item', 'app.category', 'app.categories_product', 'app.content', 'app.content_category', 'app.users_product', 'app.shipping_method', 'app.shipping_rule', 'app.country', 'app.province');

	function startTest() {
		$this->PaymentMethods =& new TestPaymentMethodsController();
		$this->PaymentMethods->constructClasses();
	}

	function endTest() {
		unset($this->PaymentMethods);
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