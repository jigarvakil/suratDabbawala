<?php
	
    include_once('connection.php');
    include_once("check_session.php");
    $user=$_SESSION['userid'];
   
	
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
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       </head>
    <body>
	
	<?php include_once ("header.php")?>
    
    <div class="breadcrumb-area  ptb-80">
	</div>
    <div class="breadcrumb-area bg-img ptb-80" style="background-image:url(assets/img/banner/breath.jpg);">
            <div class="container">
                <div class="breadcrumb-content text-center">
                    <h3>Package Information</h3>
                    <ul>
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li class="active">Package Information</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="contact-area pt-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                       
					   <table class="table table-hover">
						   <thead>
							   <tr>
                                <th>order id</th>
							    <th>order date</th>
							    <th>Thali Name</th>
							    <th>Description</th>
								
								<th>status</th>
							   </tr>
						   </thead>
						   <tbody>
							   
						   
					   <?php
					   $i=1;
						$sql="select * from tbl_order as o
                        join tbl_thali t 
                        on o.thaliid=t.thaliid
                        where userid=$user";
                        
                        $result=mysqli_query($con,$sql);
                        $row=mysqli_fetch_assoc($result);
                        echo '<pre>';
                        print_r( $row);
                        echo '</pre>';
						while($row=mysqli_fetch_assoc($result))
						{
							
						?>
								<tr>
                                <td><?php echo $i++; ?></td>
								<td><?php echo $row['d_date']; ?></td>
								<td>
								    <?php 
										if($row['status']==0)
										    echo "Not Deliverd";
										elseif($row['status']==1)
											echo "Deliverd success";
										else 
											echo "Order cancled/deliver not success"; 
										?>
								</td>									
                                </tr>
						<?php
						}
                       ?> 
					   </tbody>
					   </table>
					   
                    </div>
                </div>
                <div class="map-area pt-10">
                   
                </div>
            </div>
        </div>


			<?php include_once('footer.php'); ?>
        
        
        
        
		<?php include_once('down_link.php'); ?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>		
       </body>

</html>
