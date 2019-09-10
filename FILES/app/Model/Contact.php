<?php
    class Contact extends AppModel{
	public $actsAs = array(
	    'Captcha' => array(
	        'field' => array('security_code'),
	        'error' => 'کپچای وارد شده صحیح نمی باشد',
	        'message' => 'کپچای وارد شده صحیح نمی باشد'
	    )
	);
        public $validate = array(
            'title' => array(
                'rule' => 'notEmpty',
                'message' => 'لطفا عنوانی برای متن انتخاب کنید',
            ),
            'fullname' => array(
                'rule' => 'notEmpty',
                'message' => 'لطفا نام و نام خانوادگی خود را وارد کنید',
            ),
            'email' => array(
                'rule' => 'email',
                'message' => 'لطفا یک ایمیل معتبر وارد کنید',
                'allowEmpty' => false,
            ),
            'body' => array(
                'rule' => 'notEmpty',
                'message' => 'لطفا متن خود را وارد کنید',
            ),
        );
    }
?>