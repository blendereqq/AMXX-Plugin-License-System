<?php 
//error_reporting(0);

$file = 'licenses.txt';
$licentiecode = $_GET['licen'];


$licenfileget = file_get_contents($file);
$pattern = preg_quote($licentiecode, '/');
$pattern = "/^.*$pattern.*\$/m";

if(preg_match_all($pattern, $licenfileget)){
   exit('true');
}
else{
   exit('false');
}
?>