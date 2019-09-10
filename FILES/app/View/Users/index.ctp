<h1 class="hide">لیست کاربران</h1>
<h2>کاربران سایت</h2>
<?php
$this->Html->addCrumb('کاربران', '/users/', array('class' => 'breadcrumb'));
?>
<table class="bordered striped highlight centered responsive-table users">
    <thead>
        <tr>
            <th data-field="id"><?php echo $this->Paginator->sort('id'); ?></th>
			<th data-field="firstname"><?php echo $this->Paginator->sort('first_name'); ?></th>
			<th data-field="lastname"><?php echo $this->Paginator->sort('last_name'); ?></th>
			<th data-field="username"><?php echo $this->Paginator->sort('username'); ?></th>
			<th data-field="password"><?php echo $this->Paginator->sort('password'); ?></th>
			<th data-field="created"><?php echo $this->Paginator->sort('created'); ?></th>
			<th data-field="modified"><?php echo $this->Paginator->sort('modified'); ?></th>
			<th data-field="action">عملیات</th>
        </tr>
    </thead>
    <?php
    foreach($users as $user){
        echo '<tr>';
        ?>
        <td><?php echo h($user['User']['id']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['first_name']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['last_name']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['username']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['password']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['created']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('مشاهده'), array('action' => 'view', $user['User']['id'])); ?>
			<?php echo $this->Html->link(__('ویرایش'), array('action' => 'edit', $user['User']['id'])); ?>
			<?php echo $this->Form->postLink(__('حذف'), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['id'])); ?>
		</td>
        <?php
        echo '</tr>';
    }
    ?>
</table>
<?php
$params = $this->Paginator->params();
if ($params['pageCount'] > 1) {
    ?>
    <ul class="pagination pagination-sm">
        <?php
        echo $this->Paginator->prev('<i class="material-icons">chevron_right</i>', array('class' => 'prev','tag' => 'li','escape' => false), '<a onclick="return false;"><i class="material-icons">chevron_right</i></a>', array('class' => 'prev disabled','tag' => 'li','escape' => false));
        echo $this->Paginator->numbers(array('class' => 'waves-effect number', 'separator' => '','tag' => 'li','currentClass' => 'active','currentTag' => 'a'));
        echo $this->Paginator->next('<i class="material-icons">chevron_left</i>', array('class' => 'next','tag' => 'li','escape' => false), '<a onclick="return false;"><i class="material-icons">chevron_left</i></a>', array('class' => 'next disabled','tag' => 'li','escape' => false));
        ?>
    </ul>
<?php } ?>