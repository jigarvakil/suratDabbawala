<?php
	
	include_once('connection.php');
	include_once('check_session.php');
	if(isset($_REQUEST['submit']))
	{
		$restname=$_REQUEST['restname'];
		$email=$_REQUEST['email'];
		
		$to=$email;
		$subject= "Restro Registration";
		$message= "
		Hello $restname, <br>
		<br>
		<br>
		Please register your restro by clicking link below <br>
		<a href='http://localhost/sd/resto/register.php?restname=$restname&email=$email'>Click Here </a>
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
			header("location:restro.php?restname=".$restname."&email=".$email);
		}
		else
		{
		}
		
	}
	
?>


<!DOCTYPE html>
<html lang="en">
    
	<head>
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">
		
        <link rel="shortcut icon" href="img/favicon_1.ico">
		
        <title> Admin  </title>
		<?php include_once ("up_link.php")?>
		<style>
			form .error
			{
			color:red;
			}
		</style>
		
	</head>
	
	
    <body>
		
		<?php include_once('navigation.php'); ?>
		
		<section class="content">
        	
			<?php include_once('header.php'); ?>
			
			<div class="wraper container-fluid">
				
                <div class="row">
                    <div class="col-sm-12">
						<div class="panel panel-color panel-inverse">
							<div class="panel-heading">
								<h3 class="panel-title">RESTAURANT</h3>
							</div>
							
                            <div class="panel-body">
								<div class="page-title"> 
									<h2 class="title"></h2> 
								</div>
                                <div class=" form p-20">
                                    <form class="cmxform form-horizontal tasi-form" name="f1" id="commentForm" method="post">
                                        <div class="form-group ">
                                            <label for="restname" class="control-label col-lg-2">Restaurant Name</label>
                                            <div class="col-lg-10">
                                                <input class="form-control " id="restname" type="text" name="restname" placeholder="Enter Restaurant Name">
												
											</div>
										</div>
										
										<div class="form-group ">
											<label for="password" class="control-label col-lg-2">E-mail</label>
                                            <div class="col-lg-10">
												<input class="form-control "  pattern="/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/" id="email" type="text" name="email" placeholder="Enter Restaurant E-mail">
											</div>
										</div>
										
										
										
										<div class="form-group">
											<div class="col-lg-offset-2 col-lg-10">
												<button class="btn btn-success" name="submit" type="submit">Send</button>
												<button class="btn btn-danger"  name="cancel" type="button">Cancel</button>
											</div>
											
										</form>
									</div> 
								</div> 
							</div> 
						</div>
					</div>	
				</div>
			
								
									<?php include_once ("down_link.php")?>
									<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
									<script>
		$("form[name='f1']").validate({
				rules: 
				{
					name:
					{
						required: true,
						minlength:2,
						maxlength:20,
					},
					email:
					{
						required: true,
					}
				},
				messages: 
				{
					name:
					{
						required: "Please enter your Restaurant name",
						minlength:"Minimum 3 length needed",
						maxlength:"Sorry only 20 character is needed"
					},
					email:
					{
						required: "Please enter your Email",
					}
				},
				submitHandler: function(form) {
					form.submit();
				}
			});
									</script>
									</body>
									
									</html>
									
									<?php include_once('footer.php'); ?>
									
									
									
									</section>
									
																