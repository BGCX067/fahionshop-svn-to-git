<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
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
 * @subpackage    cake.cake.libs.controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

/**
 * This is a placeholder class.
 * Create the same file in app/app_controller.php
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       cake
 * @subpackage    cake.cake.libs.controller
 * @link http://book.cakephp.org/view/957/The-App-Controller
 */
class AppController extends Controller {
	var $components = array('Cookie','Auth','RequestHandler','Session','DebugKit.Toolbar');
	var $helpers = array('Cache','Description', 'Header', 'Price', 'Bs','Seo', 'Bsform', 'Tree','Hcard');
	
	function _validateUrl($name) {
		$name = format_seo($name);

		$url = ltrim($_SERVER['REQUEST_URI'], "/");
		if(strstr($url, '.html')) {
			$urlArray = explode('-', $url);
			$urlArrayCount = count($urlArray);
			$end = $urlArray[$urlArrayCount - 1];
			$type = $urlArray[$urlArrayCount - 2];
			if($url != $name . '-' . $type . '-' . $end) {
				//$this->redirect('/' . $name . '-' . $type . '-' . $end, 301);
			}
		}
	}
	function beforeFilter() {

		$this->Auth->allow();
		$this->Auth->authorize = 'actions';
		$this->Auth->actionPath = 'controllers/';
		//$this->Auth->userScope = array('User.confirmed' => '1');//Nếu confirmed !=1 thì không đăng nhập được
		$this->Auth->loginAction = array('controller' => 'users', 'action' => 'login');
		$this->set('loginIn', $this->Auth->user());
	}
	
		/**
	 * uploads image of product to the server
	 * @params:
	 *		$folder 	= the folder to upload the files e.g. 'img/uploads'
	 *		$formdata 	= the array containing the form files
	 *		$itemId 	= id of the item (optional) will create a new sub folder
	 * @return:
	 *		will return an array with the success of each file upload
	 */
	/**
	 * AppController::uploadFiles()
	 * 
	 * @return
	 */
	function uploadFiles($folder, $formdata, $itemId = null) {
			// setup dir names absolute and relative
			$folder_url = WWW_ROOT.$folder;
			$rel_url = $folder;
		
			// create the folder if it does not exist
			if(!is_dir($folder_url)) {
				mkdir($folder_url);
			}
			
			// if itemId is set create an item folder
				if($itemId) {
				// set new absolute folder
				$folder_url = WWW_ROOT.$folder.'/'.$itemId; 
				// set new relative folder
				$rel_url = $folder.'/'.$itemId;
				// create directory
				if(!is_dir($folder_url)) {
					mkdir($folder_url);
				}
			}
			// list of permitted file types, this is only images but documents can be added  
			$permitted = array('image/jpg','image/gif','image/jpeg','image/pjpeg','image/png');
			// loop through and deal with the files
			//foreach($formdata as $file) {
				$file = $formdata;
				//var_dump($formdata);
				//die();
				// replace spaces with underscores
				$filename = str_replace(' ', '_', $file['name']);
				// assume filetype is false
				$typeOK = false;
				// check filetype is ok
				foreach($permitted as $type) {
				//$type = 'application/octet-stream';
					if($type == $file['type']) {
						$typeOK = true;
						break;
					}
				}
		
				if($typeOK) {
				// switch based on error code
					switch($file['error']) {
					case 0:
						// check filename already exists
						if(!file_exists($folder_url.'/'.$filename)) {
							// create full filename
							$full_url = $folder_url.'/'.$filename;
							$url = $rel_url.'/'.$filename;
							//$url = $filename;
							// upload the file
							$success = move_uploaded_file($file['tmp_name'], $url);
						} else {
							// create unique filename and upload file
							ini_set('date.timezone', 'Europe/London');
							$now = date('Y-m-d-His');
							$full_url = $folder_url.'/'.$now.$filename;
							$url = $rel_url.'/'.$now.$filename;
							//$url = $now.$filename;
							//$save_image=$now.$filename;
							$success = move_uploaded_file($file['tmp_name'], $url);
						}
						// if upload was successful
						if($success) {
							// save the url of the file
							$result['urls'][] = $url;
						} else {
							$result['errors'][] = "Error uploaded $filename. Please try again.";
						}
						break;
					case 3:
						// an error occured
						$result['errors'][] = "Error uploading $filename. Please try again.";
						break;
					default:
						// an error occured
						$result['errors'][] = "System error uploading $filename. Contact webmaster.";
						break;
					}
				} elseif($file['error'] == 4) {
					// no file was selected for upload
					$result['nofiles'][] = "No file Selected";
				} else {
					// unacceptable file type
					//if (substr($filename, -4) == '.zip')
						//$result['errors'][] = "$filename cannot be uploaded. Please try again";
					//else
						$result['errors'][] = "$filename cannot be uploaded. Acceptable file types: jpg,gif,jpeg,png";
				}
			//}
			
		return $result;
		
	}
	
	
	



	}