<?php
class ContentCategoriesController extends AppController {

	var $name = 'ContentCategories';

	function index() {
		$this->ContentCategory->recursive = 0;
		$this->set('contentCategories', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid content category', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('contentCategory', $this->ContentCategory->read(null, $id));
	}
	function view_shoppingcart(){
	
	}
	

	function add() {
		if (!empty($this->data)) {
			$this->ContentCategory->create();
			if ($this->ContentCategory->save($this->data)) {
				$this->Session->setFlash(__('The content category has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The content category could not be saved. Please, try again.', true));
			}
		}
		$parentContentCategories = $this->ContentCategory->ParentContentCategory->find('list');
		$this->set(compact('parentContentCategories'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid content category', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ContentCategory->save($this->data)) {
				$this->Session->setFlash(__('The content category has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The content category could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ContentCategory->read(null, $id);
		}
		$parentContentCategories = $this->ContentCategory->ParentContentCategory->find('list');
		$this->set(compact('parentContentCategories'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for content category', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ContentCategory->delete($id)) {
			$this->Session->setFlash(__('Content category deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Content category was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	function admin_index() {
		$this->ContentCategory->recursive = 0;
		$this->set('contentCategories', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid content category', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('contentCategory', $this->ContentCategory->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->ContentCategory->create();
			if ($this->ContentCategory->save($this->data)) {
				$this->Session->setFlash(__('The content category has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The content category could not be saved. Please, try again.', true));
			}
		}
		$parentContentCategories = $this->ContentCategory->ParentContentCategory->find('list');
		$this->set(compact('parentContentCategories'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid content category', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ContentCategory->save($this->data)) {
				$this->Session->setFlash(__('The content category has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The content category could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ContentCategory->read(null, $id);
		}
		$parentContentCategories = $this->ContentCategory->ParentContentCategory->find('list');
		$this->set(compact('parentContentCategories'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for content category', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ContentCategory->delete($id)) {
			$this->Session->setFlash(__('Content category deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Content category was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>