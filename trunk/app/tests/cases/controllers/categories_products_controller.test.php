<?php
/* CategoriesProducts Test cases generated on: 2011-03-25 23:59:26 : 1301122766*/
App::import('Controller', 'CategoriesProducts');

class TestCategoriesProductsController extends CategoriesProductsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class CategoriesProductsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.categories_product', 'app.category', 'app.product', 'app.brand', 'app.line_item', 'app.order', 'app.user', 'app.role', 'app.users_product', 'app.shipping_method', 'app.shipping_rule', 'app.payment_method', 'app.country', 'app.province', 'app.content', 'app.content_category');

	function startTest() {
		$this->CategoriesProducts =& new TestCategoriesProductsController();
		$this->CategoriesProducts->constructClasses();
	}

	function endTest() {
		unset($this->CategoriesProducts);
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