<?php

include_once __DIR__ . "/../config/connection.php";

function find_all()
{
    $select = 'SELECT * FROM livres';
    $db = get_connection();
    $req = $db->query($select);
    return $req->fetchAll();
}

function find_some($n=10)
{
    $select = "SELECT  l.id, titre, categorie, annee_publication, nom_complet FROM livres l, auteurs a WHERE a.id = l.id_auteur ORDER BY annee_publication LIMIT $n";
    $db = get_connection();
    $req = $db->query($select);
    $req->execute();
    return $req->fetchAll();
}

function find_by_keyword($keyword)
{
    $select = "SELECT  l.id, titre, categorie, annee_publication, nom_complet 
    FROM livres l, auteurs a WHERE a.id = l.id_auteur AND (titre LIKE :keyword OR nom_complet LIKE :keyword)";
    $db = get_connection();
    $req = $db->prepare($select);
    $req->bindValue(":keyword", "%$keyword%");
    $req->execute();
    return $req->fetchAll();
}
function find_by_id_admin($id)
{
    $select = "SELECT  l.id, titre, categorie, annee_publication, nom_complet 
    FROM livres l, auteurs a, administrateurs ad WHERE a.id = l.id_auteur AND ad.id = l.id_admin AND id_admin = :id";
    $db = get_connection();
    $req = $db->prepare($select);
    $req->bindValue(":id", $id);
    $req->execute();
    return $req->fetchAll();
}
function delete($id)
{
    $select = "DELETE FROM livres WHERE id = :id";
    $db = get_connection();
    $req = $db->prepare($select);
    $req->bindValue(":id", $id);
    return $req->execute();
}
