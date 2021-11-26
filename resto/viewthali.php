<?php
	
	include_once('connection.php');
	include_once("check_session.php");
	if(isset($_GET['id']))
	{
		$id=$_GET['id'];
		$sql="select * from tbl_thali where thaliid=$id";
		$query=mysqli_query($con,$sql);
		$row=mysqli_fetch_assoc($query);
		
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Restaurant Admin</title>
		<?php include_once ("up_link.php")?>
		
	</head>
	<body>
		<?php include_once ("header.php")?>
		<?php include_once ("navigation.php")?>
		
		
		<div id="content">
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span12">
						<div class="widget-box">
							<div class="widget-title"> <span class="icon"> <i class="fa fa-cutlery"></i> </span>
								<h3>Thali Details</h3>
							</div>
							
							
							<table class="table table-hover">
								<thead>
									<tbody>
										<?php
											
											$sql="select tbl_thali.*,tbl_restaurant.restname 
											from tbl_thali join tbl_restaurant on 
											tbl_thali.restid=tbl_restaurant.restid";
											
											$query=mysqli_query($con,$sql);
											$i=1;
											while($row=mysqli_fetch_assoc($query))
											{
												$id=$row['thaliid'];
											?>
											<tr>
												
												<td><img src="../uploads/thali/<?php echo $row['pic'];?>" height="20%"  /></td>
											</tr>
											<tr>
												
												<td><?php echo $row['restid']."  ".$row['restname'];?></td>
											</tr>
											
											<tr>
												
												<td><?php echo $row['thaliname'];?></td>
											</tr>
											<tr>
												
											
												<td><i class='fas fa-rupee-sign'></i><?php echo $row['price'];?></td>
											</tr>
											<tr>
												
												
												<td><?php echo $row['description'];?></td>
											</tr>
											<tr>
												
											
												<td>
													<a class="btn btn-success" href="updatethali.php?id=<?php echo $id;?>">
														<i class="fa fa-edit"></i>
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
								</thead>
								
							</table>
						</div>
					</div>
					</div>
					</div>
				</div>
				
			<?php include_once ("footer.php")?>
			<?php include_once ("down_link.php")?>
	</body>
</html>
