<?php
class BrandsController extends AppController {

	var $name = 'Brands';
	var $uses = array('Brand', 'Product');

	function index() {
		$this->Brand->recursive = 0;
		$this->set('brands', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid brand', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('brand', $this->Brand->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Brand->create();
			if ($this->Brand->save($this->data)) {
				$this->Session->setFlash(__('The brand has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The brand could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid brand', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Brand->save($this->data)) {
				$this->Session->setFlash(__('The brand has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The brand could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Brand->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for brand', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Brand->delete($id)) {
			$this->Session->setFlash(__('Brand deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Brand was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
/**
 * Displays the available brands in a menu.
 *
 * The brands are searched by the criteria <code>brands.active=1</code>.
 */


    function menu() {
		return $this->Brand->bsFindAllActive();
    }
	/**
 * Shows (active) brands in the shop.
 *
 * @param id int
 * The ID field of the brand to show.
 */

    function show($id) {
		$this->cacheAction = true;
		$data = $this->Brand->bsFindOne(-1, array('id' => $id));
		$this->_validateUrl($data['Brand']['name']);
		$this->set(compact('data'));
    }
	/**
 * Shows (active) products for brand
 *
 * The search goes two levels deep.
 *
 * @param id int
 * The ID field of the brand to show.
 */function products($id) {
		return $this->Brand->bsFindOne(2, array('id' => $id));
    }

	
	function admin_index() {
		$this->Brand->recursive = 0;
		$this->set('brands', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid brand', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('brand', $this->Brand->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Brand->create();
			if ($this->Brand->save($this->data)) {
				$this->Session->setFlash(__('The brand has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The brand could not be saved. Please, try again.', true));
			}
		}
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid brand', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Brand->save($this->data)) {
				$this->Session->setFlash(__('The brand has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The brand could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Brand->read(null, $id);
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for brand', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Brand->delete($id)) {
			$this->Session->setFlash(__('Brand deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Brand was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>