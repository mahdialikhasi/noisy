<h1 class="hide">لیست خبرنامه ها</h1>
<h2>خبرنامه ها</h2>
<?php
$this->Html->addCrumb('اشتراک در خبرنامه', '/subscribes/', array('class' => 'breadcrumb'));
$this->Html->addCrumb('لیست خبرنامه ها', '/subscribes/lists', array('class' => 'breadcrumb'));
?>
<table class="bordered striped highlight centered responsive-table subscribes">
    <thead>
        <tr>
            <th data-field="id"><?php echo $this->Paginator->sort('id'); ?></th>
			<th data-field="email"><?php echo $this->Paginator->sort('email'); ?></th>
            <th data-field="confirmed"><?php echo $this->Paginator->sort('confirmed'); ?></th>
			<th data-field="action">عملیات</th>
        </tr>
    </thead>
    <?php
    foreach($subscribes as $subscribe){
        echo '<tr>';
        ?>
        <td><?php echo h($subscribe['Subscribe']['id']); ?>&nbsp;</td>
		<td><?php echo h($subscribe['Subscribe']['email']); ?>&nbsp;</td>
		<td><?php echo h($subscribe['Subscribe']['confirmed']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Form->postLink(__('حذف'), array('action' => 'delete', $subscribe['Subscribe']['id']), null, __('Are you sure you want to delete # %s?', $subscribe['Subscribe']['id'])); ?>
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