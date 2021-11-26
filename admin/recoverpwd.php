<?php
	
	include_once('connection.php');
	if(isset($_POST['btnEmail']))
	{
		$role=1;
		$email=$_POST['txtemail'];
		if($role==1)
		{
			$sql="select * from tbl_admin where email='$email'";
			$res= mysqli_query($con,$sql);
			$numrows=mysqli_num_rows($res);
			$row=mysqli_fetch_assoc($res);
			
			if($numrows>0)
			{
				//$msg=" Email Found";
				$to=$email;
				$subject= "Reset Password";
				$message= "
				Hello $row[adminname], <br>
				<br>
				<br>
				please click this link to reset your password:
				<br>
				<a href='http://localhost/sd/admin/form.php?id=$row[adminid]&role=$role'  >Click Here</a>
				";
				
				require '../PHPMailer-master/PHPMailerAutoload.php';
				$mail = new PHPMailer();
				
				//Enable SMTP debugging.
				$mail->SMTPDebug = 1;
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
				$mail->Password = "jigar0011";
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
					header("location:index.php");
				}
				else
				{
					//header("location:recoverpwd.php?msg=Mail Not Sent");
					
					exit;
					//$msg=""; 
				}
			}		
		}
	}
    
	
	
	
?>
<!DOCTYPE html>
<html lang="en">
	
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
		
		<link rel="shortcut icon" href="img/favicon_1.ico">
	
	<title>Recover Password</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-reset.css" rel="stylesheet">
	<link href="css/animate.css" rel="stylesheet">
	<link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
	<link href="assets/ionicon/css/ionicons.min.css" rel="stylesheet" />
	<link href="assets/material-design-iconic-font/css/material-design-iconic-font.min.css" rel="stylesheet" />
	
	<!-- Custom styles for this template -->
	<link href="css/style.css" rel="stylesheet">
	<link href="css/helper.css" rel="stylesheet">
	
	
	
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','../../../www.google-analytics.com/analytics.js','ga');
		
		ga('create', 'UA-62751496-1', 'auto');
		ga('send', 'pageview');
		
	</script>
	
	</head>
	
	
	<body>
		
		<div class="wrapper-page">
			<div class="panel panel-color panel-inverse">
				
				<div class="panel-heading"> 
					<h3 class="text-center m-t-10"> Recover Password </h3>
				</div> 
				
				<div class="panel-body">
					<form method="post" role="form" class="text-center"> 
						<div class="alert alert-info alert-dismissable">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							Enter your <b>Email</b> and instructions will be sent to you!
						</div>
						<br>
						<div class="form-group m-b-0"> 
							
							<div class="input-group"> 
								<input type="email" name="txtemail" class="form-control" placeholder="Enter Email"> 
								<span class="input-group-btn"> <button name="btnEmail" type="submit" class="btn btn-success">Reset</button> </span> 
							</div> 
						</div> 
						
					</form>
				</div>
				
				
				
			</div>
		</div>
	
	<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/pace.min.js"></script>
		<script src="js/wow.min.js"></script>
		<script src="js/jquery.nicescroll.js" type="text/javascript"></script>
		<script src="js/jquery.app.js"></script>
		
		
	</body>
	</html>
