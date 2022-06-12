<?php

require_once("dbconfig.php");
$code = $_POST["code"];
// $code = "123456";

$recupUser = $bdd->prepare('SELECT * FROM  compteur WHERE code_compteur = ? ');
$recupUser->execute(array($code));

if($recupUser->rowCount() > 0){
    echo json_encode("true");
}else {
    echo json_encode("false");
  }