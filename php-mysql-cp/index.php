<?php
$title = 'Main';
include 'master/nav.php';
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
	echo '<script>window.location.replace("login.php");</script>';
  // header("location: login.php");
    exit;
}
$result       = mysqli_query($conn, "SELECT starttime FROM information");
$row          = mysqli_fetch_array($result);
$value        = $row[0];
$current_time = time();
$diff         = $current_time - $value;
$h            = $diff / 3600 % 24;
$m            = $diff / 60 % 60;
$czas         = "{$h} Hours, {$m} minutes";

?>
 <script src="js/main.js"></script>
    <legend>General settings</legend>
        <div class="well sidebar-nav">
            <div id="message"></div>
        </div>
        
            <table class="table table-bordered" >
                <tr>
					<td></td>
				</tr>
                <tr><?php
if (isset($czas) && $status) {
    echo "<td>Time: $czas </td> ";
}
?>
                </tr>
                <tr>
                    <td><button class="btn btn-success" onClick="ms(1);"><i class="icon-play icon-white"></i> Start</button>
<button class="btn btn-danger" onClick="ms(2);"><i class="icon-pause icon-white"></i> Stop</button></td>
                </tr>
            </table>
<?php
include 'master/footer.php';
?>