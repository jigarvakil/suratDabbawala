<?php
	
	include_once('connection.php');
	include_once("check_session.php");
	$id=0;
	if(isset($_REQUEST['id']))
	{
		$id=$_REQUEST['id'];
		$sql="SELECT * FROM `tbl_chargeinfo` where cid=$id";
		$result=mysqli_query($con,$sql);
		$row=mysqli_fetch_assoc($result) ;
	}
	
	if(isset($_REQUEST['add']))
	{
		$id=$_REQUEST['id'];
		$normal=$_REQUEST['normal'];
		$urgent=$_REQUEST['urgent'];
		$query="UPDATE `tbl_chargeinfo` SET `normal` = '$normal', `urgent` = '$urgent' WHERE `tbl_chargeinfo`.`cid` = $id";
		
		if(mysqli_query($con,$query) or die(mysql_error)){
			echo "<script type='text/javascript'>alert('Update success');</script>";
			header("location:charges.php");
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

        <title> Admin </title>
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
               
						<div class="panel panel-color panel-inverse">
						<div class="panel-heading">
							<h3 class="panel-title">Charges</h3>
						</div>
					
                            <div class="panel-body">
							 <div class="page-title"> 
                    
				</div>
                                <div class=" form p-20">
                                    <form method="post" name="f1" class="cmxform form-horizontal tasi-form" id="commentForm" method="get" action="#" novalidate="novalidate">
                                       
			                            <div class="form-group ">
                                            <label for="Normalcharge" class="control-label col-lg-2">Normal Charge</label>
                                            <div class="col-lg-5">
                                                <input class="form-control " id="Ncharge" value="<?= $row['normal'] ?>" type="text" name="normal">
											</div>
										</div>
                                        <div class="form-group ">
                                            <label for="Urgentcharge" class="control-label col-lg-2">Urgent Charge</label>
                                            <div class="col-lg-5">
                                                <input class="form-control " id="Ucharge" value="<?= $row['urgent'] ?>" type="text" name="urgent">
											</div>
										</div>
												</br>
												<div class="form-group">
													<div class="col-lg-offset-2 col-lg-5">
														<button class="btn btn-success" id="sa-success" name="add" type="submit">Add</button>
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
					
        
<?php include_once ("down_link.php")?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
			<script>
				$("form[name='f1']").validate({
					rules: 
					{
						normal:
						{
							required: true,
							minlength:0,
							maxlength:2,
							
						},
						urgent:
						{
							required: true,
							minlength:0,
							maxlength:2,
						}
					},
					// Specify validation error messages
					messages: 
					{
						normal:
						{
							required: "Please enter your normal charges",
							minlength:"Minimum 0 length needed",
							maxlength:"Sorry only 2 character is needed",
						},
						urgent:
						{
							required: "Please enter your urgent charges",
							minlength:"Minimum 0 length needed",
							maxlength:"Sorry only 2 character is needed",
						}
					},
					submitHandler: function(form) {
						form.submit();
					}
				});
			</script>
			
    </body>
</html>

            </div>
			<?php include_once('footer.php'); ?>



        </section>
