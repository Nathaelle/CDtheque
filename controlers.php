<?php
// Pour rappel : deux types de controllers (fonctionalités) : 
// - Ceux qui font appel à un template (affichage - HTML)
// - Ceux qui redirigent vers un affichage

// FONCTIONS "CONTROLERS" = traitements appellés

function ajoutDisque() {
    // Contient tous les traitements nécessaires à l'ajout d'un disque 
    //echo "J'ajoute un disque";

    // Je dispose des données transmises par l'utilisateur dans $_POST

    // 1. J'insère mon label
    //a. Instanciation d'un objet Label (pour pouvoir utiliser ses fonctionnalités)
    //b. Appels aux setters pour renseigner les propriétés de notre modèle
    //c. Appel de la méthode insert() de l'objet pour déclencher l'insertion des données (propriétés) du modèle
    //var_dump($_POST);
    $label = new Models\Label();
    $label->setNom($_POST["label"]);
    if(!$label->select()) {
        $label->insert();
    }

    //var_dump($label);

    // 2. J'insère mon artiste
    $artiste = new Models\Artiste();
    $artiste->setNom($_POST["artiste"]);
    if(!$artiste->selectByNom()) {
        $artiste->insert();
    }

    //var_dump($artiste);

    // 3. J'insère mon disque
    $disque = new Models\Disque();
    $disque->setReference($_POST["reference"]);
    $disque->setTitre($_POST["titre"]);
    $disque->setAnnee($_POST["annee"]);
    $disque->setNom($label->getNom());
    $disque->insert();

    //var_dump($disque);

    // 4. J'insère la relation disque-artiste
    $enr = new Models\Enregistrer();
    $enr->setIdArtiste($artiste->getIdArtiste());
    $enr->setReference($disque->getReference());
    $enr->insert();

    // Résultat souhaité : l'enregistrement des données dans la base de données OK
    header("Location:index.php?route=showformdisk");
}

function showFormDisque() {

    $label = new Models\Label();
    $labels = $label->selectAll();

    $disque = new Models\Disque();
    $disques = $disque->selectAll();
    
    return [
        "template" => "formulaire.php",
        "labels" => $labels,
        "disques" => $disques
];

}