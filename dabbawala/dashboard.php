<?php
	include_once('connection.php');
	include_once("check_session.php");
?>
<!DOCTYPE html>
<html lang="en">
	
	<head>
        <meta charset="utf-8" />
        <title>Dabbawala</title>
		<?php include_once ("up_link.php")?>
	</head>
	
    <body data-layout="horizontal">
		
        <div id="wrapper">
			<?php include_once ("header.php")?>
			
            <div class="content-page">
                <div class="content">
					
                    <div class="row">
						<div class="col-12">
							<div class="page-title-box">
								<h4 class="page-title">Welcome !</h4>
								<div class="page-title-right">
									<ol class="breadcrumb p-0 m-0">
										<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
										
									</ol>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>
					<!-- end page title -->
					
					<div class="row">
						<div class="col-xl-3 col-sm-6">
							<div class="card bg-pink">
								<div class="card-body widget-style-2">
									<div class="text-white media">
										<div class="media-body align-self-center">
											<h2 class="my-0 text-white"><span data-plugin="counterup">
											<?php
													foreach($con->query('SELECT COUNT(*) FROM tbl_user') as $row) {
														echo "<tr>";
														echo "<td>" . $row['COUNT(*)'] . "</td>";
														echo "</tr>";
													}
											?>
											</span></h2>
											<p class="mb-0">Daily Visits</p>
										</div>
										<i class="ion-md-eye"></i>
									</div>
								</div>
							</div>
						</div>
						
						<div class="col-xl-3 col-sm-6">
							<div class="card bg-purple">
								<div class="card-body widget-style-2">
									<div class="text-white media">
										<div class="media-body align-self-center">
											<h2 class="my-0 text-white"><span data-plugin="counterup">
												 <?php
														foreach($con->query('SELECT COUNT(*) FROM tbl_dabbawala') as $row) {
															echo "<tr>";
															echo "<td>" . $row['COUNT(*)'] . "</td>";
															echo "</tr>";
														}
												?>
											</span></h2>
											<p class="mb-0">Dabbawala</p>
										</div>
										<i class="ion-md-paper-plane"></i>
									</div>
								</div>
							</div>
						</div>
						
						<div class="col-xl-3 col-sm-6">
							<div class="card bg-info">
								<div class="card-body widget-style-2">
									<div class="text-white media">
										<div class="media-body align-self-center">
											<h2 class="my-0 text-white"><span data-plugin="counterup">
												 <?php
															foreach($con->query('SELECT COUNT(*) FROM tbl_order') as $row) {
																echo "<tr>";
																echo "<td>" . $row['COUNT(*)'] . "</td>";
																echo "</tr>";
															}
													?>
												</span></h2>
											<p class="mb-0">Orders</p>
										</div>
										<i class="ion-ios-pricetag"></i>
									</div>
								</div>
							</div>
						</div>
						
						<div class="col-xl-3 col-sm-6">
							<div class="card bg-primary">
								<div class="card-body widget-style-2">
									<div class="text-white media">
										<div class="media-body align-self-center">
											<h2 class="my-0 text-white"><span data-plugin="counterup">145</span></h2>
											<p class="mb-0">New Users</p>
										</div>
										<i class="mdi mdi-comment-multiple"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-xl-12">
							<div class="card">
								<div class="card-header py-3 bg-transparent">
									<div class="card-widgets">
										<a href="javascript:;" data-toggle="reload"><i class="mdi mdi-refresh"></i></a>
										<a data-toggle="collapse" href="#cardCollpase1" role="button" aria-expanded="false" aria-controls="cardCollpase1"><i class="mdi mdi-minus"></i></a>
										<a href="#" data-toggle="remove"><i class="mdi mdi-close"></i></a>
									</div>
									<h5 class="header-title mb-0"><b>Holiday Alert</b></h5>
								</div>
								<div class="panel-body">
								
							
									
									
									<table class="table table-hover">
									<thead>
									<tr>
									<th>#</th>
									
									<th>Reason</th>
									<th>Holiday date</th>
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
										<td><?php echo $i++;?></td>
										<td><?php echo $row['reason'];?></td>
										<td><?php echo $row['holidaydate'];?></td>
										
									</tr>
									<?php
									}//end while loop
								?>
								</tbody>
								</table>
								</div>
							
							</div>
						</div>
						
						
							<!-- end card-->
							
							
						</div>
						
					</div>
				</div>
			</div>
		</div>
		
		
		<?php include_once ("footer.php")?>
		

<!-- Right Sidebar -->
<div class="right-bar">
	<div class="rightbar-title">
		<a href="javascript:void(0);" class="right-bar-toggle float-right">
			<i class="mdi mdi-close"></i>
		</a>
		<h4 class="font-17 m-0 text-white">Theme Customizer</h4>
	</div>
	<div class="slimscroll-menu">
        
		<div class="p-4">
			<div class="alert alert-warning" role="alert">
				<strong>Customize </strong> the overall color scheme, layout, etc.
			</div>
			<div class="mb-2">
				<img src="assets/images/layouts/light.png" class="img-fluid img-thumbnail" alt="">
			</div>
			<div class="custom-control custom-switch mb-3">
				<input type="checkbox" class="custom-control-input theme-choice" id="light-mode-switch" checked />
				<label class="custom-control-label" for="light-mode-switch">Light Mode</label>
			</div>
            
			<div class="mb-2">
				<img src="assets/images/layouts/dark.png" class="img-fluid img-thumbnail" alt="">
			</div>
			<div class="custom-control custom-switch mb-3">
				<input type="checkbox" class="custom-control-input theme-choice" id="dark-mode-switch" data-bsStyle="assets/css/bootstrap-dark.min.css" 
				data-appStyle="assets/css/app-dark.min.css" />
				<label class="custom-control-label" for="dark-mode-switch">Dark Mode</label>
			</div>
            
			<div class="mb-2">
				<img src="assets/images/layouts/rtl.png" class="img-fluid img-thumbnail" alt="">
			</div>
			<div class="custom-control custom-switch mb-5">
				<input type="checkbox" class="custom-control-input theme-choice" id="rtl-mode-switch" data-appStyle="assets/css/app-rtl.min.css" />
				<label class="custom-control-label" for="rtl-mode-switch">RTL Mode</label>
			</div>
			
		</div>
	</div>
</div>
<div class="rightbar-overlay"></div>

<a href="javascript:void(0);" class="right-bar-toggle demos-show-btn">
	<i class="mdi mdi-settings-outline mdi-spin"></i> &nbsp;Choose Demos
</a>

<?php include_once ("down_link.php")?>
</body>

</html>