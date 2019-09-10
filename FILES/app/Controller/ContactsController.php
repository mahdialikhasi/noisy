<?php
    class ContactsController extends AppController{
        public $components = array('Email', 'Paginator', 'Session', 'Captcha'=>array('field'=>'security_code'));
        public $helpers = array('Html', 'Form', 'Captcha');
        public function beforeFilter(){
            parent::beforeFilter();
            $this->Auth->allow('index','captcha');
        }
        public function captcha(){
	        $this->autoRender = false;
	        $this->layout='ajax';
	        if(!isset($this->Captcha))	{ //if you didn't load in the header
	            $this->Captcha = $this->Components->load('Captcha'); //load it
	        }
	        $this->Captcha->create();
    	}
        public function index(){
            $this->set('title_for_layout', 'تماس با من');
            if($this->request->is('post')){
                $this->Contact->setCaptcha('security_code', $this->Captcha->getCode('Contact.security_code'));
                $this->Contact->set($this->request->data);
                $this->Contact->create();
                if($this->Contact->save($this->request->data)){
                    $this->Session->setFlash('نامه ی شما با موفقیت ارسال گردید', 'default', array('class' => 'alert alert-success'));
                    $Email = new CakeEmail();
		    $Email->from(array('info@noisy.ir' => 'دست نوشته های یک تازه کار'))
    			->sender('info@noisy.ir', 'دست نوشته های یک تازه کار')
    			->emailFormat('html')
    			->template('default', 'default')
			->to('mahdialikhasi1389@gmail.com')
			->subject('نظر جدید')
			->viewVars(array('content' => "شما نظر جدیدی در وبلاگ دست نوشته های یک تازه کار دارید"))
			->send();
                    $this->redirect('/');
                }else{
                    $this->Session->setFlash('متاسفانه نامه ی شما ارسال نشد', 'default', array('class' => 'alert alert-success'));
                }
            }
        }
        public function view($id = null){
            if(!$id){
                throw new NotFoundException(__('لطفا یک آی دی وارد کنید'));
            }
            $data = $this->Contact->findById($id);
            if(!$data){
                throw new NotFoundException(__('آی دی وارد شده نامعتبر است'));
            }
            $this->set('data', $data);
        }
        public function lists(){
            $this->Paginator->settings = array(
                'limit' => 10,
                'order' => 'Contact.created DESC'
            );
            $datas = $this->Paginator->paginate('Contact');
            $this->set('datas', $datas);
            $this->set('title_for_layout', 'لیست ارتباطات');
        }
        public function delete($id){
            if(!$this->Contact->exists($id)){
                throw new NotFoundException('لطفا یک آی دی وارد کنید');
            }
            if($this->request->is('post')){
                if($this->Contact->delete($id)){
                    $this->Session->setFlash('تماس با موفقیت حذف گردید', 'default', array('class' => 'alert alert-success'));
                    $this->redirect('lists');
                }else{
                    $this->Session->setFlash('متاسفانه تماس حذف نشد', 'default', array('class' => 'alert alert-success'));
                }
            }
        }
    }
?>