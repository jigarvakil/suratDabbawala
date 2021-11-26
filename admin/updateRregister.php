<?php
	
	include_once('connection.php');
	include_once("check_session.php");
	$id=0;
	if(isset($_REQUEST['id']))
	{
		$id=$_REQUEST['id'];
		$sql="SELECT * FROM `tbl_restaurant` where restid=$id";
		$result=mysqli_query($con,$sql);
		$row=mysqli_fetch_assoc($result) ;
	}
	
	if(isset($_REQUEST['add']))
	{
		$id=$_REQUEST['id'];
		$restname=$_REQUEST['restname'];
		$email=$_REQUEST['email'];
		$ownername=$_REQUEST['ownername'];
		$address=$_REQUEST['address'];
		$mobileno=$_REQUEST['mobileno'];
		$opentime=$_REQUEST['opentime'];
		$closetime=$_REQUEST['closetime'];
		$query="UPDATE `tbl_restaurant` SET `restname` = '$restname', `email` = '$email', `ownername` = '$ownername', `address` ='$address', `mobileno` = '$mobileno', `opentime` = '$opentime', `closetime` = '$closetime' WHERE `tbl_restaurant`.`restid` = $id";
		
		if(mysqli_query($con,$query) or die(mysql_error)){
			echo "<script type='text/javascript'>alert('Update success');</script>";
			header("location:Rregister.php");
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
							<h3 class="panel-title">Restaurant Registration</h3>
						</div>
					
                                <div class=" form p-20" method="post">
                                    <form class="cmxform form-horizontal tasi-form" id="commentForm" method="post" action="#" novalidate="novalidate">
                                       
			                            <div class="form-group ">
                                            <label for="restname" class="control-label col-lg-2">Restaurant Name</label>
                                            <div class="col-lg-5">
                                                <input class="form-control " id="restname" value="<?= $row['restname'] ?>" type="text" name="restname">
											</div>
										</div>
                                        <div class="form-group ">
                                            <label for="email" class="control-label col-lg-2">Email</label>
                                            <div class="col-lg-5">
                                                <input class="form-control" value="<?= $row['email'] ?>" id="email" type="email" name="email">
											</div>
										</div>
										<div class="form-group ">
                                            <label for="ownername" class="control-label col-lg-2">Owner Name</label>
                                            <div class="col-lg-5">
                                                <input class="form-control" value="<?= $row['ownername'] ?>" id="ownername" type="text" name="ownername">
											</div>
										</div>
										<div class="form-group ">
                                            <label for="address" class="control-label col-lg-2">Address</label>
                                            <div class="col-lg-5">
                                                <input class="form-control" value="<?= $row['address'] ?>" id="address" type="text" name="address">
											</div>
										</div>
										<div class="form-group ">
                                            <label for="mobileno" class="control-label col-lg-2">Mobile no</label>
                                            <div class="col-lg-5">
                                                <input class="form-control" value="<?= $row['mobileno'] ?>" id="mobileno" type="text" name="mobileno">
											</div>
										</div>
												<div class="form-group ">
                                            <label for="opentime" class="control-label col-lg-2">Open Time</label>
                                            <div class="col-lg-5">
                                                <input class="form-control" value="<?= $row['opentime'] ?>" id="opentime" type="time" name="opentime">
											</div>
										</div>
												<div class="form-group ">
                                            <label for="closetime" class="control-label col-lg-2">Close Time</label>
                                            <div class="col-lg-5">
                                                <input class="form-control" value="<?= $row['closetime'] ?>" id="closetime" type="time" name="closetime">
											</div>
										</div>
												</br>
												<div class="form-group">
													<div class="col-lg-offset-2 col-lg-5">
														<button class="btn btn-success" name="add" type="submit">Add</button>
														<button class="btn btn-danger"  name="cancel" type="reset">Cancel</button>
													</div>
												</div>
											</form>
											
										</div> 
									</div> 
								</div> 
							</div>
						</div>	
					</div>
					</div>
					
					
    
<?php include_once ("down_link.php")?>
    </body>

</html>


            </div>
			<?php include_once('footer.php'); ?>



        </section>
        
