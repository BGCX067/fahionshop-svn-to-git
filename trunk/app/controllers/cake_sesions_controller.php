<?php
class CakeSesionsController extends AppController {

	var $name = 'CakeSesions';

	function index() {
		$this->CakeSesion->recursive = 0;
		$this->set('cakeSesions', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid cake sesion', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('cakeSesion', $this->CakeSesion->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->CakeSesion->create();
			if ($this->CakeSesion->save($this->data)) {
				$this->Session->setFlash(__('The cake sesion has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cake sesion could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid cake sesion', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->CakeSesion->save($this->data)) {
				$this->Session->setFlash(__('The cake sesion has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cake sesion could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->CakeSesion->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for cake sesion', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->CakeSesion->delete($id)) {
			$this->Session->setFlash(__('Cake sesion deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Cake sesion was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	function admin_index() {
		$this->CakeSesion->recursive = 0;
		$this->set('cakeSesions', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid cake sesion', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('cakeSesion', $this->CakeSesion->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->CakeSesion->create();
			if ($this->CakeSesion->save($this->data)) {
				$this->Session->setFlash(__('The cake sesion has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cake sesion could not be saved. Please, try again.', true));
			}
		}
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid cake sesion', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->CakeSesion->save($this->data)) {
				$this->Session->setFlash(__('The cake sesion has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cake sesion could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->CakeSesion->read(null, $id);
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for cake sesion', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->CakeSesion->delete($id)) {
			$this->Session->setFlash(__('Cake sesion deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Cake sesion was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>