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
$listB = [];
$branchement = new Branchement("hhhhhh","hhhhhh","hhhhhh");
array_push($listB,$branchement);
$branchement = new Branchement("hhhhhh","hhhhhh","hhhhhh");
array_push($listB,$branchement);
$branchement = new Branchement("hhhhhh","hhhhhh","hhhhhh");
array_push($listB,$branchement);
$branchement = new Branchement("hhhhhh","hhhhhh","hhhhhh");
array_push($listB,$branchement);
$branchement = new Branchement("hhhhhh","hhhhhh","hhhhhh");
array_push($listB,$branchement);
// $ch2 = "\ggggg\ggggg\gggggg";
// $tab = explode("m",$ch2);
echo json_encode($listB);
?>