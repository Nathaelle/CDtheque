<?php

namespace Models;
use PDO;

class Label {
     
    /**
     * Primary key
     * @var string
     */
    private $nom;

    private $pdo;

    public function __construct() {
        $this->pdo = new PDO("mysql:host=localhost:3306;dbname=cdtheque;charset=utf8", "root", "");
    }

    public function getNom(): ?string {
        return $this->nom;
    }

    public function setNom(string $nom) {
        $this->nom = $nom;
    }

















}