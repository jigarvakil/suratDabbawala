<?php
	
	include_once('connection.php');
	include_once("check_session.php");
	if(isset($_REQUEST['submit']))
	{
        $dbuser=$_SESSION['dbuserid'];
		
		$date=$_REQUEST['date'];
		$no_of_days=$_REQUEST['no_of_days'];
        $reason=$_REQUEST['reason'];
        
         $query="INSERT INTO `tbl_leave`(`leaveid`, `date`, `no_of_days`, `reason`, `status`, `dbuserid`) VALUES (NULL,'$date','$no_of_days','$reason','0','$dbuser')";
        
        $res=mysqli_query($con,$query);
		
		if(mysqli_query($con,$query)){
			echo "<script type='text/javascript'>alert('insert success');</script>";
		}
		else
		{
			header("location:leave.php");
		}
		
		
	}
	
?>
<!DOCTYPE html>
<html lang="en">
	
	<head>
        <meta charset="utf-8" />
        <title>Dabbawala leave</title>
		<?php include_once ("up_link.php")?>
	</head>
	
    <body data-layout="horizontal">
		
        <div id="wrapper">
            <?php include_once ("header.php")?>
            <hr>
			<div class="content-page">
                <div class="content">
					
            
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h3 class="header-title mb-4">Leave Message</h3>

                                        <form method="post" name="f1">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4" class="col-form-label">Date:</label>
                                                    <input type="date" class="form-control" name="date" id="date" placeholder="date">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="no-of_days" class="col-form-label">No Of Days</label>
                                                    <input type="text" class="form-control" name="no_of_days" id="no_of_days" placeholder="Enter Leave No Of Days">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="reason" class="col-form-label">Reason</label>
                                                <input type="text" class="form-control" id="reason" name="reason" placeholder="Enter Leave Reason">
                                            </div>
                                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                        <?php include_once ("footer.php")?>
		


<div class="right-bar">
	<div class="rightbar-title">
		<a href="javascript:void(0);" class="right-bar-toggle float-right">
			<i class="mdi mdi-close"></i>
		</a>
		<h4 class="font-17 m-0 text-white">Theme Customizer</h4>
	</div>
	<div class="slimscroll-menu">
        
		<div class="p-4">
			<div class="alert alert-warning" role="alert">
				<strong>Customize </strong> the overall color scheme, layout, etc.
			</div>
			<div class="mb-2">
				<img src="assets/images/layouts/light.png" class="img-fluid img-thumbnail" alt="">
			</div>
			<div class="custom-control custom-switch mb-3">
				<input type="checkbox" class="custom-control-input theme-choice" id="light-mode-switch" checked />
				<label class="custom-control-label" for="light-mode-switch">Light Mode</label>
			</div>
            
			<div class="mb-2">
				<img src="assets/images/layouts/dark.png" class="img-fluid img-thumbnail" alt="">
			</div>
			<div class="custom-control custom-switch mb-3">
				<input type="checkbox" class="custom-control-input theme-choice" id="dark-mode-switch" data-bsStyle="assets/css/bootstrap-dark.min.css" 
				data-appStyle="assets/css/app-dark.min.css" />
				<label class="custom-control-label" for="dark-mode-switch">Dark Mode</label>
			</div>
            
			<div class="mb-2">
				<img src="assets/images/layouts/rtl.png" class="img-fluid img-thumbnail" alt="">
			</div>
			<div class="custom-control custom-switch mb-5">
				<input type="checkbox" class="custom-control-input theme-choice" id="rtl-mode-switch" data-appStyle="assets/css/app-rtl.min.css" />
				<label class="custom-control-label" for="rtl-mode-switch">RTL Mode</label>
			</div>
			
		</div>
	</div>
</div>
<div class="rightbar-overlay"></div>

<a href="javascript:void(0);" class="right-bar-toggle demos-show-btn">
	<i class="mdi mdi-settings-outline mdi-spin"></i> &nbsp;Choose Demos
</a>

<?php include_once ("down_link.php")?>
</body>

</html>