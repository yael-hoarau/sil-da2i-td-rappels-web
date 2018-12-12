<?php
/**
 * Created by PhpStorm.
 * User: h14010671
 * Date: 14/11/2018
 * Time: 11:44
 */

class Movie
{
    private $id;
    private $title;
    private $releaseDate;
    private $synopsis;
    private $rating;
    private $poster;
    private $images;
    private $director;
    private $actors;

    /**
     * Movie constructor.
     * @param $id
     */
    public function __construct($id)
    {
        $this->id = $id;

        $data = $this->getMovieInfos($id);

        $this->title = $data['title'];
        $this->releaseDate = $data['releaseDate'];
        $this->synopsis = $data['synopsis'];
        $this->rating = $data['rating'];
        $this->poster = $this->getMoviePoster($id);
        $this->images = $this->getMovieImgs($id);
        $this->director = $this->getMovieDirector($id);
        $this->actors = $this->getMovieActors($id);
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
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getReleaseDate()
    {
        return $this->releaseDate;
    }

    /**
     * @return mixed
     */
    public function getSynopsis()
    {
        return $this->synopsis;
    }

    /**
     * @return mixed
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * @return array|null
     */
    public function getPoster()
    {
        return $this->poster;
    }

    /**
     * @return array
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * @return array|null
     */
    public function getDirector()
    {
        return $this->director;
    }

    /**
     * @return array
     */
    public function getActors()
    {
        return $this->actors;
    }

    private function getMovieInfos($id){
        $DB = $GLOBALS['DB'];
        $query = 'SELECT title, releaseDate, synopsis, rating FROM movie WHERE id = :id';
        $parameters = [':id' => $id];

        $DB->prepare($query);
        $DB->execute($parameters);

        return $DB->fetch()[0];
    }

    private function getMoviePoster($id){
        $DB = $GLOBALS['DB'];
        $query = 'SELECT path, legend FROM picture JOIN movieHasPicture ON picture.id = movieHasPicture.idPicture 
              WHERE movieHasPicture.idMovie = :id AND type = \'poster\'';
        $parameters = [':id' => $id];

        $DB->prepare($query);
        $DB->execute($parameters);

        return $DB->fetch()[0];
    }

    private function getMovieDirector($id){
        $DB = $GLOBALS['DB'];
        $query = 'SELECT id, lastname, firstname, birthDate, biography, role FROM person JOIN movieHasPerson ON person.id = movieHasPerson.idPerson 
              WHERE movieHasPerson.idMovie = :id AND role = \'director\' ';
        $parameters = [':id' => $id];

        $DB->prepare($query);
        $DB->execute($parameters);

        return $DB->fetch()[0];
    }

    private function getMovieActors($id){
        $DB = $GLOBALS['DB'];
        $query = 'SELECT id, lastname, firstname, birthDate, biography, role FROM person JOIN movieHasPerson ON person.id = movieHasPerson.idPerson 
              WHERE movieHasPerson.idMovie = :id AND role = \'actor\' ';
        $parameters = [':id' => $id];

        $DB->prepare($query);
        $DB->execute($parameters);

        return $DB->fetch();
    }

    private function getMovieImgs($id){
        $DB = $GLOBALS['DB'];
        $query = 'SELECT path, legend FROM picture JOIN movieHasPicture ON picture.id = movieHasPicture.idPicture 
              WHERE movieHasPicture.idMovie = :id AND type = \'gallery\' ';
        $parameters = [':id' => $id];

        $DB->prepare($query);
        $DB->execute($parameters);

        return $DB->fetch();
    }

    static function getAllMovies(){
        $DB = $GLOBALS['DB'];
        $query = 'SELECT id, title FROM  movie ORDER BY title';
        $parameters = [];

        $DB->prepare($query);
        $DB->execute($parameters);
        return $DB->fetch();
    }
}