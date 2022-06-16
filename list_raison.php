<?php
class Reason{
    public  $subject;
    public $content;
    public $id;
    public $state;
    public $just;
    function __construct($id,$subject,$content,$state,$just){
        $this->subject = $subject;
        $this->content = $content;
        $this->id = $id;
        $this->state = $state;
        $this->just = $just;
    }
  
}

class RendezVous extends Reason{
    public  $date;
    public $heure;
    public $agent;
    function __construct($id,$subject,$content,$state,$just,$date,$heure,$agent){
        parent::__construct($id,$subject,$content,$state,$just);
        $this->heure = $heure;
        $this->agent = $agent;
        $this->date = $date;
    }
}


require_once("dbconfig.php");

$code_client_rech = $_POST["code_client_rech"];
// $code_client_rech = '22AA01';
$page = $_POST["page"];
// $page = 'refus';
$reasonlIST = [];
$rdList = [];
if($page == "attente" || $page == "refus"  ){
    if($page == "attente"){
        $sql = "SELECT * FROM raison where code_client = '$code_client_rech' and (raison_etat = 'attente')";
    }elseif($page == "refus"){
        $sql = "SELECT * FROM raison where code_client = '$code_client_rech' and (raison_etat = 'refus' )";
    }

    $result = mysqli_query($con, $sql);
    while($row = mysqli_fetch_array($result)) {
        $id = $row["id_raison"];
        $suj = $row["sujet_raison"];
        $desc = $row["desc_raison"];
        $etat = $row["raison_etat"];
        $just = $row["justification"];
        $raison = new Reason($id,$suj,$desc,$etat,$just);
        array_push($reasonlIST,$raison);  
    }
    echo json_encode($reasonlIST);

}elseif($page == "rd" || $page == "fait" || $page == "annulé"){
    if($page == "rd"){
        $sql = "SELECT r.id_raison,r.sujet_raison,r.desc_raison,r.raison_etat,rd.date_rd, rd.heure, em.nom_emp,em.prenom_emp FROM raison r, rendez_vous rd, employe em where r.code_client = '$code_client_rech' and (r.raison_etat = 'planifié' ) and rd.id_raison = r.id_raison  and em.id_emp = rd.id_emp;";
    }elseif($page == "fait"){
        $sql = "SELECT r.id_raison,r.sujet_raison,r.desc_raison,r.raison_etat,rd.date_rd, rd.heure, em.nom_emp,em.prenom_emp FROM raison r, rendez_vous rd, employe em where r.code_client = '$code_client_rech' and (r.raison_etat = 'fait' ) and rd.id_raison = r.id_raison  and em.id_emp = rd.id_emp;";
    }elseif($page == "annulé"){
        $sql = "SELECT r.id_raison,r.sujet_raison,r.desc_raison,r.raison_etat,rd.date_rd, rd.heure, em.nom_emp,em.prenom_emp FROM raison r, rendez_vous rd, employe em where r.code_client = '$code_client_rech' and (r.raison_etat = 'annulé' ) and rd.id_raison = r.id_raison  and em.id_emp = rd.id_emp;";

    }
    
    $result = mysqli_query($con, $sql);
    while($row = mysqli_fetch_array($result)){
        $id = $row["id_raison"];
        $suj = $row["sujet_raison"];
        $desc = $row["desc_raison"];
        $etat = $row["raison_etat"];
        $date = $row["date_rd"];
        $heure = $row["heure"];
        $nom_emp = $row["nom_emp"];
        $prenom_emp = $row["prenom_emp"];
        $just = "";
        $rd = new  RendezVous($id,$suj,$desc,$etat,$just,$date,$heure,$nom_emp . " " . $prenom_emp );
        array_push($rdList,$rd);
    }
    echo json_encode($rdList);
}

  

// $rd = new  RendezVous("11","ghghgh",'gggggggggg','en cours','123','52','moh');
// echo json_encode($rd );
// ALTER TABLE `rendez_vous` ADD CONSTRAINT `rd_raison_ref` FOREIGN KEY (`id_raison`) REFERENCES `raison`(`id_raison`) ON DELETE RESTRICT ON UPDATE RESTRICT;