<?php
	
    include_once('connection.php');
    include_once("check_session.php");
	if(isset($_REQUEST['submit']))
	{
		$user=$_SESSION['userid'];
		$subject=$_REQUEST['subject'];
		$message=$_REQUEST['message'];
		 $query="INSERT INTO `tbl_contact` (`contactid`, `userid`, `subject`, `message`) VALUES (NULL, '$user','$subject','$message')";
        
        $res=mysqli_query($con,$query);
		
		if(mysqli_query($con,$query)){
			echo "<script type='text/javascript'>alert('insert success');</script>";
		}
		else
		{
			header("location:contact.php");
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
                    <h3>Contact us</h3>
                    <ul>
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li class="active">Contact us</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="contact-area pt-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="contact-message-wrapper">
                            <h4 class="contact-title mb-25">Leave Us a Message</h4>
                            <div class="contact-message">
                                <form id="contact-form"  name="f1" method="post">
                                    <div class="row">
                                        
                                        <div class="col-lg-12">
                                            <div class="contact-form-style mb-20">
                                                <input name="subject" placeholder="Subject" type="text">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="contact-form-style">
                                                <textarea name="message" placeholder="Message"></textarea>
                                                <button class="submit btn-style" type="submit" name="submit">SUBMIT</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <p class="form-messege"></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="contact-info-area">
                            <h4 class="contact-title mb-18">Contact Us</h4>
                            <p>Whether you have a question about features, trials, pricing, need a demo, or anything else, our team is ready to answer all your questions </p>
                            <div class="contact-info-wrap">
                                <div class="single-contact-info mb-40">
                                    <div class="contact-info-icon">
                                        <i class="fa fa-map-marker"></i>
                                    </div>
                                    <div class="contact-info-content">
                                        <h4>Location :</h4>
                                        <p>77, seventh avenue, Road SURAT.</p>
                                    </div>
                                </div>
                                <div class="single-contact-info mb-35">
                                    <div class="contact-info-icon">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <div class="contact-info-content">
                                        <h4>phone :</h4>
                                        <p>+00 111 222 333 44</p>
                                        <p>+00 111 222 333 44</p>
                                    </div>
                                </div>
                                <div class="single-contact-info">
                                    <div class="contact-info-icon">
                                        <i class="fa fa-envelope"></i>
                                    </div>
                                    <div class="contact-info-content">
                                        <h4>mail :</h4>
                                        <p><a href="#">dabbawala@gmail.com</a></p>
                                        <p><a href="#">info@example.com</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="map-area pt-100">
                    <div id="googleMap"></div>
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
