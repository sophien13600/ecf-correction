<?php
include __DIR__ . "/../src/services/livre_service.php";

session_start();
$id = $_SESSION['idAdmin'];
$nom = $_SESSION['nom'];
$prenom = $_SESSION['prenom'];
$resultat = livres_admin($id);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de livres</title>
    <link rel="stylesheet" href="../bootstrap.min.css">
    <script src="../bootstrap.min.js"></script>
</head>

<body>
    <h1 class="text-center text-primary my-5">Gestion de livres</h1>
    <h2 class="text-center text-primary my-5">Bonjour <?= "$prenom $nom" ?></h2>


    <div class="text-center text-primary my-3 d-flex align-items-center flex-column">
        <?= $resultat ?>
    </div>
</body>

</html>