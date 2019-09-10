<h1 class="hide">دسته بندی ها</h1>
<?php
$this->Html->addCrumb('دسته بندی ها', '/tags/', array('class' => 'breadcrumb'));
echo '<div class="row tagslist">';
foreach($datas as $data){
	echo '<div class="col s12 m6 l3 right">
    	    <div class="card blue-grey">
        	    <div class="card-content white-text center-align">
            		<h2 class="tag-link"><a class="white-text" href="'.$this->webroot.'tags/search/'.$data['Tag']['name'].'/">'.$data['Tag']['name'].'</a></h2>
            	</div>
        	</div>
        </div>';
}
echo '</div>';
?>
