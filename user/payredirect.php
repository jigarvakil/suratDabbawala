<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>

<head>
</head>

<body>
    <h1>PayUMoney Payment Request Form </h1>
    <form action=" https://sandboxsecure.payu.in/_payment" name="payuform" method=POST>
        <input type="hidden" name="key" value="oVMaYBw9" />
        <input type="hidden" name="hash_string" value="oVMaYBw9|$txid|500|thali|jigar|jigarvakil1116@gmail.com|ZZw6hBdv3B" />
        <input type="hidden" name="hash" value="<?php echo md5(rand(100,999)); ?>" />
        <input type="hidden" name="txnid" value="<?php echo rand(100,999); ?>" />
        <table>
            <tr>
                <td><b>Mandatory Parameters</b></td>
            </tr>
            <tr>
                <td>Amount: </td>
                <td><input name="amount" value="500" /></td>
                <td>First Name: </td>
                <td><input name="firstname" id="firstname" value="Jigar" /></td>
            </tr>
            <tr>
                <td>Email: </td>
                <td><input name="email" id="email" value="jigarvakil1116@gmail.com" /></td>
                <td>Phone: </td>
                <td><input name="phone" value="9824619885" /></td>
            </tr>
            <tr>
                <td>Product Info: </td>
                <td colspan="3"><textarea name="productinfo" value="Thali Order">  </textarea></td>
            </tr>
            <tr>
                <td>Success URI: </td>
                <td colspan="3"><input name="surl" size="64" value="success.php" /></td>
            </tr>
            <tr>
                <td>Failure URI: </td>
                <td colspan="3"><input name="furl" size="64" value="fail.php" /></td>
            </tr>
            <tr>
                <td colspan="3"><input type="hidden" name="service_provider" value="payu_paisa" /></td>
            </tr>
            <tr>
                <td><b>Optional Parameters</b></td>
            </tr>
            <tr>
                <td>Last Name: </td>
                <td><input name="lastname" id="lastname" /></td>
                <td>Cancel URI: </td>
                <td><input name="curl" value="" /></td>
            </tr>
            <tr>
                <td>Address1: </td>
                <td><input name="address1" /></td>
                <td>Address2: </td>
                <td><input name="address2" /></td>
            </tr>
            <tr>
                <td>City: </td>
                <td><input name="city" /></td>
                <td>State: </td>
                <td><input name="state" /></td>
            </tr>
            <tr>
                <td>Country: </td>
                <td><input name="country" /></td>
                <td>Zipcode: </td>
                <td><input name="zipcode" /></td>
            </tr>
            <tr>
                <td>UDF1: </td>
                <td><input name="udf1" /></td>
                <td>UDF2: </td>
                <td><input name="udf2" /></td>
            </tr>
            <tr>
                <td>UDF3: </td>
                <td><input name="udf3" /></td>
                <td>UDF4: </td>
                <td><input name="udf4" /></td>
            </tr>
            <tr>
                <td>UDF5: </td>
                <td><input name="udf5" /></td>
                <td>PG: </td>
                <td><input name="pg" /></td>
            </tr>
            <td colspan="4"><input type="submit" value="Submit" /></td>
            </tr>
        </table>
    </form>
</body>

</html>