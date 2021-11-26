<?php
	session_start();
	if(!isset($_SESSION['dbuserid']))
	{
		
		header("location:login.php");
	}
	
?>