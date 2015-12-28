<?php

/**
 *
 */

class BsHelper extends Helper {
	var $helpers = array('Form', 'Html','Price','Seo','Session');

 
    function productArray($data, $model = 'Product') {
		$dateTemp = array();
		//kiem tra data khong rong va khong ton tai model
		if(!empty($data) && (!isset($data[$model]))) {
			foreach ($data as $key => $row) {
				$dateTemp[$key] = $row;
			}
		}
		//model k rong
		if(!empty($data[$model])) { 
			foreach ($data[$model] as $key => $row) {
				$dateTemp[$key] = $row;
			}
		}
		//kiem tra phan tu dau tien trong mang khong rong
        if(!empty($data[0][$model])) {
           foreach ($data as $key => $row) {  
               $dateTemp[$key] = $row[$model];
           } 
        }
		return $this->__extraArrayFields($dateTemp);
		
    }
	
		/*function activateLink($data, $model = false) {
		$controller = Inflector::tableize($model);
		if(!$model) {
			$model = $this->params['models'][0];
			$controller = $this->params['controller'];
		}
		if(isset($data[$model])) {
			$data = $data[$model];
		}
		$alt =  __('Activate', true);
		if($data['active'] == '1') {
			$alt = __('Deactivate', true);
		}
		$action = 'toggle';
		$id = $data['id'];
		$plugin = false;
		return $this->Html->link(
			$this->Html->image('/img/icons/icon_' . $data['active'] . '.gif', array('alt' => $alt)),
			compact('plugin', 'controller', 'action', 'id'),
			array('class' => 'status', 'escape' => false)
		);
	}
	
	
	

/**
 *  TODO
 */
 //xuat mang product ra tung truong 
    function __extraArrayFields($data) {
		$dataNew = array();
		foreach ($data as $key => $row) {
			$dataNew[$key] = $row;
			$dataNew[$key]['link'] = $this->Seo->url($row);
			if(isset($row['price'])) {
				$dataNew[$key]['price'] = $this->Price->format($row, 'flat');
			}
			if(isset($row['images'])) {
				//$dataNew[$key]['img'] = $this->Images->mainImage($row);
			//} else {
                $dataNew[$key]['img'] = $this->Html->image(Configure::read("Image.default"));
            }
			if($row['active'] != 1) {
				unset($dataNew[$key]);
			}
		}
		return $dataNew;
	}

}

	function imageUpload($id) {
		$text = $this->Form->create(array('action' => 'add_image', 'enctype' => 'multipart/form-data'));
		$text .= $this->Form->inputs(array('legend' => __('Add image', true), 'file' => array('type' => 'file', 'name' => 'imageFile')));
		$text .= '<button type="submit">' . __('Add image', true) . '</button>';
		$text .= '</form>';	
		return $text;
	}
?>
