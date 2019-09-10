<?php
    class BlogsController extends AppController{
        public function beforeFilter(){
            parent::beforeFilter();     
            $this->Auth->allow('index', 'view');
        }
        public $uses = array('Tag', 'Blog');
        public $components = array('ShamsiDate.Shamsi', 'Paginator');
        public $helpers = array('ShamsiDate.Shamsi');
        public function index(){
            $this->Paginator->settings = array(
                'limit' => 10,
                'order' => 'created DESC'
            );
            $datas = $this->Paginator->paginate('Blog');//$this->Blog->find('all', array('limit' => '10', 'order' => 'created DESC'));
            $this->set('datas', $datas);            
            $this->set('title_for_layout', 'دست نوشته ها');
        }
        public function add(){
            $this->set('title_for_layout', 'افزودن دست نوشته');
            if($this->request->is('post')){
                if(!empty($this->request->data['Tag']['Tag'])){
                    $tagsArray = explode('،',$this->request->data['Tag']['Tag']);
                    $alltags = $this->Tag->find('list');
                    unset($this->request->data['Tag']['Tag']);
                    foreach ($tagsArray as $tag) {
                        if(!in_array($tag, $alltags)){
                            $savedata['Tag']['name'] = $tag;
                            $this->Tag->create();
                            $this->Tag->save($savedata);
                            $id = $this->Tag->find('all', array('conditions' => array('name' => $tag)));
                            $id = $id[0]['Tag']['id'];
                            $this->request->data['Tag']['Tag'][$id] = $id;
                        }else{
                            $id = $this->Tag->find('all', array('conditions' => array('name' => $tag)));
                            $id = $id[0]['Tag']['id'];
                            $this->request->data['Tag']['Tag'][$id] = $id;
                        }
                    }
                }
                $this->Blog->create();
                if($this->Blog->save($this->request->data)){
                    $this->Session->setFlash(__('دست نوشته با موفقیت افزوده شد'), 'default', array('class' => 'alert alert-success'));
                    $this->redirect('/blogs');
                }else{
                    $this->Session->setFlash(__('متاسفانه دست نوشته ذخیره نشد'), 'default', array('class' => 'alert alert-success'));
                }
            }
            $this->set('currentTags', $this->Blog->Tag->find('list'));
        }
        public function view($address){
            $this->set('title_for_layout', 'دست نوشته ها');
            if(!$address){
                throw new NotFoundException(__('آدرس ناقص است. لطفا در وارد کردن آدرس دقت فرمایید'));
            }
            $data = $this->Blog->find('all', array('conditions' => array('address' => $address)));
            if(!$data){
                throw new NotFoundException(__('آدرس اشتباه است. لطفا در وارد کردن آدرس دقت فرمایید'));
            }
            $this->set('data', $data);
            if($this->request->is('post') && isset($this->request->data['Comment'])){
                $this->request->data['Comment']['blog_id'] = $data[0]['Blog']['id'];
                //print_r($this->request->data);
                $this->Blog->Comment->create();
                if($this->Blog->Comment->save($this->request->data)){
                    $this->Session->setFlash(__('نظرشما با موفقیت ارسال شد'), 'default', array('class' => 'alert alert-success'));
                }else{
                    $this->Session->setFlash(__('متاسفانه نظر شما ارسالل نشد'), 'default', array('class' => 'alert alert-success'));
                }
            }
        }
        public function edit($address){
            $this->set('title_for_layout', 'ویرایش دست نوشته');
            if(!$address){
                throw new NotFoundException(__('آدرس ناقص است. لطفا در وارد کردن آدرس دقت فرمایید'));
            }
            $data = $this->Blog->find('all', array('conditions' => array('address' => $address)));
            $data = $data[0];
            if(!$data){
                throw new NotFoundException(__('آدرس اشتباه است. لطفا در وارد کردن آدرس دقت فرمایید'));
            }
            if($this->request->is('post') || $this->request->is('put')){
                if($this->Blog->save($this->request->data)){
                    $this->Session->setFlash(__('دست نوشته با موفقیت افزوده شد'), 'default', array('class' => 'alert alert-success'));
                    $this->redirect('/blogs');
                }else{
                    $this->Session->setFlash(__('متاسفانه دست نوشته ذخیره نشد'), 'default', array('class' => 'alert alert-success'));
                }
            }
            $this->request->data = $data;
        }
        public function delete($id){
            if(!$this->Blog->exists($id)){
                throw new NotFoundException('لطفا یک آی دی وارد کنید');
            }
            if($this->request->is('post')){
                if($this->Blog->delete($id)){
                    $this->Session->setFlash('دست نوشته با موفقیت حذف گردید', 'default', array('class' => 'alert alert-success'));
                    $this->redirect('lists');
                }else{
                    $this->Session->setFlash('متاسفانه دست نوشته حذف نشد', 'default', array('class' => 'alert alert-success'));
                }
            }
        }
        public function lists(){
            $this->Paginator->settings = array(
                'limit' => 10,
                'order' => 'created DESC'
            );
            $datas = $this->Paginator->paginate('Blog');//$this->Blog->find('all', array('order' => 'created DESC'));
            $this->set('datas', $datas);
            $this->set('title_for_layout', 'لیست دست نوشته ها');
        }
    }
?>                            