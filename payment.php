<?php
class Paiment{
    public $montant;
    public $etat;
    function __construct($montant,$etat){
        $this->montant = $montant;
        $this->etat = $etat;
    }
  
}


require_once("dbconfig.php");
$code = $_POST["code"];
// $code = "159753";
$sql = "SELECT * FROM contrat where code_contrat = '$code' ";
$result = mysqli_query($con, $sql);
if($result->num_rows){
    $row = mysqli_fetch_array($result);
    $montant = $row["montant"];
    $etat = $row["etat_comp"];
    $paiment = new Paiment($montant,$etat);
    echo json_encode($paiment);  
}else{
    echo json_encode("false");
}

