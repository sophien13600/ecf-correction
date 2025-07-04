<?php

include_once __DIR__ . "/../repositories/admin_repository.php";

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $resultat = check_admin($email, $password);
    if ($resultat) {
        // utilisteur authéntifié
        $_SESSION['nom'] = $resultat[1];
        $_SESSION['prenom'] = $resultat[2];
        $_SESSION['email'] = $resultat[3];
        $_SESSION['idAdmin'] = $resultat[0];
        header("location: ../../views/gestion_livres.php");
        die();
    } else {
        // Identifiants incorrects
        header("location: ../../views/connexion.php");
        die();
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "GET") {
    session_unset();
    session_destroy();
        header("location: ../../views/connexion.php");
    die();
}
