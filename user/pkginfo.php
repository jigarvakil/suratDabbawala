<?php
	
    include_once('connection.php');
    include_once("check_session.php");
    $user=$_SESSION['userid'];
   
	
?>

<!doctype html>
<html class="no-js" lang="zxx">
    
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>User</title>
		<?php include_once ("up_link.php")?>
		<style>
			form .error
			{
			color:red;
			}
		</style>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       </head>
    <body>
	
	<?php include_once ("header.php")?>
    
    <div class="breadcrumb-area  ptb-80">
	</div>
    <div class="breadcrumb-area bg-img ptb-80" style="background-image:url(assets/img/banner/breath.jpg);">
            <div class="container">
                <div class="breadcrumb-content text-center">
                    <h3>Package Information</h3>
                    <ul>
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li class="active">Package Information</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="contact-area pt-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                       
					   <table class="table table-hover">
						   <thead>
							   <tr>
								   <th>#</th>
								   <th>Package Type</th>
								   <th>Package Start Date</th>
								   <th>Package Last Date</th>
								   <th>Amount</th>
								   <th>Remark</th>
								   <th>Status</th>
							   </tr>
						   </thead>
						   <tbody>
							   
						   
					   <?php
					   $i=1;
						$sql="select pi.*,p.pname from tbl_packageinfo as pi
						JOIN tbl_package as p
						on p.pid=pi.pid
						where userid=$user";
                        $result=mysqli_query($con,$sql);
						while($row=mysqli_fetch_assoc($result))
						{
							$tday=date_create(date('Y-m-d'));
							$ldat=date_create($row['packenddate']);
							$diff=date_diff($tday,$ldat);
						?>
								<tr>
									<td><?php echo $i++; ?></td>
									<td><?php echo $row['pname']; ?></td>

									<td><?php echo $row['packstartdate']; ?></td>
									<td><?php echo $row['packenddate']; ?></td>
									<td><i class="fa fa-inr"></i> <?php echo $row['amount']; ?></td>
									<td><?php echo $row['remark']; ?></td>
									
								   <td><?php if($diff->format("%R%a days")<0) echo "package expire"; else echo "package active"; ?></td>
							   </tr>
						<?php
						}
                       ?> 
					   </tbody>
					   </table>
					   
                    </div>
                </div>
                <div class="map-area pt-10">
                   
                </div>
            </div>
        </div>


			<?php include_once('footer.php'); ?>
        
        
        
        
		<?php include_once('down_link.php'); ?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
		<script>
			$("form[name='f1']").validate({
				rules: 
				{
					name:
					{
						required: true,
						minlength:5,
						maxlength:20,
					},
					email:
					{
						required: true,
					
					},
					subject:
					{
						required: true,
						minlength:5,
						maxlength:20,
					},
					message:
					{
						required: true,
						minlength:20,
						maxlength:100,
					}
				},
				// Specify validation error messages
				messages: 
				{
					name:
					{
						required: "Please enter your full name",
						minlength:"Minimum 5 length needed",
						maxlength:"Sorry only 20 character is needed",
					},
					email:
					{
						required: "Please enter your email",
					},
					subject:
					{
						required: "Please enter your subject",
						minlength:"Minimum 5 length needed",
						maxlength:"Sorry only 20 character is needed",
					},
					message:
					{
						required: "Please enter your message",
						minlength:"Minimum 20 length needed",
						maxlength:"Sorry only 100 character is needed",
					}
				},
				submitHandler: function(form) {
					form.submit();
				}
			});
		</script>
		
       </body>

</html>
