<?php
$this->Html->addCrumb('ارتباط با من', '/contacts/', array('class' => 'breadcrumb'));
?>
<h1 class="hide">تماس با ما</h1>
<h2>ارتباط با من</h2>
<section class="row contacts">
    <div class="col s12">
        <div class="card">
            <div class="card-content blue-grey-text text-darken-4">
                <span class="card-title">تماس با من</span>
                <?php
                echo $this->Form->create('Contact');
                echo $this->Form->input('title', array('label' => 'عنوان', 'div' => array('class' => "input-field ".($this->Form->isFieldError('title') ? 'has-error' : '') ), 'error' => array('attributes' => array('wrap' => 'p', 'class' => 'help-block has-error'))));
                echo $this->Form->input('fullname', array('label' => 'نام و نام خانوادگی', 'div' => array('class' => "input-field ".($this->Form->isFieldError('fullname') ? 'has-error' : '') ), 'error' => array('attributes' => array('wrap' => 'p', 'class' => 'help-block has-error'))));
                echo $this->Form->input('email', array('label' => 'آدرس ایمیل', 'div' => array('class' => "input-field ".($this->Form->isFieldError('email') ? 'has-error' : '') ), 'error' => array('attributes' => array('wrap' => 'p', 'class' => 'help-block has-error'))));
                echo $this->Form->input('body', array('label' => 'متن', 'class' => 'materialize-textarea', 'div' => array('class' => "input-field ".($this->Form->isFieldError('body') ? 'has-error' : '') ), 'error' => array('attributes' => array('wrap' => 'p', 'class' => 'help-block has-error'))));
                $customcaptcha['length'] = 6;
                $customcaptcha['width'] = 200;
                $customcaptcha['model'] = 'Contact';
                $this->Captcha->render($customcaptcha);
                ?>
            </div>
            <div class="card-action">
                <?php echo $this->Form->end(array('label' => 'ارسال', 'div' => array('class' => "btn waves-effect submit submitdiv"))); ?>
            </div>
        </div>
    </div>
</section>
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
$('#ContactSecurityCode').parent().addClass('input-field');
$('<i class="material-icons right">send</i>').appendTo('.submitdiv');
</script>