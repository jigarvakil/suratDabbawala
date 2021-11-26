<?php
	
    include_once('connection.php');
    include_once("check_session.php");
	if(isset($_REQUEST['submit']))
	{
        $user=$_SESSION['userid'];
        $oid=$_REQUEST['oid'];
      
		$ctype=$_REQUEST['ctype'];
       
        $title=$_REQUEST['title'];
        $date=date('Y-m-d');
        $description=$_REQUEST['description'];
        $query="INSERT INTO `tbl_complaint` (`compid`, `ctype`, `date`, `title`, `description`, `userid`, `oid`, `status`) VALUES (NULL, '$ctype', '$date', '$title', '$description', '$user', '$oid', '0')";
        // echo $query;
        // exit;
        $res=mysqli_query($con,$query);
		if(mysqli_query($con,$query)){
			echo "<script type='text/javascript'>alert('Compalaint register success');</script>";
		}
		else
		{
			header("location:complaint.php");
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
                    <h3>Complaint</h3>
                    <ul>
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li class="active">Complaint</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="contact-area pt-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="contact-message-wrapper">
                            <h4 class="contact-title mb-25">Leave Your Complaint</h4>
                            <div class="contact-message">
                                <form id="contact-form"  name="f1" method="post">
                                    <div class="row">
                                    <div class="form-group col-md-4"> 
                                        <select name="ctype">
                                         <option value="">---Complaint Type---</option>
                                        <option value="0">Delivery Time</option>
                                         <option value="1">Food Quality</option>
                                         <option value="2">Others</option>
                                        </select>
                                     </div>
                                     </br>
                                     </br>
                                     <div class="form-group col-md-4"> 
                                        <select name="oid">
                                         <option value="">---Order ---</option>
                                        <?php 
                                            $id=$_SESSION['userid'];
                                            $sql="select * from tbl_order where userid=$id";
                                            // echo $sql;
                                            // exit;
                                            $res=mysqli_query($con,$sql);
                                            while($row=mysqli_fetch_assoc($res))
                                            {
                                                ?>
                                                    <option value="<?= $row['oid'] ?>"><?php echo $row['description']."  ".$row['odate'] ?></option>
                                                <?php
                                            
                                            }
                                        ?>
                                        </select>
                                     </div>
                                     </br>
                                     </br>
                                    
                                    <div class="col-lg-12">
                                            <div class="contact-form-style mb-20">
                                            <input type="text" name="date" id="date" value="<?php echo date("Y/m/d"); ?>" disabled >
     				                        </div>
                                        </div>
                                        
                                        <div class="col-lg-12">
                                            <div class="contact-form-style mb-20">
                                                <input name="title" placeholder="Enter Title" type="text">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="contact-form-style">
                                                <textarea name="description" placeholder="Enter Description"></textarea>
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
                            <h4 class="contact-title mb-18"> Help</h4>
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
					ctype:
					{
						required: true,
						
					},
					date:
					{
						required: true,
					
					},
					title:
					{
						required: true,
						minlength:5,
						maxlength:20,
					},
					description:
					{
						required: true,
						minlength:10,
						maxlength:100,
					}
				},
				// Specify validation error messages
				messages: 
				{
					ctype:
					{
						required: "Please select your complaint type",
					},
					date:
					{
						required: "Please enter your complaint date",
					},
					title:
					{
						required: "Please enter your title",
						minlength:"Minimum 5 length needed",
						maxlength:"Sorry only 20 character is needed",
					},
					description:
					{
						required: "Please enter your description",
						minlength:"Minimum 10 length needed",
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
