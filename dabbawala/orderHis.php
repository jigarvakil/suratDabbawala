<?php
	
	include_once('connection.php');
	include_once("check_session.php");
	
	
?>
<!DOCTYPE html>
<html lang="en">
	
	<head>
        <meta charset="utf-8" />
        <title>Dabbawala orders</title>
		<?php include_once ("up_link.php")?>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	
    <body data-layout="horizontal">
		
        <div id="wrapper">
            <?php include_once ("header.php")?>
            <hr>
			<div class="content-page">
                <div class="content">
					
            
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h3 class="header-title mb-4">Todays Order</h3>
										
										<table class="table table-hover">
											<thead>
												<tr>
													<th>order id</th>
													<th>order date</th>
													<th>Name </th>
													<th>Address </th>
													<th>status</th>
													
												</tr>
											</thead>
											<tbody>
												<?php
												    $i=1;
													$tday=date('Y-m-d');
													$sql="select * from tbl_deliveryhistory as dh
                                                    join tbl_allocation a 
                                                    on a.aid=dh.aid
                                                    join tbl_user as u 
                                                    on a.dabbaid=u.userid  ";
													$res=mysqli_query($con,$sql);
													while($row=mysqli_fetch_assoc($res))
													{
												?>
														<tr>
															<td><?php echo $i++; ?></td>
															<td><?php echo $row['d_date']; ?></td>
															<td><?php echo $row['firstname']."    ".$row['lastname']; ?></td>
															<td><?php echo $row['address'] ?></td>
															<td>
															<?php 
																if($row['status']==0)
																	echo "Not Deliverd";
																elseif($row['status']==1)
																	echo "Deliverd success";
																else 
																	echo "Order cancled/deliver not success"; 
															?>
															</td>
															<!-- <td>
															<a class="btn btn-success" href="successorder.php?id=<?php echo $row['histid'] ?>"><i class="fa fa-check-square"></i></a>
															<a class="btn btn-danger" href="cancleorder.php?id=<?php echo $row['histid'] ?>"><i class="fa fa-times"></i></a>
															</td> -->
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
            </div>
                        <?php include_once ("footer.php")?>
		


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