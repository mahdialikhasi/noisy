<?php
$this->Html->addCrumb('نمونه کارها', '/works/', array('class' => 'breadcrumb'));
$this->Html->addCrumb($data['Work']['name'], '/works/view/'.$data['Work']['address'], array('class' => 'breadcrumb'));
$this->Html->addCrumb('ویرایش', '/works/edit/'.$data['Work']['address'], array('class' => 'breadcrumb'));
?>
<h1 class="hide">ویرایش نمونه کار</h1>
<div class="row">
    <h2>ویرایش نمونه کار</h2>
    <div class="col s12">
        <div class="card">
            <?php
            echo $this->Html->script('ckeditor/ckeditor');
            echo $this->Form->create('Work', array('type' => 'file'));
            ?>
            <div class="card-content black-text workadd">
                <span class="card-title">ویرایش نمونه کار</span>
                <?php               
                echo $this->Form->input('id');
                echo $this->Form->input('name', array('label' => 'عنوان', 'div' => array('class' => "input-field ".($this->Form->isFieldError('title') ? 'has-error' : '') ), 'error' => array('attributes' => array('wrap' => 'p', 'class' => 'help-block has-error'))));
                echo $this->Form->input('site_address', array('label' => 'آدرس نمونه کار','div' => array('class' => "input-field ".($this->Form->isFieldError('site_address') ? 'has-error' : '') ), 'error' => array('attributes' => array('wrap' => 'p', 'class' => 'help-block has-error'))));
                echo $this->Form->input('platform', array('label' => 'پلتفرم', 'div' => array('class' => "input-field ".($this->Form->isFieldError('title') ? 'has-error' : '') ), 'error' => array('attributes' => array('wrap' => 'p', 'class' => 'help-block has-error'))));
                echo $this->Form->input('technos', array('label' => 'تکتولوژی ها(با کامای انگلیسی جدا کنید)', 'div' => array('class' => "input-field ".($this->Form->isFieldError('title') ? 'has-error' : '') ), 'error' => array('attributes' => array('wrap' => 'p', 'class' => 'help-block has-error'))));             
                echo $this->Form->input('body', array('label' => 'متن کامل', 'class' => 'ckeditor', 'div' => array('class' => "input-field ".($this->Form->isFieldError('body') ? 'has-error' : '') ), 'error' => array('attributes' => array('wrap' => 'p', 'class' => 'help-block has-error'))));
                ?>
                <!--<div class="file-field input-field">
                    <?php echo $this->Form->input('photo', array('type' => 'file', 'label' => 'تصویر', 'div' => array('class' => "btn ".($this->Form->isFieldError('photo') ? 'has-error' : '') ), 'error' => array('attributes' => array('wrap' => 'p', 'class' => 'help-block has-error')))); ?>
                    <div class="file-path-wrapper">
                        <div class="file-path"></div>
                    </div>
                </div> -->
                <?php                
                echo $this->Form->input('ishome', array('type' => 'checkbox','label' => 'آیا در صفحه ی اول نمایش داده بشود؟'));                
                ?>                              
            </div>
            <div class="card-action">
                <?php
                echo $this->Form->end(array('label' => 'ویرایش نمونه کار', 'div' => array('class' => "btn waves-effect submit submitdiv")));
                ?>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    CKEDITOR.replace( 'data[Work][body]' );
</script>