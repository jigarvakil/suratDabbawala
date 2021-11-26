<?php
	
	include_once('connection.php');
	include_once("check_session.php");
	$id=0;
	if(isset($_REQUEST['id']))
	{
		$id=$_REQUEST['id'];
        $sql="update tbl_deliveryhistory set status='2' where histid=$id";
        // echo $sql;
        // exit;
		$result=mysqli_query($con,$sql);
		
        header("location:order.php");        
	}
	
	
?>