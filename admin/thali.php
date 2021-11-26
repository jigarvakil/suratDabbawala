<?php
	include_once('connection.php');
	include_once("check_session.php");
	if(isset($_REQUEST['add']))
	{
		$typename=$_REQUEST['thaliname'];
		$query="insert into tbl_dishtype(typename) values('$typename')";
		$res=mysqli_query($con,$query);
		$row=mysqli_fetch_assoc($res);
		
		$numrow=mysqli_num_rows($res);
		if($numrow==1)
		{
			$_SESSION['tid']=$row['tid'];
			$_SESSION['typename']=$row['typename'];
			header("location:thali.php");
		}
		elseif(mysqli_query($con,$query))
		{
			echo "<script type='text/javascript'>alert('insert success');</script>";
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
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
								<h3 class="panel-title">THALI</h3>
							</div>
							
                            <div class="panel-body">
								<div class="page-title"> 
									
								</div>
                                <div class=" form p-20" >
                                    <form method="post" name="f1" class="cmxform form-horizontal tasi-form" id="commentForm" method="get" action="#" novalidate="novalidate">
										
			                            <div class="form-group ">
                                            <label for="thaliname" class="control-label col-lg-2">Thali Name</label>
                                            <div class="col-lg-5 input-group">
                                                <input class="form-control " id="thaliname" type="text" name="thaliname" placeholder="Enter Thali Name">
												<span class="input-group-addon">
											<i class="fa fa-cutlery"></i> </span>
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
			
			
			<div class="wraper container-fluid">
				<div class="page-title"> 
					
				</div>
				
				<div class="row">
					<div class="panel panel-color panel-inverse">
						<div class="panel-heading">
							<h3 class="panel-title">THALI Types</h3>
						</div>
						<div class="panel-body">
							
							
							<table class="table table-hover">
								<thead>
									<tr>
										<th>#</th>
										<th> Thali Name</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$sql="select * from tbl_dishtype";
										$query=mysqli_query($con,$sql);
										$i=1;
										while($row=mysqli_fetch_assoc($query))
										{
											$id=$row['tid'];
										?>
										<tr>
											<td><?php echo $i++;?></td>
											<td><?php echo $row['typename'];?></td>
											<td>
												<a class="btn btn-success" href="updatethali.php?id=<?php echo $id;?>">
													<i class="fa fa-pencil"></i>
												</a>
												<a class="btn btn-danger" href="deletethali.php?id=<?php echo $id;?>">
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
						thaliname:
						{
							required:true,
							minlength:2,
							maxlength:20,
						}
					},
					messages: 
					{
						thaliname:
						{
							required: "Please Enter Your Thali Type Name",
							minlength:"Minimum 3 length needed",
							maxlength:"Sorry only 20 character is needed",
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

