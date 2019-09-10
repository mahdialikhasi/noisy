<h2>ورود</h2>
<?php
	echo $this->Form->create('User');
	echo $this->Form->input('username', array('label' => 'نام کاربري'));
	echo $this->Form->input('password', array('label' => 'رمز عبور'));
	echo $this->Form->end(__('ورود'));
?>	
