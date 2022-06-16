<?php
class Metrage{
    public $date;
    public $metrage;
    public $diametre;
    public $emp;
    function __construct($date,$metrage,$diametre,$emp){
        $this->date = $date;
        $this->metrage = $metrage;
        $this->diametre = $diametre;
        $this->emp = $emp;
    }
  
}

require_once("dbconfig.php");
// $code = "22MDAA01";
$code = $_POST["code"];


$metrage_init = 0;
$diametre_init = 0;
$emp_init = "";
$sql = "SELECT * FROM contrat where code_contrat = '$code' ";
$result = mysqli_query($con, $sql);

if($result->num_rows){
    $row = mysqli_fetch_array($result);
    if($row["etat_comp"] == 'date de métrage pas encore fixé'){
        echo json_encode("false");
    }else{
        $date = $row["date_metrage"];
        if($row["metrage"] != null and  $row["diamètre"] != null  ){
            $metrage_init = $row["metrage"];
            $diametre_init =  $row["diamètre"];
            $emp_init =  $row["emp_metrage"];
        }
        $metre = new Metrage($date,$metrage_init,$diametre_init,$emp_init);
        echo json_encode($metre);
    }
    
}