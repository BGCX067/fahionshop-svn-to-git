<?php
/* Provinces Test cases generated on: 2011-03-26 00:01:18 : 1301122878*/
App::import('Controller', 'Provinces');

class TestProvincesController extends ProvincesController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class ProvincesControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.province', 'app.country', 'app.order', 'app.user', 'app.role', 'app.product', 'app.brand', 'app.line_item', 'app.category', 'app.categories_product', 'app.content', 'app.content_category', 'app.users_product', 'app.shipping_method', 'app.shipping_rule', 'app.payment_method');

	function startTest() {
		$this->Provinces =& new TestProvincesController();
		$this->Provinces->constructClasses();
	}

	function endTest() {
		unset($this->Provinces);
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