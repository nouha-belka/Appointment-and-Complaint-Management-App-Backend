<?php
class Reclamation{
    public  $id;
    public $code_copm;
    public $date;
    public $etat;
    function __construct($id,$code_copm,$date,$etat){
        $this->id = $id;
        $this->code_copm = $code_copm;
        $this->date = $date;
        $this->etat = $etat;
    }
  
}

require_once("dbconfig.php");

// $code_client_rech = '22AA06';
// $code = 'tout';
$code_client_rech = $_POST["code_client_rech"];
$code = $_POST["code"];

$listRec = [];
$sql = NULL;
if($code == 'tout'){
    $sql = "SELECT * FROM reclamation where code_client = $code_client_rech ";
}elseif($code == 'sans compteur'){
    $sql = "SELECT * FROM reclamation where code_client = $code_client_rech and code_compteur is null";
}else{
    $sql = "SELECT * FROM reclamation where code_client = $code_client_rech and code_contrat = $code ";
}
$sql = "SELECT * FROM reclamation WHERE code_client = '$code_client_rech' ;";
// $recupUser->execute(array($code));
$result = mysqli_query($con, $sql);
// echo json_encode($result);
    while($row = mysqli_fetch_array($result)) {
        $id = $row["id_rec"];
        $code_copm = $row["code_contrat"];
        if($code_copm == null){
            $code_copm = "sans compteur" ;
        }
        $date = $row["date_rec"];
        $etat = $row["etat_rec"];
        $raison = new Reclamation($id,$code_copm,$date,$etat);
        array_push($listRec,$raison);  
    }
    echo json_encode($listRec);