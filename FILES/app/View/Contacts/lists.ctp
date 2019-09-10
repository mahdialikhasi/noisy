<table class="table table-striped table-bordered table-hover">
    <tr class="success">
        <th>آی دی</th>
        <th>عنوان</th>
        <th>نام و نام خانوادگی</th>
        <th>تاریخ ایجاد</th>
        <th>آدرس ایمیل</th>
        <th>عملیات</th>
    </tr>
    <?php
    foreach($datas as $data){
        echo '<tr>';
        echo '<td>'.$data['Contact']['id'].'</td>';
        echo '<td><a href="/contacts/view/'.$data['Contact']['id'].'">'.$data['Contact']['title'].'</a></td>';
        echo '<td>'.$data['Contact']['fullname'].'</td>';
        echo '<td>'.$data['Contact']['created'].'</td>';
        echo '<td>'.$data['Contact']['email'].'</td>';
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
        echo $this->Paginator->prev('&larr; قبلی', array('class' => 'prev','tag' => 'li','escape' => false), '<a onclick="return false;">&larr; قبلی</a>', array('class' => 'prev disabled','tag' => 'li','escape' => false));
        echo $this->Paginator->numbers(array('separator' => '','tag' => 'li','currentClass' => 'active','currentTag' => 'a'));
        echo $this->Paginator->next('بعدی &rarr;', array('class' => 'next','tag' => 'li','escape' => false), '<a onclick="return false;">بعدی &rarr;</a>', array('class' => 'next disabled','tag' => 'li','escape' => false));
        ?>
    </ul>
<?php } ?>
