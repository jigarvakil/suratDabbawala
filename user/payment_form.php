<?php
	session_start();
	include_once('connection.php');
	$userid=$_SESSION['userid'];
	$id=$_GET['id'];
	$_SESSION['thali']=$id;
	$sql="select * from tbl_thali where thaliid=$id";
	$res=mysqli_query($con,$sql);
	$row=mysqli_fetch_assoc($res);
	$sqluser="select * from tbl_user where userid=$userid";
	$userres=mysqli_query($con,$sqluser);
	$rowuser=mysqli_fetch_assoc($userres);	
	
	$amount=$row['price'];
	$name=$rowuser['firstname']." ".$rowuser['lastname'];
	$email=$rowuser['email'];
	
// Merchant key here as provided by PayUMoney
$MERCHANT_KEY = "rjQUPktU";
//$MERCHANT_KEY = "7FJudYQ5";
 
// Merchant Salt as provided by Payu
$SALT = "e5iIg1jwi8";
//$SALT = "VPtCHMmk6O";
 
// End point - change to https://secure.payu.in for if LIVE mode
$PAYU_BASE_URL = "https://test.payu.in";
//$PAYU_BASE_URL = "https://sandboxsecure.payu.in";
 
$action = '';
 
$posted = array();
if(!empty($_POST)) {
    //print_r($_POST);
  foreach($_POST as $key => $value) {    
    $posted[$key] = $value; 
  
  }
}
 
$formError = 0;
 
if(empty($posted['txnid'])) {
  // Generate random transaction id
  $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
} else {
  $txnid = $posted['txnid'];
}
$hash = '';
// Hash Sequence
$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
if(empty($posted['hash']) && sizeof($posted) > 0) {
  if(
          empty($posted['key'])
          || empty($posted['txnid'])
          || empty($posted['amount'])
          || empty($posted['firstname'])
          || empty($posted['email'])
          || empty($posted['phone'])
          || empty($posted['productinfo'])
          || empty($posted['surl'])
          || empty($posted['furl'])
      || empty($posted['service_provider'])
  ) {
    $formError = 1;
  } else {
    //$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
  $hashVarsSeq = explode('|', $hashSequence);
    $hash_string = '';  
  foreach($hashVarsSeq as $hash_var) {
      $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
      $hash_string .= '|';
    }
 
    $hash_string .= $SALT;
 
 
    $hash = strtolower(hash('sha512', $hash_string));
    $action = $PAYU_BASE_URL . '/_payment';
  }
} elseif(!empty($posted['hash'])) {
  $hash = $posted['hash'];
  $action = $PAYU_BASE_URL . '/_payment';
}
?>
<html>
  <head>
  <script>
     var hash = '<?php echo $hash ?>';
    function submitPayuForm() {
      
      var payuForm = document.forms.payuForm;
      payuForm.submit();
    } 
  </script>
  </head>
  <body onload="submitPayuForm()">
  <div style="display:none;">
    <h2>PayU Form</h2>
    <br/>
    <?php if($formError) { ?>
  
      <span style="color:red">Please fill all mandatory fields.</span>
      <br/>
      <br/>
    <?php } ?>
    <form action="<?php echo $action; ?>" method="post" name="payuForm">
      <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
      <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
      <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
      <table>
        <tr>
          <td><b>Mandatory Parameters</b></td>
        </tr>
        <tr>
          <td>Amount: </td>
          <td><input type="hidden" name="amount" value="<?= $amount ?>" /></td>
          <td>First Name: </td>
          <td><input type="hidden"  name="firstname" id="firstname" value="<?= $name ?>" /></td>
        </tr>
        <tr>
          <td>Email: </td>
          <td><input name="email" id="email" type="hidden" value="<?= $email ?>" /></td>
          <td>Phone: </td>
          <td><input name="phone" value="<?= $rowuser['mobileno'] ?>" type="hidden" /></td>
        </tr>
        <tr>
          <td>Product Info: </td>
          <td colspan="3"><textarea name="productinfo">
				<?php 
					echo $row['thaliname'];
				?>
			</textarea></td>
        </tr>
        <tr>
          <td>Success URI: </td>
          <td colspan="3"><input type="hidden"  name="surl" value="http://localhost:8080/sd/user/success.php" size="64" /></td>
        </tr>
        <tr>
          <td>Failure URI: </td>
          <td colspan="3"><input type="hidden"  name="furl" value="http://localhost:8080/sd/user/fail.php" size="64" /></td>
        </tr>
 
        <tr>
          <td colspan="3"><input type="hidden" name="service_provider" value="payu_paisa" size="64" /></td>
        </tr>
 
        
        <tr>
          <?php if(!$hash) { ?>
            <td colspan="4"><input type="submit" value="Submit" /></td>
          <?php } ?>
        </tr>
      </table>
    </form>
  </div>  
  </body>
</html>