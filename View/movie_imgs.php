<div class="slider">
    <figure class="images_films">
        <?php
        var_dump($data);
        foreach ($data as $img){
            echo '<img src="' . $img['path'] . '">';
        }
        echo '<img src="' . $data[0]['path'] . '">';
        echo '<figcaption>' . $data[0]['legend'] . '</figcaption>';

        ?>
    </figure>
</div>