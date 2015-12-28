<?php
/* UsersProducts Test cases generated on: 2011-03-26 00:02:29 : 1301122949*/
App::import('Controller', 'UsersProducts');

class TestUsersProductsController extends UsersProductsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class UsersProductsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.users_product', 'app.user', 'app.role', 'app.order', 'app.shipping_method', 'app.shipping_rule', 'app.payment_method', 'app.country', 'app.province', 'app.line_item', 'app.product', 'app.brand', 'app.category', 'app.categories_product', 'app.content', 'app.content_category');

	function startTest() {
		$this->UsersProducts =& new TestUsersProductsController();
		$this->UsersProducts->constructClasses();
	}

	function endTest() {
		unset($this->UsersProducts);
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