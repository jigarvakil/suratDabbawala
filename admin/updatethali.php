<?php
	
	include_once('connection.php');
	include_once("check_session.php");
	$id=0;
	if(isset($_REQUEST['id']))
	{
		$id=$_REQUEST['id'];
		$sql="SELECT * FROM `tbl_dishtype` where tid=$id";
		$result=mysqli_query($con,$sql);
		$row=mysqli_fetch_assoc($result) ;
		
	}
	
	if(isset($_REQUEST['add']))
	{
		$id=$_REQUEST['id'];
		$typename=$_REQUEST['typename'];
		$query="UPDATE `tbl_dishtype` SET `typename` = '$typename' WHERE `tbl_dishtype`.`tid` = $id";
		
		if(mysqli_query($con,$query) or die(mysql_error)){
			echo "<script type='text/javascript'>alert('Update success');</script>";
			header("location:thali.php");
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
							<h3 class="panel-title">THALI</h3>
						</div>
					        <div class=" form p-20" >
                                    <form method="post" class="cmxform form-horizontal tasi-form" id="commentForm" method="get" action="#" novalidate="novalidate">
										
			                            <div class="form-group ">
                                            <label for="typename" class="control-label col-lg-2">Thali Name</label>
                                            <div class="col-lg-5">
                                                <input class="form-control " id="typename" value="<?= $row['typename'] ?>" type="text" name="typename">
											</div>
										</div>
										</br>
										<div class="form-group">
											<div class="col-lg-offset-2 col-lg-5">
												<button class="btn btn-success" name="add" type="submit">Submit</button>
												
											</div>
										</div>
									</form>
							</div>
						</div> 
					</div>
				</div>	
			</div>
		</div>
					
<?php include_once ("down_link.php")?>
    </body>
</html>
			<?php include_once('footer.php'); ?>

        </section>
