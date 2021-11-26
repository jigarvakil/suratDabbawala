<?php
	session_start();
	include_once('connection.php');
	if(isset($_POST['BtnLogin']))
	{
		
		$email=$_POST['txtemail'];
		$password=$_POST['txtpassword'];
		$encpwd=md5($password);
		$sql="select * from tbl_dabbawala where email='$email' and password='$encpwd'" ;
		$res=mysqli_query($con,$sql);
		$row=mysqli_fetch_assoc($res);
		
		 $numrow=mysqli_num_rows($res);
		
		if($numrow==1)
		{
			$_SESSION['dbuserid']=$row['dbuserid'];
			$_SESSION['email']=$row['email'];
			header("location:dashboard.php");
		}
		else
		{
			header("location:login.php?err=PLEASE CHECK YOUR EMAIL AND PASSWORD");
		}
	}
?>

<!DOCTYPE html>
<html lang="en">

 <head>
        <meta charset="utf-8" />
        <title>Login page | Dabbawala</title>
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
                            <div class="card-header p-4 bg-primary">
                                <h4 class="text-white text-center mb-0 mt-0">  <img src="assets/images/Surat Dabbawala.png" alt="" height="40"></h4>
                            </div>
                            <div class="card-body">
                                <form action="#" method="post" class="p-2">

                                    <div class="form-group mb-3">
                                        <label for="email">Email :</label>
                                        <input class="form-control" type="email" name="txtemail" required placeholder="Enter your email">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="password">Password :</label>
                                        <input class="form-control" type="password" required="Please enter password" id="password" name="txtpassword" placeholder="Enter your password">
                                    </div>

                                    <div class="form-group mb-4">
                                        <div class="col-sm-12 text-right">
                                            <a href="recoverpwd.php" class="text-muted float-right">Forgot your password?</a>
                                        </div>
                                    </div>
</br>
                                    <div class="form-group row text-center mt-4 mb-4">
                                        <div class="col-12">
                                            <button class="btn btn-md btn-block btn-primary waves-effect waves-light" name="BtnLogin" type="submit">Sign In</button>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-sm-12 text-center">
                                            <p class="text-muted mb-0">Don't have an account? <a href="register.php" class="text-dark m-l-5"><b>Sign Up</b></a></p>
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