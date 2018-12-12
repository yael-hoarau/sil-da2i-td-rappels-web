<?php
getBlock('View/header.php');
getBlock('View/person_infos.php', array('id' => $data['actor']->getId()));
getBlock('View/filmography.php', $data['actor']->getFilmography());
getBlock('View/footer.php');