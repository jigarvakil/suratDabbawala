<?php
	
	include_once('connection.php');
	include_once("check_session.php");
	if(isset($_GET['id']))
	{
		$id=$_GET['id'];
		$sql="select * from tbl_salaryinfo where sid=$id";
		$result=mysqli_query($con,$sql);
		$salarydata=mysqli_fetch_assoc($result);
		
	}
	
	
	if(isset($_REQUEST['BtnS']))
	{
		$date=date_create($_REQUEST['date']);
		$date= date_format($date,"Y-m-d");
		$salary=$_POST['salary'];
		$deduction=$_POST['deduction'];
		$bonus=$_POST['bonus'];
		$total_amount=$_POST['total_amount'];
		$dbuserid= $_POST['dbuserid'];
		$query="insert into tbl_salaryinfo(date,salary,deduction,bonus,total_amount,dbuserid) values('$date','$salary','$deduction','$bonus','$total_amount','$dbuserid')";
		if(mysqli_query($con,$query)){
			echo "<script type='text/javascript'>alert('insert success');</script>";
			header("location:salary.php");
		}
		else
		{
			
		}
		
	}
	
?>


<!DOCTYPE html>
<html lang="en">
    
	<head>
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <link rel="shortcut icon" href="img/favicon_1.ico">
		
        <title> Admin  </title>
		<?php include_once ("up_link.php")?>
		<style>
			form .error
			{
			color:red;
			}
		</style>
	</head>
	
	
    <body>
		
        <?php include_once('navigation.php'); ?>
        
		<section class="content">
            
            
			<?php include_once('header.php'); ?>
			
            <div class="wraper container-fluid">
                <div class="page-title"> 
                    
				</div>
				
				<div class="row">
                    <div class="col-sm-12">
                       <div class="panel panel-color panel-inverse">
						<div class="panel-heading">
							<h3 class="panel-title">SALARY</h3>
						</div>
					
                            <div class="panel-body">
                                <div class=" form p-20">
                                    <form class="cmxform form-horizontal tasi-form" id="commentForm" method="post" name="f1" action="#" novalidate="novalidate">
                                        <div class="form-group ">
                                            <label for="descrip" class="control-label col-lg-2">Dbuserid</label>
                                            <div class="col-lg-10">
                                                <select  name="dbuserid" class="form-control">
													<option>-----Dabbawala Id-----</option>
													<?php
														$sql="select * from tbl_dabbawala";
														$res=mysqli_query($con,$sql);
														while($row=mysqli_fetch_assoc($res))
														{
														?>
														<option value="<?php echo $row['dbuserid']; ?>" <?php if(isset($salarydata['dbuserid'])) { if($row['dbuserid']==$salarydata['dbuserid']) echo "selected";} ?> ><?php echo $row['firstname']."  ".$row['lastname']; ?></option>
														<?php
														}
														
													?>
												</select>
											</div>
										</div>
									   <div class="form-group">
											<label for="cemail" class="control-label col-lg-2">Salary Date</label>
                                            <div class="col-lg-10">
												<div class='input-group date' id='datetimepicker6'>
													<input value="<?= $salarydata['date'] ?>" type='date' class="form-control" name="date" required="" aria-required="true"/>
													<span class="input-group-addon">
														<span class="glyphicon glyphicon-calendar"></span>
													</span>
												</div>
											</div>
										</div>
										<div class="form-group ">
                                            <label class="control-label col-lg-2">Salary</label>
                                            <div class="col-lg-10">
												
												<input class="form-control" value="<?php if(isset($salarydata['salary'])) echo $salarydata['salary']; ?>" id="salary" type="text" name="salary">
												
											</div>
										</div>
										<div class="form-group ">
                                            <label class="control-label col-lg-2">Deduction</label>
                                            <div class="col-lg-10">
												<input class="form-control " value="<?php if(isset($salarydata['deduction'])) echo $salarydata['deduction']; ?>" id="deduction" type="text" name="deduction">
												
											</div>
										</div>
                                        <div class="form-group ">
                                            <label class="control-label col-lg-2">Bonus</label>
                                            <div class="col-lg-10">
												
												<input class="form-control " id="bonus" value="<?php if(isset($salarydata['bonus'])) echo $salarydata['bonus']; ?>" type="text" name="bonus">
												
											</div>
										</div>
										
                                        <div class="form-group ">
                                            <label class="control-label col-lg-2">Total Amount</label>
                                            <div class="col-lg-10">
                                                
												<input class="form-control" min="1" id="total_amount" value="<?php if(isset($salarydata['total_amount'])) echo $salarydata['total_amount']; ?>" type="text" name="total_amount">
											</div>
										</div>
                                       
                                        <div class="form-group">
                                            <div class="col-lg-offset-2 col-lg-10">
                                                <button class="btn btn-success" name="BtnS" type="submit">Send</button>
                                                <button class="btn btn-danger" type="reset">Cancel</button>
											</div>
										</div>
									</form>
											</div> 
							</div> 
						</div> 
						
					</div> 
					<script>
						$(document).ready(function(){
							$('#bonus').change(function(){
								var a=$('#salary').val();
							var q=$('#deduction').val();
							var d=$('#bonus').val();

							var a=parseInt(a);
							var q=parseInt(q);
							var d=parseInt(d);
							var x;
							var y;
							x=a-q;
							y=x+d;
							
							$('#total_amount').val(y);
							});
						});
						
					</script>
					
					
					
					
					
						<div class="container">
						<h2>Salary Info</h2>
						<table class="table table-bordered table-hover">
						<thead>
						<tr>
						<th>#</th>
						<th>Name</th>
						<th>Salary Date</th>
						<th>Salary</th>
						<th>Deduction</th>
						<th>Bonus</th>
						<th>Total Amount</th>
						<th>Action</th>
						
						</tr>
						</thead>
						
					
					<tbody>
					<?php
						$sql="select tbl_salaryinfo.*,tbl_dabbawala.firstname,tbl_dabbawala.lastname from tbl_salaryinfo join tbl_dabbawala on tbl_salaryinfo.dbuserid=tbl_dabbawala.dbuserid";

						$query=mysqli_query($con,$sql);
						$i=1;
						while($row=mysqli_fetch_assoc($query))
						{
							$id=$row['sid'];
						?>
						<tr>
						<td><?php echo $i++;?></td>
						<td><?php echo $row['firstname']."  ".$row['lastname'];?></td>
						<td><?php echo $row['date'];?></td>
						<td><?php echo $row['salary'];?></td>
						<td><?php echo $row['deduction'];?></td>
						<td><?php echo $row['bonus'];?></td>
						<td><?php echo $row['total_amount'];?>&nbsp;<i class='fas fa-rupee-sign'></i></td>
						
						<td><a href="salary.php?id=<?=	$id?>" class="btn btn-primary">REPEAT</a></td>
						</tr>
						<?php
						}//end while loop
					?>
					</tbody>
					</table>
					</div>
					
						
						<?php include_once ("down_link.php");?>
												<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
		<script>
			$("form[name='f1']").validate({
				rules: 
				{
					dbuserid:
					{
						required: true,
						
					},
					date:
					{
						required: true,
						digits:true,
					},
					salary:
					{
						required: true,
						digits:true,
						
					},
					deduction:
					{
						required: true,
						minlength:0,
						maxlength:2,
						digits:true,
					},
					bonus:
					{
						required: true,
						minlength:0,
						maxlength:2,
						digits:true,
					}
				},
				// Specify validation error messages
				messages: 
				{
					dbuserid:
					{
						required: "Please choose dabbawala name",
						
					},
					date:
					{
						required: "Please enter date",
						digits: "Only number is accepted",
					},
					salary:
					{
						required: "Please enter dabbawala salary amount",
						digits: "Only number is accepted",
					},
					deduction:
					{
						required: "Please enter dabbawala salary deduction",
						minlength:"Minimum 0 length needed",
							maxlength:"Sorry only 2 character is needed",
							digits: "Only number is accepted",
					},
					bonus:
					{
						required: "Please enter dabbawala salary bonus",
						minlength:"Minimum 0 length needed",
							maxlength:"Sorry only 2 character is needed",
							digits: "Only number is accepted",
					}
				},
				submitHandler: function(form) {
					form.submit();
				}
			});
		</script>
			
						</body>
						
						
						</html>
						
						
						<?php include_once('footer.php'); ?>
						
						</section>
				