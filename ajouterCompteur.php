<?php
require_once("dbconfig.php");

// $code = $_POST["code"];
$adresse = $_POST["adresse"];
$code_client = $_POST["code_client"];
$typeB = $_POST["typeB"];
$typeR = $_POST["typeR"];

// $adresse = "22AA01";
// $code_client = "22AA01";
// $typeB = "P";
// $typeR = "M";
$etatp = "en attente des formulaires";
$currYear = date("Y"); 
$currYear = $currYear[2] . $currYear[3];

$comp = $currYear . $typeR . $typeB;
$sql = "SELECT * FROM contrat where code_contrat LIKE '$comp%' ORDER BY code_contrat DESC LIMIT 1;";
// $recupUser->execute(array($code));
$result = mysqli_query($con, $sql);

if($result->num_rows){
  $row = mysqli_fetch_array($result);
  $code = $row["code_contrat"];
  $alph1 = ord($code[4]);
  $alph2 = ord($code[5]);
  $num = intval($code[6] . $code[7]);

  if($num < 99){
    $num += 1;
  }else{
      $num = 0;
      if($alph2 < 90 ){
          $alph2 += 1;
      }else{
          $alph2 = 65;
          $alph1 += 1; 
      }
  }
  $num = strval($num);
    if(strlen($num) == 1){
        $num = "0" . $num;
    }
    $next = $comp . chr($alph1) . chr($alph2) . $num;
  
}else{
  $next = $comp . "AA00";
}

$sql = "INSERT INTO contrat (code_contrat ,code_client, adresse,etat_comp,type_b,type_r)
VALUES ('$next', '$code_client' ,'$adresse' ,'$etatp','$typeB','$typeR')";

if (mysqli_query($con, $sql)) {
  //echo "New record created successfully";
  echo json_encode($next);
} else {
  //echo "Error: " . $sql . "<br>" . mysqli_error($con);
  echo json_encode("false");
}