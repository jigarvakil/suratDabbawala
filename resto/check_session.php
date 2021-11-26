<?php
	session_start();
	if(!isset($_SESSION['restid']))
	{
		
		header("location:login.php");
	}
	
?>