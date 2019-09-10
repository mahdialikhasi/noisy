<?php
$this->Html->addCrumb('ارتباط با من', '/contacts/', array('class' => 'breadcrumb'));
?>
<h1 class="hide">تماس با ما</h1>
<h2>ارتباط با من</h2>
<section class="row contacts">
    <div class="col s12">
        <div class="card">
            <?php echo $this->Form->create('Contact'); ?>
            <div class="card-content blue-grey-text text-darken-4">
                <span class="card-title">تماس با من</span>
                <h3 class="contact-body">
                    سلام بر تو!
                    <br>
                    اگه به این صفحه اومدی، پس حتما با من کاری داری :)
                    <br>
                    من هم مثل همیشه، اگه وقتی داشته باشم، در خدمت رسانی حاضر و آماده ام
                    <br>
                    توی یه سری شبکه های اجتماعی هستم، و مسلما توی یه سریاشون هم نیستم (میخواستم بگم توی بیشتر شبکه های اجتماعی هستم، که با خودم گفتم که امروز اینقدر شبکه های اجتماعی زیاد شده که شاید حتی توی 0.1 درصد اونها هم نباشم! بگذریم...)
                    <br>
                    و توی بیشتر این شبکه ها (تقریبا 90 درصدشون) آی دی من مثل همیشه @mahdialikhsi هست و خواهد بود!
                    <br>
                    خوبی داشتن یه فامیلی عجیب غریب مثل Alikhasi همینه دیگه! آدم های انگشت شماری این فامیل را دارند و کمتر از اونها هم فعالیت مجازی دارند. و این میشه که من میشم انگشت نما! و در نتیجه اگه جایی mahdialikhasi دیدید (و از قضا عاشق برنامه نویسی بود و رفتار عجیب غریب داشت!) احتمالش خیلی خیلی زیاده که اون من باشم!
                    <br>
                    و در پایان، خوشحال میشم که به حلقه ی دوستان من بپیوندید، من را دنبال و لایک کنید
                    <br>
                    این هم من در شبکه های اجتماعی:
                    <br>
                        <ul class="sociallinks">
                            <li><a href="https://twitter.com/mahdialikhasi" class="waves-effect waves-light btn-floating light-blue lighten-1"><?php echo $this->Html->image('twitter.png') ?></a></li>
                            <li><a href="https://plus.google.com/+MahdiAlikhasi" class="waves-effect waves-light btn-floating red"><?php echo $this->Html->image('gplus.png') ?></a></li>
                            <li><a href="https://www.instagram.com/mahdialikhasi/" class="waves-effect waves-light btn-floating grey lighten-1"><?php echo $this->Html->image('instagram.png') ?></a></li>
                            <li><a href="https://telegram.me/mahdialikhasi" class="waves-effect waves-light btn-floating light-blue darken-2"><?php echo $this->Html->image('telegram.png') ?></a></li>
                        </ul>                   
                    یا اگه خواستید مستقیم تر از این با من در ارتباط باشید، میتونید به من ایمیل بزنید! آدرس من هم اینه
                    <br>
                    mahdialikhasi1389[at]gmail.com
                    <br>
                    اگه پروژه ای خواستید، کاری خواستید میتونید با من در میون بزارید. درسته که کلا آدم تنهایی هستم و سکوت را دوست دارم، ولی این دلیل نمیشه که کارهای تیمی را دوست نداشته باشم
                    <br>
                    D: I Love TeamWork 
                    <br>
                    راستی این سایت هم فرم تماس با ما داره ها :)
                    <br>
                    میتونین همینجا برام پیام بزارید!
                </h3>
                <?php                
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