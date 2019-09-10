<h1 class="hide">نقش های کاربری</h1>
<h2>لیست نقش های کاربری</h2>
<?php
$this->Html->addCrumb('نقش های کاربری', '/roles/', array('class' => 'breadcrumb'));
?>
<table class="bordered striped highlight centered responsive-table roles">
    <thead>
        <tr>
            <th data-field="id"><?php echo $this->Paginator->sort('آی دی'); ?></th>
            <th data-field="name"><?php echo $this->Paginator->sort('عنوان'); ?></th>
            <th data-field="actions">عملیات</th>
        </tr>
    </thead>
    <?php
    foreach($roles as $role){
        echo '<tr>';
        echo '<td>'.$role['Role']['id'].'</td>';
        echo '<td>'.$role['Role']['name'].'</td>';
        echo '<td>'.$this->Html->link(__('مشاهده'), array('action' => 'view', $role['Role']['id'])).'|'.$this->Html->link(__('ویرایش'), array('action' => 'edit', $role['Role']['id'])).'|'.$this->Form->postLink(__('حذف'), array('action' => 'delete', $role['Role']['id']), null, __('Are you sure you want to delete # %s?', $role['Role']['id'])).'</td>';        
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
