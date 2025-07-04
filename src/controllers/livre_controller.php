<?php
include __DIR__ . "/../repositories/livre_repository.php";

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'GET' and isset($_GET['id']) and $_GET['op'] == "supp") {
    $id = $_GET['id'];
    delete($id);
    header("location: ../../views/gestion_livres.php");
    die();
} elseif ($_SERVER['REQUEST_METHOD'] == 'GET' and isset($_GET['id']) and $_GET['op'] == "mod") {
    $id = $_GET['id'];
    header("location: ../../views/modifier_livre.php?id=$id");
    die();
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST' and str_contains($_SERVER["HTTP_REFERER"], "modifier_livre")) {
    // Modifier un livre existant
    update($_POST['id'], $_POST['titre'], $_POST['categorie'], $_POST['annee']);
    header("location: ../../views/gestion_livres.php");
    die();
}
 elseif ($_SERVER['REQUEST_METHOD'] == 'POST' and str_contains($_SERVER["HTTP_REFERER"], "gestion_livre")) {
    // ajouter un nouveau livre
    $id_admin =  $_SESSION["idAdmin"];
    save($_POST['titre'], $_POST['categorie'], $_POST['annee'], $_POST['auteur'], $id_admin);
    header("location: ../../views/gestion_livres.php");
    die();
}
