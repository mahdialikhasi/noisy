<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php
        if((isset($page)) && ($page == 'home')){
            $title_for_layout = 'خانه';
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="DC.Title" content="دست نوشته های یک تازه کار">
    <meta name="DC.Creator" content="Mahdi Alikhasi">
    <meta name="DC.Subject" content="دست نوشته, تازه, تازه کار, وبلاگ, بلاگ, آموزش, تجربه, مهدی علی خاصی, پی اچ پی, جاوااسکریپت, وب, web, javascript, php, mysql, cakephp, HTML, CSS, drupal">
    <meta name="DC.Description" content="این وبلاگ، محلی برای نوشتن تجربیات و دست نوشته های یک تازه کار می باشد">
    <meta name="DC.Publisher" content="Mahdi Alikhasi">
    <meta name="DC.Type" scheme="DCTERMS.DCMIType" content="Text,Image">
    <meta name="DC.Language" content="fa">
    <meta property="og:type" content="article">
    <?php $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?><meta property="og:title" content="<?php echo $title_for_layout.' | دست نوشته های یک تازه کار';?>">
    <meta property="og:url" content="<?php echo $actual_link;?>">
    <meta property="og:site_name" content="دست نوشته های یک تازه کار">
    <meta property="og:description" content="این وبلاگ، محلی برای نوشتن تجربیات و دست نوشته های یک تازه کار می باشد!">
    <meta name="DCTERMS.License" content="creative commons v3.0">
    <meta name="DCTERMS.RightsHolder" content="Mahdi Alikhasi">
    <meta name="theme-color" content="#4285f4">
    <meta name="msapplication-navbutton-color" content="#4285f4">
    <meta name="apple-mobile-web-app-status-bar-style" content="#4285f4">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="<?php echo $title_for_layout.' | دست نوشته های یک تازه کار';?>">
    <?php
    mb_regex_encoding('UTF-8');
    mb_internal_encoding("UTF-8"); 
    if(isset($twitter_description)){
    $len = 190;
    echo '<meta name="twitter:description" content="'.preg_split('/(?<=\G.{'.$len.'})/u', str_replace("  ", " ", str_replace("  ", " ", str_replace(array("\n", "\r"), ' ', trim(strip_tags($twitter_description))))),-1,PREG_SPLIT_NO_EMPTY)[0].'">';
    }else{
    echo '<meta name="twitter:description" content="این وبلاگ، محلی برای نوشتن تجربیات و دست نوشته های یک تازه کار می باشد!">';
    }
    ?> 
    <meta name="twitter:creator" content="@MahdiAlikhasi">
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <?php
    echo $this->Html->css('materialize.min');
    echo $this->Html->css('style');
    echo $this->Html->script('jquery.min');
    /*echo $this->Html->script('jquery-ui.min');*/
    ?>
</head>
<body>  	
		<header>
			<div class="container"><a href="#" data-activates="nav-mobile" class="button-collapse top-nav full hide-on-large-only right"><i class="material-icons small">menu</i></a></div>
			<div class="carousel carousel-slider center" data-indicators="true">
			    <div class="carousel-fixed-item center">
			    	<div class="text-editor-wrap z-depth-4">
						<div class="title-bar"><span class="title">Noisy.sh — bash — 80x<span class="terminal-height">25</span></span></div>
						<div class="text-body">
							$ <span class="typed"></span><span class="typed-cursor"></span>
						</div>
					</div>		    
			    </div>
			    <?php
	        	$dir = new Folder('./img/slide/');
	        	$files = $dir->find('.*\.jpg');
	        	$slides = array_rand($files, 4);        	       	
	        	?>
			    <div class="carousel-item red white-text" href="#one!"><?php echo $this->Html->image('slide/'.$files[$slides[0]]) ?></div>
			    <div class="carousel-item amber white-text" href="#two!"><?php echo $this->Html->image('slide/'.$files[$slides[1]]) ?></div>
			    <div class="carousel-item green white-text" href="#three!"><?php echo $this->Html->image('slide/'.$files[$slides[2]]) ?></div>
			    <div class="carousel-item blue white-text" href="#four!"><?php echo $this->Html->image('slide/'.$files[$slides[3]]) ?></div>
			</div>
			<?php echo $this->element('menu') ?>
		</header>
		<main>
			<nav class="blue-grey darken-1 pushpin">
			    <div class="nav-wrapper">
			        <div class="col s12">
			    		<div class="container"><?php echo $this->Html->getCrumbs('', array('text' => 'خانه','class' => 'breadcrumb','escape' => false)); ?></div>
			        </div>
			    </div>
			</nav>
			<div id="loading" class="preloader-wrapper big hide">
	           	<div class="spinner-layer spinner-blue">
	               	<div class="circle-clipper left">
	              		<div class="circle"></div>
	               	</div><div class="gap-patch">
	               		<div class="circle"></div>
	               	</div><div class="circle-clipper right">
	               		<div class="circle"></div>
	               	</div>
	           	</div>
              	<div class="spinner-layer spinner-red">
                	<div class="circle-clipper left">
                  		<div class="circle"></div>
                	</div><div class="gap-patch">
                  		<div class="circle"></div>
                	</div><div class="circle-clipper right">
                  		<div class="circle"></div>
                	</div>
              	</div>
              	<div class="spinner-layer spinner-yellow">
                	<div class="circle-clipper left">
                  		<div class="circle"></div>
                	</div><div class="gap-patch">
                		<div class="circle"></div>
                	</div><div class="circle-clipper right">
                		<div class="circle"></div>
                	</div>
              	</div>
              	<div class="spinner-layer spinner-green">
                	<div class="circle-clipper left">
                		<div class="circle"></div>
                	</div><div class="gap-patch">
                		<div class="circle"></div>
                	</div><div class="circle-clipper right">
                  		<div class="circle"></div>
                	</div>
              	</div>
        	</div>
			<section id="content" class="content container">
                <div id="data">
                    <?php echo $this->Session->flash(); ?>              
                    <?php echo $this->fetch('content'); ?>
                </div>				
			</section>			     	
		</main>
		<footer class="page-footer blue-grey darken-2">			 
			<div class="container">
				<div class="row">
					<section class="col s12 m6 13 subscribe left">
						<div class="row">
							<div class="col s12 input-field">
								<i class="material-icons prefix">email</i>
								<input id="sub_email" type="email">
          						<label for="sub_email" data-error="لطفا یک آدرس ایمیل معتبر وارد کنید" data-success="آدرس ایمیل معتبر است">آدرس ایمیل</label>
							</div>
							<div class="col s12">
								<div class="btn waves-effect submit"><input type="submit" value="اشتراک در خبرنامه"><i class="material-icons right">send</i></div> 
							</div>
						</div>
					</section>
					<section class="col s12 m6">
						<div class="card blue-grey darken-1">
            				<div class="card-content white-text">              					
              					<p>سلام.<br /> من مهدی علیخاصی هستم. به وبلاگ پر سر و صدای من خوش آمدید.<br />اینجا همه چیز بوی برنامه نویسی میده!</p>
            				</div>            
					</section>
				</div>
			</div>
			<div class="row footer-copyright center-align">
				<div class="container">
					<section class="col s12 m6 l3 copyright"><p>© 2014-<?php echo date('Y')?> Copyright</p></section>
					<section class="col s12 m6"><p>مطالب تحت لیسانس <a href="http://creativecommons.org/licenses/by-nc-nd/3.0/" style="color:white">کریتیو کامنز</a> منتشر می شوند.</p>	</section>
					<section class="col s12 m6 l3"><p>تمام حقوق محفوظ است.</p></section>
				</div>				
			</div>			
		</footer>
	<?php
    echo $this->Html->script('materialize.min');
    echo $this->Html->script('default');
    echo $this->element('googleAnalytics');
    echo $this->Html->script('typed');
	?>
</body>
</html>