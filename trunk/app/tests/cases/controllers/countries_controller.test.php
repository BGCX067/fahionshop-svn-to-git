<?php
/* Countries Test cases generated on: 2011-03-26 00:00:14 : 1301122814*/
App::import('Controller', 'Countries');

class TestCountriesController extends CountriesController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class CountriesControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.country', 'app.order', 'app.user', 'app.role', 'app.product', 'app.brand', 'app.line_item', 'app.category', 'app.categories_product', 'app.content', 'app.content_category', 'app.users_product', 'app.shipping_method', 'app.shipping_rule', 'app.payment_method', 'app.province');

	function startTest() {
		$this->Countries =& new TestCountriesController();
		$this->Countries->constructClasses();
	}

	function endTest() {
		unset($this->Countries);
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