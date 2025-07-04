<?php

include_once __DIR__ . "/../config/connection.php";

function find_all_auteurs()
{
    $select = 'SELECT * FROM auteurs';
    $db = get_connection();
    $req = $db->query($select);
    return $req->fetchAll();
}