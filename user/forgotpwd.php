<?php
	
	include_once('connection.php');
	include_once("check_session.php");
	if(isset($_POST['btnEmail']))
	{
		//echo "hello";
	//	exit;
		$role=2;
		$email=$_POST['txtemail'];
		if($role==2)
		{
			$sql="select * from tbl_user where email='$email'";
			$res= mysqli_query($con,$sql);
			$numrows=mysqli_num_rows($res);
			$row=mysqli_fetch_assoc($res);
			
			if($numrows>0)
			{
				//$msg=" Email Found";
				$to=$email;
				$subject= "Reset Password";
				
				$message= "
				Hello $row[firstname], <br>
				<br>
				<br>
				please click this link to reset your password:
				<br>
				<a href='http://localhost/sd/user/password.php?id=$row[userid]&role=$role'  >Click Here</a>
				";
				
				
				require '../PHPMailer-master/PHPMailerAutoload.php';
				$mail = new PHPMailer();
				
				//Enable SMTP debugging.
				$mail->SMTPDebug = 0;
				//Set PHPMailer to use SMTP.
				$mail->isSMTP();
				//Set SMTP host name
				$mail->Host = "smtp.gmail.com";
				$mail->SMTPOptions = array(
				'ssl' => array(
				'verify_peer' => false,
				'verify_peer_name' => false,
				'allow_self_signed' => true
				)
				);
				//Set this to true if SMTP host requires authentication to send email
				$mail->SMTPAuth = TRUE;
				//Provide username and password
				$mail->Username = "gglisggl@gmail.com";
				$mail->Password = "Jigar#00111116";
				//If SMTP requires TLS encryption then set it
				$mail->SMTPSecure = "false";
				$mail->Port = 587;
				//Set TCP port to connect to
				
				$mail->From = "suratdabbawala@gmail.com";
				$mail->FromName = "surat dabbawala";
				
				$mail->addAddress($email);
				
				$mail->isHTML(true);
				
				$mail->Subject = $subject;
				$mail->Body = $message;
				//$mail->AltBody = "This is the plain text version of the email content";
				if($mail->send())
				{
						header("location:login.php");
				}
				else
				{
					header("location:forgotpwd.php?msg=Mail Not Sent");
					//$msg=""; 
				}
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
                        Reset Password
                        <p>Enter your email address and we'll send you an email with instructions to reset your password.</p>

					</span>
				
					<div class="wrap-input100 validate-input" data-validate="Email is required">
                        <span class="label-input100"><b>Email</b></span>
						<input class="input100" type="text" name="txtemail" placeholder="Type your email">
						<span class="focus-input100" data-symbol="&#9993;"></span>
					</div>
					
					<br>
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" name="btnEmail">
								Reset
							</button>
						</div>
					</div>

					<br>
					<div class="flex-c-m">
						<a href="#" class="login100-social-item bg1">
							<i class="fa fa-facebook"></i>
						</a>

						<a href="#" class="login100-social-item bg2">
							<i class="fa fa-twitter"></i>
						</a>

						<a href="#" class="login100-social-item bg3">
							<i class="fa fa-google"></i>
						</a>
					</div>

				
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