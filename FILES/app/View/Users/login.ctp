<h1 class="hide">ورود کاربر</h1>
<h2>ورود</h2>
<?php
	echo $this->Form->create('User');
	echo $this->Form->input('username', array('class' => 'validate','label' => 'نام کاربري', 'div' => 'input-field'));
	echo $this->Form->input('password', array('class' => 'validate','label' => 'رمز عبور', 'div' => 'input-field'));
	echo $this->Form->end(array('class' => 'validate', 'label' => 'ورود', 'div' => 'btn waves-effect submit'));
?>	
