<h1 class="hide">لیست تماس ها</h1>
<h2>لیست تماس ها</h2>
<?php
$this->Html->addCrumb('ارتباط با من', '/contacts/', array('class' => 'breadcrumb'));
$this->Html->addCrumb('لیست تماس ها', '/contacts/lists/', array('class' => 'breadcrumb'));
?>
<table class="bordered striped highlight centered responsive-table bloglist">
    <thead>
        <tr>
            <th data-field="id">آی دی</th>
            <th data-field="title">عنوان</th>
            <th data-field="name">نام و نام خانوادگی</th>
            <th data-field="email">آدرس ایمیل</th>
            <th data-field="created">تاریخ ایجاد</th>
            <th data-field="operation">عملیات</th>
        </tr>
    </thead>
    <?php
    foreach($datas as $data){
        echo '<tr>';
        echo '<td>'.$data['Contact']['id'].'</td>';
        echo '<td><a href="'.$this->webroot.'contacts/view/'.$data['Contact']['id'].'">'.$data['Contact']['title'].'</a></td>';
        echo '<td>'.$data['Contact']['fullname'].'</td>';
        echo '<td>'.$data['Contact']['email'].'</td>';
        echo '<td>'.$data['Contact']['created'].'</td>';        
        echo '<td>'.$this->Form->Postlink('حذف', array('controller' => 'contacts', 'action' => 'delete', $data['Contact']['id']), array('confirm' => 'آیا مطمئنید میخواهید این تماس را حذف کنید؟')).'</td>';
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