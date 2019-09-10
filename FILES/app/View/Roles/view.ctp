<h1 class="hide">نقش های کاربری</h1>
<h2>مشاهده ی نقش کاربری</h2>
<?php
$this->Html->addCrumb('نقش های کاربری', '/roles/', array('class' => 'breadcrumb'));
$this->Html->addCrumb('مشاهده ی نقش '.$role['Role']['name'], '/roles/view/'.$role['Role']['id'], array('class' => 'breadcrumb'));
?>
<div class="row">
	<article class="col s12 m6 right">			
		<div class="rolescard card hoverable">   		
    		<div class="card-content">
      			<h3 class="card-title flow-text blue-grey-text text-darken-4">نقش کاربری</h3>
      			<h4 class="flow-text">
      				<p>آی دی: <?php echo $role['Role']['id']?></p>
      				<p>عنوان نقش: <?php echo $role['Role']['name'] ?></p>
      			</h4>     			
    		</div>
  		</div>
	</article>
	<article class="col s12 m6">			
		<div class="rolescard card hoverable">   		
    		<div class="card-content">
      			<h3 class="card-title flow-text blue-grey-text text-darken-4">عملیات</h3>
      			<h4 class="flow-text">
      				<ul>
						<li><?php echo $this->Html->link(__('ویرایش نقش'), array('action' => 'edit', $role['Role']['id'])); ?> </li>
						<li><?php echo $this->Form->postLink(__('حذف نقش'), array('action' => 'delete', $role['Role']['id']), null, __('Are you sure you want to delete # %s?', $role['Role']['id'])); ?> </li>
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
<h2>کاربران دارای این نقش</h2>
<table class="bordered striped highlight centered responsive-table roles">
    <thead>
        <tr>
            <th data-field="id">آی دی</th>
            <th data-field="firstname">نام</th>
            <th data-field="lastname">نام خانوادگی</th>
            <th data-field="email">ایمیل</th>
            <th data-field="roleid">آی دی نقش کاربری</th>
            <th data-field="usename">یوزرنیم</th>
            <th data-field="password">پسورد</th>
            <th data-field="created">تاریخ ایجاد</th>
            <th data-field="modified">تاریخ ویرایش</th>
            <th data-field="actions">عملیات</th>
        </tr>
    </thead>
    <?php
    foreach($role['User'] as $user){
    ?>
        <tr>
        	<td><?php echo $user['id']; ?></td>
			<td><?php echo $user['first_name']; ?></td>
			<td><?php echo $user['last_name']; ?></td>
			<td><?php echo $user['email']; ?></td>
			<td><?php echo $user['role_id']; ?></td>
			<td><?php echo $user['username']; ?></td>
			<td><?php echo $user['password']; ?></td>
			<td><?php echo $user['created']; ?></td>
			<td><?php echo $user['modified']; ?></td>
			<td>
				<?php echo $this->Html->link(__('مشاهده'), array('controller' => 'users', 'action' => 'view', $user['id'])); ?>|
				<?php echo $this->Html->link(__('ویرایش'), array('controller' => 'users', 'action' => 'edit', $user['id'])); ?>|
				<?php echo $this->Form->postLink(__('حذف'), array('controller' => 'users', 'action' => 'delete', $user['id']), null, __('Are you sure you want to delete # %s?', $user['id'])); ?>
			</td>
        </tr>
    <?php
	}
    ?>
</table>