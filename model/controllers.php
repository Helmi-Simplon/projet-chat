<?php

try {
    require 'dbconnect.php';
    if($_POST==null || isset($query)){

        $query1 = 'SELECT date, pseudo, content 
        FROM message order by id desc Limit 5';
    
        $req = $dbh->query($query1);
        $req->setFetchMode(PDO::FETCH_ASSOC);
        $tab = $req->fetchAll();
        $req->closeCursor();
        return $tab;
    }
else{
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                $dbh->beginTransaction();
        $query = 'INSERT INTO message (pseudo, content) VALUES ("'.$_POST["pseudo"].'", "'.$_POST["content"].'");';
                $dbh->exec($query);
                $dbh->commit();
                header('Location: index.php');
            }

}catch (PDOException $e) {
    $dbh->rollBack();
    print "Erreur de requete!:" . $e->getMessage() . '<br>';
    die;
}
