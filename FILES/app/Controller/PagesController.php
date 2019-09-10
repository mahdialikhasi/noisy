<?php
App::uses('AppController', 'Controller');
class PagesController extends AppController {
    public $uses = array('Blog', 'Work');
    public function beforeFilter(){
        parent::beforeFilter();
        $this->Auth->allow();
    }
    public function display() {
    	$data_blogs = $this->Blog->find('all', array('limit' => 4, 'order' => 'created DESC','conditions' => array('draft' => false)));
    	$data_works = $this->Work->find('all', array('limit' => 2, 'order' => 'created DESC', 'conditions' => array('ishome' => 1)));
    	$this->set('data_blogs', $data_blogs);
    	$this->set('data_works', $data_works);
        $this->set('page', 'home');
        $path = func_get_args();
        $count = count($path);
        if (!$count) {
            return $this->redirect('/');
        }
        $page = $subpage = $title_for_layout = 'خانه';
        if (!empty($path[0])) {
            $page = $path[0];
        }
        if (!empty($path[1])) {
            $subpage = $path[1];
        }
        if (!empty($path[$count - 1])) {
            $title_for_layout = Inflector::humanize($path[$count - 1]);
        }
        $this->set(compact('page', 'subpage', 'title_for_layout'));
        try {
            $this->render(implode('/', $path));
        } catch (MissingViewException $e) {
            if (Configure::read('debug')) {
                throw $e;
            }
            throw new NotFoundException();
        }
    }
}
