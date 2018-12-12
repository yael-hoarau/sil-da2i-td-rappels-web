<?php
$movie = new Movie($data['id']);
?>
<article>
    <div class="flexbox-row">
        <figure class="affiche_film">
            <img src="<?= $movie->getPoster()['path']; ?>">
            <figcaption><?= $movie->getPoster()['legend']; ?></figcaption>
        </figure>
        <div class="flexbox-column">
            <h1><?= $movie->getTitle(); ?></h1>
            <p>Réalisateur : <?= $movie->getDirector()['firstname'] . ' ' . $movie->getDirector()['lastname']; ?></p>
            <time><?= $movie->getReleaseDate(); ?></time>

            <p>Note :
                <meter min="0" max="5" value=<?= $movie->getRating(); ?>>NOTE</meter> <?= $movie->getRating(); ?>/5
            </p>

            <ol>
                Nom des acteurs principaux :
                <?php
                foreach ($movie->getActors() as $actor){
                    echo '<li>' . $actor['firstname'] . ' ' . $actor['lastname'] . '</li>';
                }
                ?>
            </ol>
        </div>
    </div>

    <p>
        <?= $movie->getSynopsis(); ?>
    </p>
</article>