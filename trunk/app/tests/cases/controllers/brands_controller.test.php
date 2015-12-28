<?php
/* Brands Test cases generated on: 2011-03-25 23:58:39 : 1301122719*/
App::import('Controller', 'Brands');

class TestBrandsController extends BrandsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class BrandsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.brand', 'app.line_item', 'app.order', 'app.user', 'app.role', 'app.product', 'app.category', 'app.categories_product', 'app.content', 'app.content_category', 'app.users_product', 'app.shipping_method', 'app.shipping_rule', 'app.payment_method', 'app.country', 'app.province');

	function startTest() {
		$this->Brands =& new TestBrandsController();
		$this->Brands->constructClasses();
	}

	function endTest() {
		unset($this->Brands);
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