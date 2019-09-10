<?php
    class BlogsController extends AppController{
        public function beforeFilter(){
            parent::beforeFilter();
            $this->Auth->allow('index', 'view', 'captcha');
        }
        public $uses = array('Tag', 'Blog','Subscribe');
        public $components = array('Email', 'ShamsiDate.Shamsi', 'Paginator','Captcha'=>array('field'=>'security_code'));
        public $helpers = array('ShamsiDate.Shamsi','Captcha');
        public function index(){
            $this->Paginator->settings = array(
                'limit' => 10,
                'order' => 'created DESC',
                'conditions' => array(
                    'draft' => false
                )
            );
            $datas = $this->Paginator->paginate('Blog');//$this->Blog->find('all', array('limit' => '10', 'order' => 'created DESC'));
            $this->set('datas', $datas);
            $this->set('title_for_layout', 'دست نوشته ها');           
        }
        public function captcha(){
	        $this->autoRender = false;
	        $this->layout='ajax';
	        if(!isset($this->Captcha))	{ //if you didn't load in the header
	            $this->Captcha = $this->Components->load('Captcha'); //load it
	        }
	        $this->Captcha->create();
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
                    
                    /*Email Subscribes new post is ready*/
                    if($this->request->data['Blog']['draft'] == 0){
                        $subscribes = $this->Subscribe->find('all', array('conditions' => array('confirmed' => 1)));
                        $mail = array();
                        $i=1;
                        foreach ($subscribes as $subscribe) {
                            $mail[$i] = $subscribe['Subscribe']['email'];
                            $i++;
                        }             
                        $Email = new CakeEmail();
                            $Email->from(array('info@noisy.ir' => 'دست نوشته های یک تازه کار'))
                            ->to($mail)
                            ->subject('پست جدیدی در وبلاگ من ارسال شده!')
                            ->template('default', 'default')
                            ->emailFormat('html')
                            ->viewVars(array('title_for_layout'=> $this->request->data['Blog']['title'], 'content' => 'مطلب جدید در دست نوشته های یک تازه کار منتشر شده است! <br> همین الان آن را مطالعه کنید: <br><a href="http://noisy.ir/blogs/view/'.str_replace(' ', '-',$this->request->data['Blog']['title']).'">'.$this->request->data['Blog']['title'].'</a><br>'.$this->request->data['Blog']['description']. '<br>'))
                            ->send('My message');
                    }                   

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
            $this->set('title_for_layout', $data[0]['Blog']['title']);
            $this->set('twitter_description',$data[0]['Blog']['description']);
            if($this->request->is('post') && isset($this->request->data['Comment'])){
                $this->request->data['Comment']['blog_id'] = $data[0]['Blog']['id'];
                $comment_content = $this->request->data['Comment'];
                $this->Blog->Comment->setCaptcha('security_code', $this->Captcha->getCode('Comment.security_code'));
                $this->Blog->Comment->set($this->request->data);                
                $this->Blog->Comment->create();
                if($this->Blog->Comment->save($this->request->data)){
                    $this->Session->setFlash(__('نظرشما با موفقیت ارسال شد'), 'default', array('class' => 'alert alert-success'));
                    
                    /*Email me the new Comment*/
                    $Email = new CakeEmail();
                        $Email->from(array('info@noisy.ir' => 'دست نوشته های یک تازه کار'))
                        ->to('mahdialikhasi1389@gmail.com')
                        ->subject('نظر جدیدی در وبلاگ دارید!')
                        ->template('default', 'default')
                        ->emailFormat('html')
                        ->viewVars(array('title_for_layout'=> 'نظر جدید', 'content' => 'فرستنده: '.$comment_content['email'].'<br> نام و نام خانوادگی: '.$comment_content['name']. '<br> متن: <br>'.$comment_content['body']))
                        ->send('My message');                            
                }else{
                    $this->Session->setFlash(__('متاسفانه نظر شما ارسال نشد'), 'default', array('class' => 'alert alert-danger'));
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
            if($data['Blog']['draft'] == 1){
                $status = 1;
            }else{
                $status = 0;
            }
            if(!$data){
                throw new NotFoundException(__('آدرس اشتباه است. لطفا در وارد کردن آدرس دقت فرمایید'));
            }
            if($this->request->is('post') || $this->request->is('put')){
                if($this->Blog->save($this->request->data)){
                    $this->Session->setFlash(__('دست نوشته با موفقیت ویرایش شد'), 'default', array('class' => 'alert alert-success'));

                    /*Email Subscribes new post is ready*/
                    if($status == 1){
                        if($this->request->data['Blog']['draft'] == 0){
                            $subscribes = $this->Subscribe->find('all', array('conditions' => array('confirmed' => 1)));
                            $mail = array();
                            $i=1;
                            foreach ($subscribes as $subscribe) {
                                $mail[$i] = $subscribe['Subscribe']['email'];
                                $i++;
                            }             
                            $Email = new CakeEmail();
                                $Email->from(array('info@noisy.ir' => 'دست نوشته های یک تازه کار'))
                                ->to($mail)
                                ->subject('پست جدیدی در وبلاگ من ارسال شده!')
                                ->template('default', 'default')
                                ->emailFormat('html')
                                ->viewVars(array('title_for_layout'=> $this->request->data['Blog']['title'], 'content' => 'مطلب جدید در دست نوشته های یک تازه کار منتشر شده است! <br> همین الان آن را مطالعه کنید: <br><a href="http://noisy.ir/blogs/view/'.str_replace(' ', '-',$this->request->data['Blog']['title']).'">'.$this->request->data['Blog']['title'].'</a><br>'.$this->request->data['Blog']['description']. '<br>'))
                                ->send('My message');
                        }   
                    }                   

                    $this->redirect('/blogs');
                }else{
                    $this->Session->setFlash(__('متاسفانه دست نوشته ذخیره نشد'), 'default', array('class' => 'alert alert-success'));
                }
            }
            $this->set('data', $data);
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