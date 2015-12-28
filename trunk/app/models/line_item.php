<?php
class LineItem extends AppModel {
	var $name = 'LineItem';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Order' => array(
			'className' => 'Order',
			'foreignKey' => 'order_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Product' => array(
			'className' => 'Product',
			'foreignKey' => 'product_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
		/*,
		'Brand' => array(
			'className' => 'Brand',
			'foreignKey' => 'brand_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)*/
	);
	
/**
 * add product to cart
 *
 * @protected
 */

	function addToCart($data) {
		if(!isset($data['quantity'])) {
			$data['quantity'] = '1';
		}
		$current_quantity = $this->getQuantity(
			$data['order_id'],
			$data['product_id']
		);
		$data['quantity'] = $data['quantity'] + $current_quantity;
		if($current_quantity > 0) {
			$this->addQuantity(
				$data['order_id'],
				$data['product_id'],
				$data['quantity']
			);
		} else {
			$this->data['LineItem'] = $data;
			$this->save($this->data);
		}	
}

/**
 * get quantity of one product in shopping cart
 *
 * @protected
 */

	function getQuantity($order_id, $product_id) {
		$data = $this->find('first', 
			array('conditions' => 
				array('order_id' => $order_id,
					'product_id' => $product_id,	
				), 'recursive' => -1));
		if(!$data) {
			return '0';
		} else {
			return $data['LineItem']['quantity'];		
		}		
	}
	
	
/**
 * add quantity of an existing product
 * @protected
 */

	function addQuantity($order_id, $product_id, $new_quantity) {
		$data = $this->find('first', 
			array('conditions' => 
				array('order_id' => $order_id,
					'product_id' => $product_id,	
				), 'recursive' => -1));
		
		$this->id = $data['LineItem']['id'];
		$this->saveField('quantity', $new_quantity);
	}
	/**
 * edit multiple line_item quantities
 */

	function editQuantities($data) {
		foreach ($data['LineItem'] as $row) {
			if($row['quantity'] == 0) {
				$this->del($row['id']);
			} else {
				$this->recursive = -1;
				$this->id = $row['id'];
				$this->saveField('quantity', $row['quantity']);
				
			}
		}
	}
}
/**
 * 
 */

?>