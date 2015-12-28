
<?php
class CategoriesController extends AppController {

	var $name = 'Categories';
	function index() {
		$this->Category->recursive = 0;
		$this->set('categories', $this->paginate());
		
	}
	
	 // cac san pham trong 1 thu muc
	//tim san pham trong thu muc co tham so la id 
	function products($id) {
		$data = $this->Category->find('first', array('conditions' => array(
			'Category.id' => $id), 'recursive' => 2));
		return $data;
        
	}
//menu-women
	function menu_women($id = 3) {
		return $this->Category->__menu('flat', $id);
	}
//menu -men
	function menu_men($id = 1) {
		return $this->Category->__menu('flat', $id);
	}
//menu - sparts
	function menu_parts($id = 4) {
		return $this->Category->__menu('flat', $id);
	}
/*function show($id = false) {
		if(!$id) {
			$id = $this->defaultCategory;
		}
		$this->cacheAction = true;
		$data = $this->Category->bsFindOneActive(-1, array('id' => $id));
		
		$this->_validateUrl($data['Category']['name']);
		$breadcrumbs = $this->Category->getpath($id);
		
		$this->set(compact('data', 'breadcrumbs'));
		
	}*/
//hien thi danh muc
	function show($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Category', true));
			$this->redirect(array('action' => 'index'));
		}
		$data=$this->Category->read(null, $id);
		$breadcrumbs = $this->Category->getpath($id);
		$this->set(compact('data', 'breadcrumbs'));
		//$this->set('data', $this->Category->read(null, $id));
	}
	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid category', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('category', $this->Category->read(null, $id));
	}
	function add() {
		if (!empty($this->data)) {
			$this->Category->create();
			if ($this->Category->save($this->data)) {
				$this->Session->setFlash(__('The category has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The category could not be saved. Please, try again.', true));
			}
		}//Category->generatetreelist(null, null, null, '--') 
		$condition =array('Category.active'=>'1');
		$parentCategories = $this->Category->generatetreelist($condition,null,null,'__');
		var_dump($parentCategories);
	//	$products = $this->Category->Product->find('list');
	//	$contents = $this->Category->Content->find('list');
		$this->set(compact('parentCategories', 'products', 'contents'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid category', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Category->save($this->data)) {
				$this->Session->setFlash(__('The category has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The category could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Category->read(null, $id);
		}
		$parentCategories = $this->Category->ParentCategory->find('list');
		$products = $this->Category->Product->find('list');
		$contents = $this->Category->Content->find('list');
		$this->set(compact('parentCategories', 'products', 'contents'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for category', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Category->delete($id)) {
			$this->Session->setFlash(__('Category deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Category was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	function admin_index() {
		$this->layout = 'admin';
		$this->Category->recursive = 0;
		$this->set('categories',$this->paginate());
		//$get_all_cats = $this->paginate();
		/*$cats = array();
		$sub_cats = array();
		foreach($get_all_cats as $cat){
			if($cat['Category']['parent_id'] == null){
				$cats = $cat;
			}
			else{
				$sub_cats = $cat;
			}
		}
		var_dump($cats);
		$return_all = array();
		foreach($cats as $cat){
			$return_all[] = $cat;
			foreach($sub_cats as $sub=>$key){
				if($cat['Category']['id'] == $key['Category']['parent_id']){
					$return_all[] = $cat;
					unset($sub_cats[$sub]);
				}
			}
		}
		$this->set('all_cat',$return_all);
		$this->set('categories',$this->paginate() );
		////var_dump($this->paginate());
		//$cate =$this->paginate();
		//$cha = $this->Category->find('all',array('group' => array('Category.parent_id')));
		//$this->set('cha',$cha);
		//$con =$this->Category->find*/
		
	}

	function admin_view($id = null) {
		$this->layout = 'admin';
		if (!$id) {
			$this->Session->setFlash(__('Lỗi thư mục sản phẩm', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('category', $this->Category->read(null, $id));
		$this->set('list_products_by_cate_id',$this->Category->CategoriesProduct->find('all',array(
			'conditions' => array(
				'CategoriesProduct.category_id' => $id
			
		))));
		
		
		
	}
	
	
	function admin_add() {
	$this->layout = 'admin';
		if (!empty($this->data)) {
			$this->Category->create();
			
			if ($this->Category->save($this->data)) {
				$this->Session->setFlash(__('Tạo mới thành công!', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Lưu không thành công. Thử lại', true));
			}
		}
		
		$parentCategories = $this->Category->find('list',array(
			'conditions'=>array(
				'Category.parent_id'=> null,
				'Category.active'=>1
			)));
	$this->set(compact('parentCategories', 'products', 'contents'));

	}
		
	function admin_edit($id = null) {
		$this->layout = 'admin';
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Lỗi thư mục sản phẩm', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
		
			if ($this->Category->save($this->data)) {
				$this->Session->setFlash(__('Cập nhật thành công!', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Cập nhật không thành công. Thử lại!', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Category->read(null, $id);
		}
		
		$parentCategories = $this->Category->generatetreelist(array('Category.active' =>1),null,null,'__');
		$products = $this->Category->Product->find('list');
		
		$this->set(compact('parentCategories', 'products'));
	}

		function admin_delete($id = null) {
			$this->layout = 'admin';
			if (!$id) {
				$this->Session->setFlash(__('Lỗi thư mục sản phẩm', true));
				$this->redirect(array('action'=>'index'));
			}
			if ($this->Category->delete($id)) {
			
				$this->Session->setFlash(__('Xóa thành công!', true));
				$this->redirect(array('action'=>'index'));
			}
			$this->Session->setFlash(__('Thư mục không thể xóa', true));
			$this->redirect(array('action' => 'index'));
		}
		function admin_active($id = null){
				if (!$id) {
					//$this->Session->setFlash(__('Invalid id for order', true));
					$this->Session->setFlash(__('Lỗi thư mục sản phẩm', true));
					$this->redirect(array('action'=>'index'));
				}

					$this->data['Category']['id'] = $id;
					$this->data['Category']['active'] = 0;
					$is_save =false;
					if ($this->Category->save($this->data)) {
						$is_save = true;
					}
					else{
						$is_save = false;
					}
					//Leepro
					//Nếu như active thành công
					if($is_save == true){
						$get_category =$this->Category->read(null, $id);
						
						//die();
						//kiểm tra thông tin của chuyên mục con
						if(!empty($get_category['ChildCategory'])){
							$this->Category->create();
							foreach($get_category['ChildCategory'] as $set_active){
								$this->data['Category']['id'] = $set_active['id'];
								$this->data['Category']['active'] = 0;
								if($this->Category->save($this->data)){
									$is_save = true;
								}
								else{
									$is_save = false;
								}
							}
							
						}
						$this->Session->setFlash(__('Trạng thái không được kích hoạt!', true));
					}
					else{
						$this->Session->setFlash(__('Trạng thái cập nhật thất bại!', true));
						
					}
					//die();
					$this->redirect(array('action' => 'index'));
		}
		
		function admin_unactive($id = null){
			if (!$id) {
				//$this->Session->setFlash(__('Invalid id for order', true));
				$this->Session->setFlash(__('Lỗi thư mục sản phẩm', true));
				$this->redirect(array('action'=>'index'));
			}

				$this->data['Category']['id'] = $id;
				$this->data['Category']['active'] = 1;
				$is_save =false;
				if ($this->Category->save($this->data)) {
					$is_save = true;
				}
				else{
					$is_save = false;
				}
				//Leepro
				//Nếu như active thành công
				if($is_save == true){
					$get_category =$this->Category->read(null, $id);
					//kiểm tra thông tin của chuyên mục con
					
					if(!empty($get_category['ChildCategory'])){
						$this->Category->create();
						foreach($get_category['ChildCategory'] as $set_active){
							$this->data['Category']['id'] = $set_active['id'];
							$this->data['Category']['active'] = 1;
							if($this->Category->save($this->data)){
								$is_save = true;
							}
							else{
								$is_save = false;
							}
						}
						
					}
					$this->Session->setFlash(__('Trạng thái được kích hoạt', true));
				}
				else{
					$this->Session->setFlash(__('Trạng thái cập nhật thất bại', true));
					
				}
				$this->redirect(array('action' => 'index'));
		}
	}