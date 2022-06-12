<?php
require_once("dbconfig.php");

// $fact = "hhhhhhh";
// $code = "122222";
// $domaine = 2;
// $type = 4;
// $details = 'jhbjsh vj rev';
// $date ='2022-05-16';
// $code_client = '12345678';
$fact = $_POST["facture"];
$code = $_POST["code"];
$domaine = $_POST["domaine"];
$type = $_POST["type"];
$details = $_POST["details"];
$date = $_POST["date"];
$code_client = $_POST["code_client"];
if($code != 'null'){
        $sql = "INSERT INTO reclamation (domaine, type_rec, detail_rec, code_client,date_rec,code_compteur)
    VALUES ('$domaine' ,'$type' ,'$details','$code_client','$date','$code')";  
}elseif($fact != 'null'){
    $sql = "INSERT INTO reclamation (domaine, type_rec, detail_rec, code_client,date_rec,num_faccture)
    VALUES ('$domaine' ,'$type' ,'$details','$code_client','$date','$fact')";
}else{
    $sql = "INSERT INTO reclamation (domaine, type_rec, detail_rec, code_client,date_rec)
    VALUES ('$domaine' ,'$type' ,'$details','$code_client','$date')";
}



if (mysqli_query($con, $sql)) {
  //echo "New record created successfully";
  echo json_encode("true");
} else {
  //echo "Error: " . $sql . "<br>" . mysqli_error($con);
  echo json_encode("false");
}