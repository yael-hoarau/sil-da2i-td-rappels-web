<?php
/**
 * Created by PhpStorm.
 * User: h14010671
 * Date: 11/12/2018
 * Time: 08:53
 */

class HomeController
{
    public static function display(){
        $movies = Movie::getAllMovies();
        $directors = Director::getAllDirectors();
        $actors = Actor::getAllActors();
        getBlock('View/indexView.php', array('movies' => $movies, 'directors' => $directors, 'actors' => $actors));
    }
}