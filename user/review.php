<?php
	
    include_once('connection.php');
    include_once("check_session.php");
	if(isset($_REQUEST['submit']))
	{
		$user=$_SESSION['userid'];
		$massage=$_REQUEST['massage'];
		 $query="INSERT INTO `tbl_review` (`rid`, `userid`, `massage`) VALUES (NULL, '$user','$massage')";
        // echo $query;
         //exit;
         
        $res=mysqli_query($con,$query);
		
		if(mysqli_query($con,$query)){
			echo "<script type='text/javascript'>alert('insert success');</script>";
		}
		else
		{
			header("location:review.php");
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
                    <h3>Review</h3>
                    <ul>
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li class="active">Review</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="contact-area pt-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="contact-message-wrapper">
                            <h4 class="contact-title mb-25">Leave Your Review</h4>
                            <div class="contact-message">
                                <form id="contact-form"  name="f1" method="post">
                                    <div class="row">
                                        
                                        <div class="col-lg-12">
                                            <div class="contact-form-style">
                                                <textarea name="massage" placeholder="Enter massage"></textarea>
                                                <button class="submit btn-style" type="submit" name="submit">SUBMIT</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <p class="form-messege"></p>
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
					message:
					{
						required: true,
						minlength:5,
						maxlength:100,
					}
				},
				// Specify validation error messages
				messages: 
				{
					message:
					{
						required: "Please enter your message",
						minlength:"Minimum 5 length needed",
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
