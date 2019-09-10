<h1 class="hide">لیست دست نوشته ها</h1>
<h2>لیست دست نوشته ها</h2>
<?php
$this->Html->addCrumb('نظرات', '/comments/lists', array('class' => 'breadcrumb'));
?>
<table class="bordered striped highlight centered responsive-table commentlist">
    <thead>
        <tr>
            <th data-field="id">آی دی</th>
            <th data-field="name">نام و نام خانوادگی</th>
            <th data-field="email">ایمیل</th>
            <th data-field="blogid">آی دی بلاگ</th>
            <th data-field="created">تاریخ ایجاد</th>
            <th data-field="operation">عملیات</th>
        </tr>
    </thead>
    <tbody>
    <?php
        foreach($datas as $data){
            echo '<tr>';
            echo '<td>'.$data['Comment']['id'].'</td>';
            echo '<td>'.$data['Comment']['name'].'</td>';
            echo '<td>'.$data['Comment']['email'].'</td>';
            echo '<td><a href="'.$this->webroot.'blogs/view/'.$data['Blog']['address'].'">'.$data['Blog']['title'].'</a></td>';
            echo '<td>'.$data['Comment']['created'].'</td>';
            echo '<td>'.$this->Form->Postlink('حذف', array('controller' => 'comments', 'action' => 'delete', $data['Comment']['id']), array('confirm' => 'آیا مطمئنید میخواهید این کامنت را حذف کنید؟')).'</td>';
            echo '</tr>';
        }
    ?>
    </tbody>
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