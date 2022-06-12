<?php
class Branchement{
    public $CodeComp;
    public $date;
    public $etat;
    function __construct($CodeComp,$date,$etat){
        $this->CodeComp = $CodeComp;
        $this->date = $date;
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
    $date = $row["date_branchement"];
    $etat = $row["etat_comp"];
    $CodeComp = $row["code_compteur"];
    $branchement = new Branchement($CodeComp,$date,$etat);
    echo json_encode($branchement);
}else{
    echo json_encode("false");
}

// une date de realisation vous sera comuniqué dans les plus bref delais


// en attente des formulaires
// formulaires en cours de validation
// date de métrage pas encore fixé
// en attente de métrage
// prix de branchement pas encore fixé
// prix fixé en attente de paiement
// date de branchement pas encore fixé
// en attente de branchement
//branchement realisé