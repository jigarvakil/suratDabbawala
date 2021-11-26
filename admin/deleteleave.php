
<?php
	include_once('connection.php');
	$id=$_GET['id'];
	//exit;
	$sql="delete from tbl_leave where leaveid=$id";
	mysqli_query($con,$sql);
	header("Location:leave.php");
?>