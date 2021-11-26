<?php
	include_once('connection.php');
	$id=$_GET['id'];
	//exit;
	$sql="delete from tbl_holiday where holidayid=$id";
	mysqli_query($con,$sql);
	header("Location:holiday.php");
?>