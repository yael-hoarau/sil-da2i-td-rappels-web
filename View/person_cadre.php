<?php
if($data['role'] == 'director'){
    $director = new Director($data['id']);
}
else {
    $actor = new Actor($data['id']);
}
?>
<aside>
    <h1>Cadre <?php echo isset($director) ? 'du réalisateur' : 'd\'un acteur'?></h1>
    <figure class="photo-aside">
        <?php $picture = isset($director) ? $director->getPicture() : $actor->getPicture() ;  ?>
        <img src="<?= $picture['path'] ?>">
        <figcaption><?= $picture['legend'] ?></figcaption>
    </figure>
    <p><?php echo (isset($director) ? $director->getFirstname() :  $actor->getFirstname()) . ' '
        . (isset($director) ? $director->getLastname() : $actor->getLastname()); ?></p>
</aside>