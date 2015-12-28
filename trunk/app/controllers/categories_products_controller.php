<?php
class CategoriesProductsController extends AppController {

	var $name = 'CategoriesProducts';

	function index() {
		$this->CategoriesProduct->recursive = 0;
		$this->set('categoriesProducts', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid categories product', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('categoriesProduct', $this->CategoriesProduct->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->CategoriesProduct->create();
			if ($this->CategoriesProduct->save($this->data)) {
				$this->Session->setFlash(__('The categories product has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The categories product could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid categories product', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->CategoriesProduct->save($this->data)) {
				$this->Session->setFlash(__('The categories product has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The categories product could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->CategoriesProduct->read(null, $id);
		}
	}
	//luu lai id_product cua san pham
	// truyen hai tham so : id_product - category_id
	function save_product_id ($id_pro =null,$id_cate =null){
		//if (!$id){
		//$this->Session->setFlash(__('Không có sản phẩm trong thư mục này.', true));
		//}
		/*$get_product = $this->Product->find('first',array('conditions' => array('CategoriesProduct.product_id' => $id)));
		if ($get_product!=null){
			$soluong = $get_product['Product']['quantity'];
			$sl_update = $soluong - $num;
		
		}*/
		
		$this->data['CategoriesProduct']['product_id'] = $id_pro;
		$this->data['CategoriesProduct']['category_id'] =$id_cate;
		$this->CategoriesProduct->save($this->data);
		
		
	}
	
	
	

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for categories product', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->CategoriesProduct->delete($id)) {
			$this->Session->setFlash(__('Categories product deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Categories product was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	function admin_index() {
		$this->CategoriesProduct->recursive = 0;
		$this->set('categoriesProducts', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid categories product', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('categoriesProduct', $this->CategoriesProduct->read(null, $id));
		$vie = $this->CategoriesProduct->read(null, $id);
		return $vie;
		
	}
		function admin_showpro($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid categories product', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('categoriesProduct', $this->CategoriesProduct->read(null, $id));
		$vie = $this->CategoriesProduct->read(null, $id);
		return $vie;
		
	}
	
	function admin_add() {
		if (!empty($this->data)) {
			$this->CategoriesProduct->create();
			if ($this->CategoriesProduct->save($this->data)) {
				$this->Session->setFlash(__('The categories product has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The categories product could not be saved. Please, try again.', true));
			}
		}
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid categories product', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->CategoriesProduct->save($this->data)) {
				$this->Session->setFlash(__('The categories product has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The categories product could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->CategoriesProduct->read(null, $id);
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for categories product', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->CategoriesProduct->delete($id)) {
			$this->Session->setFlash(__('Categories product deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Categories product was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>