<?php
	set_time_limit (0);
	
	include 'config.php';	
	include 'functions.php';
	
	$MasterServer = new MasterServer;
	$starttime = time();
	$refreshtime = time();
	$from = '';
	$port = 0;	
	$packet = $MasterServer->RefreshList();
	$get = "0.0.0.0:0";
	
	$socket = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);		
	socket_bind($socket, $settings['host'], $settings['port']);
	
	while (true){
		$status = mysqli_fetch_array(mysqli_query($conn,"SELECT `status` FROM `$settings_table`"));
		
		if(!$status['0'])
			exit;
			
		socket_recvfrom($socket, $buf, 2048, 0, $from, $port);			
		
		if (preg_match("/$get/i", $buf)){
			mysqli_query($conn,"INSERT INTO `statistics`(`ip`) VALUES ('$from')");
			socket_sendto($socket, $packet, strlen($packet), 0, $from, $port);
		}
	}

?>