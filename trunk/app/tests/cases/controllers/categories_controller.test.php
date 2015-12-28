<?php
/* Categories Test cases generated on: 2011-03-25 23:59:07 : 1301122747*/
App::import('Controller', 'Categories');

class TestCategoriesController extends CategoriesController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class CategoriesControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.category', 'app.product', 'app.brand', 'app.line_item', 'app.order', 'app.user', 'app.role', 'app.users_product', 'app.shipping_method', 'app.shipping_rule', 'app.payment_method', 'app.country', 'app.province', 'app.categories_product', 'app.content', 'app.content_category');

	function startTest() {
		$this->Categories =& new TestCategoriesController();
		$this->Categories->constructClasses();
	}

	function endTest() {
		unset($this->Categories);
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