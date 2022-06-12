<?php

$code = "22AA99";
$anne = $code[0] . $code[1];
$alph1 = ord($code[2]);
$alph2 = ord($code[3]);
$num = intval($code[4] . $code[5]);

$currYear = date("Y"); 
$currYear = $currYear[2] . $currYear[3];

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
echo $next;
