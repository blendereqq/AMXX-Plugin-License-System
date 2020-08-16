<?php
// Initialize the session
session_start();
 
// Unset all of the session variables
$_SESSION = array();
$login = 0;
// Destroy the session.
session_destroy();
 
// Redirect to login page
echo '<script>window.location.replace("login.php");</script>';
exit;
?>