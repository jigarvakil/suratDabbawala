<?php
	session_start();
	include_once('connection.php');
	if(isset($_POST['BtnLogin']))
	{
		$user=$_POST['txtuser'];
		$password=$_POST['txtpassword'];
		$encpwd=md5($password);
		$sql="select * from tbl_admin where userid='$user' and password='$encpwd'" ;
		$res=mysqli_query($con,$sql);
		$row=mysqli_fetch_assoc($res);
		
		$numrow=mysqli_num_rows($res);
		if($numrow==1)
		{
			$_SESSION['adminid']=$row['adminid'];
			$_SESSION['adminname']=$row['userid'];
			header("location:dashboard.php");
		}
		else
		{
			header("location:index.php?err=PLEASE CHECK YOUR USERNAME AND PASSWORD");
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

        <title>Admin - LogIn</title>

        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-reset.css" rel="stylesheet">

        <!--Animation css-->
        <link href="css/animate.css" rel="stylesheet">

        <!--Icon-fonts css-->
        <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href="assets/ionicon/css/ionicons.min.css" rel="stylesheet" />
        <link href="assets/material-design-iconic-font/css/material-design-iconic-font.min.css" rel="stylesheet" />

        <!-- Custom styles for this template -->
        <link href="css/style.css" rel="stylesheet">
        <link href="css/helper.css" rel="stylesheet">
		<script src='https://kit.fontawesome.com/a076d05399.js'></script>

        


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
                   <h3 class="text-center m-t-10"> 
				   <i class='fas fa-user-circle' style='font-size:70px'></i>
					    </h3>
                </div> 

                <div class="panel-body">
                    <form class="form-horizontal m-t-10 p-20 p-b-0" method="post">
                                            
                        <div class="form-group ">
						
                            <div class="col-xs-12 input-group">
									<span class="input-group-addon"><i class="fa fa-user"></i></span>
										<input class="form-control" name="txtuser" type="text" placeholder="Username"/>
                            </div>
                        </div>
                        <div class="form-group "> 
                            <div class="col-xs-12 input-group">
                                <span class="input-group-addon">
									<i class="fa fa-lock"></i></span>
									<input class="form-control" name="txtpassword" type="password" placeholder="Password"/>
                            </div>
                        </div>

                       
                        <div class="form-group text-right">
                            <div class="col-xs-12">
                                <button class="btn btn-success w-md" name="BtnLogin" type="submit">Log In</button>
                            </div>
                        </div>
                        <div class="form-group m-t-30">
                            <div class="col-sm-7">
                                <a href="recoverpwd.php"><i class="fa fa-lock m-r-5"></i> <b>Forgot Your Password?</b></a>
                            </div>
                            
                        </div>
						<strong class="text-danger">
						<?php 
							if(isset($_GET['err']))
							{
								echo $_GET['err'];
							}
						?>
						</strong>
						
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
