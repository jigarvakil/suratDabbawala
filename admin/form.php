<?php
    include_once('connection.php');
    include_once("check_session.php");
	$role=$_GET['role'];
	$id=$_GET['id'];
	if($role==1)
	{
		$sql="select * from tbl_admin where adminid=$id";
		$res=mysqli_query($con,$sql);
		$row=mysqli_fetch_assoc($res);
	}
	
	if(isset($_POST['btnRst']))
	{
		$pwd=$_POST['password'];
		$cnfpwd=$_POST['confrimpassword'];
		if($role==1)
		{
			if($pwd==$cnfpwd)
			{
				$encpwd=md5($pwd);
				$sql="update tbl_admin set password='$encpwd' and adminid='$id'";
				//echo $sql;
				//exit;
				$res=mysqli_query($con,$sql);
				if($res)
				{
					echo "<script> alert('Password reset successfully'); </script>";
					header("location:index.php");
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
        

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
        <!--[if lt IE 9]>
          <script src="js/html5shiv.js"></script>
          <script src="js/respond.min.js"></script>
        <![endif]-->

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
                   <h3 class="text-center m-t-10"> <strong>Hello <?= $row['adminname']; ?></strong> </h3>
				   <p class="text-center"> Reset your password </p>
                </div> 

                <div class="panel-body">
                    <form class="form-horizontal m-t-10 p-20 p-b-0" method="post">
                                            
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" name="password" type="password" placeholder="new-password">
                            </div>
                        </div>
                        <div class="form-group ">
                            
                            <div class="col-xs-12">
                                <input class="form-control" name="confrimpassword" type="password" placeholder="confrim Password">
                            </div>
                        </div>

                       
                        <div class="form-group text-right">
                            <div class="col-xs-12">
                                <button class="btn btn-success w-md" name="btnRst" type="submit">Submit</button>
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
            
        
		

    
    </body>

</html>
