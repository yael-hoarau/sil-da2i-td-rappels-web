<?php
/**
 * Created by PhpStorm.
 * User: h14010671
 * Date: 11/12/2018
 * Time: 09:12
 */

class ActorController
{
    public static function display(){
        $actor = new Actor($_GET['id']);
        getBlock('View/actorView.php', array('actor' => $actor));
    }
}