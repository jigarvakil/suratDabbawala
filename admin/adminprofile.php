<?php
	
	include_once('connection.php');
	include_once("check_session.php");
?>


<!DOCTYPE html>
<html lang="en">
    
	<head>
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">
		
        <link rel="shortcut icon" href="img/favicon_1.ico">
		
        <title> Admin </title>
		<?php include_once ("up_link.php")?>
	</head>
	
	
    <body>
		
		<?php include_once('navigation.php'); ?>
        
		<section class="content">
        	
			<?php include_once('header.php'); ?>
                        
            <div class="wraper container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="bg-picture" style="background-image:url('img/bg_6.jpg')">
                          <span class="bg-picture-overlay"></span><!-- overlay -->
                          <!-- meta -->
                          <div class="box-layout meta bottom">
                            <div class="col-sm-6 clearfix">
                              <span class="img-wrapper pull-left m-r-15"><img src="img/2.jpg" alt="" style="width:64px" class="br-radius"></span>
                              <div class="media-body">
                                <h4 class="text-white mb-2 m-t-10 ellipsis">Pooja Vankhede</h4>
                                <h4 class="text-white mb-2 m-t-10 ellipsis">Pintu Savani</h4>
                                <h6 class="text-white"> Surat</h6>
                              </div>
                            </div>
                          <!--/ meta -->
                        </div>
                    </div>
                </div>

                <div class="row m-t-30">
                    <div class="col-sm-12">
                        <div class="panel panel-default p-0">
                            <div class="panel-body p-0"> 
                                <ul class="nav nav-tabs profile-tabs">
                                    <li class="active"><a data-toggle="tab" href="#aboutme">About Me</a></li>
                                    <li class=""><a data-toggle="tab" href="#edit-profile">Profile</a></li>
                                </ul>

                                <div class="tab-content m-0"> 

                                <div id="aboutme" class="tab-pane active">
                                    <div class="profile-desk">
                                        <h1></h1>
                                       
                                        <table class="table table-condensed">
                                            <thead>
                                                <tr>
                                                    <th colspan="3"><h3>Contact Information</h3></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><b>Url</b></td>
                                                    <td>
                                                    <a href="#" class="ng-binding">
                                                        www.dabbawala.com
                                                    </a></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Email</b></td>
                                                    <td>
                                                    <a href="#" class="ng-binding">
                                                        pintusavani25@gmail.com and 
                                                        poojawankhede999@gmail.com
                                                    </a></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Phone</b></td>
                                                    <td class="ng-binding">(123)-456-7890</td>
                                                </tr>
                                               
                                            </tbody>
                                        </table>
                                    </div> <!-- end profile-desk -->
                                </div> <!-- about-me -->

                                <!-- settings -->
                                <div id="edit-profile" class="tab-pane">
                                    <div class="user-profile-content">
                                        <div class="call-md-6">
                                    <table class="table table-hover">
								<thead>
									<tbody>
										<?php
											
                                            $sql="select * from tbl_aprofile";
                                           $echo= $query=mysqli_query($con,$sql);
                                           $i=1;
											while($row=mysqli_fetch_assoc($query))
											{
												$id=$row['aid'];
                                            ?>
                                            <tr>
                                            <th><b> Full Name :</b></th>
												<td><?php echo $row['fname'];?></td>
											</tr>
											
											<tr>
                                            <th><b>Email :</b></th>
												<td><?php echo $row['email'];?></td>
											</tr>
											<tr>
                                            <th><b> Address :</b></th>
												<td><?php echo $row['address'];?></td>
                                            </tr>
                                            <tr>
                                            <th> <b>User Name :</b></th>
												<td><?php echo $row['username'];?></td>
											</tr>
                                            <tr> 
                                                <td>
                                            <a class="btn btn-warning" href="recoverpwd.php?id=<?php echo $id;?>">
                                                <i class="">Change Password</i>
                                            </a>
                                            </td>
                                            <br>
                                            </tr>
                                            <tr> 
                                                <td >
                                            <a class="btn btn-success" href="updateprofile.php?id=<?php echo $id;?>">
                                                <i class="">Edit Profile</i>
                                            </a>
                                            
                                            </td>
                                            </tr>
                                           
											<?php
											}//end while loop
										?>
									</tbody>
								</thead>
								
							</table>

                                    </div>
                                </div>
                                        </div>
                        </div> 
                    </div>
                </div>
            </div>
            

			<?php include_once ("down_link.php")?>
		</body>
		</html>
	<?php include_once('footer.php'); ?>

</section>
