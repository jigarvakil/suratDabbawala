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

        <title> Admin  </title>
       <?php include_once ("up_link.php")?>
    </head>


    <body>
		<?php include_once('navigation.php'); ?>
        <section class="content">
            
				<?php include_once('header.php'); ?>
			
            <div class="wraper container-fluid">
                <div class="page-title"> 
                    
				</div>
				
                <div class="row">
                         <div class="panel panel-color panel-inverse">
						<div class="panel-heading">
							<h3 class="panel-title">Area Details</h3>
						</div>
					
                            <div class="panel-body">

			<table class="table table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th> Area Name</th>
						<th>Pincode</th>
						<th>latitude</th>
						<th>longitude</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$sql="select * from tbl_area";
						$query=mysqli_query($con,$sql);
						$i=1;
						while($row=mysqli_fetch_assoc($query))
						{
							$id=$row['areaid'];
						?>
						<tr>
							<td><?php echo $i++;?></td>
							<td><?php echo $row['areaname'];?></td>
							<td><?php echo $row['pincode'];?></td>
							<td><?php echo $row['latitude'];?></td>
							<td><?php echo $row['longitude'];?></td>
							<td>
								<a class="btn btn-success" href="updatearea.php?id=<?php echo $id;?>">
									<i class="fa fa-pencil"></i>
								</a>
								<a class="btn btn-danger" href="areadelete.php?id=<?php echo $id;?>">
									<i class="fa fa-trash"></i>
								</a>
	
							</td>
						</tr>
						<?php
						}//end while loop
					?>
				</tbody>
			</table>
		</div>
	</div>
	</div>
	</div>
<?php include_once ("down_link.php")?>
    </body>
</html>
			<?php include_once('footer.php'); ?>

        </section>
        
