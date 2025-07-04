<?php
include __DIR__ . "/../src/services/livre_service.php";

session_start();
if (!isset($_SESSION['idAdmin'])) {
    header("location: ./connexion.php");
    die();
}
$id = $_SESSION['idAdmin'];
$nom = $_SESSION['nom'];
$prenom = $_SESSION['prenom'];
$resultat = livres_admin($id);
$auteurs = auteurs_select();
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
    <h2 class="text-center text-primary my-5">Bonjour <?= "$prenom $nom" ?>, <a href="../src/controllers/admin_controller.php">Se déconnecter</a></h2>
    <h2 class="text-center text-primary my-5">Ajouter un nouveau livre</h2>
    <form action="../src/controllers/livre_controller.php" method="POST">
        <div class="mb-3 row">
            <label for="titre" class="col-sm-2 col-form-label">Titre</label>
            <div class="col-sm-10">
                <input type="text" name=titre class="form-control" id="titre">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="categorie" class="col-sm-2 col-form-label">Catégorie</label>
            <div class="col-sm-10">
                <input type="text" name=categorie class="form-control" id="categorie">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="annee" class="col-sm-2 col-form-label">Année de publication</label>
            <div class="col-sm-10">
                <input type="text" name=annee class="form-control" id="annee">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="auteur" class="col-sm-2 col-form-label">Auteur</label>
            <?= $auteurs ?>
        </div>
        <div class="mb-3 row">
            <button class="btn btn-primary">
                Ajouter
            </button>
        </div>

    </form>
    <h2 class="text-center text-primary my-5">Liste de vos livres</h2>
    <div class="text-center text-primary my-3 d-flex align-items-center flex-column">
        <?= $resultat ?>
    </div>
</body>

</html>