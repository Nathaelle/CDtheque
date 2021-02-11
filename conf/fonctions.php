<?php
// Fonctions "utilitaires"

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


function strip_xss(&$value) {

    if(is_array($value)) {
        array_walk($value, "strip_xss");
    } else if (is_string($value)) {
        $value = strip_tags($value);
    }
}

function ch_entities(&$value) {

    if(is_array($value)) {
        array_walk($value, "ch_entities");
    } else if (is_string($value)) {
        $value = htmlentities($value);
    }
}