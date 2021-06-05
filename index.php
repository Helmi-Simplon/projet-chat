<?php
require 'model/controllers.php';

$display = displayTable();
$pagination = pagination();

if (isset($_POST["submit"])) {

    $post = postAdd();
} elseif (isset($_POST["update"])) {

    $post = postUpdate($pseudoUpdate, $contentUpdate);
} elseif (isset($_GET["del"])) {

    $delete = deleteOne();
}
require 'view/default.php';
