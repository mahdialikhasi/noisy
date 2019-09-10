<?php
foreach($datas as $data){
    echo '<h2><a class="tag-link" href="/tags/search/'.$data['Tag']['name'].'/">'.$data['Tag']['name'].'</a></h2>';
    echo '<br />';
}
?>