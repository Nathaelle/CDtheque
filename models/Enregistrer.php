<?php

class Enregistrer {

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
}