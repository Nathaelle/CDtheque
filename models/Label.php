<?php

namespace Models;
use PDO;

class Label extends DbConnect {
     
    /**
     * Primary key
     * @var string
     */
    private $nom;

    public function getNom(): ?string {
        return $this->nom;
    }

    public function setNom(string $nom) {
        $this->nom = $nom;
    }

    public function selectAll() {

        // Variable contenant la requête SQL sous la forme d'une chaîne de caractères
        $query = "SELECT nom FROM labels;";

        // Je récupère un objet de type PDOStatement => requête préparée
        $result = $this->pdo->prepare($query);

        // Exécution de la requête préparée - $result recupère le jeu de résultat
        $result->execute();

        $datas = $result->fetchAll();

        return $datas;

    }

















}