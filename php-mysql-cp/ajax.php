<?php
include 'master/config.php';
include 'master/funct.php';

$License = new License;


if (isset($_POST['master'])) if ($_POST['master'] == 1) echo $License->Start();
else if ($_POST['master'] == 2) echo $License->Stop();

?>
