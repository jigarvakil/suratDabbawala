<?php
	
	include_once('connection.php');
	
	if(isset($_POST['btnEmail']))
	{
		//echo "hello";
	//	exit;
		$role=3;
		$email=$_POST['txtemail'];
		if($role==3)
		{
			$sql="select * from tbl_dabbawala where email='$email'";
			$res= mysqli_query($con,$sql);
			$numrows=mysqli_num_rows($res);
			$row=mysqli_fetch_assoc($res);
			
			if($numrows>0)
			{
				$msg=" Email Found";
				$to=$email;
				$subject= "Reset Password";
				
				$message= "
				Hello $row[firstname], <br>
				<br>
				<br>
				please click this link to reset your password:
				<br>
				<a href='http://localhost/sd/dabbawala/password.php?id=$row[dbuserid]&role=$role'  >Click Here</a>
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
						header("location:login.php");
				}
				else
				{
					header("location:recoverpwd.php?msg=Mail Not Sent");
					//$msg=""; 
				}
			}		
		}
	}
    
	
	
	
?>

<!DOCTYPE html>
<html lang="en">

    
<head>
        <meta charset="utf-8" />
        <title>Recover page | Dabbawala</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Responsive bootstrap 4 admin template" name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-stylesheet" />

    </head>

    <body class="authentication-page">

        <div class="account-pages my-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card mt-4">
                            <div class="card-header text-center p-4 bg-primary">
                                <h4 class="text-white mb-0 mt-0"><img src="assets/images/Surat Dabbawala.png" alt="" height="40"></h4>
                                <h5 class="text-white font-13 mb-0">Reset Password</h5>
                            </div>
                            <div class="card-body">
                                <form action="#" method="post" class="p-2">

                                    <p class="text-muted text-center mb-4">Enter your email address and we'll send you an email with instructions to reset your password. </p>

                                    <div class="form-group mb-0">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Enter Email" name="txtemail">
                                            <span class="input-group-append"> <button type="submit" class="btn btn-primary" name="btnEmail">Reset</button> </span>
                                        </div>

                                    </div>
                                </form>

                            </div>
                           
                        </div>
                        
                    </div>
                    </div>
                
            </div>
        </div>

        <script src="assets/js/vendor.min.js"></script>
<script src="assets/js/app.min.js"></script>

    </body>


</html>