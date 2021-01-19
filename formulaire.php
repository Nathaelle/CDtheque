<?php
var_dump($toTemplate);
// $toTemplate["datas"] contient les données récupérées dans la BDD

?>

<form action="index.php?route=ajoutdisque" method="POST">
    <select name="label">
        <option>Universal</option>
        <option>Virgin</option>
        <option>Sony</option>
    </select>
    <div>
        <input type="text" placeholder="Label du disque" name="label">
    </div>
    <div>
        <input type="text" placeholder="Titre de l'album" name="titre">
    </div>
    <div>
        <input type="text" placeholder="Année" name="annee">
    </div>
    <div>
        <input type="text" placeholder="Référence du disque" name="reference">
    </div>
    <div>
        <input type="text" placeholder="Artiste" name="artiste">
    </div>
    <div>
        <input type="submit" value="Ajouter un disque">
    </div>
</form>