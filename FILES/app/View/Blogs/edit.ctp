<div class="panel panel-default">
    <div class="panel-heading">ویرایش دست نوشته</div>
    <div class="panel-body">
        <?php
        echo $this->Html->script('ckeditor/ckeditor');
        echo $this->Form->create('Blog');
        echo $this->Form->input('id', array('type' => 'hidden'));
        echo $this->Form->input('title', array('label' => 'عنوان', 'placeholder' => 'عنوان', 'class' => 'form-control', 'div' => array('class' => "form-group ".($this->Form->isFieldError('title') ? 'has-error' : '') ), 'error' => array('attributes' => array('wrap' => 'p', 'class' => 'help-block has-error'))));
        echo $this->Form->input('description', array('label' => 'خلاصه', 'placeholder' => 'خلاصه', 'class' => 'ckeditor form-control', 'div' => array('class' => "form-group ".($this->Form->isFieldError('description') ? 'has-error' : '') ), 'error' => array('attributes' => array('wrap' => 'p', 'class' => 'help-block has-error'))));
        echo $this->Form->input('body', array('label' => 'متن کامل', 'placeholder' => 'متن کامل', 'class' => 'ckeditor form-control', 'div' => array('class' => "form-group ".($this->Form->isFieldError('body') ? 'has-error' : '') ), 'error' => array('attributes' => array('wrap' => 'p', 'class' => 'help-block has-error'))));
        echo $this->Form->input('draft', array('type' => 'checkbox','label' => 'ذخیره به عنوان پیش نویس', 'placeholder' => 'ذخیره به عنوان پیش نویس', 'style' => 'float:left;width:50%', 'class' => 'form-control', 'div' => array('class' => "form-group ".($this->Form->isFieldError('draft') ? 'has-error' : '') ), 'error' => array('attributes' => array('wrap' => 'p', 'class' => 'help-block has-error'))));
        echo $this->Form->input('created', array('label' => 'تاریخ ایجاد', 'class' => 'form-control', 'div' => array('class' => "form-group ".($this->Form->isFieldError('created') ? 'has-error' : '') ), 'error' => array('attributes' => array('wrap' => 'p', 'class' => 'help-block has-error'))));
        ?>
    </div>
    <div class="panel-footer">
        <?php
        echo $this->Form->end(array('label' => 'ویرایش دست نوشته', 'class' => 'btn btn-primary'));
        ?>
    </div>
</div>