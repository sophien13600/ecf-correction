<?php

include_once __DIR__ . "/../config/connection.php";

function find_all()
{
    $select = 'SELECT * FROM livres';
    $db = get_connection();
    $req = $db->query($select);
    return $req->fetchAll();
}

function find_some($n = 10)
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
function find_by_id($id)
{
    $select = "SELECT  l.id, titre, categorie, annee_publication FROM livres l WHERE  id = :id";
    $db = get_connection();
    $req = $db->prepare($select);
    $req->bindValue(":id", $id);
    $req->execute();
    return $req->fetch();
}
function update($id, $titre, $categorie, $annee)
{
    $select = "UPDATE livres SET titre = :titre, categorie= :categorie, annee_publication = :annee WHERE  id = :id";
    $db = get_connection();
    $req = $db->prepare($select);
    $req->bindValue(":id", $id);
    $req->bindValue(":titre", $titre);
    $req->bindValue(":categorie", $categorie);
    $req->bindValue(":annee", $annee);
    $req->execute();
}
function save($titre, $categorie, $annee,$id_auteur, $id_admin)
{
    $select = "INSERT INTO livres VALUES (NULL, :titre, :categorie, :annee, :idAuteur, :idAdmin)";
    $db = get_connection();
    $req = $db->prepare($select);
    $req->bindValue(":idAdmin", $id_admin);
    $req->bindValue(":idAuteur", $id_auteur);
    $req->bindValue(":titre", $titre);
    $req->bindValue(":categorie", $categorie);
    $req->bindValue(":annee", $annee);
    $req->execute();
}
