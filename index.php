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


// try {
//     $label1 = new Models\Label();

//     // Données récupérées via ma méthode selectAll() dans ma table `labels`
//     $donnees = $label1->selectAll();

//     $label1 = new Models\Label();

// } catch(Exception $e) {
//     echo "Une exception est survenue, je peux faire quelque chose dans ce cas là...";
// }

$label = new Models\Label();
//var_dump($label->selectAll());
$label->setNom('ABCD');
//var_dump($label);
//var_dump($label->select());
$label->insert();

$artiste = new Models\Artiste();
//var_dump($artiste->selectAll());
//$artiste->setIdArtiste(4);
//$artiste->setNom("Bernard Minet");
// var_dump($artiste);
// var_dump($artiste->select());
//$artiste->insert();
//var_dump($artiste);

$disque = new Models\Disque();
//var_dump($disque->selectAll());
//$disque->setReference("D00011");
//$disque->setTitre("czcguiczc");
//$disque->setAnnee("2020");
//$disque->setNom("Universal");
//var_dump($disque);
// var_dump($disque->select());
//$disque->insert();

$enregistrement = new Models\Enregistrer();
//var_dump($enregistrement->selectAll());
//$enregistrement->setIdArtiste(1);
//$enregistrement->setReference("D00009");
//var_dump($enregistrement);
//var_dump($enregistrement->selectByRefDisque());
//$enregistrement->insert();


