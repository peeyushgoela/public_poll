<?php
class OptionsController extends AppController {

	public $name = 'Options';
	public function beforeFilter()
	{
		$this->__optionsvalidateLoginStatus();
	}
	
	function __optionsvalidateLoginStatus()
	{
		if(!$this->Session->check('User'))
			$this->redirect(array('controller'=>'Users','action'=>'login'));
	}
	
	public function index() {
		$this->redirect(array('controller'=>'Questions','action'=>'index',$this->Session->read('QId')));
		}

	public function view($id = null) {
		$this->Option->id = $id;
		if (!$this->Option->exists()) {
			throw new NotFoundException(__('Invalid option'));
		}
		$this->set('option', $this->Option->read(null, $id));
	}

	public function add() {
		if ($this->request->is('post')) {
			$this->Option->create();
			if ($this->Option->save($this->request->data)) {
				$this->Session->setFlash(__('The option has been saved'));
				$this->redirect(array('controller'=>'questions','action' => 'view',$this->Session->read('QId')));
			} else {
				$this->Session->setFlash(__('The option could not be saved. Please, try again.'));
			}
		}
		$questions = $this->Option->Question->read(null,$this->Session->read('QId'));
		$this->set('questions',$questions);
	}

	public function edit($id = null) {
		$this->Option->id = $id;
		if (!$this->Option->exists()) {
			throw new NotFoundException(__('Invalid option'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Option->save($this->request->data)) {
				$this->Session->setFlash(__('The option has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The option could not be saved. Please, try again.'));
			}
		} else {
			$this->data = $this->Option->read(null, $id);
		}
		$questions = $this->Option->Question->read(null,$this->Session->read('QId'));
		$this->set('questions',$questions);
	}

	public function delete($id = null) {
		$this->Option->id = $id;
		if ($this->Option->delete()) {
			$this->Session->setFlash(__('Option deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Option was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
