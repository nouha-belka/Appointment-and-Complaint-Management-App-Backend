<?php

require_once("dbconfig.php");
// $code = '22MDAA01';
$code = $_POST["code"];
$etat = 'date de métrage pas encore fixé';
$sql = $bdd->prepare('UPDATE contrat SET etat_comp = ?  WHERE code_contrat = ? ;');
$sql->execute(array($etat,$code));
if($sql->rowCount() > 0){
    echo json_encode("true");
}else {
    $sql = $bdd->prepare('SELECT * FROM contrat  WHERE code_contrat = ? and etat_comp = ? ;');
    $sql->execute(array($code,$etat));
    if($sql->rowCount() > 0){
        echo json_encode("true");
    }else{
        echo json_encode("false");
    }
  }