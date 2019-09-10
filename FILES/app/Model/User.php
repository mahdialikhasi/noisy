<?php
App::uses('AppModel', 'Model');
class User extends AppModel {
    public function beforeSave($options = array()){
        $this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
        return true;
    }
    public $belongsTo = 'Role';
    public $validate = array(
        'first_name' => 'notEmpty',
        'last_name' => 'notEmpty',
        'username' => 'notEmpty',
        'password' => array(
            'required' => true,
            'message' => 'لطفا یک رمز عبور حداقل دارای 8 کاراکتر انتخاب کنید',
            'rule'    => array('minLength', '8'),
        ),
    );
}
?>