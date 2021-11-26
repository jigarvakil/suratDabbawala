<?php
	include_once('connection.php');
	include_once("check_session.php");
	$id=$_GET['id'];
	
	$sql="select * from tbl_restaurant where restid=$id";
	$res=mysqli_query($con,$sql);
	$row=mysqli_fetch_assoc($res);
	
	$sql3="update tbl_restaurant set status='2' where restid=$id";
	if(mysqli_query($con,$sql3))
	{
		
		$email=$row['email'];
		
		$to=$email;
		$subject= " Not Approved Restaurant";
		$message= "
		Hello $row[restname], <br>
		<br>
		<br>
		Your Not Approved Restaurant Details
		
		Restaurant Details : <br>
		
		Restaurant Name : $row[restname] <br>
		Email : $row[email] <br>
		Owner Name : $row[ownername] <br>
		Address : $row[address] <br>
		Mobile No : $row[mobileno] <br>
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
		header("location:Rregister.php");
		}
		else
		{
		}
		}
	?>	