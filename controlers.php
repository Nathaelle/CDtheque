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
    if(preg_match("#^.{1,50}$#", trim($_POST["label"]))) {
        $label->setNom($_POST["label"]);
        if(!$label->select()) {
            $label->insert();
        }
    } else {
        echo "Format label incorrect";
    }
    

    //var_dump($label);

    // 2. J'insère mon artiste
    $artiste = new Models\Artiste();
    if(preg_match("#^[\w-àâäéèêëïîôöùûüçñÀÂÄÉÈËÏÔÖÙÛÜŸÇÑæœÆŒ'( )]{1,50}$#", trim($_POST["artiste"]))) {
        $artiste->setNom($_POST["artiste"]);
        if(!$artiste->selectByNom()) {
            $artiste->insert();
        }
    } else {
        echo "Format artiste incorrect";
    }

    //var_dump($artiste);

    // Format pour la référence : 
    // 2 lettres majuscules, suivie de 2 chiffres, suivi de deux chiffres ou lettres minuscules
    // 3. J'insère mon disque
    $disque = new Models\Disque();
    if(preg_match("#^[A-Z]{2}[0-9]{2}[a-z0-9]{2}$#", trim($_POST["reference"])) && preg_match("#^.{1,50}$#", trim($_POST["titre"])) && preg_match("#^[1-2]{1}[0-9]{3}$#", trim($_POST["annee"]))) {
        $disque->setReference($_POST["reference"]);
        $disque->setTitre($_POST["titre"]);
        $disque->setAnnee($_POST["annee"]);
        $disque->setNom($label->getNom());
        $disque->insert();
    } else {
        echo "Format disque incorrect";
    }

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