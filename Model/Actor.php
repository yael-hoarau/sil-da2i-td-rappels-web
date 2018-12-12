<?php
/**
 * Created by PhpStorm.
 * User: h14010671
 * Date: 14/11/2018
 * Time: 11:42
 */

class Actor extends Person
{
    public function __construct($id)
    {
        parent::__construct($id);
    }

    static function getAllActors(){
        $DB = $GLOBALS['DB'];
        $query = 'SELECT id, firstname, lastname FROM person
                JOIN movieHasPerson ON id = idPerson AND role = \'actor\' ORDER BY lastname';
        $parameters = [];

        $DB->prepare($query);
        $DB->execute($parameters);
        return $DB->fetch();
    }
}