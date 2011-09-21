<?php
class QuestionsController extends AppController {

	public $name = 'Questions';

	public function beforeFilter()
	{
		$this->__questionvalidateLoginStatus();
	}
	
	public function __questionvalidateLoginStatus()
	{
		if($this->Session->check('User')==false)
		{
			$this->redirect(array('controller'=>'users','action'=>'login'));	
		}
	}
	
	public function index() {
		$this->Session->delete('QId');
		$this->redirect(array('controller'=>'Users','action'=>'index'));
	}

	public function view($id = null) {
		$this->Session->write('QId',$id);
		$this->Question->id = $id;
		if (!$this->Question->exists()) {
			throw new NotFoundException(__('Invalid question'));
		}
		$this->set('question', $this->Question->read(null, $id));
	}

	public function add() {
		if ($this->request->is('post')) {
			$this->Question->create();
			if ($this->Question->save($this->request->data)) {
				$this->Session->setFlash(__('The question has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The question could not be saved. Please, try again.'));
			}
		}
	}

	public function edit($id = null) {
		
		$this->Session->write('QId',$id);
		$this->Question->id = $id;
		if (!$this->Question->exists()) {
			throw new NotFoundException(__('Invalid question'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Question->save($this->request->data)) {
				$this->Session->setFlash(__('The question has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The question could not be saved. Please, try again.'));
			}
		} else {
			$this->data = $this->Question->read(null, $id);
		}
		$users = $this->Question->User->find('list');
		$this->set(compact('users'));
	}

	public function delete($id = null) {
		$this->Question->id = $id;
		if ($this->Question->delete()) {
			$this->Session->setFlash(__('Question deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Question was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
