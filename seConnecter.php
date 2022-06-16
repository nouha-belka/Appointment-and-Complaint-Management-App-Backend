<?php
class Client{
    public $nom;
    public $prenom;
    public $date;
    public $email;
    public $tel;
    function __construct($nom,$prenom,$date,$email,$tel){
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->date = $date;
        $this->email = $email;
        $this->tel = $tel;
    }
  
}

require_once("dbconfig.php");

// $code = "22AA01";
// $pass = "hhhhh";
$code = $_POST["code"];
$pass = $_POST["pass"];

$listUser = [];
$listComp = [];

$sql = "SELECT * FROM  client WHERE code_client = '$code' AND MotDePass = '$pass' ";
$result = mysqli_query($con, $sql);

// code_client , MotDePass, nom_client, prenom_client, date_de_naissance_client, tel_client, email

if($result->num_rows > 0){
    $row = mysqli_fetch_assoc($result);
    $client = new Client($row['nom_client'],$row['prenom_client'],$row['date_de_naissance_client'],$row['email'],$row['tel_client']);
    $sql1 = "SELECT * FROM contrat where code_client = '$code' ";
    $result1 = mysqli_query($con, $sql1);
    while($row1 = mysqli_fetch_array($result1)){
        array_push($listComp,$row1['code_contrat']);
    }
    array_push($listUser,$client);
    array_push($listUser,$listComp);
    //echo 'account exists';
    echo json_encode($listUser);
}else{
    echo json_encode("false");
}