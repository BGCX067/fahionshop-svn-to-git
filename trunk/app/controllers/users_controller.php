<?php
class UsersController extends AppController {

	var $name = 'Users';
	function beforeFilter() {        
        parent::beforeFilter();
		  $this->Auth->allow('login','logout');
        //----------------
		  $this->Auth->authorize = 'actions';
        $this->Auth->loginAction = array('controller' => 'users', 'action' => 'login');
        $this->Auth->logoutRedirect = array('products/recent');
        $this->Auth->loginRedirect = array('controller' => 'categories', 'action' => 'index');
		  //--------------------
    }
	function admin_index() {
		$this->layout = 'admin';
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid user', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('user', $this->User->read(null, $id));
	}

	function admin_add() {
	$this->layout = 'admin';
		if (!empty($this->data)) {
			$this->User->create();
			if ($this->User->save($this->data)) {
				$this->Session->setFlash(__('The user has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.', true));
			}
		}
		$roles = $this->User->Role->find('list');
		//$products = $this->User->Product->find('list');
		$this->set(compact('roles'));
	}

	function admin_edit($id = null) {
		$this->layout = 'admin';
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid user', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->User->save($this->data)) {
				$this->Session->setFlash(__('The user has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->User->read(null, $id);
		}
		$roles = $this->User->Role->find('list');
		$products = $this->User->Product->find('list');
		$this->set(compact('roles', 'products'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for user', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->User->delete($id)) {
			$this->Session->setFlash(__('User deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('User was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	function admin_login(){
		$this->layout = 'login';
		 if (empty($this->data)) {
            $cookie = $this->Cookie->read('Auth.User');
            if (!is_null($cookie)) {
                if ($this->Auth->login($cookie)) {
                    // Clear auth message, just in case we use it.
                    $this->Session->delete('Message.auth');
                    $this->redirect($this->Auth->redirect());
                } else { // Delete invalid Cookie
                    $this->Cookie->delete('Auth.User');
                    }
            }
        }
        
        if ($this->Auth->user()) {
            if (!empty($this->data) && $this->data['User']['remember_me']) {
                $cookie = array();
                $cookie['username'] = $this->data['User']['username'];
                $cookie['password'] = $this->data['User']['password'];
                $this->Cookie->write('Auth.User', $cookie, true, '+2 weeks');
                unset($this->data['User']['remember_me']);
            }
           $this->Session->setFlash("Đăng nhập thành công");
           $this->redirect($this->Auth->redirect());
        }   
	}
		/*function login(){
		$this->layout = 'login';
		 if (empty($this->data)) {
            $cookie = $this->Cookie->read('Auth.User');
            if (!is_null($cookie)) {
                if ($this->Auth->login($cookie)) {
                    // Clear auth message, just in case we use it.
                    $this->Session->delete('Message.auth');
                    $this->redirect($this->Auth->redirect());
                } else { // Delete invalid Cookie
                    $this->Cookie->delete('Auth.User');
                    }
            }
        }
        
        if ($this->Auth->user()) {
            if (!empty($this->data) && $this->data['User']['remember_me']) {
                $cookie = array();
                $cookie['username'] = $this->data['User']['username'];
                $cookie['password'] = $this->data['User']['password'];
                $this->Cookie->write('Auth.User', $cookie, true, '+2 weeks');
                unset($this->data['User']['remember_me']);
            }
           $this->Session->setFlash("Đăng nhập thành công");
           $this->redirect($this->Auth->redirect());
        }   
	}*/
	
	/*function logout() {
	   // $this->Session->setFlash("You are loged out!");
		$this->Auth->logout();
        $cookie = $this->Cookie->read('Auth.User');
        if (!is_null($cookie)) {
            $this->Cookie->delete('Auth.User');
        }
	//	$this->Session->setFlash("Đăng xuất thành công");
        $this->redirect('login');
	}*/
		
	function admin_logout() {
	   // $this->Session->setFlash("You are loged out!");
		$this->Auth->logout();
        $cookie = $this->Cookie->read('Auth.User');
        if (!is_null($cookie)) {
            $this->Cookie->delete('Auth.User');
        }
	//	$this->Session->setFlash("Đăng xuất thành công");
        $this->redirect('login');
	}
}
?>