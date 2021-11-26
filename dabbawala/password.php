<?php
    include_once('connection.php');
    include_once("check_session.php");
	$role=$_GET['role'];
	$id=$_GET['id'];
	if($role==3)
	{
		$sql="select * from tbl_dabbawala where dbuserid=$id";
		$res=mysqli_query($con,$sql);
		$row=mysqli_fetch_assoc($res);
	}
	
	if(isset($_POST['btnRst']))
	{
		$pwd=$_POST['password'];
		$cnfpwd=$_POST['confrimpassword'];
		if($role==3)
		{
			if($pwd==$cnfpwd)
			{
				$encpwd=md5($pwd);
				$sql="update tbl_dabbawala set password='$encpwd' where	 dbuserid='$id'";
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
        <meta charset="utf-8" />
        <title>Forgot password | Dabbawala</title>
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

                                <div class="control-group normal_text">
					                    <h4 class="text-center m-t-10"> <strong>Hello <?= $row['firstname']; ?></strong> </h4>
					                    <h6>RESET YOUR PASSWORD</h6>
				                </div>
                                <hr style="border: 2px solid #0086AD;">
                                    <div class="form-group mb-3">
                                        <label for="password">Password :</label>
                                        <input class="form-control" type="password" required="Please enter password" id="password" name="password" placeholder="Enter your password">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="password">Confirm Password :</label>
                                        <input class="form-control" type="password" name="confrimpassword" required="Please enter password" id="password" placeholder="Enter your confirm password">
                                    </div>
                                    
</br>
                                    <div class="form-group row text-center mt-4 mb-4">
                                        <div class="col-12">
                                            <button class="btn btn-md btn-block btn-primary waves-effect waves-light" name="btnRst" type="submit">Submit</button>
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