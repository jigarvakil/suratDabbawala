<?php
	include_once('connection.php');
	include_once("check_session.php");
	
	
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Restaurant Admin</title>
		<?php include_once ("up_link.php")?>
		<style>
			form .error
			{
			color:red;
			}
		</style>
		
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
								<h3>Orders</h3>
							</div>
							<div class="widget-content nopadding">
                                
                                <table class="table table-responsive" >
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Customer Detail</th>
                                            <th>Order Date</th>
                                            <th>Thali Information</th>
                                            <th>Description</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody">
                                        <?php
                                             $i=1;
                                            $restuser=$_SESSION['restid'];
                                            $sql="select * from tbl_order as o
                                            join tbl_thali as t
                                            on o.thaliid=t.thaliid
                                            join tbl_user as u 
                                            on u.userid=o.userid
                                            where restid=$restuser 
                                            order by o.status";
                                            // echo $sql;
                                            // exit;
                                            $res=mysqli_query($con,$sql);
                                            while($row=mysqli_fetch_assoc($res))
                                            {
                                        ?>
                                                 <tr> 
                                                    <td><?php echo $i++; ?></td>
                                                    <td><?php echo $row['firstname']."  ".$row['lastname']; ?></td>
                                                    <td><?php echo $row['odate']; ?></td>
                                                    <td><?php echo $row['thaliname']; ?></td>
                                                    <td><?php echo $row['description']; ?></td>
                                                    <td><?php if($row['status']==0) echo "order panding"; elseif($row['status']==1) echo "order success"; else echo "Order canclled"; ?></td>
                                                    <td>
                                                    <a href="successoredr.php?id=<?php echo $row['oid'] ?>" class="btn btn-success"><i class="fa fa-check"></i></a>
                                                    <a href="failorder.php?id=<?php echo $row['oid'] ?>" class="btn btn-danger"><i class="fa fa-times"></i></a>
                                                    </td>
                                                 </tr>
                                        <?php
                                            }
                                        ?>
                                       
                                    </tbody>
                                </table>
                                
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		
		<?php include_once ("footer.php")?>
		<?php include_once ("down_link.php")?>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
		

	</body>
	</html>
		