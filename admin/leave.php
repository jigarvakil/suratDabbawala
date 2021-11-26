<?php
	include_once('connection.php');
	include_once("check_session.php");
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
							<h3 class="panel-title">Dabbawala Leave</h3>
							</div>
						
						<div class="panel-body">
							
							
							<table class="table table-hover">
								<thead>
									<tr>
										<th>#</th>
										<th>Date</th>
										<th>No of days</th>
										<th>Reason</th>
										<th>Status</th>
										<th>DabbawalaID</th>
										<th>Action</th>
										<th>Total Leave</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$sql="select L.*,D.firstname,D.lastname from tbl_leave as L join tbl_dabbawala as D on L.dbuserid=D.dbuserid";
										
										$query=mysqli_query($con,$sql);
										$i=1;
										while($row=mysqli_fetch_assoc($query))
										{
											$id=$row['leaveid'];
										?>
										<tr>
											<td><?php echo $i++;?></td>
											<td><?php echo $row['date'];?></td>
											<td><?php echo $row['no_of_days'];?></td>
											<td><?php echo $row['reason'];?></td>
											
											<td><?php  if($row['status']==1) echo "<span class='badge badge-success'>Accept</span>"; else echo "<span class='badge bg-success'>Reject</span>"; ?></td>
											
											<td><?php echo $row['firstname']."  ".$row['lastname'];?></td>
											<td>
												<?php 
													if($row['status']==0)
													{
												?>
													<a class="btn btn-success" href="AcceptLeave.php?id=<?php echo $row['dbuserid'];  ?>&lid=<?php echo $row['leaveid'] ;?>">
													<i class="fa fa-check"></i>
													</a>
													<a class="btn btn-danger" href="RejectLeave.php?id=<?php echo $row['dbuserid']; ?>&lid=<?php echo $row['leaveid'] ;?>">
													<i class="fa fa-times"></i>
												</a>
												<?php
													}
												?>
												<?php 
													if($row['status']==1)
													{
												?>
													
													<a class="btn btn-danger" href="RejectLeave.php?id=<?php echo $row['dbuserid']; ?>&lid=<?php echo $row['leaveid'] ;?>">
													<i class="fa fa-times"></i>
												</a>
												<?php
													}
												?>
												<?php 
													if($row['status']==2)
													{
												?>
													
													<a class="btn btn-success" href="AcceptLeave.php?id=<?php echo $row['dbuserid'];  ?>&lid=<?php echo $row['leaveid'] ;?>">
													<i class="fa fa-check"></i>
													</a>
												<?php
													}
												?>
											
												
												
											</td>
											<td>
												<?php 
													$sql2="select count(*) as totalleave from tbl_leave where status='1' and dbuserid='$row[dbuserid]'";
													$query1=mysqli_query($con,$sql2);
													$row1=mysqli_fetch_assoc($query1);
													//echo $row1['totalleave'];
												?>
												<a href="#" class="btn btn-primary" data-toggle="tooltip" title="Total Accepted Leave=<?= $row1['totalleave'] ?>"><i class="fa fa-eye"></i></a>
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
			
			  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
			
			<?php include_once ("down_link.php")?>
		</body>
		<script>
			$(document).ready(function(){
			  $('[data-toggle="tooltip"]').tooltip(); 
			});
		</script>
		
	</html>
	

<?php include_once('footer.php'); ?>


</section>