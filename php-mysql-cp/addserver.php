<?php

include 'master/config.php';
session_start();
if (isset($_POST['submit']))
{
    $ip = $_POST['ip'];
	$kod = substr(md5(date("d.m.Y.H.i.s").rand(1,1000000)) , 0 , 8);
	
    $query = mysqli_query($conn, "INSERT INTO servers (id,ip,licen) VALUES (NULL,'$ip','$kod')");
    mysqli_close($conn);
    
}
header("location: servers.php");
?>
