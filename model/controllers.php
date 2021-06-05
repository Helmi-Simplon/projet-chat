<?php

function getAll(): array
{
    try {
        require 'dbconnect.php';

        $query = 'SELECT id,date, pseudo, content 
            FROM message order by id desc Limit 10';

        $req = $dbh->query($query);
        $req->setFetchMode(PDO::FETCH_ASSOC);
        $tab = $req->fetchAll();
        $req->closeCursor();
        return $tab;
    } catch (PDOException $e) {

        print "Erreur de requete!:" . $e->getMessage() . '<br>';
        die;
    }
}


function postAdd()
{
    try {
        require 'dbconnect.php';

        if ($_POST["pseudo"] != null && strlen($_POST["pseudo"]) > 1 && $_POST["content"] != null) {
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $dbh->beginTransaction();
            $query = 'INSERT INTO message (pseudo, content) VALUES ("' . $_POST["pseudo"] . '", "' . $_POST["content"] . '");';
            $dbh->exec($query);
            $dbh->commit();
            header('Location: index.php');
        } else {
            header('Location: index.php');
        }
    } catch (PDOException $e) {

        print "Erreur de requete!:" . $e->getMessage() . '<br>';
        die;
    }
}



function postUpdate($pseudoUpdate, $contentUpdate)
{
    try {
        require 'dbconnect.php';
        if (isset($_POST["update"])) {
            $id = $_POST["idUpdate"];
            $pseudoUpdate = $_POST["pseudoUpdate"];
            $contentUpdate = $_POST["contentUpdate"];

            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query2 = $dbh->prepare('UPDATE message SET pseudo= "' . $pseudoUpdate . '", content= "' . $contentUpdate . '" WHERE id=' . $id);
            $query2->execute();
            header('Location: index.php');

            die;
        }
    } catch (PDOException $e) {

        print "Erreur de requete!:" . $e->getMessage() . '<br>';
        die;
    }
}


function deleteOne()
{
    try {
        require 'dbconnect.php';
        $_GET["del"] = isset($_GET["del"]) ? $_GET["del"] : NULL;
        $query = 'DELETE FROM message where id = :idval';

        $req = $dbh->prepare($query);
        $req->bindValue(':idval', $_GET["del"], PDO::PARAM_INT);
        $req->execute();
        header('Location: index.php');
    } catch (PDOException $e) {

        print "Erreur de requete!:" . $e->getMessage() . '<br>';
        die;
    }
}
