<?php
	include_once('connection.php');
	include_once("check_session.php");
	if(isset($_GET['id']))
	{
		$id=$_GET['id'];
		$sql="select tbl_dabbawala.*,tbl_area.areaname 
		from tbl_dabbawala join tbl_area on 
		tbl_dabbawala.areaid=tbl_area.areaid
		where tbl_dabbawala.dbuserid=$id";
		
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
							<h3 class="panel-title">Details Of Dabbawalas</h3>
						</div>
					
						<div class="panel-body">
							<table class="table table-hover">
								<thead>
									<tr>	
										<th>Photo</th>
										<td><img src="../uploads/user/<?php echo $row['photo'];?>" height="15%"  /></td>
									</tr>
									
									<tr>
										<th>First Name</th>
										<td><?php echo $row['firstname'];?></td>
									</tr>
									<tr>
										<th>Last Name</th>
										<td><?php echo $row['lastname'];?></td>
									</tr>
									<tr>
										<th>Mobile No</th>
										<td><?php echo $row['mobileno'];?></td>
									</tr>
									<tr>
										<th>Gmail</th>
										<td><?php echo $row['email'];?></td>
									</tr>
									<tr>
										<th>Date Of Joining</th>
										<td><?php echo $row['doj'];?></td>
									</tr>
									<tr>
										<th>Date Of Birth</th>
										<td><?php echo $row['dob'];?></td>
									</tr>
									<tr>	
										<th>Licence Photo</th>
										<td><img src="../uploads/user/<?php echo $row['licence'];?>" height="15%"  /></td>
									</tr>
									
									<tr>
										<th>Address</th>
									<td><?php echo $row['address'];?></td>
									</tr>
									<tr>
									<tr>
									<th>AreaID</th>
									<td><?php echo $row['areaid']."  ".$row['areaname'];?></td>
									
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
													
													<a class="btn btn-success" href="approveddabbawala.php?id=<?php echo $row['areaid'];  ?>&dbid=<?php echo $row['dbuserid'] ;?>&uid=<?= $_GET['id'] ?>">
														<i class="fa fa-check"></i>
													</a>
													</br>
													<a class="btn btn-danger" href="Notapproveddabbawala.php?id=<?php echo $row['areaid']; ?>&dbid=<?php echo $row['dbuserid'] ;?>&uid=<?= $_GET['id'] ?>">
														<i class="fa fa-times"></i>
													</a>
													<?php
													}
												?>
												<?php 
													if($row['status']==1)
													{
												?>
													
													<a class="btn btn-danger" href="Notapproveddabbawalao.php?id=<?php echo $row['areaid']; ?>&dbid=<?php echo $row['dbuserid'] ;?>&uid=<?= $_GET['id'] ?>">
													<i class="fa fa-times"></i>
												</a>
												<?php
													}
												?>
												<?php 
													if($row['status']==2)
													{
												?>
													
													<a class="btn btn-success" href="approveddabbawala.php?id=<?php echo $row['areaid'];?>&dbid=<?php echo $row['dbuserid'] ;?>&uid=<?= $_GET['id'] ?> ">
													<i class="fa fa-check"></i>
													</a>
												<?php
													}
												?>
											
											</td>
											
													
									
									</tr>
									
									</thead>
									</table>
									</div>
									</div>
									</div>
									</div>
									
									<?php include_once ("down_link.php")?>
									</body>
									</html>
									
									<?php include_once('footer.php'); ?>
									
									</section>
																		