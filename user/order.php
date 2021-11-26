<?php
	include_once('connection.php');
	include_once("check_session.php");
	
?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>User</title>
    <?php include_once ("up_link.php")?>
    <style>
    form .error {
        color: red;
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
                <h3>Order Thalis</h3>
                <ul>
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li class="active">Order Thali</li>
                </ul>
            </div>
        </div>
    </div>


    <!-- <div class="col-lg-12">

    <div class="card">
        <div class="card-body">
            <h4 class="header-title mb-10"> <b>Restaurant</b> </h4>

            <div class="table-responsive">
                <table class="table table-dark mb-0">
                    


                    <tbody>
					<thead>
					<tr>
							
								<td><b>Restaurant Photo</b></td>
								<td><b>Restaurant Name</b></td>
								<td><b>Restaurant Thalis</b></td>
							</tr>
							
						<thead>
                        <?php
                            
                        $sql="select * from tbl_restaurant"; 
                            $query=mysqli_query($con,$sql);
                            $i=1;
                            while($row=mysqli_fetch_assoc($query))
                            {
                                $id=$row['restid'];
							?>
							<tr>
							 <td><img src="../uploads/restro/<?php echo $row['photo'];?>" height="100%"  /></td>
                             <td><?php echo $row['restname'];?></td>
							 <td>
							<a href="orderthali.php?rid=<?= $_GET['id'] ?>" class="btn btn-info">View Thalies </a> 
							</td>
                            </tr>
                            
                            <tr>
         
                                
                            </tr>
                            <?php
                            }//end while loop
                        ?>
                    </tbody>
                </thead>
                
                </table>
            </div>

        </div>
    </div> -->
    <br>
    <div class="row">
       
        <?php
                            
         $sql="select * from tbl_restaurant"; 
        $query=mysqli_query($con,$sql);
        $i=1;
        while($row=mysqli_fetch_assoc($query))
        {
            $id=$row['restid'];
        ?>
        
        <div style="margin-left:50px" class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="single-team text-center mb-30">
                <div class="team-img-icon overlay">
                <img src="../uploads/restro/<?php echo $row['photo'];?>" height="315px" />
                    <div class="team-social-icon">
                        <ul>
                            <li>
                                <a class="twitter" href="orderthali.php?rid=<?= $id ?>" data-toggle="tooltip" data-placement="top" title="View Thali">
                                    <i class="fa fa-cutlery ">  </i>
                                    
                                </a>
                            </li>
                            
                        </ul>
                    </div>
                </div>
                <div class="team-info">
                    <h3><?php echo $row['restname'];?></h3>
                    
                </div>
            </div>
        </div>
       
        <?php
                                }//end while loop
                            ?>
    </div>


    </div>




    <?php include_once('footer.php'); ?>

    <?php include_once('down_link.php'); ?>
</body>
<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
});
</script>

</html>