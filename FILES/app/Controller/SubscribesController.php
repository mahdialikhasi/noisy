<?php
App::uses('AppController', 'Controller');
class SubscribesController extends AppController {
    public $components = array('Paginator', 'Session');
    public function beforeFilter(){
        parent::beforeFilter();
        $this->Auth->allow('index');
    }    
    public function index() {
        $this->set('title_for_layout', 'اشتراک در خبرنامه');
        if ($this->request->is('post')) {
            $this->request->data['Subscribe']['random'] = substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyz', ceil(10/strlen($x)) )),1,10);
            $this->Subscribe->create();
            if ($this->Subscribe->save($this->request->data)) {
                $this->Session->setFlash(__('شما در خبرنامه عضو شدید'), 'default', array('class' => 'alert alert-success'));

                /*Email the confirm url*/
                $Email = new CakeEmail();
                    $Email->from(array('info@noisy.ir' => 'دست نوشته های یک تازه کار'))
                    ->to($this->request->data['Subscribe']['email'])
                    ->subject('اشتراک در خبرنامه')
                    ->template('default', 'default')
                    ->emailFormat('html')
                    ->viewVars(array('title_for_layout'=> 'اشتراک در خبرنامه', 'content' => 'شما با موفقیت در خبرنامه ی وبلاگ من مشترک شده اید! <br> اما صبر کنید! هنوز یک مرحله ی دیگه باقی مونده. روی لینک زیر کلیک کنید تا ایمیل شما تایید بشه <br><a href="http://noisy.ir/subscribes/confirm/'.$this->request->data['Subscribe']['random'].'">تایید ایمیل</a>'))
                    ->send('My message');

                return $this->redirect('/');
            } else {
                $this->Session->setFlash($this->Subscribe->validationErrors['email'][0], 'default', array('class' => 'alert alert-success'));
                return $this->redirect('/');
            }
        }
    }
    public function delete($id = null) {
        $this->Subscribe->id = $id;
        if (!$this->Subscribe->exists()) {
            throw new NotFoundException(__('اشتراک یافت نشد'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Subscribe->delete()) {
            $this->Session->setFlash(__('اشتراک حذف شد'), 'default', array('class' => 'alert alert-success'));
            $this->redirect('lists');
        } else {
            $this->Session->setFlash(__('اشتراک حذف نشد.لطفا دوباره تلاش فرمایید'), 'default', array('class' => 'alert alert-success'));
        }
        return $this->redirect(array('action' => 'index'));
    }
    public function confirm($random = null){
        if(!$random){
            throw new NotFoundException(__('آدرس ناقص است. لطفا در وارد کردن آدرس دقت فرمایید'));
        }
        $data = $this->Subscribe->find('all', array('conditions' => array('random' => $random)));            
        if(!$data){
            throw new NotFoundException(__('آدرس اشتباه است. لطفا در وارد کردن آدرس دقت فرمایید'));
        }
        if($data[0]['Subscribe']['confirmed'] == 0 ){
            $data = $data[0];
            $data['Subscribe']['confirmed'] = 1;
            if($this->Subscribe->save($data)){
                $this->Session->setFlash(__('ایمیل شما تایید شد'), 'default', array('class' => 'alert alert-success'));
                $this->redirect('/');
            }else{
                $this->Session->setFlash(__('متاسفانه ایمیل شما تایید نشد. لطفا بعدا دوباره تلاش کنید'), 'default', array('class' => 'alert alert-success'));
                $this->redirect('/');
            }
            print_r($data);
        }elseif ($data[0]['Subscribe']['confirmed'] == 1) {
            $this->Session->setFlash(__('ایمیل شما قبلا تایید شده است'), 'default', array('class' => 'alert alert-success'));
            $this->redirect('/');
        }
        $this->set('title_for_layout', 'تایید ایمیل');
    }
    public function lists(){
        $this->set('title_for_layout', 'لیست خبرنامه ها');
        $this->Subscribe->recursive = 0;
        $this->set('subscribes', $this->Paginator->paginate());
    }
}