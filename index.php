<?php
require 'model/controllers.php';


    $getAll = getAll();


if(isset($_POST["submit"])){

    $post = postAdd();
}
elseif(isset($_POST["update"])){

    $post = postUpdate($pseudoUpdate,$contentUpdate);
    
    }

elseif(isset($_GET["del"])){

    $delete = deleteOne();
}


require 'view/default.php';