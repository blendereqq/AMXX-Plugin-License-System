<?php
$title ='Statistics';
include 'master/nav.php';
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
	echo '<script>window.location.replace("login.php");</script>';
  // header("location: login.php");
    exit;
}
  ?>
	<legend>Statistics</legend>
		<div class="well sidebar-nav">
			<div id="message"></div>
			<?php
			$result = mysqli_query($conn,"SELECT * FROM servers");
			$num_rows = mysqli_num_rows($result);
			?>
		<li>	Currently in the database : <?php echo "$num_rows";?> servers.</li>
			<?php
			$result = mysqli_query($conn,"SELECT * FROM users");
			$num_rows = mysqli_num_rows($result);
			?>
			<li>Currently registered : <?php echo "$num_rows";?> Users.</li>
				</tr>
			</table>
		</div>
<?php include 'master/footer.php'; ?>