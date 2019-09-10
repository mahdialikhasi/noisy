<?php
    echo 'عنوان : '.$data['Contact']['title'].'<br />'.'نام و نام خانوادگی : '.$data['Contact']['fullname'].'<br />'.'آدرس ایمیل : '.$data['Contact']['email'].'<br />';
    echo $data['Contact']['body'];
?>