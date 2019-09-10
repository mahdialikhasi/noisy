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
    public function beforeFilter(){
        parent::beforeFilter();
        $this->layout ='default';
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