<?php
// Point d'entrée des données UTILISATEUR (GET, POST, COOKIES...)
// Ces données sont reçues AUTOMATIQUEMENT par PHP dans les structures $_GET, $_POST, $_COOKIE...

// On utilise pour différencier les traitements à effectuer un paramètre : le paramètre de routage
//var_dump($_GET);
//var_dump($_POST);



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
$label->setNom('Virgin');
//var_dump($label);
//var_dump($label->select());
$label->delete();

$artiste = new Models\Artiste();
//var_dump($artiste->selectAll());
//$artiste->setIdArtiste(4);
//$artiste->setNom("Bernard Minet");
//var_dump($artiste);
//var_dump($artiste->select());
//$artiste->delete();
//var_dump($artiste);

$disque = new Models\Disque();
//var_dump($disque->selectAll());
//$disque->setReference("D00011");
//$disque->setTitre("Symphonie");
//$disque->setAnnee("1901");
//$disque->setNom("Universal");
//var_dump($disque);
// var_dump($disque->select());
$disque->delete();

$enregistrement = new Models\Enregistrer();
//var_dump($enregistrement->selectAll());
//$enregistrement->setIdArtiste(1);
//$enregistrement->setReference("D00009");
//var_dump($enregistrement);
//var_dump($enregistrement->selectByRefDisque());
//$enregistrement->insert();


