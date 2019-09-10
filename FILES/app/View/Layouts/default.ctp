<!DOCTYPE html>
<html>
<head>
    <?php echo $this->Html->charset(); ?>
    <title>
        <?php
        if((isset($page)) && ($page == 'home')){
            echo 'دست نوشته های یک تازه کار';
        }else{
            echo $title_for_layout;
            echo ' | دست نوشته های یک تازه کار';            
        }
        ?>
    </title>
    <?php
    echo $this->Html->meta('icon');
    echo $this->fetch('meta');
    echo $this->fetch('css');
    echo $this->fetch('script');
    ?>
    <meta http-equiv="content-language" content="fa-IR" />
    <meta name="keywords" content="دست نوشته, تازه کار, وبلاگ, آموزش, پی اچ پی, جاوااسکریپت, وب, web, javascript, php, mysql, cakephp, HTML, CSS, drupal, linux, لینوکس" >
    <meta name="description" content="این وبلاگ، محلی برای نوشتن تجربیات و دست نوشته های یک تازه کار می باشد!">
    <meta name="Designer" content="مهدی علی خاصی, Mahdi Alikhasi">
    <meta name="Author" content="مهدی علی خاصی, Mahdi Alikhasi">    
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="DC.Title" content="دست نوشته های یک تازه کار">
    <meta name="DC.Creator" content="Mahdi Alikhasi">
    <meta name="DC.Subject" content="دست نوشته, تازه, تازه کار, وبلاگ, بلاگ, آموزش, تجربه, مهدی علی خاصی, پی اچ پی, جاوااسکریپت, وب, web, javascript, php, mysql, cakephp, HTML, CSS, drupal">
    <meta name="DC.Description" content="این وبلاگ، محلی برای نوشتن تجربیات و دست نوشته های یک تازه کار می باشد">
    <meta name="DC.Publisher" content="Mahdi Alikhasi">
    <meta name="DC.Type" scheme="DCTERMS.DCMIType" content="Text,Image">
    <meta name="DC.Language" content="fa">
    <meta name="DCTERMS.License" content="creative commons v3.0">
    <meta name="DCTERMS.RightsHolder" content="Mahdi Alikhasi">
    <meta name="theme-color" content="#4285f4">
    <meta name="msapplication-navbutton-color" content="#4285f4">
    <meta name="apple-mobile-web-app-status-bar-style" content="#4285f4">
    <style type="text/css">
        #loading{
            display: block;
        }
        #container{
            display: none;
        }
    </style>
    <?php
    echo $this->Html->css('bootstrap.min');
    echo $this->Html->css('default');
    echo $this->Html->script('jquery.min');
    echo $this->Html->script('jquery-ui.min');
    echo $this->Html->script('bootstrap.min');
    ?>
</head>
<body>
<div class="cm" style="display:none;"></div>
<a class="mobile-toggle" href="#">
    <span class="sr-only">نمایش منو</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
</a>
<nav id="right">
    <div class="wrapper">
        <a href="/" title="خانه"  class="logo"><div class="logo-div"></div></a>
        <ul id="nav">
            <li>
                <a href="/">خانه</a>
            </li>
            <li>
                <a href="/blogs/">دست نوشته های من</a>
            </li>
            <li>
                <a href="/works/">نمونه کارهای من</a>
            </li>
            <li>
                <a href="/about/">کیستم؟</a>
            </li>
        </ul>
        <div class="connect">
            <h4 class="heading">با من در ارتباط باشید</h4>
            <ul class="myContacts">
                <li>
                    <a href="https://www.linkedin.com/in/mahdialikhasi">
                        <span class="name">Linkedin</span>
                        <span class="icon linkedin"></span>
                    </a>
                </li>
                <li>
                    <a href="http://noisy.ir/contacts/">
                        <span class="name">noisy</span>
                        <span class="icon noisy"></span>
                    </a>
                </li>
                <li>
                    <a href="https://plus.google.com/+MahdiAlikhasi">
                        <span class="name">G+</span>
                        <span class="icon gplus"></span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="copy-write"><p>کپی‌رایت 1393-1394<br> تمام حقوق محفوظ است.<br>مطالب تحت لیسانس <a href="http://creativecommons.org/licenses/by-nc-nd/3.0/" style="color:white">کریتیو کامنز</a> منتشر می شوند.</p></div>
    </div>
    <div class="bg-move"></div>
</nav>
<section id="container">
    <div id="header"><div class="header-text"><p id="main"></p><p class="blink"></p></div></div><hr class="header-hr">
    <section id="content">
        <?php echo $this->Session->flash(); ?>
        <?php echo $this->fetch('content'); ?>
    </section>
    <div id="loading"><div class="loading-div"><div class="cube1"></div><div class="cube2"></div></div></div>
</section>
<?php
	echo $this->Html->script('default');
	echo $this->element('googleAnalytics');
?>
</body>
</html>

                            