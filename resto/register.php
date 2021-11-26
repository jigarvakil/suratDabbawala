<?php
	include_once('connection.php');
	if(isset($_REQUEST['submit']))
	{
		$restname=$_REQUEST['restname'];
		$email=$_REQUEST['email'];
		$ownername=$_REQUEST['ownername'];
		$doj=date('Y-m-d');
		$address=$_REQUEST['address'];
		$mobileno=$_REQUEST['mobileno'];
		$opentime=$_REQUEST['opentime'];
		$closetime=$_REQUEST['closetime'];
		
		 //profile
        $errors= array();
        $file_name1 = $_FILES['photo']['name'];
        $file_size1 =$_FILES['photo']['size'];
        $file_tmp1 =$_FILES['photo']['tmp_name'];
        $file_type1=$_FILES['photo']['type'];
        $arrayVar1 = explode(".", $_FILES['photo']['name']);
        $file_ext1 = end($arrayVar1);

        $extensions1= array("jpeg","jpg","png");

        if(in_array($file_ext1,$extensions1)=== false){
           $errors[]="extension not allowed, please choose a JPEG or PNG file.";
        }

        if($file_size1 > 2097152){
           $errors[]='File size must be excately 2 MB';
        }

        if(empty($errors)==true){
           move_uploaded_file($file_tmp1,"../uploads/restro/".$file_name1);
          // echo "Success";
        }else{
           print_r($errors);
        }

$sql="INSERT INTO `tbl_restaurant` (`restid`, `restname`, `email`, `ownername`, `doj`, `photo`, `address`, `mobileno`, `opentime`, `closetime`) 
        VALUES (NULL, '$restname', '$email', '$ownername', '$doj', '$file_name1','$address', '$mobileno', '$opentime',  '$closetime')";  
        $res=mysqli_query($con,$sql);
        $last_id = mysqli_insert_id($con);
	   
		header("location:../resto/login.php");
		 
		
		
		
		
		
	}
	
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Restaurant Admin</title>
		<?php include_once ("up_link.php")?>
		<style>
			form .error
			{
			color:red;
			}
		</style>
		
	</head>
	<body>
		
		
		
		<div id="">
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span12">
						<div class="widget-box">
							<div class="widget-title"> <span class="icon"> <i class="fa fa-registered"></i> </span>
								<h3>Registration Form</h3>
							</div>
							<div class="widget-content nopadding">
								<form class="form-horizontal" enctype="multipart/form-data" method="post" action="#" name="f1" id="basic_validate" novalidate="novalidate">
									<div class="control-group">
										<label class="control-label"><b>Restaurant Name : </b></label>
									 	<?php
												$restname=$_GET['restname'];
											
										?>
										
										<div class="controls">
											<input type="text" name="restname" id="restname" placeholder="Enter Restaurant Name" value="<?php echo $restname;?>">
										</div>
									</div>
									<div class="control-group">
										<label class="control-label"><b>Email :</b></label>
										<div class="controls">
											<input type="email" name="email" id="email" placeholder="Enter Restaurant Name" >
										</div>
									</div>
									<div class="control-group">
										<label class="control-label"><b>Owner Name :</b></label>
										<div class="controls">
											<input type="text" name="ownername" id="ownername" placeholder="Enter Owner Name">
										</div>
									</div>
									
									<div class="control-group">
										<label class="control-label"><b>Joining Date :</b></label>
										<div class="controls">
											<input type="text" name="doj" id="doj" value="<?php echo date("Y/m/d"); ?>" disabled>
										</div>
									</div>
									
									<div class="control-group">
										<label class="control-label"><b>Restaurant Photo:</b></label>
										<div class="controls">
											<input type="file" name="photo" id="photo" >
										</div>
									</div>
									
									<div class="control-group">
										<label class="control-label"><b>Address :</b></label>
										<div class="controls">
											<input type="text" name="address" id="address" placeholder="Enter Address">
										</div>
									</div>
									<div class="control-group">
										<label class="control-label"><b>Mobile no :</b></label>
										<div class="controls">
											<input type="text" name="mobileno" id="mobileno" placeholder="Enter Mobile No">
										</div>
									</div>
									<div class="control-group">
										<label class="control-label"><b>Open Time :</b></label>
										<div class="controls">
											<input type="time" name="opentime" id="opentime" placeholder="Enter Open Time">
										</div>
									</div>
									<div class="control-group">
										<label class="control-label"><b>Close Time :</b></label>
										<div class="controls">
											<input type="time" name="closetime" id="closetime" placeholder="Enter Close Time">
										</div>
									</div>
									
									<div class="form-actions">
										<button class="btn btn-success btn-large" name="submit" type="submit" value="Validate">SUBMIT</button>
										&nbsp;
										<button class="btn btn-danger btn-large"  name="cancel" type="button" value="Validate">CANCEL</button>
										
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				
				
				
				
				<?php include_once ("footer.php")?>
				
				<?php include_once ("down_link.php")?>
				<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
			<script>
				$("form[name='f1']").validate({
					rules: 
					{
						restname:
						{
							required: true,
							minlength:2,
							maxlength:20,
						},
						email:
						{
							required: true,
							maxlength:30,
					
						},
						ownername:
						{
							required: true,
							minlength:2,
						maxlength:20,
						},
						doj:
						{
							required: true,
							digits:true,
						},
						photo:
						{
							required: true,
						},
						address:
						{
							required: true,
							minlength:3,
						maxlength:100,

						},
						mobileno:
						{
							required: true,
							minlength:10,
						maxlength:10,
							digits:true,
						},
						opentime:
						{
							required: true,
							
						},
						closetime:
						{
							required: true,
							
						}
					},
					// Specify validation error messages
					messages: 
					{
						restname:
						{
							required: "Please enter your restaurant name",
						minlength:"Minimum 2 length needed",
						maxlength:"Sorry only 20 character is needed",
					
						},
						email:
						{
							required: "Please enter your email",
							maxlength:"Sorry only 30 character is needed",
						},
						ownername:
						{
							required: "Please enter your ower name",
							minlength:"Minimum 2 length needed",
						maxlength:"Sorry only 20 character is needed",
					
						},
						doj:
						{
							required: "Please enter date of joining",
							digits: "Only number is accepted",
						},
						photo:
						{
							required: "Please choose photo",
						},
						address:
						{
							required: "Please enter your restaurant address",
							minlength:"Minimum 2 length needed",
							maxlength:"Sorry only 20 character is needed",
						},
						mobileno:
						{
							required: "Please enter mobile no",
							minlength:"Minimum 10 length needed",
							maxlength:"Sorry only 10 character is needed",
							digits: "Only number is accepted",
						},
						opentime:
						{
							required: "Please enter restaurant open time",
							
						},
						closetime:
						{
							required: "Please enter restaurant close time",
							
						}
					},
					submitHandler: function(form) {
						form.submit();
					}
				});
			</script>
 <script>
                $(document).ready(function(){
            $("#mobileno").change(function(){
                var mn=$(this).val();
                $.ajax({
                    'url':'check.php',
                    'type':'post',
                    'data':{'txtMn':mn},
                    success:function(data)
                    {
                        if(data==1)
                        {
                            //alert("Sorry this number is already register with system");
                            swal("", "Sorry this number is already register with system", "error");
                            $('#mobileno').val('');
                        }
                    }
                });
            });
        });
    </script>
			</body>
		</html>
		