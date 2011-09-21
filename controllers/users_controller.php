<?php
class UsersController extends AppController {

	public $name = 'Users';
	function beforeFilter()
	{
		$this->__validateLoginStatus();
	}
	
	public function login()
	{		
		//$this->Session->destroy('User');
		if(!empty($this->data)) 
		{ 
			if(($user = $this->User->validateLogin($this->data['User']))) 
			{ 
				$user['password']='';
				$this->Session->write('User', $user); 
				$this->Session->write('UserId',$user['id']);
				$this->Session->setFlash('You\'ve successfully logged in.'); 
				$this->redirect('index'); 
				exit(); 
			} 
			else 
			{ 
				$this->Session->setFlash('Sorry, the Login information you\'ve entered is incorrect.');
				$this->redirect(array('action','login'));
			} 
		} 
	}
	public function logout()
	{
		$this->Session->destroy('User');
		$this->Session->destroy('UserId'); 
		$this->Session->setFlash('You\'ve successfully logged out.'); 
		$this->redirect('login'); 
	}
	
	public function index() {
		//print_r($this->Session->read());
		$my_user=$this->Session->read('User');
		$this->set('questions', $this->paginate($this->User->Question, array('user.id'=>$my_user['id'])));
	}

	public function view($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->set('user', $this->User->read(null, $id));
	}
	
	public function signup() 
	{
		if ($this->request->is('post')) 
		{
			$this->User->create();
			if ($this->User->save($this->request->data)) 
			{
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'index'));
			} 
			else 
			{
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
	}

	function __validateLoginStatus()
	{
		if(($this->action!='login') && ($this->action!='logout') && ($this->action!='signup'))
		{
			if($this->Session->check('User')==false)
			{
				$this->redirect(array('action'=>'login'));
				$this->Session->setFlash('The URL you\'ve followed requires you login.');
				exit();
			}
		}
		if($this->action=='login'&&$this->Session->check('Users'))
			$this->redirect(array('action'=>'index'));
	}
	
	public function deleteaccount() 
	{
		$this->User->id = $this->Session->read('UserId');
		if ($this->User->delete()) 
		{
			$this->Session->setFlash(__('User deleted'));
			$this->redirect(array('action'=>'logout'));
		}
		$this->Session->setFlash(__('User was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
