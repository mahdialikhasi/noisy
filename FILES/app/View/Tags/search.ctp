<?php
$this->Html->addCrumb('دسته بندی ها', '/tags/', array('class' => 'breadcrumb'));
$this->Html->addCrumb($tagName, '/tags/search/'.$tagName, array('class' => 'breadcrumb'));
?>
<h1 class="hide"><?php echo $tagName ?></h1>
<div class="blog-content row">
    <?php
    foreach($datas as $data){
        $created = $this->Shamsi->date('l j F Y', strtotime($data['Blog']['created']), false, null);
        echo '<article class="blogcontent col s12">
            <div class="card hoverable">
                <div class="card-content black-text">
                    <h2 class="card-title flow-text"><a class="blog-link blue-grey-text text-darken-4" href="'.$this->webroot.'blogs/view/'.$data['Blog']['address'].'">'.$data['Blog']['title'].'</a></h2>
                    <h3 class="blog-description flow-text">'.$data['Blog']['description'].'</h3>
                </div>
                <div class="card-action">
                    <a class="blog-more-link" href="/blogs/view/'.$data['Blog']['address'].'">بیشتر بخوانید</a>
                    <h4 class="blog-date left">'.$created.'</h4>
                </div>
            </div>
        </article>';
    }
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
</div>

