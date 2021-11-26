<?php
	include_once('connection.php');
	include_once("check_session.php");
	$id=$_GET['id'];
	$lid=$_GET['lid'];
	
	$sql="select * from tbl_dabbawala where dbuserid=$id";
	$res=mysqli_query($con,$sql);
	$row=mysqli_fetch_assoc($res);
	$sql1="select * from tbl_leave where leaveid=$lid";
	$res1=mysqli_query($con,$sql1);
	$row1=mysqli_fetch_assoc($res1);
	
	$sql3="update tbl_leave set status='2' where leaveid=$lid";
	if(mysqli_query($con,$sql3))
	{
		
		$email=$row['email'];
		
		$to=$email;
		$subject= "Leave Reject";
		$message= "
		Hello $row[firstname], <br>
		<br>
		<br>
		Your leave is Rejected
		
		Leave Details : <br>
		
		Date : $row1[date] <br>
		NO of Days : $row1[no_of_days] <br>
		reason : $row1[reason] <br>
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
		header("location:leave.php");
		}
		else
		{
		}
		}
	?>	