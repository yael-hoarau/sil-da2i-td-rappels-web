<?php
getBlock('View/header.php');
getBlock('View/person_infos.php', array('id' => $data['director']->getId()));
getBlock('View/filmography.php', $data['director']->getFilmography());
getBlock('View/footer.php');