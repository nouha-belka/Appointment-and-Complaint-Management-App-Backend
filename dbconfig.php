<?php 

$db_name = "seaal";
$db_user = "root";
$db_pass = "";
$db_host = "localhost";
$bdd = new PDO('mysql:host=localhost;dbname=seaal;charset=utf8;','root','');
$con = mysqli_connect($db_host,$db_user,$db_pass,$db_name);
if(!$bdd){
    //echo "connetion error";
}else{
    //echo "connected";
}
