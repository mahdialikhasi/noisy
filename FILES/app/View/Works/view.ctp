<div class="work-content">
    <?php
        //print_r($data);
        $data = $data[0];
        echo '<h2><a class="work-link" href="/works/view/'.$data['Work']['address'].'">'.$data['Work']['name'].'</a></h2>';
        echo '<section class="work-body">'.$data['Work']['body'].'</section>';
        echo '<hr>';
    ?>
</div>
