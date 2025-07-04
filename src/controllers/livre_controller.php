<?php
include __DIR__ . "/../repositories/livre_repository.php";

if ($_SERVER['REQUEST_METHOD'] == 'GET' and isset($_GET['id']) and $_GET['op'] == "supp") {
    $id = $_GET['id'];
    delete($id);
    header("location: ../../views/gestion_livres.php");
} elseif ($_SERVER['REQUEST_METHOD'] == 'GET' and isset($_GET['id']) and $_GET['op'] == "mod") {
    echo $_GET['id'] . $_GET['op'];
    die();
}
