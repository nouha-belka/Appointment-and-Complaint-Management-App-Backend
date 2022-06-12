<?php

require_once("dbconfig.php");

$currYear = date("Y"); 
$currYear = $currYear[2] . $currYear[3];

$sql = 'SELECT * FROM client ORDER BY code_client DESC LIMIT 1;';
// $recupUser->execute(array($code));
$result = mysqli_query($con, $sql);

if($result->num_rows){
    $row = mysqli_fetch_array($result);
    // echo json_encode($row["code_client"]);
    $code = $row["code_client"];
    $anne = $code[0] . $code[1];
    $alph1 = ord($code[2]);
    $alph2 = ord($code[3]);
    $num = intval($code[4] . $code[5]);

    if($anne == $currYear){
        if($num < 99){
            $num += 1;
        }else{
            $num = 0;
            if($alph2 < 90 ){
                $alph2 += 1;
            }else{
                $alph2 = 65;
                $alph1 += 1; 
            }
        }
    }else{
        $anne = $currYear;
        $num = 0;
        $alph1 = 65;
        $alph2 = 65;
    }
    
    
    $num = strval($num);
    if(strlen($num) == 1){
        $num = "0" . $num;
    }
    $next = $anne . chr($alph1) . chr($alph2) . $num;
    // echo $next;
     echo json_encode($next);
}else {
    echo json_encode("false");
  }