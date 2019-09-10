<?php
    class WorksController extends AppController{
        public function beforeFilter(){
            parent::beforeFilter();
            $this->Auth->allow('index', 'view');
        }
        public $components = array('Paginator');
        public function index(){
            $this->Paginator->settings = array(
                'limit' => 10,
                'order' => 'created DESC'
            );
            $datas = $this->Paginator->paginate('Work');
            $this->set('datas', $datas);
            $this->set('title_for_layout', 'نمونه کارهای من');
        }
        public function view($address){
            $this->set('title_for_layout', 'نمونه کارهای من');
            if(!$address){
                throw new NotFoundException(__('آدرس ناقص است. لطفا در وارد کردن آدرس دقت فرمایید'));
            }
            $data = $this->Work->find('all', array('conditions' => array('address' => $address)));
            if(!$data){
                throw new NotFoundException(__('آدرس اشتباه است. لطفا در وارد کردن آدرس دقت فرمایید'));
            }
            $this->set('title_for_layout', $data[0]['Work']['name']);
            $this->set('data', $data);
        }
        public function edit($address){
            $this->set('title_for_layout', 'ویرایش نمونه کار');
            if(!$address){
                throw new NotFoundException(__('آدرس ناقص است. لطفا در وارد کردن آدرس دقت فرمایید'));
            }
            $data = $this->Work->find('all', array('conditions' => array('address' => $address)));
            $data = $data[0];
            if(!$data){
                throw new NotFoundException(__('آدرس اشتباه است. لطفا در وارد کردن آدرس دقت فرمایید'));
            }
            if($this->request->is('post') || $this->request->is('put')){
                if($this->Work->save($this->request->data)){
                    $this->Session->setFlash(__('نمونه کار با موفقیت به روزرسانی شد'), 'default', array('class' => 'alert alert-success'));
                    $this->redirect('/works');
                }else{
                    $this->Session->setFlash(__('متاسفانه نمونه کار به روزرسانی نگردید'), 'default', array('class' => 'alert alert-success'));
                }
            }
            $this->request->data = $data;
        }
        public function delete($id){
            if(!$this->Work->exists($id)){
                throw new NotFoundException('لطفا یک آی دی وارد کنید');
            }
            if($this->request->is('post')){
                if($this->Work->delete($id)){
                    $this->Session->setFlash('نمونه کار با موفقیت حذف گردید', 'default', array('class' => 'alert alert-success'));
                    $this->redirect('lists');
                }else{
                    $this->Session->setFlash('متاسفانه نمونه کار حذف نشد', 'default', array('class' => 'alert alert-success'));
                }
            }
        }
        public function add(){
            $this->set('title_for_layout', 'افزودن نمونه کار');
            if($this->request->is('post')){
                $this->Work->create();
                if($this->Work->save($this->request->data)){
                    $this->Session->setFlash(__('نمونه کار با موفقیت افزوده شد'), 'default', array('class' => 'alert alert-success'));
                    $this->redirect('/works');
                }else{
                    $this->Session->setFlash(__('متاسفانه نمونه کار افزوده نشد'), 'default', array('class' => 'alert alert-success'));
                }
            }
        }
        public function lists(){
            $this->Paginator->settings = array(
                'limit' => 10,
                'order' => 'created DESC'
            );
            $datas = $this->Paginator->paginate('Work');
            $this->set('datas', $datas);
            $this->set('title_for_layout', 'لیست نمونه کارها');
        }
    }
?>