<?php
App::uses('Controller', 'Controller');
class AppController extends Controller {
    public $components = array(
        'Auth' => array(
            'loginRedirect' => array('controller' => 'pages', 'action' => 'display'),
            'logoutRedirect' => array(
                'controller' => 'pages',
                'action' => 'display',
                'home'
            ),
            'authorize' => array('Controller') // Added this line
        ),
        'Session'
    );
    public $uses = array('Subscribe');
    public function beforeFilter(){
        parent::beforeFilter();
        $this->layout ='material';
        //set role_id
        $role_id = $this->Auth->user('role_id');
        if(isset($role_id)){
            $this->set("role_id",$role_id);//it will set a variable role for your view 
        }else{
            $this->set("role_id",0);//2 is the role of normal users
        }
        //$user = $this->Auth->user();
    }
    public function isAuthorized($user) {        
        // Admin can access every action
        if (isset($user['role_id']) && $user['role_id'] == 1) {
            return true;
        }
        // Default deny
        //$this->Session->setFlash(__('شما دسترسی این کار را ندارید، لطفا با دسترسی ادمین وارد شوید'));
        return false;
    }
}