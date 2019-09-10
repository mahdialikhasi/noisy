<section class="myWorksSelected">
	<h2>
		چند تا از نمونه کار های من
	</h2>
	<div class="first">
		<?php
			$thumbname = explode('.', $data_works[0]['Work']['photo']);
        		$count = count($thumbname) - 1;
        		$thumbname = 'thumb.'.$thumbname[$count];
			echo '<a href="/works/view/'.$data_works[0]['Work']['address'].'" alt="'.$data_works[0]['Work']['name'].'">
				<img src="/files/work/photo/'.$data_works[0]['Work']['photo_dir'].'/'.$thumbname.'" alt="'.$data_works[0]['Work']['name'].'">
			</a>';
		?>	
	</div>
	<div class="second">
		<?php
			$thumbname = explode('.', $data_works[1]['Work']['photo']);
        		$count = count($thumbname) - 1;
        		$thumbname = 'thumb.'.$thumbname[$count];
			echo '<a href="/works/view/'.$data_works[1]['Work']['address'].'" alt="'.$data_works[1]['Work']['name'].'">
				<img src="/files/work/photo/'.$data_works[1]['Work']['photo_dir'].'/'.$thumbname.'" alt="'.$data_works[1]['Work']['name'].'">
			</a>';
		?>	
	</div>
</section>
<section class="lastBlogs">
	<h2>
		آخرین دست نوشته های من
	</h2>
	<div id="lastBlogs">
	<?php
		foreach($data_blogs as $blog){
			$len = 350;
			$description = preg_split('/(?<=\G.{'.$len.'})/u',$blog['Blog']['description'],-1,PREG_SPLIT_NO_EMPTY);
			$description = $description[0] . '...';
			echo '
			<article class="lastBlogContent lastBlog'.$blog['Blog']['id'].'">
				<h4><a class="blog-link" href="/blogs/view/'.$blog['Blog']['address'].'">'.$blog['Blog']['title'].'</a></h4>
				<section class="blog-description">'.$description.'</section>
				<p><a class="blog-more-link" href="/blogs/view/'.$blog['Blog']['address'].'">بیشتر بخوانید <i>←</i></a></p>
			</article>';
		}
	?>
	</div>
</section>