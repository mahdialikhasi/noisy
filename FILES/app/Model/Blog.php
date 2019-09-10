<?php
class Blog extends AppModel{
    public function beforeValidate($options = array()){
        $this->data['Blog']['address'] = str_replace(' ', '-', $this->data['Blog']['title']);
    }
    public $hasMany = array('Comment' => array(
            'order' => 'id DESC',
        )
    );
    public $hasAndBelongsToMany = array('Tag');
    public $actsAs = array(
	    'Sitemap.Sitemap' => array(
	        'primaryKey' => 'address', // Default primary key field
	        'loc' => 'buildUrl', // Default function called that builds a url, passes parameters (Model $Model, $primaryKey)
	        'lastmod' => 'modified', // Default last modified field, can be set to FALSE if no field for this
	        'changefreq' => 'daily', // Default change frequency applied to all model items of this type, can be set to FALSE to pass no value
	        'priority' => '0.9', // Default priority applied to all model items of this type, can be set to FALSE to pass no value
	        'conditions' => array(), // Conditions to limit or control the returned results for the sitemap
	    )
    );
    public $validate = array(
        'title' => array(
            'rule' => 'notEmpty',
            'message' => 'لطفا یک عنوان برای دست نوشته ی خود انتخاب کنید'
        ),
        'description' => array(
            'rule' => 'notEmpty',
            'message' => 'لطفا خلاصه ی دست نوشته ی خود را بنویسید'
        ),
        'body' => array(
            'rule' => 'notEmpty',
            'message' => 'لطفا متن کامل دست نوشته ی خود را وارد کنید'
        ),
        'address' => array(
            'rule' => 'isUnique',
            'message' => 'آدرس شما قبلا وجود دارد. لطفا یک عنوان دیگر انتخاب کنید'
        ),
    );
}
?>