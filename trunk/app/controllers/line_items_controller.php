<?php
class LineItemsController extends AppController {

	var $name = 'LineItems';
	var $uses = array('LineItem', 'Order');

	function index() {
		$this->LineItem->recursive = 0;
		$this->set('lineItems', $this->paginate());
		$tt = $this->paginate();
		
		return $tt;
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid line item', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('lineItem', $this->LineItem->read(null, $id));
	}
	/* Them vao gio hang*/
	function add(){

		//$tham =$this->Session->write("nhan");
		//$this->Session->read($tham);
		//$data['order_id'] = $this->Order->cartId($this->Session->read('Config.rand'));
		//$data = array_merge($this->data['LineItem'], $data);

		
		$order = $this->Session->read('tham');
		$this->Session->write('tham',$this->data['LineItem']['product_id']);
		$data['order_id'] = $this->Order->cartId($this->Session->read('Config.rand'));
		$data = array_merge($this->data['LineItem'], $data);

		
		$this->LineItem->addToCart($data);
		
		
		//$this->redirect(array('controller' => 'products', 'action' => 'show', 'id' => $data['product_id'], 'cart' => 'added'));
	}
	/**
 * Cap nhat so luong
 * 
 */

    function edit_quantities() {
		$this->LineItem->editQuantities($this->data);
		$this->redirect($_SERVER['HTTP_REFERER']);
    }	

	/*function add() {
		if (!empty($this->data)) {
			$this->LineItem->create();
			if ($this->LineItem->save($this->data)) {
				$this->Session->setFlash(__('The line item has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The line item could not be saved. Please, try again.', true));
			}
		}
		$orders = $this->LineItem->Order->find('list');
		$products = $this->LineItem->Product->find('list');
		$brands = $this->LineItem->Brand->find('list');
		$this->set(compact('orders', 'products', 'brands'));
	}*/
// viet ham liet ke danh sach ban chạy
	function list_idproduct(){
	//$lists =array();
	//$lists = $this->LineItem->find('list',array('fields' => array('LineItem.product_id')));
	//$kk= $this->LineItem->Product->find('list',array('fields'=>array('Product.id')));
	//$tt =$this->LineItem->find('all');
	//$this->set('list',$tt);
	//foreach ($kk as $mm) {
		//foreach ($tt as $ii){
		
		//}
	//}
	//var_dump($this->data);
	}
	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid line item', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->LineItem->save($this->data)) {
				$this->Session->setFlash(__('The line item has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The line item could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->LineItem->read(null, $id);
		}
		$orders = $this->LineItem->Order->find('list');
		$products = $this->LineItem->Product->find('list');
		$brands = $this->LineItem->Brand->find('list');
		$this->set(compact('orders', 'products', 'brands'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for line item', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->LineItem->delete($id)) {
			$this->Session->setFlash(__('Line item deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Line item was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	function admin_index() {
		$this->LineItem->recursive = 0;
		$this->set('lineItems', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid line item', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('lineItem', $this->LineItem->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->LineItem->create();
			if ($this->LineItem->save($this->data)) {
				$this->Session->setFlash(__('The line item has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The line item could not be saved. Please, try again.', true));
			}
		}
		$orders = $this->LineItem->Order->find('list');
		$products = $this->LineItem->Product->find('list');
		$brands = $this->LineItem->Brand->find('list');
		$this->set(compact('orders', 'products', 'brands'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid line item', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->LineItem->save($this->data)) {
				$this->Session->setFlash(__('The line item has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The line item could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->LineItem->read(null, $id);
		}
		$orders = $this->LineItem->Order->find('list');
		$products = $this->LineItem->Product->find('list');
		$brands = $this->LineItem->Brand->find('list');
		$this->set(compact('orders', 'products', 'brands'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for line item', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->LineItem->delete($id)) {
			$this->Session->setFlash(__('Line item deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Line item was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>