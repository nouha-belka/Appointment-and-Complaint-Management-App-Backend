<?php 

$a = 1 ;
$b = 0 ;
$c = -1 ;
function f1(){
$a = 2 ;
$GLOBALS['b'] = 1 ;
static $c; 
// $c = $a++ ;
$c++;
echo $c."\n";
}
f1();
f1();
echo $a."\n";
echo $b."\n";
echo $c."\n";
?>