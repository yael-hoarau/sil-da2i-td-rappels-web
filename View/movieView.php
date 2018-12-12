<?php getBlock('View/header.php'); $movie = $data['movie']; ?>
<div class="flexbox-row-spacebetween">
    <header>
        <?php getBlock('View/menu.php', array('director' => $movie->getDirector(), 'actors' => $movie->getActors()))?>
    </header>
    <main>
        <div class="flexbox-row">
            <section>
                <?php getBlock('View/movie_infos.php', array('id' => $movie->getId()))?>

                <?php getBlock('View/movie_imgs.php', $movie->getImages())?>
            </section>
            <div class="flexbox-column-start">
                <?php
                getBlock('View/person_cadre.php', $movie->getDirector());
                foreach ( $movie->getActors() as $actor ){
                    getBlock('View/person_cadre.php', $actor);
                }
                ?>
            </div>
        </div>
    </main>
</div>
<?php getBlock('View/footer.php'); ?>