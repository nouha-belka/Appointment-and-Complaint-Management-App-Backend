<?php
require_once("dbconfig.php");

$code = $_POST["code"];
$nom = $_POST["nom"];
$prenom = $_POST["prenom"];
$date = $_POST["date"];
$tel = $_POST["tel"];
$email = $_POST["email"];
// $code = "22AA01";
// $nom = "belka";
// $prenom = "nouha";
// $date = "2022-05-05";
// $tel = "12365478";
// $email = "nouha@gmail.com";
// $pass =  "nouha12";





$sql = "UPDATE client SET nom_client = '$nom', prenom_client = '$prenom', date_de_naissance_client = '$date', tel_client = '$tel', email = '$email' WHERE code_client = '$code'";

if (mysqli_query($con, $sql)) {
  //echo "New record created successfully";
  echo json_encode("true");
} else {
  //echo "Error: " . $sql . "<br>" . mysqli_error($con);
  echo json_encode("false");
}
