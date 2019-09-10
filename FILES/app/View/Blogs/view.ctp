<?php
$this->Html->addCrumb('دست نوشته ها', '/blogs/', array('class' => 'breadcrumb'));
?>
<section class="blog-view-content">
    <?php        
        $data = $data[0];
        echo '<h1 class="hide">'.$data['Blog']['title'].'</h1>';
        $this->Html->addCrumb($data['Blog']['title'], '/blogs/view/'.$data['Blog']['address'], array('class' => 'breadcrumb'));
        echo '<article class="blog-view">';
            echo '<h2 class="flow-text"><a class="blog-link blue-grey-text text-darken-4" href="'.$this->webroot.'blogs/view/'.$data['Blog']['address'].'">'.$data['Blog']['title'].'</a></h2>';
            if($role_id == 1){
                echo '<p class="right edit"><a class="blog-link blue-grey-text text-darken-4" href="'.$this->webroot.'blogs/edit/'.$data['Blog']['address'].'"><i class="material-icons">mode_edit</i></a></p>';
            }
            $created = $this->Shamsi->date('l j F Y', strtotime($data['Blog']['created']), false, null);
            echo '<h4 class="blog-date">'.$created.'</h4>';
            echo '<h3 class="flow-text blog-body"'.$data['Blog']['body'].'</h3></article>';
        echo '<div class="blogFooter">';
            if(!empty($data['Tag'])){
            echo '<span class="tags">منتشر شده در: ';
            $i = 0;
            foreach($data['Tag'] as $tag){
                $i++;
                $tags[$i] = '<div class="chip"><a href="'.$this->webroot.'tags/search/'.$tag['name'].'" >'.$tag['name'].'</a></div>';
            }
            echo implode('', $tags);
            echo '</span>';
            }
        echo '</div>';
        echo '<hr>';
        echo '<section id="conversation" class="row">';
        echo '<ul id="post-list">';
            krsort($data['Comment']);
            foreach($data['Comment'] as $comment){
                //print_r($comment);
                if(empty($comment['commentid'])){
                    echo '<li id="comment-'.$comment['id'].'" class="comment">';                                    
		            $default = "mm";   		    
		            $grav_url = "http://www.gravatar.com/avatar/" . md5( strtolower( trim( $comment['email'] ) ) ) . "?d=" . urlencode( $default ) . "&s=50";
                    $commentCreated = $this->Shamsi->date('l j F Y', strtotime($comment['created']), false, null);
                    echo '<div class="col s12 m6 userinfo">
                            <div class="card-panel grey lighten-3 z-depth-1">
                                <div class="row valign-wrapper">
                                    <div class="col s2">'.$this->Html->image($grav_url, array('alt' => 'آواتار '.htmlspecialchars($comment['name']), 'class' => 'circle responsive-img')).'</div>
                                    <div class="col s10">
                                        <p class="black-text commentUserName">'.htmlspecialchars($comment['name']).'</p>
                                        <p class="black-text commentCreated">'.$commentCreated.'</p>
                                        <p class="black-text answer"><a class="notAjax" comment="'.$comment['id'].'" href="#panelComment">ارسال پاسخ</a></p>
                                    </div>
                                </div>
                            </div>
                    </div>';                   
                    echo '<div class="commentinnerBody">'.htmlspecialchars($comment['body']).'</div>';
                    echo '</li>';
                    foreach($data['Comment'] as $comment2){
                        if(!empty($comment2['commentid']) && ($comment2['commentid'] == $comment['id'])){
                            echo '<li id="comment-'.$comment2['id'].'" class="comment comment-answered">';
                            $default = "mm";
                            $grav_url = "http://www.gravatar.com/avatar/" . md5( strtolower( trim( $comment2['email'] ) ) ) . "?d=" . urlencode( $default ) . "&s=45";
                            $commentCreated = $this->Shamsi->date('l j F Y', strtotime($comment2['created']), false, null);
                            echo '<div class="col s12 m6 userinfo">
                                <div class="card-panel grey lighten-3 z-depth-1">
                                    <div class="row valign-wrapper">
                                        <div class="col s2">'.$this->Html->image($grav_url, array('alt' => 'آواتار '.htmlspecialchars($comment['name']), 'class' => 'circle responsive-img')).'</div>
                                        <div class="col s10">
                                            <p class="black-text commentUserName">'.htmlspecialchars($comment2['name']).'</p>
                                            <p class="black-text commentCreated">'.$commentCreated.'</p>
                                        </div>
                                    </div>
                                </div>
                            </div>';
                            echo '<div class="commentinnerBody">'.htmlspecialchars($comment2['body']).'</div>';
                            echo '</li>';
                        }
                    }
                }
            }
        echo '</ul>';
        echo '</section>';
        echo '<section class="row sendcomment">
            <div class="col s12">
                <div class="card">';
                    echo $this->Form->create('Comment', array('url' => array('controller' => 'blogs', 'action' => 'view', $data['Blog']['address'])));
                    echo '<div class="card-content blue-grey-text text-darken-4">
                        <span class="card-title">ارسال نظر</span>';                        
                        echo $this->Form->input('name', array('label' => 'نام و نام خانوادگی', 'div' => array('class' => "input-name input-field ".($this->Form->isFieldError('name') ? 'has-error' : '') ), 'error' => array('attributes' => array('wrap' => 'p', 'class' => 'help-block has-error'))));
                        echo $this->Form->input('email', array('label' => 'آدرس ایمیل', 'div' => array('class' => "input-mail input-field ".($this->Form->isFieldError('email') ? 'has-error' : '') ), 'error' => array('attributes' => array('wrap' => 'p', 'class' => 'help-block has-error'))));
                        echo $this->Form->input('commentid', array('div' => array('class' => "hide input-field ".($this->Form->isFieldError('commentid') ? 'has-error' : '') ), 'error' => array('attributes' => array('wrap' => 'p', 'class' => 'help-block has-error'))));
                        echo $this->Form->input('body', array('label' => 'نظرشما', 'class' => 'materialize-textarea', 'div' => array('class' => "input-body input-field ".($this->Form->isFieldError('body') ? 'has-error' : '') ), 'error' => array('attributes' => array('wrap' => 'p', 'class' => 'help-block has-error'))));
                        $customcaptcha['length'] = 5;
                        $customcaptcha['width'] = 200;
                        $customcaptcha['model'] = 'Comment';
                        $this->Captcha->render($customcaptcha);
                    echo '</div>
                    <div class="card-action">';
                        echo $this->Form->end(array('label' => 'ارسال نظر', 'div' => array('class' => "btn waves-effect submit submitdiv")));
                    echo '</div>
                </div>
            </div>
        </section>';
    ?>
</section>
<?php
	echo $this->Html->script('highlight.min');
    echo $this->Html->script('blog');
	echo $this->Html->css('monokai_sublime.min');
?>