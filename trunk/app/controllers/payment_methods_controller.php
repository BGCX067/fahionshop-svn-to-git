<?php
class PaymentMethodsController extends AppController {

	var $name = 'PaymentMethods';

	function index() {
		$this->PaymentMethod->recursive = 0;
		$this->set('paymentMethods', $this->paginate());
		$payment_mt=$this->paginate();
		return $payment_mt;
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid payment method', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('paymentMethod', $this->PaymentMethod->read(null, $id));
		$payment=$this->PaymentMethod->read(null,$id);
		return $payment;
	}

	function add() {
		if (!empty($this->data)) {
			$this->PaymentMethod->create();
			if ($this->PaymentMethod->save($this->data)) {
				$this->Session->setFlash(__('The payment method has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The payment method could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid payment method', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->PaymentMethod->save($this->data)) {
				$this->Session->setFlash(__('The payment method has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The payment method could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->PaymentMethod->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for payment method', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->PaymentMethod->delete($id)) {
			$this->Session->setFlash(__('Payment method deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Payment method was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	function admin_index() {
		$this->PaymentMethod->recursive = 0;
		$this->set('paymentMethods', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid payment method', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('paymentMethod', $this->PaymentMethod->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->PaymentMethod->create();
			if ($this->PaymentMethod->save($this->data)) {
				$this->Session->setFlash(__('The payment method has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The payment method could not be saved. Please, try again.', true));
			}
		}
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid payment method', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->PaymentMethod->save($this->data)) {
				$this->Session->setFlash(__('The payment method has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The payment method could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->PaymentMethod->read(null, $id);
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for payment method', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->PaymentMethod->delete($id)) {
			$this->Session->setFlash(__('Payment method deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Payment method was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>