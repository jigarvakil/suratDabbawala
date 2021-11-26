<?php
	
    include_once('connection.php');
    include_once("check_session.php");
	if(isset($_REQUEST['submit']))
	{
		$firstname=$_REQUEST['firstname'];
		$lastname=$_REQUEST['lastname'];
		$mobileno=$_REQUEST['mobileno'];
        $email=$_REQUEST['email'];
        $password=md5($_REQUEST['password']);
		$doj=$_REQUEST['doj'];
		$dob=$_REQUEST['dob'];
		$address=$_REQUEST['address'];
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

        //lic

        $errors= array();
        $file_name = $_FILES['licence']['name'];
        $file_size =$_FILES['licence']['size'];
        $file_tmp =$_FILES['licence']['tmp_name'];
        $file_type=$_FILES['licence']['type'];
        $arrayVar = explode(".", $_FILES['licence']['name']);
        $file_ext = end($arrayVar);
        //$file_ext=strtolower(end(explode('.',$_FILES['licence']['name'])));

        $extensions= array("jpeg","jpg","png");

        if(in_array($file_ext,$extensions)=== false){
           $errors[]="extension not allowed, please choose a JPEG or PNG file.";
        }

        if($file_size > 2097152){
           $errors[]='File size must be excately 2 MB';
        }

        if(empty($errors)==true){
           move_uploaded_file($file_tmp,"../uploads/user/".$file_name);
          // echo "Success";
        }else{
           print_r($errors);
        }



$sql="INSERT INTO `tbl_dabbawala`(`dbuserid`, `firstname`, `lastname`, `mobileno`, `email`, `password`, `photo`, `doj`, `dob`, `address`, `areaid`)
  VALUES (NULL,'$firstname', '$lastname','$mobileno', '$email','$password', '$file_name1', '$doj','$dob','$address','$areaid')";  
        $res=mysqli_query($con,$sql);
        $last_id = mysqli_insert_id($con);
		$sql2="INSERT INTO `tbl_doc` (`doc_id`, `doc_type`, `document_photo`, `user_id`) VALUES (NULL, 'licence', '$file_name', '$last_id')";
        $res2 = mysqli_query($con,$sql2);
       
	}
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <title>Register | Velonic - Responsive Bootstrap 4 Admin Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Responsive bootstrap 4 admin template" name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-stylesheet" />

    </head>

    <body class="authentication-page">

        <div class="account-pages my-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card mt-4">
                            <div class="card-header text-center p-4 bg-primary">
                                <h4 class="text-white mb-0 mt-0"> <img src="assets/images/Surat Dabbawala.png" alt="" height="40"></h4>
                                <h5 class="text-white font-13 mb-0">Create a new Account</h5>
                            </div>
                            <div class="card-body">
                                <form action="#" method="post" name="f1" class="p-2" enctype="multipart/form-data">

                                <div class="form-group mb-3">
                                        <label for="firstname">First name :</label>
                                        <input class="form-control" type="text" id="firstname" name="firstname" required="" placeholder="Enter First Name">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="lastname">Last name :</label>
                                        <input class="form-control" type="text" id="lastname" name="lastname" required="" placeholder="Enter Last Name">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="mobileno">Mobile no :</label>
                                        <input class="form-control" type="text" id="mobileno" name="mobileno" required="" placeholder="Enter Mobile no">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="email">Email :</label>
                                        <input class="form-control" type="email" id="email" name="email" required="" placeholder="Enter Your Email">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="password">Password :</label>
                                        <input class="form-control" type="password" id="password" name="password" required="" placeholder="Enter your password">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="photo">Profile Photo :</label>
                                        <input class="form-control" type="file" id="photo" name="photo" required="" >
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="licence">Licence Photo :</label>
                                        <input class="form-control" type="file" id="licence" name="licence" required="" >
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="date">Date Of Joining :</label>
                                        <input class="form-control" type="date" id="doj" name="doj"  required="" placeholder="Enter Your Joining Date">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="date">Date Of Birth :</label>
                                        <input class="form-control" type="date" id="dob" name="dob" required="" placeholder="Enter Your Birthdate">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="address">Address :</label>
                                        <input class="form-control" type="address" id="address" name="address" required="" placeholder="Enter Your Address">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="address">Area Name :</label>
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
                                    <div class="form-group text-right mt-4 mb-4">
                                        <div class="col-12">
                                            <button class="btn btn-md btn-primary waves-effect waves-light" type="submit" name="submit">Register</button>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-sm-12 text-center">
                                            <a href="login.php">Already have account?</a>
                                        </div>
                                    </div>
                                </form>

                            </div>
                           </div>
                        </div>
                    </div>
                
            </div>
        </div>
    <script src="assets/js/vendor.min.js"></script>
    <script src="assets/js/app.min.js"></script>

    </body>

</html>