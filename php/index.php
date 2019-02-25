<?php 
error_reporting(0);
$licentiecode = $_GET['licen'];
$txtbestand = file_get_contents('licenses.txt'); 
if (isset($_GET['licen'])) {
		if(!stristr($txtbestand, $licentiecode)){
			exit('false');
				}   
			exit('true');
} else {
	exit('false');
}


 ?>