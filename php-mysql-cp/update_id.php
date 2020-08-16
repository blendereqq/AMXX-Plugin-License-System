<?php
include 'master/config.php'; 

if(isset($_GET['id'])&&$_SESSION["loggedin"]){
    $id = (int) $_GET['id'];
    if(!empty($_GET['id'])) {
        $delete = mysqli_query($conn,"DELETE FROM servers WHERE id='$id'");
    }
    if($delete) {
       header("location: servers.php");
    }
  }
 ?>