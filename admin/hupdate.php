
<?php
include_once('connection.php');
include_once("check_session.php");
$id = $_GET['id'];
$sql="select * from tbl_holiday where holidayid=$id";
mysqli_query($con,$sql);
header("Location:holiday.php");
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
                    <h3 class="title">Holiday</h3> 
				</div>
				
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class=" form p-20">
                                    <form class="cmxform form-horizontal tasi-form" id="commentForm" method="get" action="#" novalidate="novalidate">
                                        <div class="form-group">
											<label for="cemail" class="control-label col-lg-2"> Generate Date(required)</label>
                                            <div class="col-lg-10">
												<div class='input-group date' id='datetimepicker6'>
													<input type='date' class="form-control" name="gdate" required="" aria-required="true"/>
													<span class="input-group-addon">
														<span class="glyphicon glyphicon-calendar"></span>
													</span>
												</div>
											</div>
										</div>
			                            <div class="form-group ">
                                            <label for="Title" class="control-label col-lg-2">Title(optional)</label>
                                            <div class="col-lg-10">
                                                <input class="form-control " id="title" type="text" name="title">
											</div>
										</div>
                                        <div class="form-group ">
                                            <label for="reason" class="control-label col-lg-2">Reason(required)</label>
                                            <div class="col-lg-10">
                                                <textarea class="form-control " id="reason" name="reason" required="" aria-required="true"></textarea>
											</div>
										</div>
										<div class="form-group">
											<label for="cemail" class="control-label col-lg-2"> Holiday Date(required)</label>
                                            <div class="col-lg-10">
												<div class='input-group date' id='datetimepicker6'>
													<input type='date' class="form-control" name="holidaydate" required="" aria-required="true"/>
													<span class="input-group-addon">
														<span class="glyphicon glyphicon-calendar"></span>
													</span>
												</div>
												</br>
												<div class="form-group">
													<div class="col-lg-offset-2 col-lg-10">
														<button class="btn btn-success" name="submit" type="submit">Send</button>
														<button class="btn btn-danger" type="button">Cancel</button>
													</div>
												</div>
											</form>
											
										</div> 
									</div> 
								</div> 
							</div>
						</div>	
					</div>
					


<?php
include_once('connection.php');
if(isset($_GET['submit']))
{
if (! empty($_GET['gdate']) && ! empty($_GET['title']) && ! empty($_GET['reason']) && ! empty($_GET['holidaydate']))
{
	$pattern1 = "/^[a-zA-Z0-9]*[a-zA-Z0-9]$/";
	$pattern2 = "/^[a-zA-Z]*[a-zA-Z]$/";
	if (preg_match($pattern1,$_GET['title']))
	{
		if (preg_match($pattern2,$_GET['reason']))
		{
			if(is_int((int)$_GET['gdate']))
			{
				if(is_int((int)$_GET['holidaydate']) | is_float((float)$_GET['holidaydate']))
				{
					$s = "update holiday set `gdate` ='".$_GET['gdate']."',`title` ='".$_GET['title']."',`reason` = ".$_GET['reason'].",`holidaydate` = ".$_GET['holidaydate']." where holidayid =".$_GET['id'];
					$r = mysqli_query($con,$s);
					if($r)
					{?>
						<script type="text/javascript">
		alert("Record Updated");
		</script><?php
						header('location:holiday.php');
					}
				}
				else
				{
					?>
		<script type="text/javascript">
		alert("INVALID GENERATE DATE");
		</script>
		<?php
				}
			}
			else
			{
				?>
		<script type="text/javascript">
		alert("INVALID TITLE");
		</script>
		<?php
			}
		}
		else
		{
			?>
		<script type="text/javascript">
		alert("INVALID REASON");
		</script>
		<?php
		}
	}
	else
	{
		?>
		<script type="text/javascript">
		alert("INVALID HOLIDAY DATE");
		</script>
		<?php
	}
}
else
{
	?>
		<script type="text/javascript">
		alert("FILL EMPTY FEILD");
		</script>
		<?php
}
}
if (isset($_GET['cancel']))
{
	header('location:Holiday.php');
}
?>


<?php include_once ("down_link.php")?>
    </body>
</html>
							

			<?php include_once('footer.php'); ?>

        </section>
