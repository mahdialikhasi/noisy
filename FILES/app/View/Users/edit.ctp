<?php
$this->Html->addCrumb('کاربران', '/users/', array('class' => 'breadcrumb'));
?>
<h1 class="hide">کاربران سایت</h1>
<h2>ویرایش کارربان سایت</h2>
<section class="row users">
    <div class="col s12">
        <div class="card">
            <?php
            echo $this->Form->create('User');
            ?>
            <div class="card-content blue-grey-text text-darken-4">
                <span class="card-title">ویرایش نقش کاربری</span>
                <?php                
                echo $this->Form->input('id');
                echo $this->Form->input('first_name',array('label' => 'نام', 'div' => 'input-field'));
				echo $this->Form->input('last_name',array('label' => 'نام خانوادگی', 'div' => 'input-field'));
				echo $this->Form->input('username',array('label' => 'نام کاربری', 'div' => 'input-field'));
				echo $this->Form->input('password',array('label' => 'رمزعبور', 'div' => 'input-field'));
				echo $this->Form->input('email',array('label' => 'ایمیل', 'div' => 'input-field'));
				echo $this->Form->input('role_id',array('label' => '', 'div' => 'input-field'));
                ?>
            </div>
            <div class="card-action">
                <?php echo $this->Form->end(array('label' => 'ویرایش', 'div' => array('class' => "btn waves-effect submit submitdiv"))); ?>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
	$(document).ready(function() {
    	$('select').material_select();
  	});
</script>