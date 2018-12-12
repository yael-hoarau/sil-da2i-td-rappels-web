<ol>
    Filmographie :
    <?php
    foreach ($data as $moviedata){
        $movie = new Movie($moviedata['idMovie']);
        echo '<li><a href="movie.php?id=' . $moviedata['idMovie']  . '"> ' . $movie->getTitle() . '</a></li>';
    }
    ?>
</ol>