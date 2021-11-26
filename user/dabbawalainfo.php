<?php
	
    include_once('connection.php');
    include_once("check_session.php");
    $user=$_SESSION['userid'];
    $sql="select * from tbl_allocation as a
    join tbl_dabbawala as d
    on a.dbuserid=d.dbuserid
    where dabbaid=$user";
    // echo $sql;
    // exit;
    $result=mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($result);
	
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
       </head>
    <body>
	
	<?php include_once ("header.php")?>
    
    <div class="breadcrumb-area  ptb-80">
	</div>
    <div class="breadcrumb-area bg-img ptb-80" style="background-image:url(assets/img/banner/breath.jpg);">
            <div class="container">
                <div class="breadcrumb-content text-center">
                    <h3>Dabbawala Information</h3>
                    <ul>
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li class="active">Dabbawala Information</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="contact-area pt-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="contact-message-wrapper">
                            <h4 class="contact-title mb-25">Information Of Your Dabbawala</h4>
                            <div class="contact-message">
                                <img src="../uploads/user/<?php if(isset($row['photo'])) echo $row['photo']; ?>" height="300px" width="300px"  />
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="contact-info-area">
                            <h4 class="contact-title mb-18">Contact Dabbawala</h4>
                            <div class="contact-info-wrap">
                                <div class="single-contact-info mb-40">
                                    <div class="contact-info-icon">
                                        <i class="fa fa-map-marker"></i>
                                    </div>
                                    <div class="contact-info-content">
                                        <h4>Location :</h4>
                                        <p><?php if(isset($row['address'])) echo $row['address'];   ?></p>
                                    </div>
                                </div>
                                <div class="single-contact-info mb-35">
                                    <div class="contact-info-icon">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <div class="contact-info-content">
                                        <h4>phone :</h4>
                                        <p><?php if(isset($row['mobileno'])) echo $row['mobileno'];   ?></p>
                                    </div>
                                </div>
                                <div class="single-contact-info">
                                    <div class="contact-info-icon">
                                        <i class="fa fa-envelope"></i>
                                    </div>
                                    <div class="contact-info-content">
                                        <h4>mail :</h4>
                                        <p><?php if(isset($row['email'])) echo $row['email'];   ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
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
