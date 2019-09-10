<div class="panel panel-default">
    <div class="panel-heading">افزودن نمونه کار</div>
    <div class="panel-body">
        <?php
            echo $this->Html->script('ckeditor/ckeditor');
            echo $this->Form->create('Work', array('type' => 'file'));
            echo $this->Form->input('name', array('label' => 'عنوان', 'placeholder' => 'عنوان', 'class' => 'form-control', 'div' => array('class' => "form-group ".($this->Form->isFieldError('name') ? 'has-error' : '') ), 'error' => array('attributes' => array('wrap' => 'p', 'class' => 'help-block has-error'))));
            echo $this->Form->input('site_address', array('label' => 'آدرس نمونه کار', 'placeholder' => 'آدرس نمونه کار', 'class' => 'form-control', 'div' => array('class' => "form-group ".($this->Form->isFieldError('site_address') ? 'has-error' : '') ), 'error' => array('attributes' => array('wrap' => 'p', 'class' => 'help-block has-error'))));
            echo $this->Form->input('body', array('label' => 'متن کامل', 'placeholder' => 'متن کامل', 'class' => 'ckeditor form-control', 'div' => array('class' => "form-group ".($this->Form->isFieldError('body') ? 'has-error' : '') ), 'error' => array('attributes' => array('wrap' => 'p', 'class' => 'help-block has-error'))));
            echo $this->Form->input('photo', array('type' => 'file', 'label' => 'تصویر صفحه ی اول', 'placeholder' => 'تصویر صفحه ی اول', 'class' => 'form-control', 'div' => array('class' => "form-group ".($this->Form->isFieldError('photo') ? 'has-error' : '') ), 'error' => array('attributes' => array('wrap' => 'p', 'class' => 'help-block has-error'))));
            echo $this->Form->input('ishome', array('label' => 'آیا در صفحه ی اول نمایش داده بشود؟', 'class' => 'form-control', 'div' => array('class' => "form-group ".($this->Form->isFieldError('ishome') ? 'has-error' : '') ), 'error' => array('attributes' => array('wrap' => 'p', 'class' => 'help-block has-error'))));
        ?>
    </div>
    <div class="panel-footer">
        <?php
        echo $this->Form->end(array('label' => 'ارسال دست نوشته', 'class' => 'btn btn-primary'));
        ?>
    </div>
</div>