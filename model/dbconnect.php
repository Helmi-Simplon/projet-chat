<?php

$user = "root";
$pass = "";
$dbname = "chat";
$host = "localhost";

try {
    $dsn = "mysql:host=" . $host . ";dbname=" . $dbname;
    // echo $dsn;
    $options = array(
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    );
    $dbh = new PDO($dsn, $user, $pass, $options);
    //var_dump($dbh);
    //echo "connexion établie";
} catch (PDOException $e) {
    print "Erreur connexion !:" . $e->getMessage() . '<br>';
    die;
}