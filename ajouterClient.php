<?php
require_once("dbconfig.php");

$code = $_POST["code"];
$nom = $_POST["nom"];
$prenom = $_POST["prenom"];
$date = $_POST["date"];
$tel = $_POST["tel"];
$email = $_POST["email"];
$pass =  $_POST["pass"];
// $code = "125478";
// $nom = "belka";
// $prenom = "nouha";
// $date = "2022-05-05";
// $tel = "12365478";
// $email = "nouha@gmail.com";
// $pass =  "nouha12";





$sql = "INSERT INTO client (code_client , MotDePass, nom_client, prenom_client, date_de_naissance_client, tel_client, email)
VALUES ('$code' ,'$pass' ,'$nom' ,'$prenom' ,'$date' ,'$tel' ,'$email')";

if (mysqli_query($con, $sql)) {
  //echo "New record created successfully";
  echo json_encode("true");
} else {
  //echo "Error: " . $sql . "<br>" . mysqli_error($con);
  echo json_encode("false");
}
