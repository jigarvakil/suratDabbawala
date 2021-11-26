<?php
include("../connection.php");
if(isset($_POST['BtnS']))
{
   $fname=$_POST['fname'];
   $lname=$_POST['lname'];
   $mno=$_POST['mno'];
   $email=$_POST['email'];
   $gender=$_POST['gender'];
   $address=$_POST['address'];
   $bod=$_POST['bod'];
   $doj=$_POST['doj'];
    $area=$_POST['area'];
   //profile
        $errors= array();
        $file_name1 = $_FILES['pic']['name'];
        $file_size1 =$_FILES['pic']['size'];
        $file_tmp1 =$_FILES['pic']['tmp_name'];
        $file_type1=$_FILES['pic']['type'];
        $arrayVar1 = explode(".", $_FILES['pic']['name']);
        $file_ext1 = end($arrayVar1);
        //$file_ext=strtolower(end(explode('.',$_FILES['lphoto']['name'])));

        $extensions1= array("jpeg","jpg","png");

        if(in_array($file_ext1,$extensions1)=== false){
           $errors[]="extension not allowed, please choose a JPEG or PNG file.";
        }

        if($file_size1 > 2097152){
           $errors[]='File size must be excately 2 MB';
        }

        if(empty($errors)==true){
           move_uploaded_file($file_tmp1,"uploads/Profile/".$file_name1);
          // echo "Success";
        }else{
           print_r($errors);
        }


        //lic

        $errors= array();
        $file_name = $_FILES['lphoto']['name'];
        $file_size =$_FILES['lphoto']['size'];
        $file_tmp =$_FILES['lphoto']['tmp_name'];
        $file_type=$_FILES['lphoto']['type'];
        $arrayVar = explode(".", $_FILES['lphoto']['name']);
        $file_ext = end($arrayVar);
        //$file_ext=strtolower(end(explode('.',$_FILES['lphoto']['name'])));

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

        $sql="INSERT INTO `tbl_systemuser` (`user_id`, `fname`, `lname`, `mobileno`, `email`, `gender`, `area_id`, `full_add`, `photo`, `dob`, `doj`, `role_id`, `status`) 
        VALUES (NULL, '$fname', '$lname', '$mno', '$email', '$gender', '$area', '$address', '$file_name1', '$bod', '$doj', '2', '1')";  
        $res=mysqli_query($con,$sql);
        $last_id = mysqli_insert_id($con);
        $sql2="INSERT INTO `tbl_doc` (`doc_id`, `doc_type`, `document_photo`, `user_id`) VALUES (NULL, 'licence', '$file_name', '$last_id')";
        $res2 = mysqli_query($con,$sql2);
       
		 

  
}

?>
<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
        
<div class="container">

<div class='col-md-8'>
  <h2>Registration form</h2><hr style="border: 2px solid #0086AD;">
  <form method='post'  enctype="multipart/form-data">
    <div class="form-group">
      <label><b>First Name:</b></label>
      <input type="text" class="form-control" id="fname" placeholder="Enter first name" name="fname">
    </div>
    <div class="form-group">
      <label><b>Last Name:</b></label>
      <input type="text" class="form-control" id="lname" placeholder="Enter last name" name="lname">
    </div>
    <div class="form-group">
      <label><b>Mobile No.:</b></label></label>
      <input type="text" class="form-control" id="mno" placeholder="Enter your mobile number" name="mno">
    </div>
    <div class="form-group">
      <label><b>Email:</b></label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="form-group">
    <label><b>Gender:</b></label><br>
      <input type="radio"  id="male" value="1" name="gender">
      male
      <input type="radio" id="female" value="2" name="gender">
      female
    </div>
    <div class="form-group">
      <label><b>Area:</b></label>
      <select class="form-control" id="area" name="area"  onchange="autoSubmit();> 
        <option value="">--select area--</option>
    <?php
        //parent_id=0 means main table
        $sql = "select * from tbl_area";
        $result = mysqli_query($con,$sql);
        while ($row = mysqli_fetch_array($result)) {
            ?>
                    <option value="<?= $row['area_id'] ?>"><?= $row['area'] ?></option>
            <?php   
        }
    ?>
        
      </select>
    </div>
    <div class="form-group">
      <label><b>Address:</b></label>
      <textarea class="form-control" id="address" placeholder="Enter address" name="address"  rows="10" cols="1ss0"></textarea>
    </div>


    <div class="form-group">
      <label for="email"><b>Profile Photo:</b></label><br>
      <input type="file" class="" id="pic" placeholder="Enter email" name="pic">
    </div>


    <div class="form-group">
      <label><b>birth date :</b></label>
      <input type="date" class="form-control" id="bod" placeholder="Enter birth date" name="bod">
    </div>
    <div class="form-group">
      <label><b>joining date:</b></label>
      <input type="text" class="form-control" id="bod" value="<?php echo date("Y/m/d"); ?>" name="doj" disabled >
      
    </div>
    
    
    <div class="form-group">
      <label><b>Licence Photo:</b></label><br>
      <input type="file" class="" id="lphoto" placeholder="Enter number" name="lphoto" required>
    </div>
    
    <button type="submit" name="BtnS" class="btn btn-primary">Submit</button>
    </div>
    </form>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>