<h1 class="hide">کاربران سایت</h1>
<h2>مشاهده ی کاربر سایت</h2>
<?php
$this->Html->addCrumb('کاربران سایت', '/users/', array('class' => 'breadcrumb'));
$this->Html->addCrumb('مشاهده ی کاربر  '.$user['User']['first_name'].' '.$user['User']['last_name'], '/users/view/'.$user['User']['id'], array('class' => 'breadcrumb'));
?>
<div class="row">
	<article class="col s12 m6 right">			
		<div class="userscard card hoverable">   		
    		<div class="card-content">
      			<h3 class="card-title flow-text blue-grey-text text-darken-4">کاربر سایت</h3>
      			<h4 class="flow-text">
      				<p>آی دی: <?php echo $user['User']['id']?></p>
      				<p>نام: <?php echo $user['User']['first_name'] ?></p>
      				<p>نام خانوادگی: <?php echo $user['User']['last_name'] ?></p>
      				<p>نام کاربری: <?php echo $user['User']['username'] ?></p>
      				<p>پسورد: <?php echo $user['User']['password'] ?></p>
      				<p>تاریخ ایجاد: <?php echo $user['User']['created'] ?></p>
      				<p>آخرین به روزرسانی: <?php echo $user['User']['modified'] ?></p>
      			</h4>     			
    		</div>
  		</div>
	</article>
	<article class="col s12 m6">			
		<div class="userscard card hoverable">   		
    		<div class="card-content">
      			<h3 class="card-title flow-text blue-grey-text text-darken-4">عملیات</h3>
      			<h4 class="flow-text">
      				<ul>
						<li><?php echo $this->Html->link(__('ویرایش نقش'), array('action' => 'edit', $user['User']['id'])); ?> </li>
						<li><?php echo $this->Form->postLink(__('حذف نقش'), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['id'])); ?> </li>
						<li><?php echo $this->Html->link(__('لیست نقش ها'), array('action' => 'index')); ?> </li>
						<li><?php echo $this->Html->link(__('نقش جدید'), array('action' => 'add')); ?> </li>
						<li><?php echo $this->Html->link(__('لیست کاربران'), array('controller' => 'users', 'action' => 'index')); ?> </li>
						<li><?php echo $this->Html->link(__('کاربر جدید'), array('controller' => 'users', 'action' => 'add')); ?> </li>
					</ul>
      			</h4>     			
    		</div>
  		</div>
	</article>
</div>