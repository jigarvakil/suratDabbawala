
<?php
	include_once('connection.php');
	$id=$_GET['id'];
	//exit;
	$sql="delete from tbl_complaint where compid=$id";
	mysqli_query($con,$sql);
	header("Location:complaint.php");
?>