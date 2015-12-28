<?php
class ShippingMethodsController extends AppController {

	var $name = 'ShippingMethods';

	function index() {
		$this->ShippingMethod->recursive = 0;
		$this->set('shippingMethods', $this->paginate());
		$shipping_mt=$this->paginate();
		return $shipping_mt;
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid shipping method', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('shippingMethod', $this->ShippingMethod->read(null, $id));
		$shipping=$this->ShippingMethod->read(null, $id);
		return $shipping;
	}

	function add() {
		if (!empty($this->data)) {
			$this->ShippingMethod->create();
			if ($this->ShippingMethod->save($this->data)) {
				$this->Session->setFlash(__('The shipping method has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The shipping method could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid shipping method', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ShippingMethod->save($this->data)) {
				$this->Session->setFlash(__('The shipping method has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The shipping method could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ShippingMethod->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for shipping method', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ShippingMethod->delete($id)) {
			$this->Session->setFlash(__('Shipping method deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Shipping method was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	function admin_index() {
		$this->ShippingMethod->recursive = 0;
		$this->set('shippingMethods', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid shipping method', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('shippingMethod', $this->ShippingMethod->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->ShippingMethod->create();
			if ($this->ShippingMethod->save($this->data)) {
				$this->Session->setFlash(__('The shipping method has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The shipping method could not be saved. Please, try again.', true));
			}
		}
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid shipping method', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ShippingMethod->save($this->data)) {
				$this->Session->setFlash(__('The shipping method has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The shipping method could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ShippingMethod->read(null, $id);
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for shipping method', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ShippingMethod->delete($id)) {
			$this->Session->setFlash(__('Shipping method deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Shipping method was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>