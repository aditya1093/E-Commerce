<?php
  include("lib/connect.php");
  $obj=new connect();
  session_start();
  if(!(isset($_SESSION['uid'])))
  {
	$msg="pay";
	header('Location:login.php?payment='.$msg);
  }
  else
  {
	$uid=$_SESSION['uid'];
	$res=$obj->fetch_details($uid);
	$arr=mysql_fetch_row($res);
  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>E-shop</title>
<style type="text/css">
<!--
body {
	background-color: #CCCCCC;
}
.style1 {
	font-size: 24px;
	color: #FF0000;
	font-family: Arial, Helvetica, sans-serif;
}
.style3 {
	color: #3300CC;
	font-size: 24px;
}
-->
</style></head>

<body>
<form id="form1" name="form1" method="post" action="">

<table width="474" height="451" border="0" align="center">
  <tr>
    <td colspan="2"><div align="center" class="style1">
      <h1>Payment Details </h1>
    </div></td>
  </tr>
  <tr>
    <td width="145"><span class="style3">User id </span></td>
    <td width="287"><label>
      <input name="uid" type="text" id="uid" value=<?php echo $uid; ?>/>
    </label></td>
  </tr>
  <tr>
    <td class="style3">Full Name </td>
    <td><input name="name" type="text" id="name" value=<?php echo $arr[0].' '.$arr[1]; ?>/></td>
  </tr>
  <tr>
    <td class="style3">Address</td>
    <td><label>
      <textarea name="addr" id="addr"><?php echo $arr[4]; ?></textarea>
    </label></td>
  </tr>
  <tr>
    <td class="style3">State</td>
    <td><input name="state" type="text" id="state" value=<?php echo $arr[6]; ?>/></td>
  </tr>
  <tr>
    <td class="style3">City</td>
    <td><input name="city" type="text" id="city" value=<?php echo $arr[7]; ?>/></td>
  </tr>
  <tr>
    <td class="style3">Pin</td>
    <td><input name="pin" type="text" id="pin" value=<?php echo $arr[15]; ?>/></td>
  </tr>
  <tr>
    <td class="style3">e-mail</td>
    <td><input name="email" type="text" id="email" value=<?php echo $arr[12]; ?>/></td>
  </tr>
  <tr>
    <td class="style3">Phone no </td>
    <td><input name="mno" type="text" id="mno" value=<?php echo $arr[9]; ?>/></td>
  </tr>
  <tr>
    <td class="style3">Credit Card no </td>
    <td><input name="card" type="text" id="card" /></td>
  </tr>
  <tr>
    <td class="style3">Verification Code </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="21" colspan="2"><label>
      <div align="center">
        <input type="submit" name="Submit" value="Submit" />
        </div>
    </label></td>
  </tr>
</table>
</form>
</body>
</html>
