<?php
// par conventions on met le nom des tables au pluriel
//donner une contrainte  a la clef etrangere  pour pouvoir intervenir dessus le cas echeant car sinon sql donne un nom et il faudra rechercher le nom dans les tables systeme
//nommer une cle etrangere par quoi elle fait reference dans sa table d'oringine exemple (id_auteur)

include_once   "./src/services/livre_service.php";
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $resultat = cartes_all_livres(4);
} else {
    // POST = recherche
    $keyword = $_POST["keyword"];
    $resultat = cartes_some_livres($keyword);
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projet L2i</title>
    <link rel="stylesheet" href="./bootstrap.min.css">
    <script src="./bootstrap.min.js"></script>
</head>

<body>
    <nav class="navbar bg-body-tertiary d-flex">
        <div class="container-fluid">
        <span class="navbar-brand mb-0 h1">Navbar</span>
        </div>
        <div class="container-fluid">
            <button type="button" class="btn btn-primary">Primary</button>
        </div>
    </nav>
    <h1 class="text-center text-primary my-5">Projet L2i</h1>
        <form  class="d-flex p-5" role="search" method="POST">    
            <div class="input-group mb-3 col-4">
                <input type="text" name ="keyword" class="form-control" placeholder="Recherche par titre, categorie, auteur">
                <button  class="btn btn-primary" type="submit" >Rechercher</button>
            </div>
        </form>     
    <div class="text-center text-primary my-3 d-flex align-items-center flex-column">
            <?= $resultat ?>
    </div>

</body>

</html>