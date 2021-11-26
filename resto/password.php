<?php
	include_once('connection.php');
	$role=$_GET['role'];
	$id=$_GET['id'];
	if($role==4)
	{
		$sql="select * from tbl_restroadmin where adminid=$id";
		$res=mysqli_query($con,$sql);
		$row=mysqli_fetch_assoc($res);
	}
	
	if(isset($_POST['btnRst']))
	{
		$pwd=$_POST['password'];
		$cnfpwd=$_POST['confrimpassword'];
		if($role==4)
		{
			if($pwd==$cnfpwd)
			{
				$encpwd=md5($pwd);
				$sql="update tbl_restroadmin set password='$encpwd' where	 adminid='$id'";
				//echo $sql;
				//exit;
				
				$res=mysqli_query($con,$sql);
				if($res)
				{
					echo "<script> alert('Password reset successfully'); </script>";
					header("location:login.php");
				}
				
			}
			else
			{
				echo "<script> alert('Password not match'); </script>";
			}
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
    
	<head>
        <title>Restaurant Admin</title>
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="css/matrix-login.css" />
        <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
		
	</head>
    <body>
		
	    <div id="loginbox">            
            <form id="loginform" method="post" class="form-vertical" >
				<div class="control-group normal_text">
					<h3 class="text-center m-t-10"> <strong>Hello <?= $row['adminname']; ?></strong> </h3>
					<h3>RESET YOUR PASSWORD</h3>
				</div>
				
				<div class="controls">
					<div class="main_input_box">
						<span class="add-on bg_lg"><i class="icon-lock"> </i></span><input type="password" name="password" placeholder="Password" />
					</div>
					
				</div>
				<br>
				<div class="controls">
					<div class="main_input_box">
						<span class="add-on bg_lg"><i class="icon-lock"> </i></span><input type="password" name="confrimpassword" placeholder="Confirm Password" />
					</div>
					
				</div>
			
				<div class="form-actions">
				<span class="pull-right"><button type="submit" name="btnRst" class="btn btn-success" /> Submit</button></span>
			</div>
		</form>
	</div>
	
	<script src="js/jquery.min.js"></script>  
	<script src="js/matrix.login.js"></script> 
</body>

</html>
