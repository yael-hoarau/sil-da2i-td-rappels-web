<?php getBlock('View/header.php'); ?>
<main>
    <div class="flexbox-row-spacebetween">
        <div>
            <h1>Liste des films</h1>
            <ol>
                <?php
                foreach ($data['movies'] as $film){
                    echo '<li><a href="movie.php?id=' . $film['id'] .'">' . $film['title'] . '</a></li>';
                }
                ?>
            </ol>
        </div>
        <div>
            <h1>Liste des réalisateurs</h1>
            <ol>
                <?php
                foreach ($data['directors'] as $director){
                    echo '<li><a href="director.php?id=' . $director['id'] .'">' . $director['firstname'] . ' ' . $director['lastname'] . '</a></li>';
                }
                ?>
            </ol>
        </div>
        <div>
            <h1>Liste des acteurs</h1>
            <ol>
                <?php
                foreach ($data['actors'] as $actor){
                    echo '<li><a href="actor.php?id=' . $actor['id'] .'">' . $actor['firstname'] . ' ' . $actor['lastname'] . '</a></li>';
                }
                ?>
            </ol>
        </div>
    </div>
</main>
<?php getBlock('View/footer.php'); ?>