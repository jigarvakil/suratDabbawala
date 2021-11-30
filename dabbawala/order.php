<?php
	
	include_once('connection.php');
	include_once("check_session.php");
	if(isset($_REQUEST['btnAddOrder'])){
		$allocationid = $_REQUEST['slctOrder'];
		$tdate = date('Y-m-d');
		$sql = "INSERT INTO `tbl_deliveryhistory` (`histid`, `aid`, `d_date`, `status`) VALUES (NULL, '$allocationid', '$tdate', '0') ";
		$resOrder = mysqli_query($con,$sql);
		if($resOrder){
			header("location:order.php");
		}
	}
	
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
										<!-- Button trigger modal -->
										<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modelId">
										  + Add New
										</button>
										
										<!-- Modal -->
										<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
											<div class="modal-dialog" role="document">
												<form>
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title">Add Today's Dabba Oder</h5>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
															</div>
														<div class="modal-body">
															<div class="container-fluid">
																<div class="row">
																	<div class="col-md-2">
																		
																	</div>
																	<div class="col-md-8">
																		<div class="form-group">
																			<label for="slctOrder">Deliver To</label>
																			<select class="form-control" name="slctOrder">
																				<option value='0'>--Select--</option>
																				<?php
																					$dbuser1=$_SESSION['dbuserid'];
																					$sql1 = "select u.firstname,u.lastname,r.destinationaddr,a.aid FROM tbl_allocation as a join tbl_route as r on r.userid=a.dabbaid join tbl_user as u on u.userid=r.userid where dbuserid=$dbuser1; ";
																					$tday1=date('Y-m-d');
																					$res1=mysqli_query($con,$sql1);
																					while($row1=mysqli_fetch_assoc($res1))
																					{
																				?>
																					<option value="<?= $row1['aid'] ?>"><?= $row1['firstname']." ".$row1['lastname']."(".$row1['destinationaddr'].")" ?></option>
																					
																				<?php
																					}
																				?>
																			</select>
																		</div>
																	</div>
																	<div class="col-md-2"></div>
																</div>
															</div>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
															<button type="submit" name="btnAddOrder" class="btn btn-primary">Save</button>
														</div>
													</div>
												</form>
											</div>
										</div>
										
										<script>
											$('#exampleModal').on('show.bs.modal', event => {
												var button = $(event.relatedTarget);
												var modal = $(this);
												// Use above variables to manipulate the DOM
												
											});
										</script>
										<table class="table table-hover">
											<thead>
												<tr>
													<th>order id</th>
													<th>order date</th>
													<th>status</th>
													<th>Deliver to(Name)</th>
													<th>Route</th>
													<th>action</th>
												
												</tr>
											</thead>
											<tbody>
												<?php
												$i=1;
												$dbuser=$_SESSION['dbuserid'];
													$tday=date('Y-m-d');
													$sql="select * from tbl_deliveryhistory as dh
													join tbl_allocation as a
													on a.aid=dh.aid
													join tbl_route as r
													on r.userid=a.dabbaid
													join tbl_user as u 
													on u.userid=r.userid
													where d_date='$tday' and dbuserid=$dbuser";
													//echo $sql;
													//exit;
													$res=mysqli_query($con,$sql);
													while($row=mysqli_fetch_assoc($res))
													{
												?>
														<tr>
															<td><?php echo $i; ?></td>
															<td><?php echo $row['d_date']; ?></td>
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
															<td><?php echo $row['firstname']."  ".$row['lastname']; ?></td>

															<td>
																
																<table class="table table-hover">
																	<thead>
																		<tr>
																			<th>source address</th>
																			<th>Destination address</th>
																		</tr>
																	</thead>
																	<tbody>
																		<tr>
																			<td><?php echo $row['sourceaddr'] ?><br>
																			<a target="_blank" href="https://maps.google.com/?q=<?php echo $row['sourceaddr'] ?>">Click to Open In Map</a>
																			</td>
																			<td><?php echo $row['destinationaddr'] ?>
																			<br>
																			<a target="_blank" href="https://maps.google.com/?q=<?php echo $row['destinationaddr'] ?>">Click to Open In Map</a>
																			</td>
																		</tr>
																	</tbody>
																</table>
																
															</td>
															<td>
															<a class="btn btn-success" href="successorder.php?id=<?php echo $row['histid'] ?>"><i class="fa fa-check-square"></i></a>
															<a class="btn btn-danger" href="cancleorder.php?id=<?php echo $row['histid'] ?>"><i class="fa fa-times"></i></a>
															</td>
														</tr>
												<?php
													}
													$i++;
												?>
											</tbody>
										</table>
										<strong class="text-danger">Contact administration for cancel or delete any order</strong>
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