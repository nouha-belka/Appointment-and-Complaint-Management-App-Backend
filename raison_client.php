<?php
require_once("dbconfig.php");

$code = $_POST["code"];
$sujet =$_POST["sujet"];
$desc = $_POST["desc"];
$etat = 'attente';
$just = '';

$sql = "INSERT INTO raison (code_client, sujet_raison,	desc_raison,raison_etat,justification)
VALUES ('$code', '$sujet', '$desc','$etat','$just')";


if (mysqli_query($con, $sql)) {
    //echo "New record created successfully";
    echo json_encode("true");
  } else {
    //echo "Error: " . $sql . "<br>" . mysqli_error($con);
    echo json_encode("false");
  }