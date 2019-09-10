<?php
App::uses('AppModel', 'Model');
class Subscribe extends AppModel {
    public $validate = array(
        'email' => array(
        	'rule-1' => array(
        		'rule' => 'email',
        		'message' => 'لطفا یک ایمیل معتبر وارد کنید',
        		'last' => true
        	),
        	'rule-2' => array(
        		'rule' => 'isUnique',
        		'message' => 'شما قبلا در خبرنامه مشترک شده اید'
        	)
        )           
    );
}
?>