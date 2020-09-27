<?php
$_SESSION["loggedin"] =false;
include 'master/config.php';
session_start();
$query  = "SELECT status FROM `$settings_table`";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$status = $row['status'];
?>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<?php if(isset($title)){
		echo "<title>License Manager - $title</title>";
	}else{
	echo "<title>License Manager</title>";
	}
	?>
	
	<link rel="icon" href="img/favicon.ico" type="image/x-icon">
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
	<link type="text/css" rel="StyleSheet" href="css/bootstrap.min.css" />
	<script src="js/bootstrap.js"></script>
	<script src="js/bootstrap-alert.js"></script>
	<script src="js/bootstrap-button.js"></script>
	<!---<script src="js/jquery.js"></script>---->
	 <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
</head>
<body>
 <div class="navbar navbar-fixed-top ">
	<div class="navbar-inner">
		<div style="margin:0 20px 0 20px;">
			<ul class="nav">
				<li><a style="color:Black;font-weight: bold;" href="#">License Manager</a></li>
				<li><a href="index.php">Main</a></li>
				<li><a href="servers.php">Servers </a></li>
				<li><a href="stats.php">Statistics </a></li>
								<li><span id="status">Server Status: <?php
								
								if ($status == 1){
									echo"<span id='status-on'>ON</span>";
								}elseif ($status == 0)
								{
									echo"<span id='status-off'>OFF</span>";
								}
								?> 
								</span></a></li>
				<?php 
				
				if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
				$username = $_SESSION["username"];
				echo"<li><a style='color:Black;font-weight: bold;' >Logined in as :  $username </a></li>";	
				}
				?>
				<ul class="nav pull-right"> 
				<li><a onclick="location.reload()" href="#"><i class="icon-refresh"></i></a></li>
				<li><a href="usercp.php"><i class="icon-user"></i></a></li>
				<li><a class="pull-right" href="logout.php"><i class="icon-off"></i></a></li>
				</ul>
			</ul>
			 
		</div>
	</div>
</div>
<div class="content"> 
