
<?php
	
	include_once('connection.php');
	include_once("check_session.php");
	if(isset($_GET['id']))
	{
		$id=$_GET['id'];
		$sql="select * from tbl_restaurant where restid=$id";
		$query=mysqli_query($con,$sql);
		$row=mysqli_fetch_assoc($query);
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
                <div class="page-title"> 
                    
				</div>
				
                <div class="row">
					<div class="panel panel-color panel-inverse">
						<div class="panel-heading">
							<h3 class="panel-title">Restaurant Registration</h3>
						</div>
						
						<div class="panel-body">
							
							<table class="table table-hover">
								<thead>
								
									<tr>
										<th> Restaurant Photo</th>
										<td><img src="../uploads/restro/<?php echo $row['photo'];?>" height="20%"  /></td>
										</tr>
									<tr>
										<th>Restaurant Name</th>
										<td><?php echo $row['restname'];?></td>
									</tr>
									<tr>
										<th>Email</th>
										<td><?php echo $row['email'];?></td>
										</tr>
									<tr>
										<th>Owner Name</th>
											<td><?php echo $row['ownername'];?></td>
										</tr>
									<tr>
										<th>Address</th>
										<td><?php echo $row['address'];?></td>
										</tr>
									<tr>
										<th>Mobile no</th>
										<td><?php echo $row['mobileno'];?></td>
										</tr>
									<tr>
										<th>Open Time</th>
										<td><?php echo $row['opentime'];?></td>
										</tr>
									<tr>
										<th>Close Time</th>
										<td><?php echo $row['closetime'];?></td>
										</tr>
									<tr>
										<th>Status</th>
										<td><?php if($row['status']==0) echo "<span class='badge bg-primary'>pending</span>"; else if($row['status']==1) echo "<span class='badge badge-success'>Approved</span>"; else echo "<span class='badge bg-success'>Notapproved</span>"; ?></td>
									
										</tr>
									<tr>
										<th>Action</th>
										<td>
													<?php 
													if($row['status']==0)
													{
													?>
													
													<a class="btn btn-success" href="approvedrestro.php?id=<?php echo $row['restid'];  ?>">
														<i class="fa fa-check"></i>
													</a>
													</br>
													<a class="btn btn-danger" href="Notapprovedrestro.php?id=<?php echo $row['restid']; ?>">
														<i class="fa fa-times"></i>
													</a>
													<?php
													}
												?>
												<?php 
													if($row['status']==1)
													{
												?>
													
													<a class="btn btn-danger" href="Notapprovedrestro.php?id=<?php echo $row['restid']; ?>">
													<i class="fa fa-times"></i>
												</a>
												<?php
													}
												?>
												<?php 
													if($row['status']==2)
													{
												?>
													
													<a class="btn btn-success" href="approvedrestro.php?id=<?php echo $row['restid'];?> ">
													<i class="fa fa-check"></i>
													</a>
												<?php
													}
												?>
											
											</td>
											
													
									
									</tr>
									<tr>
											<th>Thali Info</th>
											<td>
												<a href="viewthali.php?rid=<?= $_GET['id'] ?>" class="btn btn-primary">View Thalies </a> 
											</td>
									</tr>
								</thead>
								<tbody>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				
				
				
				<?php include_once('footer.php'); ?>
				
				<?php include_once ("down_link.php")?>
			</body>
		</html>
		
		
		
		
		
</section>

																						