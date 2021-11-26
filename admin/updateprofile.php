<?php
	
	include_once('connection.php');
	include_once("check_session.php");
	$id=0;
	if(isset($_REQUEST['id']))
	{
		$id=$_REQUEST['id'];
		$sql="SELECT * FROM `tbl_aprofile` where aid=$id";
		$result=mysqli_query($con,$sql);
		$row=mysqli_fetch_assoc($result) ;
	}
	
	if(isset($_REQUEST['add']))
	{
		$id=$_REQUEST['id'];
		$fname=$_REQUEST['fname'];
        $email=$_REQUEST['email'];
        $address=$_REQUEST['address'];
		$username=$_REQUEST['username'];
		$query="UPDATE `tbl_aprofile` SET `fname` = '$fname', `email` = '$email', `address` = '$address', `username` = '$username' WHERE `tbl_aprofile`.`aid` = $id";
		
		if(mysqli_query($con,$query) or die(mysql_error)){
			echo "<script type='text/javascript'>alert('Update success');</script>";
			header("location:adminprofile.php");
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
                        <div class="bg-picture" style="background-image:url('img/bg_6.jpg')">
                          <span class="bg-picture-overlay"></span><!-- overlay -->
                          <!-- meta -->
                          <div class="box-layout meta bottom">
                            <div class="col-sm-6 clearfix">
                              <span class="img-wrapper pull-left m-r-15"><img src="img/2.jpg" alt="" style="width:64px" class="br-radius"></span>
                              <div class="media-body">
                                <h4 class="text-white mb-2 m-t-10 ellipsis">Pooja Vankhede</h4>
                                <h4 class="text-white mb-2 m-t-10 ellipsis">Pintu Savani</h4>
                                <h6 class="text-white"> Surat</h6>
                              </div>
                            </div>
                            
                          <!--/ meta -->
                        </div>
                    </div>
                </div>

                <div class="row m-t-30">
                    <div class="col-sm-8">
                        <div class="panel panel-default p-0">
                            <div class="panel-body p-0"> 
                            
                                <div class="tab-content m-0"> 

                                                   </div> 
                    </div>
                </div>

                <div id="edit-profile" class="tab-pane">
                                    <div class="user-profile-content">
                                        <form role="form" method="post">
                                            <div class="form-group">
                                                <label for="FullName">Full Name :</label>
                                                <input type="text"  id="fname" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email :</label>
                                                <input type="email" id="email" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="address">Address :</label>
                                                <input type="text" id="address" class="form-control">
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="username">User Name :</label>
                                                <input type="text" id="username" class="form-control">
                                            </div>
                                            <button class="btn btn-primary" name="add" type="submit">Save</button>
                                        </form>
                                    </div>
                                </div>
           
            </div>
            
                                
    </body>
</html>
			<?php include_once('footer.php'); ?>

        </section>
