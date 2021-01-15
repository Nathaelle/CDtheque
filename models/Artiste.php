<?php

namespace Models;
use PDO;

class Artiste extends DbConnect {

    /**
     * Primary key - auto_increment
     * @var int
     */
    private $idArtiste;

    /**
     * @var string
     */
    private $nom;

    public function getIdArtiste(): ?int {
        return $this->idArtiste;
    }

    public function getNom(): ?string {
        return $this->nom;
    }

    public function setIdArtiste(int $id) {
        $this->idArtiste = $id;
    }

    public function setNom(string $nom) {
        $this->nom = $nom;
    }

    public function selectAll() {

        $query = "SELECT id_artiste, nom FROM artistes;";
        $result = $this->pdo->prepare($query);
        $result->execute();

        $datas = $result->fetchAll();
        return $datas;
    }

    public function select() {

        // POUR L'EXEMPLE !! NON SECURISE !!!
        $query = "SELECT id_artiste, nom FROM artistes WHERE id_artiste = $this->idArtiste;";
        
        $result = $this->pdo->prepare($query);
        $result->execute();
        $datas = $result->fetch();
        return $datas;
    }

    public function insert() {

        // POUR L'EXEMPLE !! NON SECURISE !!!
        $query = "INSERT INTO artistes (nom) VALUES('$this->nom');";
        $result = $this->pdo->prepare($query);
        $result->execute();

        $this->idArtiste = $this->pdo->lastInsertId();
        return $this;
    }
}