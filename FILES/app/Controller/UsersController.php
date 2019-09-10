<?php
App::uses('AppController', 'Controller');
class UsersController extends AppController {
    public $components = array('Paginator', 'Session');
    public function beforeFilter(){
        parent::beforeFilter();
    }
    public function login(){
        $this->set('title_for_layout', 'ورود به ناحیه ی کاربری');
        if($this->request->is('post')){
            if($this->Auth->login()){
            	$_SESSION['KCFINDER'] = array(
			'disabled' => false
		);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Session->setFlash(__('نام کاربری یا رمز عبور نامعتبر است. لطفا دوباره تلاش فرمایید'), 'default', array('class' => 'alert alert-success'));
        }
    }
    public function logout(){
        $this->Auth->logout();
        $_SESSION['KCFINDER'] = array(
		'disabled' => true
	);
        $this->redirect('/');
    }
    public function index() {
        $this->set('title_for_layout', 'لیست کاربران');
        $this->User->recursive = 0;
        $this->set('users', $this->Paginator->paginate());
    }
    public function view($id = null) {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('کاربر نامعتبر است'));
        }
        $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
        $this->set('user', $this->User->find('first', $options));
        $this->set('title_for_layout', 'مشاهده ی کاربر');
    }
    public function add() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('کاربر با موفقیت ذخیره شده'), 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('کاربر متاسفانه ذخیره نشد.لطفا دوباره تلاش فرمایید'), 'default', array('class' => 'alert alert-success'));
            }
        }
        $this->set('roles', $this->User->Role->find('list'));
        $this->set('title_for_layout', 'افزودن کاربر');
    }
    public function edit($id = null) {
        $this->set('title_for_layout', 'ویرایش کاربر');
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('کاربر نامعتبر است'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('کاربر ذخیره شد'), 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('کاربر ذخیره نمیشود.لطفا دوباره تلاش فرمایید'), 'default', array('class' => 'alert alert-success'));
            }
        } else {
            $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
            $this->request->data = $this->User->find('first', $options);
        }
        $this->set('roles', $this->User->Role->find('list'));
    }
    public function delete($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('کاربرنامعتبر است'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->User->delete()) {
            $this->Session->setFlash(__('کاربر حذف شد'), 'default', array('class' => 'alert alert-success'));
        } else {
            $this->Session->setFlash(__('کاربر حذف نشد.لطفا دوباره تلاش فرمایید'), 'default', array('class' => 'alert alert-success'));
        }
        return $this->redirect(array('action' => 'index'));
    }}
