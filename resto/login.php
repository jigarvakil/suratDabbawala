
<?php
	session_start();
	include_once('connection.php');
	if(isset($_POST['BtnLogin']))
	{
		
		$email=$_POST['txtemail'];
		$password=$_POST['txtpassword'];
		$encpwd=md5($password);
		$sql="select * from tbl_restaurant where email='$email' and password='$encpwd'" ;
		
		$res=mysqli_query($con,$sql);
		$row=mysqli_fetch_assoc($res);
		
		 $numrow=mysqli_num_rows($res);
		
		if($numrow==1)
		{
			
			 $_SESSION['restid']=$row['restid'];
			 $_SESSION['email']=$row['email'];
			
			header("location:dashboard.php");
		}
		else
		{
			header("location:login.php?err=PLEASE CHECK YOUR EMAIL AND PASSWORD");
		}
	}
?>

<?php
	
	include_once('connection.php');
	
	if(isset($_POST['btnEmail']))
	{
		//echo "hello";
	//	exit;
		$role=4;
		$email=$_POST['txtemail'];
		if($role==4)
		{
			$sql="select * from tbl_restroadmin where email='$email'";
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
				<a href='http://localhost/sd/resto/password.php?id=$row[adminid]&role=$role'  >Click Here</a>
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
				$mail->Username = "suratdabbawala@gmail.com";
				$mail->Password = "dabbawala0011";
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
					header("location:login.php?msg=Mail Not Sent");
					//$msg=""; 
				}
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
            <form id="loginform" class="form-vertical" method="post">
				 <div class="control-group normal_text"> <img src="img/Surat Dabbawala.png" class="img-circle" alt="Logo" width="30%" height="10%" /></div>
                
                    <div class="controls">
                        <div class="main_input_box">
                             <span class="add-on bg_lg"><i class="icon-user"> </i></span><input type="text" name="txtemail" placeholder="Email" />
                        </div>
                
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password" name="txtpassword" placeholder="Password" />
                        </div>
                    </div>
                </div>
				
                <div class="form-actions">
                    <span class="pull-left"><a href="#" class="flip-link btn btn-info" id="to-recover">Lost password?</a></span>
                    <span class="pull-right"><button type="submit" name="BtnLogin" class="btn btn-success" /> Login</button></span>
                </div>
            </form>
			<strong class="text-danger">
			<?php 
							if(isset($_GET['err']))
							{
								echo $_GET['err'];
							}
						?>
						</strong>



<form id="recoverform" method="post" class="form-vertical">
				<p class="normal_text">Enter your e-mail address below and we will send you instructions how to recover a password.</p>
				
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lo"><i class="icon-envelope"></i></span><input type="text" name="txtemail" placeholder="E-mail address" />
                        </div>
                    </div>
               
                <div class="form-actions">
                    <span class="pull-left"><a href="#" class="flip-link btn btn-success" id="to-login">&laquo; Back to login</a></span>
                    <span class="pull-right"><button type="submit" name="btnEmail" class="btn btn-info"/>Recover</button></span>
                </div>
				
						            </form>

        


        </div>
        
        <script src="js/jquery.min.js"></script>  
        <script src="js/matrix.login.js"></script> 
    </body>

</html>
