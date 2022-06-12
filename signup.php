<?php
require_once("dbconfig.php");

$email = $_POST["email"];
$name = $_POST["name"];
$pass = $_POST["pass"];


$recupUser = $bdd->prepare('SELECT * FROM  employe WHERE email = ? ');
$recupUser->execute(array($email));

if($recupUser->rowCount() > 0){
    //echo 'account exists';
    echo json_encode("account exists");
}else{
    $sql = "INSERT INTO employe (userName, password_emp,email)
VALUES ('$name', '$pass', '$email')";

if (mysqli_query($con, $sql)) {
  //echo "New record created successfully";
  echo json_encode("true");
} else {
  //echo "Error: " . $sql . "<br>" . mysqli_error($con);
  echo json_encode("false");
}
}