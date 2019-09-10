<?php
    class CommentsController extends AppController{
        public $components = array('Paginator', 'Captcha'=>array('field'=>'security_code'));
        public $helpers = array('Captcha');
	public function lists(){
            $this->Paginator->settings = array(
                'limit' => 10,
                'order' => 'Comment.created DESC'
            );
            $datas = $this->Paginator->paginate('Comment');//$this->Blog->find('all', array('order' => 'created DESC'));
            $this->set('datas', $datas);
            $this->set('title_for_layout', 'لیست نظرات');
        }
        public function captcha(){
	        $this->autoRender = false;
	        $this->layout='ajax';
	        if(!isset($this->Captcha))	{ //if you didn't load in the header
	            $this->Captcha = $this->Components->load('Captcha'); //load it
	        }
	        $this->Captcha->create();
    	}
        public function delete($id){
            if(!$this->Comment->exists($id)){
                throw new NotFoundException('لطفا یک آی دی وارد کنید');
            }
            if($this->request->is('post')){
                if($this->Comment->delete($id)){
                    $this->Session->setFlash('نظر با موفقیت حذف گردید', 'default', array('class' => 'alert alert-success'));
                    $this->redirect('lists');
                }else{
                    $this->Session->setFlash('متاسفانه نظر حذف نشد', 'default', array('class' => 'alert alert-success'));
                }
            }
        }
    }
?>