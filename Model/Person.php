<?php
/**
 * Created by PhpStorm.
 * User: h14010671
 * Date: 14/11/2018
 * Time: 09:33
 */

class Person
{
    private $id;
    private $firstname;
    private $lastname;
    private $birthDate;
    private $biography;
    private $picture;
    private $filmography;

    /**
     * Person constructor.
     * @param $id
     */
    public function __construct($id)
    {
        $this->id = $id;

        $data = $this->getPersonInfos($id);

        $this->firstname = $data['firstname'];
        $this->lastname = $data['lastname'];
        $this->birthDate = $data['birthDate'];
        $this->biography = $data['biography'];
        $this->picture = $this->getPersonPicture($id);
        $this->filmography = $this->getPersonFilmography($id);
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @return mixed
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @return mixed
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * @return mixed
     */
    public function getBiography()
    {
        return $this->biography;
    }

    /**
     * @return array|null
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * @return array
     */
    public function getFilmography()
    {
        return $this->filmography;
    }

    private function getPersonInfos($id){
        $DB = $GLOBALS['DB'];
        $query = 'SELECT id, lastname, firstname, birthDate, biography FROM person WHERE id = :id';
        $parameters = [':id' => $id];

        $DB->prepare($query);
        $DB->execute($parameters);

        return $DB->fetch()[0];
    }

    private function getPersonPicture($id){
        $DB = $GLOBALS['DB'];
        $query = 'SELECT path, legend FROM picture JOIN personHasPicture ON picture.id = personHasPicture.idPicture 
              WHERE personHasPicture.idPerson = :id';
        $parameters = [':id' => $id];

        $DB->prepare($query);
        $DB->execute($parameters);
        return $DB->fetch()[0];
    }

    private function getPersonFilmography($id){
        $DB = $GLOBALS['DB'];
        $query = 'SELECT idMovie FROM  movieHasPerson WHERE movieHasPerson.idPerson = :id ';
        $parameters = [':id' => $id];

        $DB->prepare($query);
        $DB->execute($parameters);
        return $DB->fetch();
    }
}