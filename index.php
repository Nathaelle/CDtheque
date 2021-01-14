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


try {
    $label1 = new Models\Label();

    // Données récupérées via ma méthode selectAll() dans ma table `labels`
    $donnees = $label1->selectAll();

    var_dump($donnees);

} catch(Exception $e) {
    echo "Une exception est survenue, je peux faire quelque chose dans ce cas là...";
}

