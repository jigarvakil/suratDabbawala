<?php
	
	include_once('connection.php');
	include_once("check_session.php");
	if(isset($_REQUEST['add']))
	{
		$pname=$_REQUEST['pname'];
		$remark=$_REQUEST['remark'];
		$price=$_REQUEST['price'];
		$description=$_REQUEST['description'];
		$query="insert into tbl_package(pname,price,description,remark) values('$pname','$price','$description','$remark')";
		
		if(mysqli_query($con,$query))
		{
			echo "<script type='text/javascript'>alert('insert success');</script>";
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
							<h3 class="panel-title">Packages</h3>
						</div>
					
                            <div class="panel-body">
							 <div class="page-title"> 
                    
				</div>
                                <div class=" form p-20">
                                    <form method="post" name="f1" class="cmxform form-horizontal tasi-form" id="commentForm" action="#" novalidate="novalidate">
                                       
			                            <div class="form-group ">
                                            <label for="Normalcharge" class="control-label col-lg-2">Package Name</label>
                                            <div class="col-lg-5">
                                                <input class="form-control " id="pname" type="text" name="pname">
											</div>
										</div>
										<div class="form-group ">
                                            <label for="Urgentcharge" class="control-label col-lg-2">Remark</label>
                                            <div class="col-lg-5">
                                                <input class="form-control " id="remark" type="text" name="remark">
											</div>
										</div>
										
                                        <div class="form-group ">
                                            <label for="Urgentcharge" class="control-label col-lg-2">Price</label>
                                            <div class="col-lg-5">
                                                <input class="form-control " id="price" type="text" name="price">
											</div>
										</div>
										<div class="form-group ">
                                            <label for="Urgentcharge" class="control-label col-lg-2">Description</label>
                                            <div class="col-lg-5">
                                                <input class="form-control " id="description" type="text" name="description">
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
					
					   <div class="wraper container-fluid">
                <div class="page-title"> 
                    
				</div>
				
                <div class="row">
                         <div class="panel panel-color panel-inverse">
						<div class="panel-heading">
							<h3 class="panel-title">Package Details</h3>
						</div>
					
                            <div class="panel-body">

			<table class="table table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>Package Name</th>
						<th>remark</th>
						<th>price</th>
						<th>description</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$sql="select * from tbl_package ";
						$query=mysqli_query($con,$sql);
						$i=1;
						while($row=mysqli_fetch_assoc($query))
						{
							$id=$row['pid'];
						?>
						<tr>
							<td><?php echo $i++;?></td>
							<td><?php echo $row['pname'];?></td>
							<td><?php echo $row['remark'];?></td>
							<td><?php echo $row['price'];?></td>
							<td><?php echo $row['description'];?></td>
							<td>
								<a class="btn btn-success" href="updatepackage.php?id=<?php echo $id;?>">
									<i class="fa fa-pencil"></i>
								</a>
								<a class="btn btn-danger" href="deletepackage.php?id=<?php echo $id;?>">
									<i class="fa fa-trash"></i>
								</a>
	
							</td>
						</tr>
						<?php
						}//end while loop
					?>
				</tbody>
			</table>
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
