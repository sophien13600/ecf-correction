<?php


include_once __DIR__ . "/../config/connection.php";

function check_admin($email, $pwd)
{
    $select = "SELECT * FROM  administrateurs WHERE email = :email AND password = :password";
    $db = get_connection();
    $req = $db->prepare($select);
    $req->bindValue(":email", $email);
    $req->bindValue(":password", $pwd);
    $req->execute();
    return $req->fetch();
}
