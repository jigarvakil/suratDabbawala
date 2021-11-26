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
                <div class="page-title"> 
                    
				</div>
				
                <div class="row">
                         <div class="panel panel-color panel-inverse">
						<div class="panel-heading">
							<h3 class="panel-title">Package Details</h3>
						</div>
					
                            <div class="panel-body">

			<table class="table table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>Package ID</th>
                        <th>Package Start Date</th>
                        <th>Package End Date</th>
						<th>User</th>
						<th>Amount</th>
						<th>Discount</th>
                        <th>Remark</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$sql="select * from tbl_packageinfo ";
						$query=mysqli_query($con,$sql);
						$i=1;
						while($row=mysqli_fetch_assoc($query))
						{
							$id=$row['pid'];
						?>
						<tr>
							<td><?php echo $i++;?></td>
							<td><?php echo $row['pid'];?></td>
							<td><?php echo $row['packstartdate'];?></td>
                            <td><?php echo $row['packenddate'];?></td>
							<td><?php echo $row['userid'];?></td>
                            <td><?php echo $row['amount'];?></td>
							<td><?php echo $row['discount'];?></td>
                            <td><?php echo $row['remark'];?></td>
                            <td><?php echo $row['status'];?></td>
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
