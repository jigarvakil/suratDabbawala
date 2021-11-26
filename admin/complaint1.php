<?php
	include_once('connection.php');
	include_once("check_session.php");
	if(isset($_GET['id']))
	{
		$id=$_GET['id'];
		$sql2="update tbl_complaint set status=1 where compid=$id";
		$query=mysqli_query($con,$sql2);
		$sql="select * from tbl_complaint where compid=$id";
		$query=mysqli_query($con,$sql);
		$row=mysqli_fetch_assoc($query);
	}
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
							<h3 class="panel-title">List of Complaints</h3>
						</div>
					
                            <div class="panel-body">
 
	
			<table class="table table-hover">
				<thead>
					
					<tr>
						<th>Date</th>
						<td><?php echo $row['date'];?></td>
						</tr>
					<tr>
						<th>Title</th>
									<td><?php echo $row['title'];?></td>
						</tr>
					<tr>
						<th>Description</th>
						<td><?php echo $row['description'];?></td>
						</tr>
					<tr>
						<th>user</th>
						<td><?php echo $row['userid'];?></td>
						</tr>
					<tr>
						<th>dbuser</th>
						<td><?php echo $row['dbuserid'];?></td>
						</tr>
					<tr>
						<th>Orderid</th>
						<td><?php echo $row['oid'];?></td>
						</tr>
				</thead>
				<tbody>
						
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
