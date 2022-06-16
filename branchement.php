<?php
class Branchement{
    public $CodeComp;
    public $date;
    public $etat;
    public $emp;
    function __construct($CodeComp,$date,$etat,$emp){
        $this->CodeComp = $CodeComp;
        $this->date = $date;
        $this->etat = $etat;
        $this->emp = $emp;
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
    $emp = $row["emp_br"];
    $branchement = new Branchement($CodeComp,$date,$etat,$emp);
    echo json_encode($branchement);
}else{
    echo json_encode("false");
}



// en attente des formulaires
// formulaires en cours de validation
// date de métrage pas encore fixé
// en attente de métrage
// prix de branchement pas encore fixé
// prix fixé en attente de paiement
// date de branchement pas encore fixé
// en attente de branchement
//branchement realisé

// circle
// admin (ajouter emp, demande contrat deja faites)
// date verifier rd +3jrs actuel date 
// date verifier metrage branchmement metrage 
// verifier champps
//agence service 


//refus 
//retour de page 
//jointure emp
//userInfo
//no connection