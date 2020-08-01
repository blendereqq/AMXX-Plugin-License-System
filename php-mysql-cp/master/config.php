<?php
	$host = "localhost"; 
	$user = "";
	$pass = "";
	$db = "license";
	$dbtable = "servers";
	$settings_table = "settings";

	$conn = mysqli_connect($host, $user, $pass)or die('Nie można się połączyć: ' . mysql_error());;  
	if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
	mysqli_select_db($conn,$db); 
	
	$settings=mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM `settings`"));
	$servers=mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM `servers`"));
	$users=mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM `users`"));
	
?>