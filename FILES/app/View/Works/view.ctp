<?php
$data = $data[0];
$this->Html->addCrumb('نمونه کارهای من', '/works/', array('class' => 'breadcrumb'));
$this->Html->addCrumb($data['Work']['name'], '/works/view/'.$data['Work']['address'], array('class' => 'breadcrumb'));
?>
<h1 class="hide">نمونه کارهای من</h1>
<section class="row">
	<article class="work-view col s12">
        <div class="card hoverable">
            <div class="card-content black-text">
            	<?php
            	echo '<h2 class="card-title flow-text"><a class="work-link blue-grey-text text-darken-4" href="'.$this->webroot.'works/view/'.$data['Work']['address'].'">'.$data['Work']['name'].'</a></h2>';
				if($role_id == 1){
                	echo '<p class="right edit"><a class="work-link blue-grey-text text-darken-4" href="'.$this->webroot.'works/edit/'.$data['Work']['address'].'"><i class="material-icons">mode_edit</i></a></p>';
            	}
            	$technos = split(',', $data['Work']['technos']);
            	?>
            	<span class="flow-text work-body block">پلتفرم: <h4><div class="chip"><?php echo $data['Work']['platform'] ?></div></h4></span>
            	<span class="flow-text work-body bold block">تکنولوژی های مورد استفاده : <?php foreach($technos as $techno){echo '<h4><div class="chip">'.$techno.'</div></h4>';} ?></span>
            	<span class="flow-text work-body block">آدرس وب سایت : <h4 class="flow-text work-body weblink"><?php echo '<a class="workSiteAddress blue-grey-text text-darken-4" href="'.$data['Work']['site_address'].'">'.$data['Work']['site_address'].'</a>';?></h4></span>
                <h3 class="flow-text work-body"><?php echo $data['Work']['body'] ?></h3>
            </div>
        </div>
    </article>
</section>