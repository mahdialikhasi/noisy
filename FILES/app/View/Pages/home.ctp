<section class="myWorksSelected row">
	<h2>چند تا از نمونه کار های من</h2>
  <?php
    foreach($data_works as $data_work){
      ?>
        <article class="col s12 m6">
          <?php
            $thumbname = explode('.', $data_work['Work']['photo']);
            $count = count($thumbname) - 1;
            $thumbname = 'thumb.'.$thumbname[$count];
            $len = 350;
            $description = strip_tags($data_work['Work']['body'], '');
            $description = preg_split('/(?<=\G.{'.$len.'})/u',$description,-1,PREG_SPLIT_NO_EMPTY);
            $description = $description[0] . '...';
          ?>    
          <div class="card hoverable sticky-action">
              <div class="card-image waves-effect waves-block waves-light">
                  <img class="activator" <?php echo 'src="'.$this->webroot .'files/work/photo/'.$data_work['Work']['photo_dir'].'/'.$thumbname.'" alt="'.$data_work['Work']['name'].'"' ?>>
              </div>
              <div class="card-content">
                  <h3 class="card-title activator grey-text text-darken-4"><?php echo $data_work['Work']['name'] ?><i class="material-icons left">more_vert</i></h3>            
              </div>
              <div class="card-action"><a href="<?php echo $this->webroot.'works/view/'.$data_work['Work']['address'] ?>" alt="<?php echo $data_work['Work']['name'] ?>" >مشاهده ی کامل</a></div>
              <div class="card-reveal">
                  <span class="card-title grey-text text-darken-4"><?php echo $data_work['Work']['name'] ?><i class="material-icons right">close</i></span>
                  <h4 class="flow-text work-description"><?php echo $description ?></h4>
              </div>
            </div>    
        </article>  
      <?php
    }   
  ?>	
</section>
<section class="lastBlogs">
	<h2>آخرین دست نوشته های من	</h2>
	<div class="row">
	<?php
		foreach($data_blogs as $blog){
			$len = 350;
			$description = strip_tags($blog['Blog']['description'], '');
			$description = preg_split('/(?<=\G.{'.$len.'})/u',$description,-1,PREG_SPLIT_NO_EMPTY);
			$description = $description[0] . '...';
			echo '			
        	<article class="lastBlogContent col s12 lastBlog'.$blog['Blog']['id'].'">
        		<div class="card hoverable">
            		<div class="card-content black-text">
            			<h3 class="card-title flow-text"><a class="blog-link blue-grey-text text-darken-4" href="'.$this->webroot.'blogs/view/'.$blog['Blog']['address'].'">'.$blog['Blog']['title'].'</a></h3>
            			<h4 class="blog-description flow-text">'.$description.'</h4>
            		</div>
            		<div class="card-action">
              			<a class="blog-more-link" href="'.$this->webroot.'blogs/view/'.$blog['Blog']['address'].'">بیشتر بخوانید</a>
            		</div>
          		</div>
        	</article>';
		}
	?>
	</div>
</section>