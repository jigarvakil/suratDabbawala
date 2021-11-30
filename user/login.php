<?php
	session_start();
	include_once('connection.php');
	if(isset($_POST['BtnLogin']))
	{
		
		$email=$_POST['txtemail'];
		$password=$_POST['txtpassword'];
		$encpwd=md5($password);
		$sql="select * from tbl_user where email='$email' and password='$encpwd'" ;
		$res=mysqli_query($con,$sql);
		$row=mysqli_fetch_assoc($res);
		
		 $numrow=mysqli_num_rows($res);
		
		if($numrow==1)
		{
			$_SESSION['userid']=$row['userid'];
			$_SESSION['email']=$row['email'];
			setcookie('userid', $row['userid'], time() + (86400 * 30), "/"); 
			setcookie('email', $row['email'], time() + (86400 * 30), "/"); 
			header("location:index.php");
		}
		else
		{
			header("location:login.php?err=PLEASE CHECK YOUR EMAIL AND PASSWORD");
		}
	}
?>

<?php
	
	if(isset($_REQUEST['submit']))
	{
		$email1=$_POST['email'];
		$password=$_POST['password'];
		$cnfpwd=$_POST['cnfpwd'];
		
			if($password==$cnfpwd)
			{
		$encpwd=md5($password);
		 $query="INSERT INTO tbl_user(`userid`,`email`,`password`) VALUES(NULL,'$email1','$encpwd')";
		$res=mysqli_query($con,$query);
		if($res)
		{
			$_SESSION['userid']=mysqli_insert_id($con);
			$_SESSION['email']=$email;

			echo "<script type='text/javascript'>alert('insert success');</script>";
			header("location:user.php?&email=".$email1);
		}
		else
		{
			header("location:user.php?&email=".$email1);
		}
		
	}
		
	
}
	
?>


<html>
	<head>
		<title>User | Login</title>
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<style>
			
			@import url('https://fonts.googleapis.com/css?family=Mukta');
			body{
			font-family: 'Mukta', sans-serif;
			height:100vh;
			min-height:550px;
			background: url('../user/assets/img/slider/18.jpg');
			background-repeat: no-repeat;
			background-size:cover;
			background-position:center;
			position:relative;
			overflow-y: hidden;
			}
			a{
			text-decoration:none;
			color:#444444;
			}
			.login-reg-panel{
			position: relative;
			top: 50%;
			transform: translateY(-50%);
			text-align:center;
			width:70%;
			right:0;left:0;
			margin:auto;
			height:400px;
			background-color: rgba(236, 48, 20, 0.9);
			}
			.white-panel{
			background-color: rgba(255,255, 255, 1);
			height:500px;
			position:absolute;
			top:-50px;
			width:50%;
			right:calc(50% - 50px);
			transition:.3s ease-in-out;
			z-index:0;
			box-shadow: 0 0 15px 9px #00000096;
			}
			.login-reg-panel input[type="radio"]{
			position:relative;
			display:none;
			}
			.login-reg-panel{
			color:#B8B8B8;
			}
			.login-reg-panel #label-login, 
			.login-reg-panel #label-register{
			border:1px solid #9E9E9E;
			padding:5px 5px;
			width:150px;
			display:block;
			text-align:center;
			border-radius:10px;
			cursor:pointer;
			font-weight: 600;
			font-size: 18px;
			}
			.login-info-box{
			width:30%;
			padding:0 50px;
			top:20%;
			left:0;
			position:absolute;
			text-align:left;
			}
			.register-info-box{
			width:30%;
			padding:0 50px;
			top:20%;
			right:0;
			position:absolute;
			text-align:left;
			
			}
			.right-log{right:50px !important;}
			
			.login-show, 
			.register-show{
			z-index: 1;
			display:none;
			opacity:0;
			transition:0.3s ease-in-out;
			color:#242424;
			text-align:left;
			padding:50px;
			}
			.show-log-panel{
			display:block;
			opacity:0.9;
			}
			.login-show input[type="text"],input[type="email"], .login-show input[type="password"]{
			width: 100%;
			display: block;
			margin:20px 0;
			padding: 15px;
			border: 1px solid #b5b5b5;
			outline: none;
			}
			.login-show input[type="submit"] {
			max-width: 150px;
			width: 100%;
			background: #444444;
			color: #f9f9f9;
			border: none;
			padding: 10px;
			text-transform: uppercase;
			border-radius: 2px;
			float:right;
			cursor:pointer;
			}
			.login-show a{
			display:inline-block;
			padding:10px 0;
			}
			
			.register-show input[type="text"], .register-show input[type="password"]{
			width: 100%;
			display: block;
			margin:20px 0;
			padding: 15px;
			border: 1px solid #b5b5b5;
			outline: none;
			}
			.register-show input[type="submit"] {
			max-width: 150px;
			width: 100%;
			background: #444444;
			color: #f9f9f9;
			border: none;
			padding: 10px;
			text-transform: uppercase;
			border-radius: 2px;
			float:right;
			cursor:pointer;
			}
			.credit {
			position:absolute;
			bottom:10px;
			left:10px;
			color: #3B3B25;
			margin: 0;
			padding: 0;
			font-family: Arial,sans-serif;
			text-transform: uppercase;
			font-size: 12px;
			font-weight: bold;
			letter-spacing: 1px;
			z-index: 99;
			}
			a{
			text-decoration:none;
			color:#2c7715;
			}
			
			
			
		</style>
	</head>
	
	<body>
		<div class="container text-light">
			<nav class="navbar navbar-expand-lg navbar-light">
				<div class="collapse navbar-collapse" id="navbarNavDropdown">
					<ul class="navbar-nav">
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Login
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
								<a class="dropdown-item" href="../admin/index.php">Admin</a>
								<a class="dropdown-item" href="../resto/login.php">Restaurant</a>
								<a class="dropdown-item" href="../dabbawala/login.php">Dabbawala</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>
		</div>
		
		<div class="login-reg-panel">
			<div class="login-info-box">
				<h2>Have an account?</h2>
				<p>Login Now</p>
				<label id="label-register" for="log-reg-show">Login</label>
				<input type="radio" name="active-log-panel" id="log-reg-show"  checked="checked">
			</div>
			
			<div class="register-info-box">
				<h2>Don't have an account?</h2>
				<p>Register Now</p>
				<label id="label-login" for="log-login-show">Register</label>
				<input type="radio" name="active-log-panel" id="log-login-show">
			</div>
			
			<div class="white-panel">
				<div class="login-show">
					<h2>LOGIN</h2>
					<form name="f1" method="post">
						<input type="email" name="txtemail" placeholder="Email" required>
						<input type="password" name="txtpassword" placeholder="Password" required>
						<input type="submit" name="BtnLogin" value="Login">
					</form>
					<a href="resetpwd.php">Forgot password?</a>
				</div>
				<div class="register-show">
					<h2>REGISTER</h2>
					<form name="f1" method="post">
						<input type="email" name="email" placeholder="Email" required>
						<input type="password" name="password" placeholder="Password" required>
						<input type="password" name="cnfpwd" placeholder="Confirm Password" required>
						<input type="submit" name="submit" value="Register">
					</form>
					
				</div>
				
			</div>
			
		</div>
	</body>
	<script>
		
		$(document).ready(function(){
			$('.login-info-box').fadeOut();
			$('.login-show').addClass('show-log-panel');
		});
		
		
		$('.login-reg-panel input[type="radio"]').on('change', function() {
			if($('#log-login-show').is(':checked')) {
				$('.register-info-box').fadeOut(); 
				$('.login-info-box').fadeIn();
				
				$('.white-panel').addClass('right-log');
				$('.register-show').addClass('show-log-panel');
				$('.login-show').removeClass('show-log-panel');
				
			}
			else if($('#log-reg-show').is(':checked')) {
				$('.register-info-box').fadeIn();
				$('.login-info-box').fadeOut();
				
				$('.white-panel').removeClass('right-log');
				
				$('.login-show').addClass('show-log-panel');
				$('.register-show').removeClass('show-log-panel');
			}
		});
		
		
	</script>
	
	
</html>