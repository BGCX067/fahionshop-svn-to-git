<?php
/* Roles Test cases generated on: 2011-03-26 00:01:34 : 1301122894*/
App::import('Controller', 'Roles');

class TestRolesController extends RolesController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class RolesControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.role', 'app.user', 'app.order', 'app.shipping_method', 'app.shipping_rule', 'app.payment_method', 'app.country', 'app.province', 'app.line_item', 'app.product', 'app.brand', 'app.category', 'app.categories_product', 'app.content', 'app.content_category', 'app.users_product');

	function startTest() {
		$this->Roles =& new TestRolesController();
		$this->Roles->constructClasses();
	}

	function endTest() {
		unset($this->Roles);
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