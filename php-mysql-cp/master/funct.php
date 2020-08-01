<?php

class License{
	static function Start()
	{
		include 'config.php';
		mysqli_query($conn,"UPDATE `information` SET `starttime`=".time()." WHERE 1");
		$q = mysqli_query($conn,"UPDATE `$settings_table` SET `status`=1");
		if($q)
		{
			return '<div class="alert alert-success"><button id="close" type="button" class="close" OnClick="CloseMessage();">&times;</button><b>License Server Has Been Launched.</b></div>';
		}
		else
			return '<div class="alert alert-error"><button id="close" type="button" class="close" OnClick="CloseMessage();">&times;</button><b>An error has occurred, please refresh the page and try again.</b></div>';	
	}
	
	static function Stop()
	{
		include 'config.php';
		
		$q = mysqli_query($conn,"UPDATE `$settings_table` SET `status`=0");
		if($q)
		{
			return '<div class="alert alert-success"><button id="close" type="button" class="close" OnClick="CloseMessage();">&times;</button><b>The License Server has been stopped.</b></div>';
		}
		else
			return '<div class="alert alert-error"><button id="close" type="button" class="close" OnClick="CloseMessage();">&times;</button><b>An error has occurred, please refresh the page and try again.</b></div>';
	}
}
?>