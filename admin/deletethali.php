
<?php
	include_once('connection.php');
	$id=$_GET['id'];
	//exit;
	$sql="delete from tbl_dishtype where tid=$id";
	mysqli_query($con,$sql);
	header("Location:thali.php");
?>