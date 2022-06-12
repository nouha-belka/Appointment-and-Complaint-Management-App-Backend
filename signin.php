<?php
require_once("dbconfig.php");

$email = $_POST["email"];
$pass = $_POST["pass"];


$recupUser = $bdd->prepare('SELECT * FROM  employe WHERE email = ? AND password_emp = ?');
$recupUser->execute(array($email,$pass));

if($recupUser->rowCount() > 0){
    //echo 'account exists';
    echo json_encode("true");
}else{
    echo json_encode("false");
}