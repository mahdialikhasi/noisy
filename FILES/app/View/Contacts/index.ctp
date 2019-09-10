<div class="panel panel-default">
    <div class="panel-heading">ارتباط با من</div>
    <div class="panel-body">
        <?php
        echo $this->Form->create('Contact');
        echo $this->Form->input('title', array('label' => 'عنوان', 'class' => 'form-control contact-title', 'div' => array('class' => "form-group ".($this->Form->isFieldError('title') ? 'has-error' : '') ), 'error' => array('attributes' => array('wrap' => 'p', 'class' => 'help-block has-error'))));
        echo $this->Form->input('fullname', array('label' => 'نام و نام خانوادگی', 'class' => 'form-control contact-fullname', 'div' => array('class' => "form-group ".($this->Form->isFieldError('fullname') ? 'has-error' : '') ), 'error' => array('attributes' => array('wrap' => 'p', 'class' => 'help-block has-error'))));
        echo $this->Form->input('email', array('label' => 'آدرس ایمیل', 'class' => 'form-control contact-email', 'div' => array('class' => "form-group ".($this->Form->isFieldError('email') ? 'has-error' : '') ), 'error' => array('attributes' => array('wrap' => 'p', 'class' => 'help-block has-error'))));
        echo $this->Form->input('body', array('label' => 'متن', 'class' => 'form-control contact-body', 'div' => array('class' => "form-group ".($this->Form->isFieldError('body') ? 'has-error' : '') ), 'error' => array('attributes' => array('wrap' => 'p', 'class' => 'help-block has-error'))));
	$customcaptcha['length'] = 8;
	$customcaptcha['width'] = 200;
	$this->Captcha->render($customcaptcha);
        ?>
    </div>
    <div class="panel-footer">
        <?php
        echo $this->Form->end(array('label' => 'ارسال دست نوشته', 'class' => 'btn btn-primary'));
        ?>
    </div>
</div>
<script>
jQuery('.creload').on('click', function() {
    var mySrc = $(this).prev().attr('src');
    var glue = '?';
    if(mySrc.indexOf('?')!=-1)  {
        glue = '&';
    }
    $(this).prev().attr('src', mySrc + glue + new Date().getTime());
    return false;
});
$('#ContactSecurityCode').addClass('form-control');
</script>