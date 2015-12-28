<?php
/* CakeSesions Test cases generated on: 2011-03-25 23:57:43 : 1301122663*/
App::import('Controller', 'CakeSesions');

class TestCakeSesionsController extends CakeSesionsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class CakeSesionsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.cake_sesion');

	function startTest() {
		$this->CakeSesions =& new TestCakeSesionsController();
		$this->CakeSesions->constructClasses();
	}

	function endTest() {
		unset($this->CakeSesions);
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