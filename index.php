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

} catch(Exception $e) {
    echo "Une exception est survenue, je peux faire quelque chose dans ce cas là...";
}





var_dump($label1);
echo "Le nom du label est :" . $label1->getNom();

$label1->setNom("Universal");

var_dump($label1);
echo "Le nom du label est :" . $label1->getNom();