<?php
    class Comment extends AppModel{
        public $belongsTo = array('Blog');
        public $actsAs = array(
	    'Captcha' => array(
	        'field' => array('security_code'),
	        'error' => 'کپچای وارد شده صحیح نمی باشد',
	        'message' => 'کپچای وارد شده صحیح نمی باشد'
	    )
	);
        public $validate = array(
            'email' => array(
                'rule' => 'email',
                'message' => 'لطفا یک ایمیل معتبر وارد کنید'
            ),
            'body' => array(
                'rule' => 'notEmpty',
                'message' => 'لطفا متن کامل نظر خود را وارد کنید'
            ),
            'name' => array(
                'rule' => 'notEmpty',
                'message' => 'لطفا نام و نام خانوادگی خود را وارد کنید'
            ),
            'commentthreaded' => array(
                'rule' => 'numeric'
            )
        );
    }
?>