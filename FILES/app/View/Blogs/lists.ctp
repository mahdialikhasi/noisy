<table class="table table-striped table-bordered table-hover">
    <tr class="success">
        <th>آی دی</th>
        <th>عنوان</th>
        <th>تاریخ ایجاد</th>
        <th>تاریخ به روز رسانی</th>
        <th>عملیات</th>
    </tr>
    <?php
        foreach($datas as $data){
            echo '<tr>';
            echo '<td>'.$data['Blog']['id'].'</td>';
            echo '<td><a href="/blogs/view/'.$data['Blog']['address'].'">'.$data['Blog']['title'].'</a></td>';
            echo '<td>'.$data['Blog']['created'].'</td>';
            echo '<td>'.$data['Blog']['modified'].'</td>';
            echo '<td><a href="/blogs/edit/'.$data['Blog']['address'].'">ویرایش</a>
            |'.$this->Form->Postlink('حذف', array('controller' => 'blogs', 'action' => 'delete', $data['Blog']['id']), array('confirm' => 'آیا مطمئنید که میخواهید این بلاگ را حذف کنید؟')).'</td>';
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
