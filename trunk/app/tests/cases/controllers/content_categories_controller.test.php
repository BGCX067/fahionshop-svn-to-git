<?php
/* ContentCategories Test cases generated on: 2011-03-25 23:59:48 : 1301122788*/
App::import('Controller', 'ContentCategories');

class TestContentCategoriesController extends ContentCategoriesController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class ContentCategoriesControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.content_category', 'app.content');

	function startTest() {
		$this->ContentCategories =& new TestContentCategoriesController();
		$this->ContentCategories->constructClasses();
	}

	function endTest() {
		unset($this->ContentCategories);
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