<?php
include 'master/config.php'; 

if(isset($_GET['id'])&&$_GET['id']!=1){
    $id = (int) $_GET['id'];
    if(!empty($_GET['id'])) {
        $delete = mysqli_query($conn,"DELETE FROM users WHERE id='$id'");
    }
    if($delete) {
       header("location: usercp.php");
    }
  }
  else
{
		 header("location: usercp.php");
}
 ?>