<?php
var_dump($toTemplate);
// $toTemplate["labels"] contient les données récupérées dans la BDD
// $toTemplate["disques"] contient les données récupérées dans la BDD
$datas = $toTemplate["labels"];
$disques = $toTemplate["disques"];

ch_entities($disques);
ch_entities($labels);

?>

<form action="index.php?route=ajoutdisque" method="POST">
    <select name="label">
        <?php foreach($datas as $data): ?>
            <option><?= $data['nom'] ?></option>
        <?php endforeach ?>
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

<ul>
    <?php foreach($disques as $disk): ?>
        <li><?= $disk['titre'] ?> (Label : <?= $disk['nom'] ?>) [<?= $disk['annee'] ?>]</li>

    <?php endforeach ?>
</ul>