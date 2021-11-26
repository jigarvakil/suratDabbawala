<?php
	
	include_once('connection.php');
	include_once("check_session.php");	
	
	$id=$_GET['rid'];
	
?>

<!doctype html>
<html class="no-js" lang="zxx">
	
	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title>User</title>
		<?php include_once ("up_link.php")?>
		<style>
			form .error {
			color: red;
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
					<h3>Order Thalis</h3>
					<ul>
						<li>
							<a href="index.php">Home</a>
						</li>
						<li class="active">Order Thali</li>
					</ul>
				</div>
			</div>
		</div>
		
		<div class="contact-area pt-100">
			<div class="container">
				<div class="row">
					
					<?php
						
						$sql="select * 
						from tbl_thali where restid=$id";
						
						$query=mysqli_query($con,$sql);
						$i=1;
						while($row=mysqli_fetch_assoc($query))
						{
							$id=$row['thaliid'];
						?>
						
						<div class="col-md-4 ">
							<div class="owl-item border 	" style="width: 370px; margin-right: 30px;">
								<div class="product-style-wrap">
									<img src="../uploads/thali/<?php echo $row['pic'];?>" height="247px" width="370px" />
									<div class="product-content text-center">
										<h4>
											<?= $row['thaliname'] ?>
										</h4>
										<p>Description: <?= $row['description'] ?></p>
										<span><i class="fa fa-inr" aria-hidden="true"></i><?= $row['price'] ?></span>
										<br>
										<br>
										<div class="slider-btn">
											<a class="animated" id="a1" href="#" data-id="<?= $id ?>"  >Place Order</a>
										</div>
									</div>
								</div>
							</div>
							<br>
						</div>
						
						
						<?php
						}//end while loop
					?>
					
				</div>
				<br>
			</div>
		</div>
	</div>
	
	
    <?php include_once('footer.php'); ?>
	
	
	
	
    <?php include_once('down_link.php'); ?>
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
				var id=$(this).data('id');
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
						//window.location="payment_form.php?id="+id;
						var link='payment_form.php?id='+id;
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
</body>

</html>