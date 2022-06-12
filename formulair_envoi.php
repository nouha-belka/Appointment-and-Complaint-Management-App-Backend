<?php

require_once("dbconfig.php");
$code = $_POST["code"];
$nom_image = $_POST["nom_image"];
$image = $_POST["image"];
$etat = $_POST["etat"];
// $code = "22MDAA00";
// $nom_image = "copie acte de propriété";
// $image = "ljhbjkhvhkgjhhbjhbvkhg";
// $etat = "en cours";
// echo json_encode(strlen($image));

$recupUser = $bdd->prepare('SELECT * FROM  formulaire WHERE code_contrat = ? AND nom_image = ?');
$recupUser->execute(array($code,$nom_image));

if($recupUser->rowCount() > 0){
  $sql = $bdd->prepare('UPDATE formulaire SET image_f = ? , etat = ? WHERE code_contrat = ? AND nom_image =  ?;');
  $sql->execute(array($image,$etat,$code,$nom_image));
  if ($sql->rowCount() > 0) {
      //echo "New record created successfully";
      echo json_encode("true");
    } else {
      // echo "Error: " . $sql . "<br>" . mysqli_error($con);
      echo json_encode("false");
    }
}else{
  $sql = "INSERT INTO `formulaire` (`code_contrat`, `nom_image`, `image_f`, `etat`) VALUES ('$code', '$nom_image', '$image', '$etat');";
  if (mysqli_query($con, $sql)) {
    $sql = $bdd->prepare('UPDATE contrat SET etat_comp = ?  WHERE code_contrat = ? ;');
    $sql->execute(array('formulaires en cours de validation',$code));
      //echo "New record created successfully";
      echo json_encode("true");
    } else {
      //echo "Error: " . $sql . "<br>" . mysqli_error($con);
      echo json_encode("false");
    }
}


// $fp = fopen("./images_temp/".$nom_image.".png","w");
// fwrite($fp,base64_decode($image));

