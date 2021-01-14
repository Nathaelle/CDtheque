<?php

namespace Models;
use PDO;

class Disque extends DbConnect {

    /**
     * Primary key
     * @var string (code de 6 caractères)
     */
    private $reference;

    /**
     * @var string
     */
    private $titre;

    /**
     * @var string (4 caractères)
     */
    private $annee;
    
    /**
     * FK Référence le nom du Label
     * @var string
     */
    private $nom;

    public function getReference(): ?string {
        return $this->reference;
    }

    public function getTitre(): ?string {
        return $this->titre;
    }

    public function getAnnee(): ?string {
        return $this->annee;
    }

    public function getNom(): ?string {
        return $this->nom;
    }

    public function setReference(string $ref) {
        // On vérifie éventuellement la longueur de $ref
        $this->reference = $ref;
    }

    public function setTitre(string $titre) {
        $this->titre = $titre;
    }

    public function setAnnee(string $annee) {
        // On vérifie éventuellement la longueur de $annee
        $this->annee = $annee;
    }

    public function setNom(string $nom) {
        $this->nom = $nom;
    }

}