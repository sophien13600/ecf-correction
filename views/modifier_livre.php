<?php
include_once __DIR__ . "/../src/repositories/livre_repository.php";
session_start();
if (!isset($_SESSION['idAdmin'])) {
    header("location: ./connexion.php");
    die();
}
$id_admin = $_SESSION['idAdmin'];
$nom = $_SESSION['nom'];
$prenom = $_SESSION['prenom'];
$id = $_GET['id'];
$livre = find_by_id($id);
// Pour empêcher l'administrateur de modifier et consulter un livre qu'il n'a pas ajouté
if ($id_admin != $livre[4]) {
    header("location: ./gestion_livres.php");
    die();
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier livre</title>
    <link rel="stylesheet" href="../bootstrap.min.css">
    <script src="../bootstrap.min.js"></script>
</head>

<body>
    <h1>Modifier livre</h1>
    <h2 class="text-center text-primary my-5">Bonjour <?= "$prenom $nom" ?>, <a href="../src/controllers/admin_controller.php">Se déconnecter</a></h2>

    <form action="../src/controllers/livre_controller.php" method="POST">
        <input type="hidden" name=id class="form-control" value="<?= $id ?>">
        <div class="mb-3 row">
            <label for="titre" class="col-sm-2 col-form-label">Titre</label>
            <div class="col-sm-10">
                <input type="text" name=titre class="form-control" id="titre" value="<?= $livre[1] ?>">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="categorie" class="col-sm-2 col-form-label">Catégorie</label>
            <div class="col-sm-10">
                <input type="text" name=categorie class="form-control" id="categorie" value="<?= $livre[2] ?>">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="annee" class="col-sm-2 col-form-label">Année de publication</label>
            <div class="col-sm-10">
                <input type="text" name=annee class="form-control" id="annee" value="<?= $livre[3] ?>">
            </div>
        </div>
        <div class="mb-3 row">
            <button class="btn btn-primary">
                Enregistrer
            </button>
        </div>

    </form>
</body>

</html>