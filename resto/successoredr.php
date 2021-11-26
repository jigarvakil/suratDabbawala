<?php
    	include_once('connection.php');
        include_once("check_session.php");
        $id=$_GET['id'];
        $sql="update tbl_order set status=1 where oid=$id";
        $res=mysqli_query($con,$sql);
        header("location:order.php");
?>