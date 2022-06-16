<?php
$nomReg = "#^[a-zA-Z ,.'-]{2,}$#";
$telReg = "#^(0)(2|5|6|7)[0-9]{8}$#";
$passReg = "#^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$#";
if (preg_match($passReg,"nouha01A")){

    echo "true";
}else{
    echo "false";
}