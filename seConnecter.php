<?php
require_once("dbconfig.php");

$code = $_POST["code"];
$pass = $_POST["pass"];


$recupUser = $bdd->prepare('SELECT * FROM  client WHERE code_client = ? AND MotDePass = ?');
$recupUser->execute(array($code,$pass));

if($recupUser->rowCount() > 0){
    //echo 'account exists';
    echo json_encode("true");
}else{
    echo json_encode("false");
}