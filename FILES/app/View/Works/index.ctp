<div class="works">
    <?php
    foreach($datas as $data){
        //print_r($data);
        $thumbname = explode('.', $data['Work']['photo']);
        $count = count($thumbname) - 1;
        $thumbname = 'thumb.'.$thumbname[$count];
        echo '<div class="myWork">
            <a href="/works/view/'.$data['Work']['address'].'" alt="'.$data['Work']['name'].'">
                <h2 class="workName">'.$data['Work']['name'].'</h2>
                <img src="/files/work/photo/'.$data['Work']['photo_dir'].'/'.$thumbname.'" alt="'.$data['Work']['name'].'">
            </a>
            <h2 class=""><a class="workSiteAddress" href="'.$data['Work']['site_address'].'">'.$data['Work']['site_address'].'</a></h2>
        </div>';
    }
    ?>
    <hr>
    <?php
    $params = $this->Paginator->params();
    if ($params['pageCount'] > 1) {
        ?>
        <ul class="pagination pagination-sm blog-pagination">
            <?php
            echo $this->Paginator->prev('نمونه کار های تازه تر &larr;', array('class' => 'prev','tag' => 'li','escape' => false), '<a onclick="return false;">نمونه کار های تازه تر &larr;</a>', array('class' => 'prev disabled','tag' => 'li','escape' => false));
            //echo $this->Paginator->numbers(array('separator' => '','tag' => 'li','currentClass' => 'active','currentTag' => 'a'));
            echo $this->Paginator->next('&rarr; نمونه کار های کهنه تر', array('class' => 'next','tag' => 'li','escape' => false), '<a onclick="return false;">&rarr; نمونه کار های کهنه تر</a>', array('class' => 'next disabled','tag' => 'li','escape' => false));
            ?>
        </ul>
    <?php } ?>
</div>

