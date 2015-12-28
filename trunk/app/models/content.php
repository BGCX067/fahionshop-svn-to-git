<?php
class Content extends AppModel {
	var $name = 'Content';
	var $displayField = 'name';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'ContentCategory' => array(
			'className' => 'ContentCategory',
			'foreignKey' => 'content_category_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
?>