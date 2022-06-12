<?php

class Image{
    public $name;
    public $state;
    function __construct($name,$state){
        $this->name = $name;
        $this->state = $state;
    }
  
}

require_once("dbconfig.php");
$code = $_POST["code"];
// $code = "123456789";
$imagelIST = [];
$sql = "SELECT * FROM formulaire where code_contrat = '$code' ";
$result = mysqli_query($con, $sql);
// echo $result->num_rows;

if($result->num_rows){
    while ($elem  = mysqli_fetch_array($result)){
        $image_name = $elem["nom_image"];
        $status = $elem["etat"];
        $image = new Image($image_name,$status);
        array_push($imagelIST,$image); 
        
    }
    echo json_encode($imagelIST);
}else{
    echo json_encode("false");
}
