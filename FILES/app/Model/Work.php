<?php
    class Work extends AppModel{
        var $actsAs = array(
            'Upload.Upload' => array(
                'photo' => array(
                    'fields' => array(
                        'dir' => 'photo_dir'
                    ),
                    'thumbnailSizes' => array(
                        'thumb' => '870x400',
                    ),
                    'thumbnailMethod' => 'php',
                    'thumbnailName' => '{size}',
                )
            )
        );
        public function beforeValidate($options = array()){
            $this->data['Work']['address'] = str_replace(' ', '-', $this->data['Work']['name']);
        }
        public $validate = array(
            'name' => array(
                'rule' => 'notEmpty',
                'message' => 'لطفا یک عنوان برای نمونه کار خود انتخاب کنید'
            ),
            'address' => array(
                'rule' => 'isUnique',
                'message' => 'آدرس شما قبلا وجود دارد. لطفا یک عنوان دیگر انتخاب کنید'
            ),
            'site_address' => array(
                'rule' => 'url',
                'message' => 'لطفا یک آدرس معتبر برای نمونه کار خود انتخاب کنید'
            ),
            'body' => array(
                'rule' => 'notEmpty',
                'message' => 'لطفا متن کامل نمونه کار خود را بنویسید'
            )
        );
    }
?>