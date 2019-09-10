<?php
$this->Html->addCrumb('ارتباط با من', '/contacts/', array('class' => 'breadcrumb'));
$this->Html->addCrumb('لیست تماس ها', '/contacts/lists/', array('class' => 'breadcrumb'));
$this->Html->addCrumb($data['Contact']['title'], '/contacts/view/'.$data['Contact']['id'], array('class' => 'breadcrumb'));
?>
<h1 class="hide">مشاهده ی تماس کاربر</h1>
<div class="row">
    <article class="col s12">
	    <div class="card">
            <div class="card-content black-text">
    	        <h2 class="card-title flow-text blue-grey-text text-darken-4"><?php echo $data['Contact']['title'] ?></span>
    	        <h4 class="flow-text contactinfo">نام و نام خانوادگی : <?php echo $data['Contact']['fullname'] ?></h4>
    	        <h4 class="flow-text contactinfo">آدرس ایمیل : <?php echo $data['Contact']['email'] ?></h4>
    	        <h3 class="flow-text contactbody"><?php echo $data['Contact']['body'] ?></h4>
            </div>
        </div>
    </article>
</div>