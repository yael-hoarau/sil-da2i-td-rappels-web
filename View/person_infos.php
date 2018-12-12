<?php
$person = new Person($data['id']);
?>
<h1><?= $person->getLastname(); ?></h1>
<h2><?= $person->getFirstname(); ?></h2>
<time><?= $person->getBirthDate(); ?></time>
<figure>
    <img src="<?= $person->getPicture()['path']; ?>">
    <figcaption><?= $person->getPicture()['legend']; ?></figcaption>
</figure>

<p><?= $data['biography']; ?></p>

<?php
if(in_array(array('id' => $data['id'], 'firstname' => $data['firstname'], 'lastname' => $data['lastname']), Director::getAllDirectors())) {
    ?>

    <div>
        <h2>Acteurs fétiches</h2>
        <p> <?php echo Actor::getAllActors()[0]['firstname'] . ' ' .  Actor::getAllActors()[0]['lastname'] . '<br>';
            echo Actor::getAllActors()[1]['firstname'] . ' ' . Actor::getAllActors()[1]['lastname']; ?> </p>
    </div>

    <?php
}
?>