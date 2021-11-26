<?php
	session_start();
	include_once('connection.php');
	echo $user=$_COOKIE['userid'];
 	echo $pid=$_COOKIE['pid'];	

//echo $thaliid;


	$date=date('yy-m-d');



$status=$_POST["status"];
$firstname=$_POST["firstname"];
$amount=$_POST["amount"];
$txnid=$_POST["txnid"];
$posted_hash=$_POST["hash"];
$key=$_POST["key"];
$productinfo=$_POST["productinfo"];
$email=$_POST["email"];
$salt="";

 $sql="INSERT INTO `tbl_transation` (`transid`, `transdate`, `transno`, `type`, `amount`, `status`, `userid`) VALUES (NULL, '$date', '$txnid', 'Card ', '$amount', '$status', '$user')";
	
	$res=mysqli_query($con,$sql);
	
	$dabba_code=$firstname."-".$user;//first name+and user id
	//this query generate dabba code and insert data into tbl_dabbainfo
	$sql2="insert into tbl_dabbainfo(`dabbacode`, `userid`)values('$dabba_code',$user)";
	//$sql2="INSERT INTO `tbl_order` (`oid`, `userid`, `odate`, `status`, `thaliid`) VALUES (NULL, '$user', '$date', '0', '$thaliid')";
	$res2=mysqli_query($con,$sql2);
	
	// Salt should be same Post Request 
	
	//generate random dabba user id
	$sql3="select dbuserid from tbl_dabbawala order by rand()";
	$res3=mysqli_query($con,$sql3);
	while($row3=mysqli_fetch_assoc($res3))
	{
		$db_user=$row3['dbuserid'];
	}
	//allocate db user 
	$sql4="INSERT INTO `tbl_allocation` (`aid`, `adate`, `dbuserid`, `dabbaid`) VALUES (NULL, '$date', '$db_user', '$user')";
	$res4=mysqli_query($con,$sql4);
	 
	$sqlpackage="select * from tbl_package where pid=$pid";
	$resp=mysqli_query($con,$sqlpackage);
	$rowp=mysqli_fetch_assoc($resp);
	 $days=$rowp['days'];
	if($days==30)
	{
		 $today=date('Y-m-d');
		 $lastdate=date('Y-m-d', strtotime($today. ' + 30 days'));
		 $sql5="INSERT INTO `tbl_packageinfo` (`packid`, `pid`, `packstartdate`, `packenddate`, `userid`, `amount`, `discount`, `remark`, `status`) VALUES (NULL, '$pid', '$today', '$lastdate', '$user', '$amount', '0', 'package for 1 month', '0')";
		$res5=mysqli_query($con,$sql5);
	}
	elseif($days==60)
	{
		 $today=date('Y-m-d');
		
		 $lastdate=date('Y-m-d', strtotime($today. ' + 60 days'));
		  echo $sql5="INSERT INTO `tbl_packageinfo` (`packid`, `pid`, `packstartdate`, `packenddate`, `userid`, `amount`, `discount`, `remark`, `status`) VALUES (NULL, '$pid', '$today', '$lastdate', '$user', '$amount', '0', 'package for 3 months', '0')";
			$res5=mysqli_query($con,$sql5);
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
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css.map">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>


</head>

<body>

</body>

</html>