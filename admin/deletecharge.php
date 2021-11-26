
<?php
	include_once('connection.php');
	$id=$_GET['id'];
	//exit;
	$sql="delete from tbl_chargeinfo where chargeid=$id";
	mysqli_query($con,$sql);
	header("Location:charges.php");
?>