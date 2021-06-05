<?php

/************************************************************AFFICHAGE ET PAGINATION********************************************************************************************/

// Affiche les dix derniers résultats de la table message dans la page chatView.php

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

// Affiche les dix résultats d'une page(pagination)

function paginationAll()
{
    try {
        require 'dbconnect.php';
        $num_page = num_page();
        $query = 'SELECT * FROM message order by id desc Limit 10 OFFSET ' . $num_page;

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

// Le résultat de cette fonction sera utilisé dans la fonction paginationAll()

function num_page()
{
    require 'dbconnect.php';
    $_GET["page"] = isset($_GET["page"]) ? $_GET["page"] : NULL;
    $display = ($_GET["page"] - 1) * 10;
    return $display;
}

//Calcule le nombre de pages
function pagination()
{
    require 'dbconnect.php';
    $query = 'SELECT ceil(count(*)/10) as total_page FROM message';
    // $query = 'SELECT * FROM message Limit 10 OFFSET'. $page_num - 1;
    $req = $dbh->query($query);
    $req->setFetchMode(PDO::FETCH_ASSOC);
    $line = $req->fetch();
    $req->closeCursor();
    return $line;
}


//contient les deux fonctions getAll() et paginationAll(), displayTable() organise l'affichage de chaque fonction   
function displayTable()
{
    $_GET["page"] = isset($_GET["page"]) ? $_GET["page"] : NULL;
    if (!isset($_GET["page"])) {

        $getAll = getAll();
    } else {

        $getAll = paginationAll();
    }
    return $getAll;
}


/*******************************************INSERTION - MODIFICATION - SUPPRESSION DES DONNEES*************************************************************************/



//Insérer une nouvelle ligne dans la table message(envoi d'un nouveau message)

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


//Mettre à jour une ligne dans la table message

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

//Supprimer une ligne

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
