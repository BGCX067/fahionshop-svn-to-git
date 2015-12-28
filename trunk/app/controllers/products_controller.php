<?php
class ProductsController extends AppController {

	var $name = 'Products';
	var $uses = array('Product', 'Category');
	var $helpers = array('Paginator','Html');
	function index() {
		$this->Product->recursive = 0;
		$this->set('products', $this->paginate());
		$pro = $this->paginate();
		return $pro;
		
		
	}
	function addpro(){
		$this->layout = 'admin';
		if (!empty($this->data)) {
			$this->Product->create();
			if ($this->Product->save($this->data)) {
				$this->Session->setFlash(__('Lưu thành công sản phẩm', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Sản phẩm không lưu được. Thử lại.', true));
			}
		}
		$brands = $this->Product->Brand->find('list');
		$categories = $this->Product->Category->find('list');
		$users = $this->Product->User->find('list');
		$this->set(compact('brands', 'categories', 'users'));
	}
	/**
 * get search results
 */
	    
    function search_products() {
        // the page we will redirect to
        $url['action'] = 'search';

        foreach ($this->data as $k=>$v){ 
            foreach ($v as $kk=>$vv){ 
                $url[$kk]=$vv; 
            } 
        }

        // redirect the user to the url
        $this->redirect($url, null, true);
    }
	// luu lai so luong san pham sau khi thanh toan hoan tat
	//(truyen hai tham so id = san pham ban, num = so luong ban)
	function save_product_sale ($id =null,$num =null){
		if (!$id){
		$this->Session->setFlash(__('Không có sản phẩm này.', true));
		}
		$get_product = $this->Product->find('first',array('conditions' => array('Product.id' => $id)));
		if ($get_product!=null){
			$soluong = $get_product['Product']['quantity'];
			$sl_update = $soluong - $num;
		
		}
		
		$this->data['Product']['id'] = $id;
		$this->data['Product']['quantity'] =$sl_update;
		$this->Product->save($this->data);
		
		
	}
	
	
	function search() {
		$this->Content->recursive = 0;
				
		if (!empty($this->passedArgs['key']))
        {
		    $key = $this->passedArgs['key'];
            $this->paginate['conditions']['OR'] = array('Product.name LIKE' => "%$key%",'Product.description LIKE' => "%$key%"); 
        }
		$this->set('contents', $this->paginate());	
	}	
	
	
	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid product', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('product', $this->Product->read(null, $id));
	}
	/**
 * get recent products
 * @param $limit
 */
	 function recent($limit = 20) {
	 
						 
		$data = $this->Product->find('all', array('limit' => $limit, 'order' => 'Product.id DESC','recursive'=>-1)); 
		
			

		$this->set(compact('data'));
    }    
/**
 * get saleoff products
 * @param $limit
 */
 function saleoff($limit = 20) {
        $data = $this->Product->find('all', array('limit' => $limit, 'order' => 'Product.id DESC','recursive'=>-1, 'conditions' => array('special_price >' => "0"))); 
        $this->set(compact('data'));
    }   
	
	function add() {
		if (!empty($this->data)) {
			$this->Product->create();
			if ($this->Product->save($this->data)) {
				$this->Session->setFlash(__('The product has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The product could not be saved. Please, try again.', true));
			}
		}
	
		$brands = $this->Product->Brand->find('list');
		$categories = $this->Product->Category->find('list');
		$users = $this->Product->User->find('list');
		$this->set(compact('brands', 'categories', 'users'));
	}
	//show product in shop
	/*function show($id) {
		$this->cacheAction = true; 
        $data = $this->Product->read(null, $id);
		$this->_validateUrl($data['Product']['name']);
        if (isset($data['Category'][0]['id'])){
		    $breadcrumbs = $this->Category->getpath($data['Category'][0]['id']);
        }
		$this->set(compact('data', 'breadcrumbs'));
    }*/
	
	function show($id) {
		if (!$id) {
			$this->redirect(array('action' => 'index'));
		}
		$product = $this->Product->read(null, $id);
		if(isset($this->params['requested'])) {
             return $product;
        } 
		$this->set('data', $product);
	}


	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid product', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Product->save($this->data)) {
				$this->Session->setFlash(__('The product has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The product could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Product->read(null, $id);
		}
		$brands = $this->Product->Brand->find('list');
		$categories = $this->Product->Category->find('list');
		$users = $this->Product->User->find('list');
		$this->set(compact('brands', 'categories', 'users'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for product', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Product->delete($id)) {
			$this->Session->setFlash(__('Product deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Product was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	
	function shopping_cart(){
		//$this->Session->delete('items');
		$curItems = array();
		$curItems = $this->Session->read("items");
		if($curItems == null){//gio hang ban dau rong chua co mat hang gi
			$items = array();
			if(!empty($this->data)){
				$item = array('id'=> $this->data['LineItem']['product_id'], 'quantity' =>$this->data['product']['quantity']);
				$items[] = $item;
				$this->Session->write('items',$items);
			}
		}else{
			if(!empty($this->data['LineItem']['product_id'])){
				$item = array('id'=> $this->data['LineItem']['product_id'], 'quantity' =>$this->data['product']['quantity']);
				$bl = 1;
				foreach($curItems as $key => $cItem){
					if(in_array($item['id'],$cItem)){
						//var_dump("Hello");
						$bl = 0;
						$curItems[$key]['quantity'] = $cItem['quantity'] + $item['quantity'];
					}
				}
				if($bl == 1){
					$curItems[] = $item;
				}
				//xoa cai truoc do
				$this->Session->delete('items');
				$this->Session->write('items',$curItems);
			}else if($this->data['action']== 'update'){
				foreach($curItems as $key => $cItem){
					if(isset($this->data[$cItem['id']][$cItem['id']])){
						$curItems[$key]['quantity'] = $this->data[$cItem['id']][$cItem['id']];
						if(isset($this->data["remove{$cItem['id']}"]) && $this->data["remove{$cItem['id']}"] ==1){
							$curItems[$key]['quantity'] = 0;
						}
					}
				}
				$this->Session->delete('items');
				$this->Session->write('items',$curItems);
			}
		}
	}
	// ADMIN ARERA
	function admin_index() {
		$this->layout = 'admin';
		$this->Product->recursive = 0;
		$this->set('products', $this->paginate());
	}

	function admin_view($id = null) {
		$this->layout = 'admin';
		if (!$id) {
			$this->Session->setFlash(__('Lỗi!', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('product', $this->Product->read(null, $id));
		
		
	}
	
	function admin_add() {
		$this->layout = 'admin';
		
		if (!empty($this->data)) {
			//CHECK DATA IMAGE
			if(!empty($this->data['Product']['images'])){
						$fileOK = $this->uploadFiles('img/uploads', $this->data['Product']['images']);
						
							$this->data['Product']['images'] = $fileOK['urls'][0];
						
					}
			//CHECK DATA IMAGE_DETAIL_1
					if(!empty($this->data['Product']['detail_image_1'])){
						$fileOK1 = $this->uploadFiles('img/uploads', $this->data['Product']['detail_image_1']);
						
							$this->data['Product']['detail_image_1'] = $fileOK1['urls'][0];
						
					}
					//CHECK DATA IMAGE_DETAIL_2
					if(!empty($this->data['Product']['detail_image_2'])){
						$fileOK2 = $this->uploadFiles('img/uploads', $this->data['Product']['detail_image_2']);
						
							$this->data['Product']['detail_image_2'] = $fileOK2['urls'][0];
						
					}
					//CHECK DATA IMAGE_DETAIL_3
					if(!empty($this->data['Product']['detail_image_3'])){
						$fileOK3 = $this->uploadFiles('img/uploads', $this->data['Product']['detail_image_3']);
						
							$this->data['Product']['detail_image_3'] = $fileOK3['urls'][0];
						
					}
			
		
			//$fileOK = $this->uploadFiles('img/uploads', $this->data['Product']['images']);
			//$fileOK1 = $this->uploadFiles('img/uploads', $this->data['Product']['detail_image_1']);
			//$fileOK2 = $this->uploadFiles('img/uploads', $this->data['Product']['detail_image_2']);
			//$fileOK3 = $this->uploadFiles('img/uploads', $this->data['Product']['detail_image_3']);
			
		
			
			//$this->data['Product']['images'] = $fileOK['urls'][0];
			//$this->data['Product']['detail_image_1']=$fileOK1['urls'][0];
			//$this->data['Product']['detail_image_2']=$fileOK2['urls'][0];
			//$this->data['Product']['detail_image_3']=$fileOK3['urls'][0];
			
			
				
				
				
				$this->Product->create();
				if ($this->Product->save($this->data)) {
				
					if(!empty($this->data[Product][category])){
						$get_cat_id = $this->data[Product][category];
						$newProductId = $this->Product->id;
					
						$product_category = array();
						$product_category=array('category_id'=>$get_cat_id,'product_id'=>$newProductId);
						$this->Product->CategoriesProduct->Create();
						$this->Product->CategoriesProduct->save($product_category);
					}
				
					$this->Session->setFlash(__('Tạo mới sản phẩm thành công!', true));
					$this->redirect(array('action' => 'index'));
					} else {
			
					$this->Session->setFlash(__('Sản phẩm không lưu được. Thử lại.', true));
					}
			
			
			
			
			
			
		}
				
			
		
		
				$brands = $this->Product->Brand->find('list');
				$categories = $this->Product->Category->generatetreelist(null,null,null,'__');
				$users = $this->Product->User->find('list');
				//$categories = $this->Product->Category->find('list');
				$this->set(compact('brands', 'categories', 'users'));
	}
	
	
	function display($id = null) {
		
		if (!$id) {
			$this->Session->setFlash(__('Lỗi!', true));
			$this->redirect(array('action' => 'index'));
		}
		$gg= $this->Product->read(null, $id);
		
		
		return $gg;
		
	}

	

	function admin_edit($id = null) {
		$this->layout = 'admin';
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Lỗi sản phẩm', true));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data)) {
			
			//edit image
			if(!empty($this->data['Product']['images_new'])){
				$file = $this->uploadFiles('img/uploads', $this->data['Product']['images_new']);
				if(array_key_exists('urls', $file)) {
					$this->data['Product']['images'] = $file['urls'][0];
				}
				
			}
			//edit image_detail_1
			if(!empty($this->data['Product']['detail_image_1_new'])){
				$file1 = $this->uploadFiles('img/uploads', $this->data['Product']['detail_image_1_new']);
				if(array_key_exists('urls', $file1)) {
					$this->data['Product']['detail_image_1'] = $file1['urls'][0];
				}
				
			}
			//edit image_detail_2
			if(!empty($this->data['Product']['detail_image_2_new'])){
				$file2 = $this->uploadFiles('img/uploads', $this->data['Product']['detail_image_2_new']);
				if(array_key_exists('urls', $file2)) {
					$this->data['Product']['detail_image_2'] = $file2['urls'][0];
				}
				
			}
			//edit image_detail_3
			if(!empty($this->data['Product']['detail_image_3_new'])){
				$file3 = $this->uploadFiles('img/uploads', $this->data['Product']['detail_image_3_new']);
				if(array_key_exists('urls', $file3)) {
					$this->data['Product']['detail_image_3'] = $file3['urls'][0];
				}
				
			}
			
			
		
			
			
			
			if ($this->Product->save($this->data)) {
				$this->Session->setFlash(__('Cập nhật thành công', true));
				if(!empty($this->data[Product][cates])){
					$id_cat = $this->data[Product][cates];
					$this->requestAction("/categories_products/save_product_id/".$id."/".$id_cat);	
				}
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Sản phẩm không cập nhật được. Thử lại.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Product->read(null, $id);
		}
		$brands = $this->Product->Brand->find('list');
		$categories = $this->Product->Category->generatetreelist(null,null,null,'__');
		$users = $this->Product->User->find('list');
		
		//$categories =$this->Product->Category->find('all');
		$this->set(compact('brands', 'categories', 'users'));
		//array('conditon'=>array('Category.parent_id ' => null))
	}
	function admin_delete($id = null) {
		$this->layout = 'admin';
		if (!$id) {
			$this->Session->setFlash(__('Lỗi', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Product->delete($id)) {
		
			$this->Session->setFlash(__('Sản phẩm đã được xóa', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Sản phẩm không xóa được', true));
		$this->redirect(array('action' => 'index'));
	}
	
		function admin_active($id = null){
				if (!$id) {
				$this->Session->setFlash(__('Invalid id for product', true));
				$this->redirect(array('action'=>'index'));
				}
				$this->data['Product']['id'] = $id;
				$this->data['Product']['active'] = 0;
				//var_dump($this->data);
				//die();
				if ($this->Product->save($this->data)) {
					$this->Session->setFlash(__('Đơn hàng đang thực hiện!', true));
					$this->redirect(array('action'=>'index'));
				}
				$this->Session->setFlash(__('Trạng thái cập nhật thất bại', true));
				$this->redirect(array('action' => 'index'));
			}
						
		function admin_unactive($id = null){
			if (!$id) {
			$this->Session->setFlash(__('Invalid id for product', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->data['Product']['id'] = $id;
		$this->data['Product']['active'] = 1;	
		//var_dump($vien);
		
		//die();
		if ($this->Product->save($this->data)) {
			$this->Session->setFlash(__('Trạng thái được kích hoạt ', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Trạng thái cập nhật thất bại', true));
		$this->redirect(array('action' => 'index'));
		
	}
}
?>