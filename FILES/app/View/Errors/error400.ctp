<h2><?php echo $name; ?></h2>
<p class="error">
	<strong><?php echo __d('cake', 'خطا'); ?>: </strong>
	<?php printf(
		__d('cake', 'آدرسی که وارد کرده اید برروی سرور ما موجود نمی باشد. آدرس اشتباه است'),
		"<strong>'{$url}'</strong>"
	); ?>
</p>
