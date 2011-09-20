<?php
class AnswersController extends AppController {

	public $name = 'Answers';

	public function beforeFilter()
	{
		$this->__answersvalidateLoginStatus();
	}
	
	function __answersvalidateLoginStatus()
	{
		if($this->Session->check('User')==true)
			{$this->redirect(array('controller'=>'Users','action'=>'index'));}
	}
	
	public function index() {
		$this->set('questions', $this->paginate($this->Answer->Question, array('1'=>'1')));
	}

	public function view($id = null) {
		$this->Answer->id = $id;
		if (!$this->Answer->exists()) {
			throw new NotFoundException(__('Invalid answer'));
		}
		$this->set('answer', $this->Answer->read(null, $id));
	}

	public function add($id=NULL) {
		if($id==null)$this->redirect(array('action'=>'index'));
		if ($this->request->is('post')) {
			$this->Answer->create();
			if ($this->Answer->save($this->request->data)) {
				$this->Session->setFlash(__('The answer has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The answer could not be saved. Please, try again.'));
			}
		}
		$questions = $this->Answer->Question->read(null,$id);
		$answers = $this->Answer->Option->read(null,$id);
		$this->set('questions',$questions);
		$this->set('answers',$answers);
	}

	public function edit($id = null) {
		$this->Answer->id = $id;
		if (!$this->Answer->exists()) {
			throw new NotFoundException(__('Invalid answer'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Answer->save($this->request->data)) {
				$this->Session->setFlash(__('The answer has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The answer could not be saved. Please, try again.'));
			}
		} else {
			$this->data = $this->Answer->read(null, $id);
		}
		$questions = $this->Answer->Question->find('list');
		$answers = $this->Answer->Answer->find('list');
		$this->set(compact('questions', 'answers'));
	}

	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Answer->id = $id;
		if (!$this->Answer->exists()) {
			throw new NotFoundException(__('Invalid answer'));
		}
		if ($this->Answer->delete()) {
			$this->Session->setFlash(__('Answer deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Answer was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
