<?php
class Compteur{
    public $code_comp;
    public $adresse;
    public $etat;
    function __construct($code_comp,$adresse,$etat){
        $this->code_comp = $code_comp;
        $this->adresse = $adresse;
        $this->etat = $etat;
    }
  
}
require_once("dbconfig.php");

// $code_client_rech = '22AA01';
$code_client_rech = $_POST["code_client_rech"];
$listComp = [];
$sql = "SELECT * FROM contrat where code_client = '$code_client_rech' ";

$result = mysqli_query($con, $sql);
    while($row = mysqli_fetch_array($result)) {
        $code_comp = $row["code_contrat"];
        $adresse = $row["adresse"];
        $etat = $row["etat_comp"];

        $comp = new Compteur($code_comp,$adresse,$etat);
        array_push($listComp,$comp);  
    }
    echo json_encode($listComp);