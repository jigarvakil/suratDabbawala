<?php
	include_once('connection.php');
	include_once("check_session.php");
	if(isset($_REQUEST['submit']))
	{
		$tid=$_REQUEST['tid'];
		$thaliname=$_REQUEST['thaliname'];
		$price=$_REQUEST['price'];
		$description=$_REQUEST['description'];
		$restid=$_REQUEST['restid'];
		//profile
        $errors= array();
        $file_name = $_FILES['pic']['name'];
        $file_size =$_FILES['pic']['size'];
        $file_tmp =$_FILES['pic']['tmp_name'];
        $file_type=$_FILES['pic']['type'];
        $arrayVar = explode(".", $_FILES['pic']['name']);
        $file_ext = end($arrayVar);
      

        $extensions= array("jpeg","jpg","png");

        if(in_array($file_ext,$extensions)=== false){
           $errors[]="extension not allowed, please choose a JPEG,JPG or PNG file.";
        }

        if($file_size > 2097152){
           $errors[]='File size must be excately 2 MB';
        }

        if(empty($errors)==true){
           move_uploaded_file($file_tmp,"./img/gallery/".$file_name);
         // echo "Success";
        }else{
           print_r($errors);
        }

        $sql="INSERT INTO `tbl_thali` (`tid`, `thaliname`, `price`, `pic`,`restid`,`description`) 
        VALUES ('$tid', '$thaliname', '$price', '$file_name','$restid','$description')";  
        $res=mysqli_query($con,$sql);
        $last_id = mysqli_insert_id($con);
 
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
		<?php include_once ("header.php")?>
		
		<?php include_once ("navigation.php")?>
		
		
		<div id="content">
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span12">
						<div class="widget-box">
							<div class="widget-title"> <span class="icon"> <i class="fa fa-cutlery"></i> </span>
								<h3>Thali</h3>
							</div>
							<div class="widget-content nopadding">
								<form class="form-horizontal" method="post" action="#" name="f1" id="tid" enctype="multipart/form-data">
									<div class="control-group">
										<label class="control-label">Thali Type :</label>
										<div class="controls">
											<select  name="tid" class="form-control">
												<option>-----Thali Type-----</option>
												<?php
													$sql="select * from tbl_dishtype";
													$res=mysqli_query($con,$sql);
													while($row=mysqli_fetch_assoc($res))
													{
													?>
													<option value="<?php echo $row['tid']; ?>"><?php echo $row['typename']; ?></option>
													<?php
													}
													
												?>
											</select>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Restaurant :</label>
										<div class="controls">
											<select  name="restid" class="form-control">
												<option>-----Restaurant Name-----</option>
												<?php
													$sql="select * from tbl_restaurant";
													$res=mysqli_query($con,$sql);
													while($row=mysqli_fetch_assoc($res))
													{
													?>
													<option value="<?php echo $row['restid']; ?>"><?php echo $row['restname']; ?></option>
													<?php
													}
													
												?>
											</select>
										</div>
									</div>
									
									<div class="form-group">
										<label class="control-label">Photo :</label>
										<div class="controls">
										<input type="file" id="pic" name="pic">
										</div>
									</div>
									
									
									<div class="control-group">
										<label class="control-label">Thali Name :</label>
										<div class="controls">
											<input type="text" name="thaliname" id="thaliname">
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Price :</label>
										<div class="controls">
											<input type="text" name="price" id="price">
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Description :</label>
										<div class="controls">
											<input type="text" name="description" id="description">
										</div>
									</div>
									
									
									<div class="form-actions">
										<button class="btn btn-success btn-large" name="submit" type="submit" >Send</button>
										<button class="btn btn-danger btn-large"  name="cancel" type="cancel" >Cancel</button>
										
									</div>
								</form>
							</div>
						</div>
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
						tid:
						{
							required: true,
						},
						restid:
						{
							required: true,
						},
						pic:
						{
							required: true,
						},
						thaliname:
						{
							required: true,
						},
						price:
						{
							required: true,
						},
						description:
						{
							required: true,
						}
					},
					// Specify validation error messages
					messages: 
					{
						tid:
						{
							required: "Please select thali type",
						},
						restid:
						{
							required: "Please select restaurant name",
						},
						pic:
						{
							required: "Please choose photo",
						},
						thaliname:
						{
							required: "Please enter thali name",
						},
						price:
						{
							required: "Please enter price",
						},
						description:
						{
							required: "Please enter description",
						}
					},
					submitHandler: function(form) {
						form.submit();
					}
				});
			</script>

	</body>
	</html>
		