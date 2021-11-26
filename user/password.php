<?php
	include_once('connection.php');
	include_once("check_session.php");
	$role=$_GET['role'];
	$id=$_GET['id'];
	if($role==2)
	{
		$sql="select * from tbl_user where userid=$id";
		$res=mysqli_query($con,$sql);
		$row=mysqli_fetch_assoc($res);
	}
	
	if(isset($_POST['btnRst']))
	{
		$pwd=$_POST['password'];
		$cnfpwd=$_POST['confrimpassword'];
		if($role==2)
		{
			if($pwd==$cnfpwd)
			{
				$encpwd=md5($pwd);
				$sql="update tbl_user set password='$encpwd' where email='$email'";
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
	<title>Forgot pwd | User</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/18.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<form class="login100-form validate-form" method="post">
					<span class="login100-form-title p-b-49">
                    <h4 class="text-center m-t-10">
                    <strong>Hello <?= $row['firstname']; ?></strong> </h4>
                    <h6>RESET YOUR PASSWORD</h6> 
					</span>
				
					<div class="wrap-input100 validate-input" data-validate="Email is required">
                        <span class="label-input100"><b>Password:</b></span>
						<input class="input100" type="password" name="password" placeholder="Type your password">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>
                    <div class="wrap-input100 validate-input" data-validate="Email is required">
                        <span class="label-input100"><b>Confirm Password:</b></span>
						<input class="input100" type="password" name="confrimpassword" placeholder="Type your confirm password">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>
					
                    <br>
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" name="btnEmail">
								Submit
							</button>
						</div>
					</div>

					<br>
					
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>