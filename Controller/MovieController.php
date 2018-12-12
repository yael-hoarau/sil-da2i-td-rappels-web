<?php
/**
 * Created by PhpStorm.
 * User: h14010671
 * Date: 11/12/2018
 * Time: 08:57
 */

class MovieController
{
    public static function display(){
        $movie = new Movie($_GET['id']);
        getBlock('View/movieView.php', array('movie' => $movie));
    }
}