<?php
$this->Html->addCrumb('نقش های کاربری', '/roles/', array('class' => 'breadcrumb'));
$this->Html->addCrumb('ویرایش نقش '.$data['Role']['name'], '/roles/edit/'.$data['Role']['id'], array('class' => 'breadcrumb'));
?>
<h1 class="hide">نقش های کاربری</h1>
<h2>ویرایش نقش کاربری</h2>
<section class="row roles">
    <div class="col s12">
        <div class="card">
            <?php
            echo $this->Form->create('Role');
            ?>
            <div class="card-content blue-grey-text text-darken-4">
                <span class="card-title">ویرایش نقش کاربری</span>
                <?php                
                echo $this->Form->input('id');
                echo $this->Form->input('name',array('label' => 'عنوان', 'div' => 'input-field'));
                ?>
            </div>
            <div class="card-action">
                <?php echo $this->Form->end(array('label' => 'ذخیره', 'div' => array('class' => "btn waves-effect submit submitdiv"))); ?>
            </div>
        </div>
    </div>
</section>