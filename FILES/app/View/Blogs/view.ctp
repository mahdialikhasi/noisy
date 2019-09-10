<section class="blog-content">
    <?php
        //print_r($data);
        $data = $data[0];
        echo '<h2><a class="blog-link" href="/blogs/view/'.$data['Blog']['address'].'">'.$data['Blog']['title'].'</a></h2>';
        $created = $this->Shamsi->date('l j F Y', strtotime($data['Blog']['created']), false, null);
        echo '<h4 class="blog-date">'.$created.'</h4>';
        echo '<article class="blog-body">'.$data['Blog']['body'].'</article>';
        echo '<div class="blogFooter">';
            echo '<hr class="hrTag">';
            if(!empty($data['Tag'])){
            echo '<span class="tags">منتشر شده در: ';
            $i = 0;
            foreach($data['Tag'] as $tag){
                $i++;
                $tags[$i] = '<a href="/tags/search/'.$tag['name'].'" >'.$tag['name'].'</a>';
            }
            echo implode('، ', $tags);
            echo '</span>';
            }
        echo '</div>';
        echo '<hr>';
        echo '<section id="conversation">';
        echo '<ul id="post-list">';
            krsort($data['Comment']);
            foreach($data['Comment'] as $comment){
                //print_r($comment);
                if(empty($comment['commentid'])){
                    echo '<li id="comment-'.$comment['id'].'" class="comment">';                                    
		    $default = "mm";   		    
		    $grav_url = "http://www.gravatar.com/avatar/" . md5( strtolower( trim( $comment['email'] ) ) ) . "?d=" . urlencode( $default ) . "&s=50";
                    echo '<div class="avatar">'.$this->Html->image($grav_url, array('alt' => 'آواتار')).'</div>';
                    echo '<div class="commentBody">';
                    $commentCreated = $this->Shamsi->date('l j F Y', strtotime($comment['created']), false, null);
                    echo '<div class="commentUserName"><span class="name">'.htmlspecialchars($comment['name']).' </span><span class="commentDate">'.$commentCreated.'</span><span class="answer"><a data-toggle="collapse" class="notAjax" comment="'.$comment['id'].'" data-parent="#accordion" href="#panelComment">ارسال پاسخ</a></span></div>';
                    echo '<div class="commentinnerBody">'.htmlspecialchars($comment['body']).'</div>';
                    echo '</div>';
                    echo '</li>';
                    foreach($data['Comment'] as $comment2){
                        if(!empty($comment2['commentid']) && ($comment2['commentid'] == $comment['id'])){
                            echo '<li id="comment-'.$comment2['id'].'" class="comment comment-answered">';
                            $default = "mm";   		    
		    	    $grav_url = "http://www.gravatar.com/avatar/" . md5( strtolower( trim( $comment2['email'] ) ) ) . "?d=" . urlencode( $default ) . "&s=45";
		    	    echo '<div class="avatar">'.$this->Html->image($grav_url, array('alt' => 'آواتار')).'</div>';
                            echo '<div class="commentBody">';
                            $commentCreated = $this->Shamsi->date('l j F Y', strtotime($comment2['created']), false, null);
                            echo '<div class="commentUserName"><span class="name">'.htmlspecialchars($comment2['name']).' </span><span class="commentDate">'.$commentCreated.'</span></div>';
                            echo '<div class="commentinnerBody">'.htmlspecialchars($comment2['body']).'</div>';
                            echo '</div>';

                            echo '</li>';
                        }
                    }
                }
            }
        echo '</ul>';
        echo '</section>';
        echo '<div class="panel panel-default">';
            echo '<div class="panel-heading"><a data-toggle="collapse" class="notAjax" data-parent="#accordion" href="#panelComment">ارسال نظر</a></div>';
                echo $this->Form->create('Comment', array('url' => array('controller' => 'blogs', 'action' => 'view', $data['Blog']['address'])));
            echo '<div id="panelComment" class="panel-collapse collapse"><div class="panel-body">';
                echo $this->Form->input('name', array('label' => 'نام و نام خانوادگی', 'placeholder' => 'نام و نام خانوادگی', 'class' => 'form-control', 'div' => array('class' => "form-group ".($this->Form->isFieldError('name') ? 'has-error' : '') ), 'error' => array('attributes' => array('wrap' => 'p', 'class' => 'help-block has-error'))));
                echo $this->Form->input('email', array('label' => 'آدرس ایمیل', 'placeholder' => 'آدرس ایمیل', 'class' => 'form-control', 'div' => array('class' => "form-group ".($this->Form->isFieldError('email') ? 'has-error' : '') ), 'error' => array('attributes' => array('wrap' => 'p', 'class' => 'help-block has-error'))));
                echo $this->Form->input('commentid', array('class' => 'form-control', 'div' => array('class' => "hide form-group ".($this->Form->isFieldError('commentid') ? 'has-error' : '') ), 'error' => array('attributes' => array('wrap' => 'p', 'class' => 'help-block has-error'))));
                echo $this->Form->input('body', array('label' => 'نظرشما', 'placeholder' => 'نظر شما', 'class' => 'form-control', 'div' => array('class' => "form-group ".($this->Form->isFieldError('body') ? 'has-error' : '') ), 'error' => array('attributes' => array('wrap' => 'p', 'class' => 'help-block has-error'))));
                $customcaptcha['length'] = 5;
		$customcaptcha['width'] = 200;
		$customcaptcha['model'] = 'Comment';
		$this->Captcha->render($customcaptcha);
            echo '</div>';
            echo '<div class="panel-footer">';
                echo $this->Form->end(array('label' => 'ارسال نظر', 'class' => 'btn btn-primary'));
            echo '</div></div>';
        echo '</div>';
    ?>
</section>
<?php
	echo $this->Html->script('highlight.min');
	echo $this->Html->css('monokai_sublime.min');
?>
<script type="text/javascript">
    $('.answer a').click(function(){
        $('#CommentCommentid').val($(this).attr('comment'));
    });
</script>
<script>
jQuery('.creload').on('click', function() {
    var mySrc = $(this).prev().attr('src');
    var glue = '?';
    if(mySrc.indexOf('?')!=-1)  {
        glue = '&';
    }
    $(this).prev().attr('src', mySrc + glue + new Date().getTime());
    return false;
});
$('#CommentSecurityCode').addClass('form-control');
$(document).ready(function() {
  $('pre').each(function(i, block) {
    hljs.highlightBlock(block);
  });
});
</script>