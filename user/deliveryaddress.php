<?php
	include_once('connection.php');
	include_once("check_session.php");
    $count=0;
    if(isset($_REQUEST['btnS']))
    {
        $a1=$_REQUEST['areaid1'];
        $a2=$_REQUEST['areaid2'];
        $addr1=$_REQUEST['SourceAddress'];
        $addr2=$_REQUEST['DestinationAddress'];
        $km=$_REQUEST['totalkm'];
        $uid=$_SESSION['userid'];
		
        $sql="INSERT INTO `tbl_route` (`routeid`, `sourceaddr`, `destinationaddr`, `km`, `sourceareaid`, `destinationareaid`, `userid`) VALUES (NULL, '$addr1', '$addr2', '$km', '$a1', '$a2', '$uid')";
		
		$res=mysqli_query($con,$sql);
        if($res)
        {
            header("location:package.php");
		}
	}
?>
<!doctype html>
<html class="no-js" lang="zxx">
	
	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title>User</title>
		<?php include_once ("up_link.php")?>
		<style>
			.dnone{
			display:none;
			}
		</style>
	</head>
	
	<body>
		
		<?php include_once ("header.php")?>
		
		<div class="breadcrumb-area  ptb-80">
		</div>
		<div class="breadcrumb-area bg-img ptb-80" style="background-image:url(assets/img/banner/breath.jpg);">
			<div class="container">
				<div class="breadcrumb-content text-center">
					<h3>Delivery Address</h3>
					<ul>
						<li>
							<a href="index.php">Home</a>
						</li>
						<li class="active">Delivery Address</li>
					</ul>
				</div>
			</div>
		</div>
		<?php
			$uid=$_SESSION['userid'];
			$sql1="select * from tbl_route where userid=$uid";
			$res=mysqli_query($con,$sql1);
			$num=mysqli_num_rows($res);
			if($num>0)
			{
				$count++;
			}
		?>
		<div class="<?php if($count>0) echo "dnone"; ?>">
			<div class="contact-area pt-100">
				<div class="container">
					<div class="row">
						<div class="col-lg-8">
							<div class="contact-message-wrapper">
								<h4 class="contact-title mb-25">Delivery Address</h4>
								<div class="contact-message">
									<form  name="f1" method="post">
										<div class="row">
											<div class="col-lg-12">
												<br>
												<h4>Source Address</h4>
												<div class="form-group">
													<select name="areaid1" id="a1" class="form-control">
														<option>-----Area Name-----</option>
														<?php
															$sql="select * from tbl_area";
															$res=mysqli_query($con,$sql);
															
															while($row=mysqli_fetch_assoc($res))
															{
																
															?>
															<option value="<?php echo $row['areaid']; ?>">
															<?php echo $row['areaname']; ?></option>
															<?php
															}
															
														?>
													</select>
												</div>
											</div>
											
											<div class="col-lg-12">
												<div class="contact-form-style mb-20">
													<textarea name="SourceAddress"></textarea>
												</div>
											</div>
											
											<div class="col-lg-12">
												<br>
												<h4>Destination Address</h4>
												<div class="form-group">
													<select name="areaid2" id="a2" class="form-control">
														<option>-----Area Name-----</option>
														<?php
															$sql="select * from tbl_area";
															$res=mysqli_query($con,$sql);
															
															while($row=mysqli_fetch_assoc($res))
															{
																
															?>
															<option value="<?php echo $row['areaid']; ?>">
															<?php echo $row['areaname']; ?></option>
															<?php
															}
															
														?>
													</select>
												</div>
											</div>
											
											
											<div class="col-lg-12">
												<div class="contact-form-style mb-20">
													<textarea name="DestinationAddress"></textarea>
												</div>
											</div>
											
											<div class="col-lg-12">
												<lable>Total Kilometers : <p id="kmp"></p> </lable>
												<div class="contact-form-style mb-20">
													<input type="hidden" name="totalkm" id="txtkm" />
													<span class="text-danger">NOTE: Minimun 2km Charges will be applied</span>
												</div>
												<span class="text-danger">
													Note: Please Select Source Address First after that select Destination
													address <br>
													Otherwise you might charge double..
												</span>
											</div>
											
											<div class="form-group">
												<button class="submit btn-style" name="btnS" type="submit">Submit</button>
											</div>
										</div>
										
										
										
									</form>
									
								</div>
							</div>
						</div>
						
					</div>
					
				</div>
			</div>
		</div>
		<div class="contact-area pt-100">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="contact-message-wrapper">
							<h4 class="contact-title mb-25">Delivery Address</h4>
							Your Pick-up and Delivery Addresses are already inserted if you want to update please <a href="udeliveryaddress.php">  CLICK HERE </a>
						</div>
					</div>
					
				</div
			</div>
		</div>
		
		
		<?php include_once('footer.php'); ?>
		
		
		
		
		<?php include_once('down_link.php'); ?>
		<script>
			$(document).ready(function() {
				$('#a2').change(function() {
					var a1 = $('#a1').val();
					var a2 = $(this).val();
					// alert(a1+a2)
					$.ajax({
						type: "POST",
						url: "distance.php",
						data: {
							a1: a1,
							a2: a2
						},
						success: function(data) {
							console.log(data);
							$('#txtkm').val(data);
							$('#kmp').html(data);
						}
					});
				});
				// $('#a1').change(function() {
				//     var a1 = $(this).val();
				//     var a2 = $('#a2').val();
				//     // alert(a1+a2)
				//     $.ajax({
				//         type: "POST",
				//         url: "distance.php",
				//         data: {
				//             a1: a1,
				//             a2: a2
				//         },
				//         success: function(data) {
				//             console.log(data);
				//             $('#txtkm').val(data);
				//         }
				//     });
				// });
			});
		</script>
	</body>
	
</html>