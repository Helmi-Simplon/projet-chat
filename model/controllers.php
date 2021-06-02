<?php
try {
    require 'dbconnect.php';
    $query = 'SELECT date, pseudo, content 
    FROM message';

    $req = $dbh->query($query);
    $req->setFetchMode(PDO::FETCH_ASSOC);
    $tab = $req->fetchAll();
    $req->closeCursor();
    return $tab;

}catch (PDOException $e) {
    print "Erreur de requete!:" . $e->getMessage() . '<br>';
    die;
}
