<?php
App::uses('AppController', 'Controller');
class RolesController extends AppController {
	public $components = array('Paginator', 'Session');
    public function beforeFilter(){
	    parent::beforeFilter();
    }
	public function index() {
		$this->Role->recursive = 0;
		$this->set('roles', $this->Paginator->paginate());
		$this->set('title_for_layout', 'نقش های کاربری');
	}
	public function view($id = null) {
		if (!$this->Role->exists($id)) {
			throw new NotFoundException(__('Invalid role'));
		}
		$options = array('conditions' => array('Role.' . $this->Role->primaryKey => $id));
		$this->set('role', $this->Role->find('first', $options));
		$this->set('title_for_layout', 'مشاهده ی نقش کاربری');
	}
	public function add() {
		if ($this->request->is('post')) {
			$this->Role->create();
			if ($this->Role->save($this->request->data)) {
				$this->Session->setFlash(__('The role has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The role could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-success'));
			}
		}
		$this->set('title_for_layout', 'افزودن نقش کاربری');
	}
	public function edit($id = null) {
		if (!$this->Role->exists($id)) {
			throw new NotFoundException(__('Invalid role'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Role->save($this->request->data)) {
				$this->Session->setFlash(__('The role has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The role could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-success'));
			}
		} else {
			$options = array('conditions' => array('Role.' . $this->Role->primaryKey => $id));
			$data = $this->Role->find('first', $options);
			$this->request->data = $data;
			$this->set('data',$data);
		}
		$this->set('title_for_layout', 'ویرایش نقش کاربری');
	}
	public function delete($id = null) {
		$this->Role->id = $id;
		if (!$this->Role->exists()) {
			throw new NotFoundException(__('Invalid role'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Role->delete()) {
			$this->Session->setFlash(__('The role has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The role could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-success'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
