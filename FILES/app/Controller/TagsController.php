<?php
    class TagsController extends AppController{
        public function beforeFilter(){
            parent::beforeFilter();
            $this->Auth->allow('index', 'search');
        }
        public $uses = array('Tag', 'Blog', 'BlogsTags');
        public $helpers = array('ShamsiDate.Shamsi');
        public $components = array('Paginator');
        public function index(){
            $this->set('title_for_layout', 'برچسب ها');
            $this->set('datas', $this->Tag->find('all'));
        }
        public function search($tagName){
            $this->set('title_for_layout', 'برچسب ها');
            if(!$tagName){
                throw new NotFoundException(__('لطفا یک تگ وارد کنید'));
            }            
            $data = $this->Tag->find('all', array('conditions' => array('name' => $tagName)));
            $data = $data[0];
            $this->set('title_for_layout', $data['Tag']['name']);
            if(!$data){
                throw new NotFoundException(__('هیچ مطلبی با چنین تگی یافت نشد'));
            }
            $data2 = $this->BlogsTags->find('all', array('order' => 'blog_id DESC', 'conditions' => array('tag_id' => $data['Tag']['id'])));            
            $i =0;
            foreach($data2 as $data2){
                $ids[$i] = $data2['BlogsTags']['blog_id'];
                $i++;
            }
            $this->Paginator->settings = array(
                'limit' => 10,
                'order' => 'created DESC',
                'conditions' => array('id' => $ids)
            );
            $Blogdata = $this->Paginator->paginate('Blog');
            $this->set('datas', $Blogdata);
            $this->set('data', $data);
            $this->set('tagName', $tagName);
        }
    }
?>