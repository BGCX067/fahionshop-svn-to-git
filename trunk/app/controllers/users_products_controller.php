<?php
class UsersProductsController extends AppController {

	var $name = 'UsersProducts';

	function index() {
		$this->UsersProduct->recursive = 0;
		$this->set('usersProducts', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid users product', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('usersProduct', $this->UsersProduct->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->UsersProduct->create();
			if ($this->UsersProduct->save($this->data)) {
				$this->Session->setFlash(__('The users product has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The users product could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid users product', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->UsersProduct->save($this->data)) {
				$this->Session->setFlash(__('The users product has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The users product could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->UsersProduct->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for users product', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->UsersProduct->delete($id)) {
			$this->Session->setFlash(__('Users product deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Users product was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	function admin_index() {
		$this->UsersProduct->recursive = 0;
		$this->set('usersProducts', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid users product', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('usersProduct', $this->UsersProduct->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->UsersProduct->create();
			if ($this->UsersProduct->save($this->data)) {
				$this->Session->setFlash(__('The users product has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The users product could not be saved. Please, try again.', true));
			}
		}
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid users product', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->UsersProduct->save($this->data)) {
				$this->Session->setFlash(__('The users product has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The users product could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->UsersProduct->read(null, $id);
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for users product', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->UsersProduct->delete($id)) {
			$this->Session->setFlash(__('Users product deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Users product was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>