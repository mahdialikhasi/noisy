<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('افزودن کاربر'); ?></legend>
	<?php
		echo $this->Form->input('first_name', array('label' => 'نام'));
		echo $this->Form->input('last_name', array('label' => 'نام خانوادگی'));
		echo $this->Form->input('username', array('label' => 'نام کاربری'));
		echo $this->Form->input('password', array('label' => 'رمزعبور'));
		echo $this->Form->input('email');
		echo $this->Form->input('role_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('افزودن کاربر')); ?>
</div>
<div class="actions">
	<h3><?php echo __('عملیات'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('لیست کاربران'), array('action' => 'index')); ?></li>
	</ul>
</div>
