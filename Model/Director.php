<?php
/**
 * Created by PhpStorm.
 * User: h14010671
 * Date: 14/11/2018
 * Time: 09:58
 */

class Director extends Person
{
    private $favoriteActors;

    public function __construct($id)
    {
        parent::__construct($id);
        //$this->favoriteActors = getFavoriteActors;
    }

    static function getAllDirectors(){

        $DB = $GLOBALS['DB'];
        $query = 'SELECT id, firstname, lastname FROM person
                JOIN movieHasPerson ON id = idPerson AND role = \'director\' ORDER BY lastname';
        $parameters = [];

        $DB->prepare($query);
        $DB->execute($parameters);
        return $DB->fetch();
    }

}