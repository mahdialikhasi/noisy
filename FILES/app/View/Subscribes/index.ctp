<?php
$this->Html->addCrumb('اشتراک در خبرنامه', '/subscribes/', array('class' => 'breadcrumb'));
?>
<h1 class="hide">اشتراک در خبرنامه</h1>
<section>
    <div class="row">
        <div class="card hoverable">
            <?php echo $this->Form->create('Subscribe', array('url' => array('controller' => 'subscribes', 'action' => 'index'))); ?>
            <div class="card-content black-text">
                <h2 class="card-title flow-text">اشتراک در خبرنامه</h2>                
                <div class="input-field">
                    <i class="material-icons prefix">email</i>
                    <?php echo $this->Form->input('email', array('label' => 'آدرس ایمیل', 'type' => 'email', 'id' => 'sub_email', 'div' => false)); ?>
                </div>
                <div>
                    <div class="btn waves-effect submit"><?php echo $this->Form->end(array('label' => 'اشتراک در خبرنامه', 'div' => false)); ?><i class="material-icons right">send</i></div> 
                </div>
            </div>
        </div>        
    </div>
</section>