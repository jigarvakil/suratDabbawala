<?php
	
	include_once('connection.php');
	include_once("check_session.php");
	$id=0;
	if(isset($_REQUEST['id']))
	{
		$id=$_REQUEST['id'];
		$sql="SELECT * FROM `tbl_package` where pid=$id";
		$result=mysqli_query($con,$sql);
		$row=mysqli_fetch_assoc($result) ;
	}
	
	if(isset($_REQUEST['add']))
	{
		$id=$_REQUEST['id'];
		$pname=$_REQUEST['pname'];
		$remark=$_REQUEST['remark'];
		$price=$_REQUEST['price'];
		$description=$_REQUEST['description'];
		$query="UPDATE `tbl_package` SET `pname` = '$pname',`remark` = '$remark', `price` = '$price',`description` = '$description' WHERE `tbl_package`.`pid` = $id";
		
		if(mysqli_query($con,$query) or die(mysql_error)){
			echo "<script type='text/javascript'>alert('Update success');</script>";
			header("location:package.php");
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
							<h3 class="panel-title">Package</h3>
						</div>
					
                            <div class="panel-body">
							 <div class="page-title"> 
                    
				</div>
                                <div class=" form p-20">
                                    <form method="post" name="f1" class="cmxform form-horizontal tasi-form" id="commentForm" method="get" action="#" novalidate="novalidate">
                                       
			                            <div class="form-group ">
                                            <label for="Normalcharge" class="control-label col-lg-2">Package Name</label>
                                            <div class="col-lg-5">
                                                <input class="form-control " id="pname" value="<?= $row['pname'] ?>" type="text" name="pname">
											</div>
										</div>
										<div class="form-group ">
                                            <label for="Normalcharge" class="control-label col-lg-2">Remark</label>
                                            <div class="col-lg-5">
                                                <input class="form-control " id="remark" value="<?= $row['remark'] ?>" type="text" name="remark">
											</div>
										</div>
                                        
                                        <div class="form-group ">
                                            <label for="Urgentcharge" class="control-label col-lg-2">Price</label>
                                            <div class="col-lg-5">
                                                <input class="form-control " id="price" value="<?= $row['price'] ?>" type="text" name="price">
											</div>
										</div>
										<div class="form-group ">
                                            <label for="Normalcharge" class="control-label col-lg-2">Description</label>
                                            <div class="col-lg-5">
                                                <input class="form-control " id="description" value="<?= $row['description'] ?>" type="text" name="description">
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
						pname:
						{
							required: true,
						},
						remark:
						{
							required: true,
						},
						price:
						{
							required: true,
						},
						description:
						{
							required: true,
						}
					},
					// Specify validation error messages
					messages: 
					{
						pname:
						{
							required: "Please enter your package name",
						},
						remark:
						{
							required: "Please enter your package remark",
						},
						price:
						{
							required: "Please enter your package price",
						},
						description:
						{
							required: "Please enter your package description",
						}
					},
					submitHandler: function(form) {
						form.submit();
					}
				});
			</script>

    </body>
</html>

			<?php include_once('footer.php'); ?>


        </section>
        
