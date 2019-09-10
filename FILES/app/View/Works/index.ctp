<?php
$this->Html->addCrumb('نمونه کارهای من', '/works/', array('class' => 'breadcrumb'));
?>
<h1 class="hide">نمونه کارهای من</h1>
<section class="workspage row">
    <?php
    foreach($datas as $data){        
        $thumbname = explode('.', $data['Work']['photo']);
        $count = count($thumbname) - 1;
        $thumbname = 'thumb.'.$thumbname[$count];
    ?>    
        <article class="col s12 m6 right">
            <div class="card hoverable">
                <div class="card-image waves-effect waves-block waves-light">
                    <a href="<?php echo $this->webroot.'works/view/'.$data['Work']['address'].'" alt="'.$data['Work']['name'].'" >'; ?>
                        <img class="activator" <?php echo 'src="'.$this->webroot .'files/work/photo/'.$data['Work']['photo_dir'].'/'.$thumbname.'" alt="'.$data['Work']['name'].'"' ?>>
                    </a>                    
                </div>
                <div class="card-content">
                    <h2 class="card-title"><a class="blue-grey-text text-darken-4" href="<?php echo $this->webroot.'works/view/'.$data['Work']['address'].'" alt="'.$data['Work']['name'].'" >'.$data['Work']['name'].'</a></h2>'; ?>
                </div>
                <div class="card-action">
                    <a href="<?php echo $this->webroot.'works/view/'.$data['Work']['address'].'" alt="'.$data['Work']['name'].'" >بیشتر بخوانید</a>'; ?>
                    <?php echo '<h4 class="left weblink"><a class="workSiteAddress blue-grey-text text-darken-4" href="'.$data['Work']['site_address'].'">'.$data['Work']['site_address'].'</a></h4>'; ?>
                </div>                
            </div>      
        </article>
    <?php
    }
    ?> 
    <?php
    $params = $this->Paginator->params();
    if ($params['pageCount'] > 1) {
        ?>
        <ul class="pagination pagination-sm blog-pagination">
            <?php
            echo $this->Paginator->prev('<i class="material-icons">chevron_right</i>', array('class' => 'prev','tag' => 'li','escape' => false), '<a onclick="return false;"><i class="material-icons">chevron_right</i></a>', array('class' => 'prev disabled','tag' => 'li','escape' => false));
            echo $this->Paginator->numbers(array('class' => 'waves-effect number', 'separator' => '','tag' => 'li','currentClass' => 'active','currentTag' => 'a'));
            echo $this->Paginator->next('<i class="material-icons">chevron_left</i>', array('class' => 'next','tag' => 'li','escape' => false), '<a onclick="return false;"><i class="material-icons">chevron_left</i></a>', array('class' => 'next disabled','tag' => 'li','escape' => false));
            ?>
        </ul>
    <?php } ?>     
</section>