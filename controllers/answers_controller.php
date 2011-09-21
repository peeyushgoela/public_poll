<?php
class AnswersController extends AppController {

	public $name = 'Answers';

	public function index() {
		$this->Answer->recursive = 0;
		$this->set('answers', $this->paginate());
	}

	public function view($id = null) {
		$this->Answer->id = $id;
		if (!$this->Answer->exists()) {
			throw new NotFoundException(__('Invalid answer'));
		}
		$this->set('answer', $this->Answer->read(null, $id));
	}

	public function add() {
		if ($this->request->is('post')) {
			$this->Answer->create();
			if ($this->Answer->save($this->request->data)) {
				$this->Session->setFlash(__('The answer has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The answer could not be saved. Please, try again.'));
			}
		}
		$questions = $this->Answer->Question->find('list');
		$answers = $this->Answer->Answer->find('list');
		$this->set(compact('questions', 'answers'));
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
s
