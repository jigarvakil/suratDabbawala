<?php
	include_once('connection.php');
	include_once("check_session.php");

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
  <div id="content-header">
    <div id="breadcrumb"> <a href="dashboard.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
  </div>
  <div class="container-fluid">
    <div class="quick-actions_homepage">
      <ul class="quick-actions">
        <li class="bg_lb"> <a href="dashboard.php"> <i class="icon-dashboard"></i> My Dashboard </a> </li>
        <li class="bg_lo"> <a href="viewthali.php"> <i class="icon-th"></i> dish</a> </li>
        <li class="bg_ls"> <a href="order.php"> <i class="icon-user"></i> Client</a> </li>
        <li class="bg_lg"> <a href="gallery.php"> <i class="icon-picture"></i> Gallery</a> </li>
       
      </ul>
    </div>
	</div>

  <div class="widget-box padding">
  <div class="span8">
          <div class="widget-title"> <span class="icon"> <i class="fas fa-bell"></i> </span>
            <h3><b>Holiday Alert</b></h3>
             </div>
          <div class="widget-content padding">
            <table class="table table-bordered table-striped">
              
            <thead>
									<tr>
									<th><b><h4>#</h4><b></th>
									
									<th><b><h4>Reason</h4></b></th>
									<th><b><h4>Holiday date</b></h4></th>
									</tr>
									</thead>
									<tbody>
									<?php
										$sql="select * from tbl_holiday";
										$query=mysqli_query($con,$sql);
										$i=1;
										while($row=mysqli_fetch_assoc($query))
										{
											$id=$row['holidayid'];
										?>
										<tr>
										<td><h5><?php echo $i++;?></h5></td>
										<td><h5><?php echo $row['reason'];?></h5></td>
										<td><h5><?php echo $row['holidaydate'];?></h5></td>
										
									</tr>
									<?php
									}//end while loop
								?>
								</tbody>
		  </table>
		  
          </div>
        </div>
				</div>
				<div class="span3">
              <ul class="site-stats">
                <li class="bg_lh"><i class="icon-user"></i> <strong>
				<?php
                                foreach($con->query('SELECT COUNT(*) FROM tbl_user') as $row) {
                                    echo "<tr>";
                                    echo "<td>" . $row['COUNT(*)'] . "</td>";
                                    echo "</tr>";
                                }
                ?>
				</strong> <small>Total Users</small></li>
                <li class="bg_lh"><i class="icon-plus"></i> <strong>120</strong> <small>New Users </small></li>
                <li class="bg_lh"><i class="fa fa-cutlery"></i> <strong>
				<?php
                                foreach($con->query('SELECT COUNT(*) FROM tbl_restaurant') as $row) {
                                    echo "<tr>";
                                    echo "<td>" . $row['COUNT(*)'] . "</td>";
                                    echo "</tr>";
                                }
                                ?>
				</strong> <small>Total Restro</small></li>
                <li class="bg_lh"><i class="icon-tag"></i> <strong>
				<?php
                                foreach($con->query('SELECT COUNT(*) FROM tbl_order') as $row) {
                                    echo "<tr>";
                                    echo "<td>" . $row['COUNT(*)'] . "</td>";
                                    echo "</tr>";
                                }
                                ?>
				</strong> <small>Total Orders</small></li>
                <li class="bg_lh"><i class="icon-repeat"></i> <strong>
				<?php
				foreach($con->query('SELECT status,COUNT(*)
				FROM tbl_order WHERE status="0" GROUP BY status;') as $row) {
				echo "<tr>";
				echo "<td>" . $row['status'] . "</td>";
				echo "<td>" . $row['COUNT(*)'] . "</td>";
				echo "</tr>";
				}
				?>
				</strong> <small>Pending Orders</small></li>
				
                <li class="bg_lh"><i class="icon-globe"></i> <strong>
				<?php
				foreach($con->query('SELECT status,COUNT(*)
				FROM tbl_order WHERE status="2" GROUP BY status;') as $row) {
				echo "<tr>";
				echo "<td>" . $row['status'] . "</td>";
				echo "<td>" . $row['COUNT(*)'] . "</td>";
				echo "</tr>";
				}
				?>
				</strong> <small>delivered Orders</small></li>
              </ul>
            </div>
								</div>

<!--Footer-part-->
	<?php include_once ("footer.php")?>
<!--end-Footer-part-->
	<?php include_once ("down_link.php")?>
</body>
</html>
