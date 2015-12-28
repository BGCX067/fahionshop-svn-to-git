<?php
/**
 * Application model for Cake.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.cake.libs.model
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

/**
 * Application model for Cake.
 *
 * This is a placeholder class.
 * Create the same file in app/app_model.php
 * Add your application-wide methods to the class, your models will inherit them.
 *
 * @package       cake
 * @subpackage    cake.cake.libs.model
 */
 //return menu
class AppModel extends Model {
/**
 * Return menu
 *   Sinh ra menu
 */
//types : flat, full, admin_flat, admin_full,

	  function __menu($type = 'flat', $id) {
		$conditions = array($this->name . '.parent_id' => $id);
		$recursive = -1;
		/*if(!strstr($type, 'admin')) {
			$conditions = array_merge($conditions, array($this->name . '.active' => '1'));
		}*/
		if(strstr($type, 'flat')) {
			$data = $this->find('all', array('conditions' => $conditions, 'recursive' => $recursive));
		}/* else {
			$data = $this->findAllThreaded('', array('id', 'name', 'parent_id', 'active'));
		}*/
		return $data;
    }
/**
 * Find all active
 */

    function bsFindAllActive($recursive = -1, $conditions = array()) {
		$conditions = array_merge($conditions, array('active' => '1'));
		$data = $this->find('all', array('conditions' => $conditions, 'recursive' => $recursive));
		return $data;
    }
	/**
 * Find one 
 */

    function bsFindOne($recursive = -1, $conditions = array()) {
		$data = $this->find('first', array('conditions' => $conditions, 'recursive' => $recursive));
		return $data;
    }

}
