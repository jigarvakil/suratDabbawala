<?php
	include_once('connection.php');
	include_once("check_session.php");
	
	$thaliid=$_SESSION['thali'];
	$user=$_SESSION['userid'];
	//echo $thaliid;
	$date=date('Y-m-d');
	
	
	
	$status=$_POST["status"];
	$firstname=$_POST["firstname"];
	$amount=$_POST["amount"];
	$txnid=$_POST["txnid"];
	$posted_hash=$_POST["hash"];
	$key=$_POST["key"];
	$productinfo=$_POST["productinfo"];
	$email=$_POST["email"];
	$salt="";
	
	$sql="INSERT INTO `tbl_transation` (`transid`, `transdate`, `transno`, `type`, `amount`, `status`, `userid`,`description`) VALUES (NULL, '$date', '$txnid', 'Card ', '$amount', '$status', '$user','Thali order')";
		
	$res=mysqli_query($con,$sql);
	
	$dabba_code=$firstname."-".$user;//first name+and user id
	//this query generate dabba code and insert data into tbl_dabbainfo
	//$sql2="insert into tbl_dabbainfo(`dabbacode`, `userid`)values('$dabba_code',$user)";
	$sql2="INSERT INTO `tbl_order` (`oid`, `userid`, `odate`,`description`, `status`, `thaliid`) VALUES (NULL, '$user', '$date','Thali', '0', '$thaliid')";
	
	if($res2=mysqli_query($con,$sql2)){
		echo "Insterted";
	}
	else{
		echo mysqli_error($con);
	}
	
	
	If (isset($_POST["additionalCharges"])) {
		$additionalCharges=$_POST["additionalCharges"];
		$retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
		} else {
		$retHashSeq = $salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
	}
	$hash = hash("sha512", $retHashSeq);
	if ($hash == $posted_hash) {
		echo "Invalid Transaction. Please try again";
		} else {
		/* echo "<h3>Thank You. Your order status is ". $status .".</h3>";
			echo "<h4> Transaction ID for this transaction is ".$txnid.".</h4>";
		echo "<h4>We have received a payment of Rs. " . $amount . "</h4>";*/
		
		
		echo '<script>
		setTimeout(function() {
		swal({
		title: "Payment success!",
		text: "Thank You Your Payment Status is '.$status.'!\n Transaction ID for this transaction is '.$txnid.'. \n Amount Paid :'.$amount.'  ",
		type: "success"
		}, function() {
		window.location = "index.php";
		});
		}, 1000);
		</script>';
		
	}
?>	
<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js">
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css">
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css.map">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>
		
		
	</head>
	<body>
		
	</body>
</html>