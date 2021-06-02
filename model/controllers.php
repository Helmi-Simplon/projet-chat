<?php

try {
    require 'dbconnect.php';
    if($_POST==null ){

        $query1 = 'SELECT date, pseudo, content 
        FROM message';
    
        $req = $dbh->query($query1);
        $req->setFetchMode(PDO::FETCH_ASSOC);
        $tab = $req->fetchAll();
        $req->closeCursor();
        return $tab;
    }
elseif(isset($_POST["pseudo"])){
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                $dbh->beginTransaction();
        $query = 'INSERT INTO message (pseudo, content) VALUES ("'.$_POST["pseudo"].'", "'.$_POST["content"].'");';
                $dbh->exec($query);
                $dbh->commit();
              
            }

}catch (PDOException $e) {
    $dbh->rollBack();
    print "Erreur de requete!:" . $e->getMessage() . '<br>';
    die;
}
