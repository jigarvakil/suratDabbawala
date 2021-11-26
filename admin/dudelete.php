
<?php
	include_once('connection.php');
	$id=$_GET['id'];
	//exit;
	$sql="delete from tbl_dabbawala where dbuserid=$id";
	mysqli_query($con,$sql);
	header("Location:duser1.php");
?>