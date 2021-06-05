<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://bootswatch.com/5/darkly/bootstrap.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  
  <title>Chat</title>
</head>
<body>
  <div class="container">
    <h1>Live chat Amazin</h1>
    
<?php
$_GET["id"]= isset($_GET["id"])?$_GET["id"]:NULL;
$_GET["pseudo"]= isset($_GET["pseudo"])?$_GET["pseudo"]:NULL;
$_GET["content"]= isset($_GET["content"])?$_GET["content"]:NULL;

if(isset($_GET["id"])){
  include 'view/editView.php';
  }
  else{
  require 'chatView.php';
  require 'formView.php';
  }


?>

  </div>
</body>

</html>