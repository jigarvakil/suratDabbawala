<?php

	include_once('connection.php');
	include_once("check_session.php");
	$id=0;
	if(isset($_REQUEST['id']))
	{
		$id=$_REQUEST['id'];
		$sql="SELECT * FROM `tbl_holiday` where holidayid=$id";
		$result=mysqli_query($con,$sql);
		$row=mysqli_fetch_assoc($result) ;
		
		
	}
	
	if(isset($_REQUEST['add']))
	{
		$id=$_REQUEST['id'];
		$title=$_REQUEST['title'];
		$reason=$_REQUEST['reason'];
		$holidaydate=date_create($_REQUEST['holidaydate']);
		$gdate= date_format($gdate,"Y-m-d");
		$holidaydate = date_format($holidaydate,"Y-m-d");
		$query="UPDATE `tbl_holiday` SET `title` = '$title', `reason` = '$reason', `holidaydate` = '$holidaydate', `gdate` = '$gdate' WHERE `tbl_holiday`.`holidayid` = $id";
		
		if(mysqli_query($con,$query) or die(mysql_error)){
			echo "<script type='text/javascript'>alert('Update success');</script>";
			header("location:holiday.php");
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
                       <div class="panel panel-color panel-inverse">
						<div class="panel-heading">
							<h3 class="panel-title">Holiday</h3>
						</div>
					
                                <div class=" form p-20">
                                    <form class="cmxform form-horizontal tasi-form" name="f1" id="commentForm" method="post" action="#" novalidate="novalidate">
                                        <div class="form-group">
											<label for="cemail" class="control-label col-lg-2"> Generate Date(required)</label>
                                            <div class="col-lg-10">
												<div class='input-group date' id='datetimepicker6'>
													
													<input type='date' class="form-control" value="<?= $row['gdate'] ?>" id="gdate" type="date" name="gdate" >
													
													<span class="input-group-addon">
														<span class="glyphicon glyphicon-calendar"></span>
													</span>
												</div>
											</div>
										</div>
			                            <div class="form-group ">
                                            <label for="Title" class="control-label col-lg-2">Title(optional)</label>
                                            <div class="col-lg-10">
                                                <input class="form-control " value="<?= $row['title'] ?>" id="title" type="text" name="title">
											</div>
										</div>
                                        <div class="form-group ">
                                            <label for="reason" class="control-label col-lg-2">Reason(required)</label>
                                            <div class="col-lg-10">
                                                <textarea class="form-control " value=""  id="reason" type="text" name="reason" required="" aria-required="true"><?= $row['reason'] ?></textarea>
											</div>
										</div>
										<div class="form-group">
											<label for="date" class="control-label col-lg-2"> Holiday Date(required)</label>
                                            <div class="col-lg-10">
												<div class='input-group date' id='datetimepicker6'>
													<input type='date' class="form-control" value="<?= $row['holidaydate'] ?>" type="date"  id="holidaydate" name="holidaydate" required="" aria-required="true"/>
													<span class="input-group-addon">
														<span class="glyphicon glyphicon-calendar"></span>
													</span>
												</div>
												</br>
												<div class="form-group">
													<div class="col-lg-offset-2 col-lg-10">
														<button class="btn btn-success" name="submit" type="submit">Send</button>
														<button class="btn btn-danger"  name="cancel" type="button">Cancel</button>
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
					gdate:
					{
						required: true,
						
					},
					title:
					{
						required: true,
						minlength:3,
						maxlength:20,
					},
					reason:
					{
						required: true,
						maxlength:100,
					},
					holidaydate:
					{
						required: true,
					}
				},
				// Specify validation error messages
				messages: 
				{
					gdate:
					{
						required: "Please enter your holiday generate date",
						
					},
					title:
					{
						required: "Please enter your holiday title",
						minlength:"Minimum 3 length needed",
						maxlength:"Sorry only 20 character is needed",
					},
					reason:
					{
						required: "Please enter your holiday reason",
						maxlength:"Sorry only 100 character is needed",
					},
					holidaydate:
					{
						required: "Please enter your holiday date",
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

