<div class="blog-content">
    <?php
    foreach($datas as $data){
        echo '<h2><a class="blog-link" href="/blogs/view/'.$data['Blog']['address'].'">'.$data['Blog']['title'].'</a></h2>';
        $created = $this->Shamsi->date('l j F Y', strtotime($data['Blog']['created']), false, null);
        echo '<h4 class="blog-date">'.$created.'</h4>';
        echo '<section class="blog-description">'.$data['Blog']['description'].'</section>';
        echo '<p><a class="blog-more-link" href="/blogs/view/'.$data['Blog']['address'].'">بیشتر بخوانید <i>←</i></a></p>';
        echo '<br />';
        echo '<br />';
    }
    ?>
    <hr>
    <?php
    $params = $this->Paginator->params();
    if ($params['pageCount'] > 1) {
        ?>
        <ul class="pagination pagination-sm blog-pagination">
            <?php
            echo $this->Paginator->prev('نوشته های تازه تر &larr;', array('class' => 'prev','tag' => 'li','escape' => false), '<a onclick="return false;">نوشته های تازه تر &larr;</a>', array('class' => 'prev disabled','tag' => 'li','escape' => false));
            //echo $this->Paginator->numbers(array('separator' => '','tag' => 'li','currentClass' => 'active','currentTag' => 'a'));
            echo $this->Paginator->next('&rarr; نوشته های کهنه تر', array('class' => 'next','tag' => 'li','escape' => false), '<a onclick="return false;">&rarr; نوشته های کهنه تر</a>', array('class' => 'next disabled','tag' => 'li','escape' => false));
            ?>
        </ul>
    <?php } ?>
</div>

