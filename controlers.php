<?php
// Chargement automatique des classes :
spl_autoload_register(function (string $class) {

    // echo $class; // ex : "Models\Label"

    $class = str_replace("\\", "/", $class);
    // echo $class; // ex : "Models/Label"

    $class = lcfirst($class);
    // echo $class; // ex : "models/Label"

    if(file_exists("$class.php")) {
        require_once "$class.php";
        // ex : models/Label.php
        return true;
    }

    throw new Exception("Une erreur est survenue lors du chargement !!!!!!!!!!!!!");

});

// FONCTIONS "CONTROLERS" = traitements appellés

function ajoutDisque() {
    // Contient tous les traitements nécessaires à l'ajout d'un disque 
    //echo "J'ajoute un disque";

    // Je dispose des données transmises par l'utilisateur dans $_POST

    // 1. J'insère mon label
    //a. Instanciation d'un objet Label (pour pouvoir utiliser ses fonctionnalités)
    //b. Appels aux setters pour renseigner les propriétés de notre modèle
    //c. Appel de la méthode insert() de l'objet pour déclencher l'insertion des données (propriétés) du modèle
    $label = new Models\Label();
    $label->setNom($_POST["label"]);
    $label->insert();

    // 2. J'insère mon artiste
    $artiste = new Models\Artiste();
    $artiste->setNom($_POST["artiste"]);
    $artiste->insert();

    // 3. J'insère mon disque
    $disque = new Models\Disque();
    $disque->setReference($_POST["reference"]);
    $disque->setTitre($_POST["titre"]);
    $disque->setAnnee($_POST["annee"]);
    $disque->setNom($label->getNom());
    $disque->insert();

    // 4. J'insère la relation disque-artiste
    $enr = new Models\Enregistrer();
    $enr->setIdArtiste($artiste->getIdArtiste());
    $enr->setReference($disque->getReference());
    $enr->insert();

    // Résultat souhaité : l'enregistrement des données dans la base de données OK

}