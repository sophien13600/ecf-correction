<?php

include_once __DIR__ .  "/../repositories/livre_repository.php";
 // affiche les 10 premiers livres
function cartes_all_livres($n = 10)
{
    $livres = find_some($n);
    return custom_cards($livres);
}

// livres recherchés selon le mot-clé saisi
function cartes_some_livres($keyword)
{
    $livres = find_by_keyword($keyword);
    return custom_cards($livres);
}
// livres selon l'id de l'admin avec deux liens pour la suppression et la modification
function livres_admin($id)
{
    $livres = find_by_id_admin($id);
    return admin_cards($livres);
}

function custom_cards($livres)
{
    $result = "";
    foreach ($livres as $livre) {
        $result .= "<div class='card  my-3' style='width: 18rem;'>
            <div class='card-body'>
                <h5 class='card-title'>$livre[1]</h5>
                <h6 class='card-subtitle mb-2 text-muted'>$livre[4]</h6>
                <h6 class='card-subtitle mb-2 text-muted'>$livre[3]</h6>
                <a href='#' class='card-link'>Résumé</a>
                <a href='#' class='card-link'>$livre[2]</a>
            </div>
        </div>";
    }
    return $result;
}
function admin_cards($livres)
{
    $result = "";
    foreach ($livres as $livre) {
        $supp = "../src/controllers/livre_controller.php?id=$livre[0]&op=supp";
        $mod = "../src/controllers/livre_controller.php?id=$livre[0]&op=mod";
        $result .= "<div class='card  my-3' style='width: 18rem;'>
            <div class='card-body'>
                <h5 class='card-title'>$livre[1]</h5>
                <h6 class='card-subtitle mb-2 text-muted'>$livre[4]</h6>
                <h6 class='card-subtitle mb-2 text-muted'>$livre[3]</h6>
                <a href='$supp' class='card-link'>Supprimer</a>
                <a href='$mod' class='card-link'>Modifier</a>
            </div>
        </div>";
    }
    return $result;
}

