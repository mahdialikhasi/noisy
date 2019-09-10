<h1 class="hide">لیست دست نوشته ها</h1>
<h2>لیست دست نوشته ها</h2>
<?php
$this->Html->addCrumb('دست نوشته ها', '/blogs/', array('class' => 'breadcrumb'));
$this->Html->addCrumb('لیست دست نوشته ها', '/blogs/lists/', array('class' => 'breadcrumb'));
?>
<table class="bordered striped highlight centered responsive-table bloglist">
    <thead>
        <tr>
            <th data-field="id">آی دی</th>
            <th data-field="name">عنوان</th>
            <th data-field="created">تاریخ ایجاد</th>
            <th data-field="updated">تاریخ به روز رسانی</th>
            <th data-field="operation">عملیات</th>
        </tr>
    </thead>
    <tbody>
    <?php
        foreach($datas as $data){
            echo '<tr>';
            echo '<td>'.$data['Blog']['id'].'</td>';
            echo '<td><h3 class="blogtitle"><a href="'.$this->webroot.'blogs/view/'.$data['Blog']['address'].'" class="blue-grey-text text-darken-4">'.$data['Blog']['title'].'</a></h3></td>';
            echo '<td>'.$data['Blog']['created'].'</td>';
            echo '<td>'.$data['Blog']['modified'].'</td>';
            echo '<td><a href="'.$this->webroot.'blogs/edit/'.$data['Blog']['address'].'">ویرایش</a>
            |'.$this->Form->Postlink('حذف', array('controller' => 'blogs', 'action' => 'delete', $data['Blog']['id']), array('confirm' => 'آیا مطمئنید که میخواهید این بلاگ را حذف کنید؟')).'</td>';
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