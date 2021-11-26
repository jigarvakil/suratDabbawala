<?php
	include_once('connection.php');
	include_once("check_session.php");
	
	$sql="select * from tbl_route where userid=".$_SESSION['userid'];
	$res=mysqli_query($con,$sql);
	$row=mysqli_fetch_assoc($res);
	$totalkm=$row['km'];

?>
<!doctype html>
<html class="no-js" lang="zxx">
	
	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title>User</title>
		<?php include_once ("up_link.php")?>
	</head>
	
	<body>
		
		<?php include_once ("header.php")?>
		
		<div class="breadcrumb-area  ptb-80">
		</div>
		<div class="breadcrumb-area bg-img ptb-80" style="background-image:url(assets/img/banner/breath.jpg);">
			<div class="container">
				<div class="breadcrumb-content text-center">
					<h3>Package</h3>
					<ul>
						<li>
							<a href="index.php">Home</a>
						</li>
						<li class="active">Package</li>
					</ul>
				</div>
			</div>
		</div>
		<br>
		<br>
		<br>
		<div class="row">
			<?php
				$sql1="select * from tbl_package";
				$res=mysqli_query($con,$sql1);
				while($row=mysqli_fetch_assoc($res))
				{
					$amount= $totalkm * $row['price'];
					$id=$row['pid']
				?>
				
				<div style="margin-left:50px" class="col-lg-3 col-md-6 col-sm-6 col-12">
					<div class="single-team text-center mb-30">
						<div class="team-img-icon overlay">
							<?php
								if($row['pname']=="Monthly Package")
								{
									echo '<img src="images/1m.png" alt="Monthly Package">';
								}
								else
								{
									echo '<img src="images/3m.png" alt="Monthly Package">';   
								}
								
							?>
							<div class="team-social-icon">
								<ul>
									
								</ul>
							</div>
						</div>
						<div class="team-info">
							<h3><?= $row['pname'] ?></h3>
							<h4> Price: 
								
								<?php
									if($row['pname']=="Monthly Package")
									{
										$finalamount=$amount*30;
										echo "<del><i class='fa fa-inr' aria-hidden='true'></i>". $amount*40 ."</del>";
										echo "\r\n";
										echo '<i class="fa fa-inr" aria-hidden="true"></i>'.$finalamount;
									}
									else
									{
										$finalamount=$amount*90;
										
										echo "<del><i class='fa fa-inr' aria-hidden='true'></i>". $amount*110 ."</del>";
										echo "\r\n";
										echo '<i class="fa fa-inr" aria-hidden="true"></i>'.$finalamount;
									}
									
								?>
							</h4>
							<p><?= $row['description'] ?></p>
							
							<div class="slider-btn">
								<a class="animated" id="a1" href="#" data-id="<?= $id ?>" data-finalamount=<?= $finalamount ?> >Select Package</a>
							</div>
						</div>
					</div>
				</div>
				
				<?php
				}
			?>
			
			
		</div>
		
		<?php include_once('footer.php'); ?>
		<?php include_once('down_link.php'); ?>
		
	</body>
	<script>
		function cnfmorder1(){
			swal({
				title:"Confirm",
				text:"Do you Want to Confirm Your Order?",
				icon:"warning",
				confirmButtonClass: "btn-success",
				confirmButtonText: "Confirm",
				buttons: true,
				closeOnConfirm: true,
				
				}).then((isConfirm) => {
				if (isConfirm) {
					//window.location="payment_form.php?id="+;
					var id=$(".animated").data('id');
					swal("Cancle", "Your Order is not placed!!" + id, "success");
				}
				else
				{
					swal("Cancle", "Your Order is not placed!!", "error");
				}
			});
		}
		$(document).ready(function(){
			$(".animated").click(function(){
				var amt=$(this).data('finalamount');
                var id=$(this).data('id');
				//alert(id);
				
				swal({
					title:"Confirm",
					text:"Confirm Package ?",
					icon:"warning",
					confirmButtonClass: "btn-success",
					confirmButtonText: "Confirm",
					buttons: true,
					closeOnConfirm: true,
					
					}).then((isConfirm) => {
					if (isConfirm) {
						//window.location="payment_form.php?id="+id;
						var link='package_payment_form.php?amt='+amt+'&pid='+id;
						window.open(link,'_blank');
						//var id=$(".animated").data('id');
						//swal("Cancle", "Your Order is not placed!!" + id, "success");
					}
					else
					{
						swal("Cancle", "Your Order is not placed!!", "error");
					}
				}); 
			});
			
		});
		
	</script>
	
</html>