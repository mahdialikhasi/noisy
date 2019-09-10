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