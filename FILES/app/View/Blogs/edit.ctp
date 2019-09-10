<?php
$this->Html->addCrumb('دست نوشته ها', '/blogs/', array('class' => 'breadcrumb'));
$this->Html->addCrumb($data['Blog']['title'], '/blogs/view/'.$data['Blog']['address'], array('class' => 'breadcrumb'));
$this->Html->addCrumb('ویرایش', '/blogs/edit/'.$data['Blog']['address'], array('class' => 'breadcrumb'));
?>
<h1 class="hide">ویرایش دست نوشته</h1>
<div class="row">
    <h2>ویرایش</h2>
    <div class="col s12">
        <div class="card">
            <?php
                echo $this->Html->script('ckeditor/ckeditor');
                echo $this->Form->create('Blog');
            ?>
            <div class="card-content black-text">
                <span class="card-title"><?php echo $data['Blog']['title'] ?></span>
                <?php                
                echo $this->Form->input('id', array('type' => 'hidden'));
                echo $this->Form->input('title', array('label' => 'عنوان', 'div' => array('class' => "input-field ".($this->Form->isFieldError('title') ? 'has-error' : '') ), 'error' => array('attributes' => array('wrap' => 'p', 'class' => 'help-block has-error'))));
                echo $this->Form->input('description', array('label' => 'خلاصه', 'class' => 'ckeditor', 'div' => array('class' => "input-field ".($this->Form->isFieldError('description') ? 'has-error' : '') ), 'error' => array('attributes' => array('wrap' => 'p', 'class' => 'help-block has-error'))));
                echo $this->Form->input('body', array('label' => 'متن کامل', 'class' => 'ckeditor', 'div' => array('class' => "input-field ".($this->Form->isFieldError('body') ? 'has-error' : '') ), 'error' => array('attributes' => array('wrap' => 'p', 'class' => 'help-block has-error'))));
                echo $this->Form->input('draft', array('type' => 'checkbox','label' => 'ذخیره به عنوان پیش نویس'));
                ?>
                <div class="row blogedit created">
                    <?php
                    echo $this->Form->input('created', array('label' => 'تاریخ ایجاد', 'class' => 'col s12 m6 l3 right','separator' => ' ', 'div' => array('class' => "input-field ".($this->Form->isFieldError('created') ? 'has-error' : '') ), 'error' => array('attributes' => array('wrap' => 'p', 'class' => 'help-block has-error'))));
                    ?>
                </div>                
            </div>
            <div class="card-action">
                <?php
                echo $this->Form->end(array('label' => 'ویرایش دست نوشته', 'div' => array('class' => "btn waves-effect submit submitdiv")));
                ?>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    CKEDITOR.replace( 'data[Blog][body]' );
    CKEDITOR.replace( 'data[Blog][description]' );
    $('select').material_select();
</script>