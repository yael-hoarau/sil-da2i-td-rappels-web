<?php
/**
 * Created by PhpStorm.
 * User: h14010671
 * Date: 11/12/2018
 * Time: 09:16
 */

class DirectorController
{
    public static function display(){
        $director = new Director($_GET['id']);
        getBlock('View/directorView.php', array('director' => $director));
    }
}