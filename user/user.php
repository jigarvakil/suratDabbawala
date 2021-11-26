<?php
	
	include_once('connection.php');
	include_once("check_session.php");
	$uid=$_SESSION['userid'];
	$q1="select email from tbl_user where userid=$uid";
	$res=mysqli_query($con,$q1);
	$row=mysqli_fetch_assoc($res);
	if(isset($_REQUEST['submit']))
	{
		$firstname=$_REQUEST['firstname'];
		$lastname=$_REQUEST['lastname'];
		$gender=$_REQUEST['gender'];
		$address=$_REQUEST['address'];
		$mobileno=$_REQUEST['mobileno'];
		//$email1=$_REQUEST['email'];
		$address=$_REQUEST['address'];
		$doj=$_REQUEST['doj'];
		$dob=$_REQUEST['dob'];
		 $refcode=$firstname.rand('1000','9999');
		
		$areaid=$_REQUEST['areaid'];
		
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
           move_uploaded_file($file_tmp1,"../uploads/user/".$file_name1);
          // echo "Success";
        }else{
           print_r($errors);
        }

		$sql="
		
		UPDATE `tbl_user` SET `firstname` = '$firstname', `lastname` = '$lastname', `gender` = '$gender', `mobileno` = '$mobileno', `address` = '$address', `photo` = '$file_name1', `doj` = '$doj', `dob` = '$dob', `refcode` = '$refcode', `areaid` = '$areaid' WHERE `tbl_user`.`userid` = $uid
		
		";  
        $res=mysqli_query($con,$sql);
		
		
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
                    <h3>REGISTRATION</h3>
                    <ul>
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li class="active">REGISTRATION</li>
                    </ul>
                </div>
            </div>
        </div>
    <div class="container">

        <div class='col-md-8'>
            <hr>
			
            <form method='post'name="f1" enctype="multipart/form-data">
                <div class="form-group">
                    <label><b>First Name:</b></label>
                    <input type="text" class="form-control" id="firstname" placeholder="Enter first name" name="firstname">
                </div>
                <div class="form-group">
                    <label><b>Last Name:</b></label>
                    <input type="text" class="form-control" id="lastname" placeholder="Enter last name" name="lastname">
                </div>
                <div class="form-group col-md-4" id="gender">
                    <label><b>Gender:</b></label>
                    <select name="gender">
                        <option value="">---Select Gender---</option>
                        <option value="0">Male</option>
                        <option value="1">Female</option>
                    </select>
                </div>

                <div class="form-group">
                    <label><b>Mobile No.:</b></label></label>
                    <input type="text" class="form-control" id="mobileno" placeholder="Enter your mobile number" name="mobileno">
                </div>
                <div class="form-group">
					<label><b>Email:</b></label>
					
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email'];?>" disabled>
                </div>

                <div class="form-group">
                    <label><b>Address:</b></label>
                    <textarea class="form-control" id="address" placeholder="Enter address" name="address" rows="5"
                        cols="1ss0"></textarea>
                </div>
                <div class="form-group">
                    <select name="areaid" id="areaid" class="form-control">
                        <option>-----Area Name-----</option>
                        <?php
                          $sql="select * from tbl_area";
                          $res=mysqli_query($con,$sql);
                          
                          while($row=mysqli_fetch_assoc($res))
													{
                          
													?>
                        <option value="<?php echo $row['areaid']; ?>"><?php echo $row['areaname']; ?></option>
                        <?php
													}
													
												?>
                    </select>
                </div>

                <div class="form-group">
                    <label><b>Profile Photo:</b></label><br>
                    <input type="file" class="" id="photo" placeholder="Enter email" name="photo">
                </div>

                <div class="form-group">
                    <label><b>birth date :</b></label>
                    <input type="date" class="form-control" id="dob" placeholder="Enter birth date" name="dob">
				</div>
				
                <div class="form-group">
                    <label><b>joining date:</b></label>
					<input type="text" class="form-control" id="bod" value="<?php echo date("Y/m/d"); ?>" name="doj" hidden >
     				 </div>
				
                <button class="submit btn-style" name="submit" type="submit" class="btn btn primary">SUBMIT</button>
        </div>

        </br>

        <?php include_once('footer.php'); ?>




        <?php include_once('down_link.php'); ?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
		<script>
			$("form[name='f1']").validate({
				rules: 
				{
					fname:
					{
						required: true,
						
					},
					lname:
					{
						required: true,
					
					},
					gender:
					{
						required: true,
						
					},
					mno:
					{
						required: true,
						minlength:10,
						maxlength:10,
                        digits:true,
					},
                   address:
					{
						required: true,
						minlength:10,
						maxlength:100,
					},
					areaid:
					{
						required: true,
					},
					pic:
					{
						required: true,
						
					},
                    bod:
					{
						required: true,
						
					},
					doj:
					{
						required: true,
						
					}
				},
				// Specify validation error messages
				messages: 
				{
					fname:
					{
						required: "Please enter your First Name",
						
					},
					lname:
					{
						required: "Please enter your Last Name",
					},
					gender:
					{
						required: "Please select your Gender",
						
					},
					mno:
					{
						required: "Please enter your Mobile Number",
						minlength:"Minimum 10 length needed",
                        maxlength:"Sorry only 10 character is needed",
                        digits:"Only number is accepted",
                    },
                    address:
					{
                        required: "Please enter your Address",
                        minlength:"Minimum 10 length needed",
                        maxlength:"Sorry only 100 character is needed",
						
					},
                    areaid:
					{
						required: "Please select your area",
						
					},
					pic:
					{
						required: "Please select your photo",
						
					},
					bod:
					{
						required: "Please select your birthdate",
						
					},
					doj:
					{
						required: "Please select your joining date",
						
					}
				},
				submitHandler: function(form) {
					form.submit();
				}
			});
		</script>
		
       

</body>

</html>