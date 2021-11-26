
<?php
	include_once('connection.php');
	$id=$_GET['id'];
	//exit;
	$sql="delete from tbl_payment where pid=$id";
	mysqli_query($con,$sql);
	header("Location:payment.php");
?>