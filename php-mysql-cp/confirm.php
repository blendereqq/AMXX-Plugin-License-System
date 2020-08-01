<?php 
include 'master/config.php';

if(isset($_GET['licen'])&&isset($_GET['ip'])){
	$kod=$_GET['licen'];
	$ip=$_GET['ip'];
	$sprawdz = mysqli_query($conn, "SELECT licen FROM servers WHERE licen='$kod' AND ip='$ip'");
	$sprawdzkod = mysqli_num_rows($sprawdz);
	$sprawdzstatus = mysqli_query($conn, "SELECT status FROM settings WHERE status='1'");
	$status=mysqli_num_rows($sprawdzstatus);
	if($sprawdzkod>0&&$status)
	{
		exit('true');
	}
	else{
		exit('false');
	}
}
else
{
    exit('false');
}
mysqli_close($conn)
?>