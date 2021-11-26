
<?php
	include_once('connection.php');
	$id=$_GET['id'];
	//exit;
	$sql="delete from tbl_user where userid=$id";
	mysqli_query($con,$sql);
	header("Location:user1.php");
?>