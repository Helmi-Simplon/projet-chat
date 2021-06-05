<?php
require 'model/controllers.php';


    $getAll = getAll();


if(isset($_POST["submit"])){

    $post = postAdd();
}
elseif(isset($_POST["update"])){

    $post = postUpdate($pseudoUpdate,$contentUpdate);
    
    }


require 'view/default.php';
