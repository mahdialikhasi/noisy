<table class="table table-striped table-bordered table-hover">
    <tr class="success">
        <th>آی دی</th>
        <th>نام و نام خانوادگی</th>
        <th>ایمیل</th>
        <th>آی دی بلاگ</th>
        <th>تاریخ ایجاد</th>
        <th>عملیات</th>
    </tr>
    <?php
        foreach($datas as $data){
            echo '<tr>';
            echo '<td>'.$data['Comment']['id'].'</td>';
            echo '<td>'.$data['Comment']['name'].'</td>';
            echo '<td>'.$data['Comment']['email'].'</td>';
            echo '<td><a href="/blogs/view/'.$data['Blog']['address'].'">'.$data['Blog']['title'].'</a></td>';
            echo '<td>'.$data['Comment']['created'].'</td>';
            echo '<td>'.$this->Form->Postlink('حذف', array('controller' => 'comments', 'action' => 'delete', $data['Comment']['id']), array('confirm' => 'آیا مطمئنید میخواهید این کامنت را حذف کنید؟')).'</td>';
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
