<?php
    class Work extends AppModel{    	
        var $actsAs = array(
           'Sitemap.Sitemap' => array(
	        'primaryKey' => 'address', // Default primary key field
	        'loc' => 'buildUrl', // Default function called that builds a url, passes parameters (Model $Model, $primaryKey)
	        'lastmod' => 'modified', // Default last modified field, can be set to FALSE if no field for this
	        'changefreq' => 'daily', // Default change frequency applied to all model items of this type, can be set to FALSE to pass no value
	        'priority' => '0.8', // Default priority applied to all model items of this type, can be set to FALSE to pass no value
	        'conditions' => array(), // Conditions to limit or control the returned results for the sitemap
	    ),
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