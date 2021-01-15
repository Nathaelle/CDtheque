<?php

namespace Models;
use PDO;

class Enregistrer extends DbConnect {

    /**
     * Primary key
     * FK Référence un objet Artiste
     * @var int
     */
    private $idArtiste;

    /**
     * Primary key
     * FK Référence un objet Disque
     * @var string (6 caractères)
     */
    private $reference;

    public function getIdArtiste(): int {
        return $this->idArtiste;
    }

    public function getReference(): string {
        return $this->reference;
    }

    public function setIdArtiste(int $id) {
        $this->idArtiste = $id;
    }

    public function setReference(string $ref) {
        $this->reference = $ref;
    }

    public function selectAll() {

        $query = "SELECT id_artiste, reference FROM enregistrer;";
        $result = $this->pdo->prepare($query);
        $result->execute();

        $datas = $result->fetchAll();
        return $datas;
    }

    public function select() {

        // POUR L'EXEMPLE !! NON SECURISE !!!
        $query = "SELECT id_artiste, reference FROM enregistrer WHERE id_artiste = $this->idArtiste AND reference = '$this->reference';";
        
        $result = $this->pdo->prepare($query);
        $result->execute();
        $datas = $result->fetch();
        return $datas;
    }

    public function selectByArtiste() {

        $query = "SELECT id_artiste, reference FROM enregistrer WHERE id_artiste = $this->idArtiste;";
        $result = $this->pdo->prepare($query);
        $result->execute();
        $datas = $result->fetchAll();
        return $datas;
    }

    public function selectByRefDisque() {

        $query = "SELECT id_artiste, reference FROM enregistrer WHERE reference = '$this->reference';";
        $result = $this->pdo->prepare($query);
        $result->execute();
        $datas = $result->fetchAll();
        return $datas;
    }

    public function insert() {

        // POUR L'EXEMPLE !! NON SECURISE !!!
        $query = "INSERT INTO enregistrer (id_artiste, reference) VALUES($this->idArtiste, '$this->reference');";
        $result = $this->pdo->prepare($query);
        $result->execute();

    }
}