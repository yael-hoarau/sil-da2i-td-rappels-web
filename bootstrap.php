<?php
require('require.php');

$url = $_SERVER['REQUEST_URI'];

if(strpos($url, 'index.php') !== false)
    HomeController::display();
else if(strpos($url, 'movie.php') !== false)
    MovieController::display();
else if(strpos($url, 'actor.php') !== false)
    ActorController::display();
else if(strpos($url, 'director.php') !== false)
    DirectorController::display();