<?php
/**
 * Created by PhpStorm.
 * User: h14010671
 * Date: 11/12/2018
 * Time: 09:47
 */

class DB
{
    private $pdo;
    private $stmt;
    private $query;
    public function connect($host, $dbname, $charset, $user, $password){
        try {
            $dsn = 'mysql:host='. $host .';dbname=' . $dbname . ';charset=' . $charset;
            $this->pdo = new PDO($dsn, $user , $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function prepare($query){
        $this->query = $query;
        $this->stmt = $this->pdo->prepare($query);
    }

    public function execute($parameters){
        try {
            $this->stmt->execute($parameters);
        } catch (PDOException $e) { ?>
            <strong>Caught <?= get_class($e) ?></strong>: <?= $e->getMessage() ?><br />
            Query <?= $this->query ?><br />
            Query parameters: <pre><?= var_export($parameters, true) ?></pre><br />
            Exception trace: <pre><?= $e->getTraceAsString() ?></pre>
            <?php die();
        }
    }

    public function fetch(){
        $data = array();
        if ($this->stmt->rowCount()) {
            // $stmt->setFetchMode(PDO::FETCH_OBJ);
            return $this->stmt->fetchAll();
        } else {
            echo 'Pas de résultats';
        }
        return $data;
    }
}