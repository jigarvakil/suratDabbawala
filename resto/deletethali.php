
<?php
	include_once('connection.php');
	$id=$_GET['id'];
	//exit;
	$sql="delete from tbl_thali where thaliid=$id";
	mysqli_query($con,$sql);
	header("Location:viewthali.php");
?>