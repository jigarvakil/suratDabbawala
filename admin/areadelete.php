
<?php
	include_once('connection.php');
	$id=$_GET['id'];
	//exit;
	$sql="delete from tbl_area where areaid=$id";
	mysqli_query($con,$sql);
	header("Location:varea.php");
?>