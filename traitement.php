<?php

require 'database.php';

$titre = $_POST["titre"];
$artiste = $_POST['artiste'];
$image = $_POST['image'];
$description = $_POST['description'];

$bdd = connection();

if (empty($titre)) {
    echo "Le titre n'est pas rempli.";
    header("refresh:3;url=ajouter.php");
    exit();
} elseif (empty($artiste)) {
    echo "L'artiste n'est pas rempli.";
    header("refresh:3;url=ajouter.php");
    exit();
} elseif (empty($description) || strlen($description) < 3) {
    echo "La description n'est pas correcte.";
    header("refresh:3;url=ajouter.php");
    exit();
} elseif (empty($image) || !filter_var($image, FILTER_VALIDATE_URL)) {
    echo "Le lien vers l'image n'est pas correct.";
    header("refresh:3;url=ajouter.php");
    exit();
} else {
    $oeuvres = $bdd->query("INSERT INTO oeuvres (id, titre, auteur, url, description) VALUES ('', '$titre', '$artiste', '$image', '$description')");
    header("Location: index.php");
    exit(); 
}