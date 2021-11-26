<?php
	
	include_once('connection.php');
	include_once("check_session.php");
	if(isset($_REQUEST['add']))
	{
		$areaname=$_REQUEST['areaname'];
		$pincode=$_REQUEST['pincode'];
		$latitude=$_REQUEST['latitude'];
		$longitude=$_REQUEST['longitude'];
		$query="insert into tbl_area(areaname,pincode,latitude,longitude) values('$areaname','$pincode','$latitude','$longitude')";
		$res=mysqli_query($con,$query);
		$row=mysqli_fetch_assoc($res);
	
		if(mysqli_query($con,$query)){
			echo "<script type='text/javascript'>alert('insert success');</script>";
		}
		else
		{
			header("location:area.php");
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
						
						<div class="panel panel-color panel-inverse">
							<div class="panel-heading">
								<h3 class="panel-title">Add Area</h3>
							</div>
							
                            <div class="panel-body">
								<div class="page-title"> 
									
								</div>
                                <div class=" form p-20">
                                    <form method="post" name="f1" class="cmxform form-horizontal tasi-form" id="commentForm" method="get" action="#" novalidate="novalidate">
										
			                            <div class="form-group ">
                                            <label for="Title" class="control-label col-lg-2">Area Name</label>
                                            <div class="col-lg-5">
                                                <input class="form-control " id="title" type="text" name="areaname">
											</div>
										</div>
                                        <div class="form-group ">
                                            <label for="reason" class="control-label col-lg-2">Pincode</label>
                                            <div class="col-lg-5">
                                                <input class="form-control " id="reason" type="text" name="pincode">
											</div>
										</div>
										<div class="form-group ">
                                            <label for="latitude" class="control-label col-lg-2">latitude</label>
                                            <div class="col-lg-5">
                                                <input class="form-control " id="latitude" type="text" name="latitude">
											</div>
										</div>
										<div class="form-group ">
                                            <label for="longitude" class="control-label col-lg-2">longitude</label>
                                            <div class="col-lg-5">
                                                <input class="form-control " id="longitude" type="text" name="longitude">
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
					areaname:
					{
						required: true,
						minlength:3,
						maxlength:20,
					},
					pincode:
					{
						required: true,
						minlength:6,
						maxlength:6,
						digits:true,
					}
				},
				// Specify validation error messages
				messages: 
				{
					areaname:
					{
						required: "Please enter your area name",
						minlength:"Minimum 3 length needed",
						maxlength:"Sorry only 20 character is needed",
					},
					pincode:
					{
						required: "Please enter your pincode",
						minlength:"Minimum 6 length needed",
						maxlength:"Sorry only 6 character is needed",
						digits:"Only number is accepted",
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
