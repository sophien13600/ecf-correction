<?php

include __DIR__ .  "/db.php";

$username = $mysql['username'];
$pwd = $mysql['password'];
$dbname = $mysql['dbname'];
$port = $mysql['port'];
$host = $mysql['host'];

function get_connection()
{
    global $host, $dbname, $port, $username, $pwd;

    try {
        $dsn = "mysql:host=$host;dbname=$dbname;port=$port;charset=utf8";
        $pdo = new PDO($dsn, $username, $pwd);
        //pour plus de precision on recommande pdo::attr pour avoir des messages d'erreur plus specifiques
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        echo 'Erreur : ' . $e->getMessage();
        return null;
    }
}
