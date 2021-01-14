<?php

class Artiste {

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
}