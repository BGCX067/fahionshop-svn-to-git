<?php
class CountriesController extends AppController {

	var $name = 'Countries';
			var $layout = 'admin';

	function index() {
		$this->Country->recursive = 0;
		$this->set('countries', $this->paginate());
		$countries = $this->paginate();
		return $countries;
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid country', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('country', $this->Country->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Country->create();
			if ($this->Country->save($this->data)) {
				$this->Session->setFlash(__('The country has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The country could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid country', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Country->save($this->data)) {
				$this->Session->setFlash(__('The country has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The country could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Country->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for country', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Country->delete($id)) {
			$this->Session->setFlash(__('Country deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Country was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	function admin_index() {
		$this->layout = 'admin';
		$this->Country->recursive = 0;
		$this->set('countries', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid country', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('country', $this->Country->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Country->create();
			if ($this->Country->save($this->data)) {
				$this->Session->setFlash(__('Tạo mới thành công', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Không lưu được. Thử lại', true));
			}
		}
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid country', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Country->save($this->data)) {
				$this->Session->setFlash(__('Cập nhật thành công!', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Không cập nhật được, thử lại.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Country->read(null, $id);
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Lỗi', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Country->delete($id)) {
			$this->Session->setFlash(__('Xóa thành công!', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Quốc gia đã được xóa!', true));
		$this->redirect(array('action' => 'index'));
	}
	function admin_active($id = null){
			if (!$id) {
			$this->Session->setFlash(__('Lỗi!', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->data['Country']['id'] = $id;
		$this->data['Country']['active'] = 0;
		if ($this->Country->save($this->data)) {
			$this->Session->setFlash(__('Trạng thái không được kích hoạt!', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Trạng thái cập nhật thất bại!', true));
		$this->redirect(array('action' => 'index'));
	
	}
		function admin_unactive($id = null){
			if (!$id) {
		//	$this->Session->setFlash(__('Invalid id for country', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->data['Country']['id'] = $id;
		$this->data['Country']['active'] = 1;
		if ($this->Country->save($this->data)) {
		$this->Session->setFlash(__('Trạng thái được kích hoạt!', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Trạng thái cập nhật thất bại', true));
		$this->redirect(array('action' => 'index'));
	}
}

?>