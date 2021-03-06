<?php

namespace App\Models;

use PDO;

class Movie extends Model{
    protected $table = 'movies';
    // These variables are there to provide prettier names in the final view code
    public $id = array();
    public $title = array();
    public $duration = array();
    public $story = array();
    public $year = array();
    public $img = array();
    public $sequel = array();
    public $slug = array();

    public function findBySlug(string $movieUrl): Movie{
        //prepare() permet simplement d'éviter les injections sql
        $stmt = $this->db->getConnection()->prepare("SELECT * FROM $this->table WHERE movie_url=?");
        //On indique ensuite au statement qu'il doit remplacer le "?" par la variable $id
        $stmt->execute([$movieUrl]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, get_class($this), [$this->db]);
        //Ensuite on enclenche et on renvoit toutes les données trouvées
        return $stmt->fetch();
    }

    public function findById(string $movieId): Movie{
        //prepare() permet simplement d'éviter les injections sql
        $stmt = $this->db->getConnection()->prepare("SELECT * FROM $this->table WHERE movie_id=?");
        //On indique ensuite au statement qu'il doit remplacer le "?" par la variable $id
        $stmt->execute([$movieId]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, get_class($this), [$this->db]);
        //Ensuite on enclenche et on renvoit toutes les données trouvées
        return $stmt->fetch();
    }

    public function findBySuite(int $suiteId): array{
        $stmt = $this->db->getConnection()->query("SELECT * FROM {$this->table} WHERE movie_suite={$suiteId} ORDER BY movie_date ASC");

        return $stmt->fetchAll();
    }
}