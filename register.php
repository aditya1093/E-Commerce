<?php
  include('lib/connect.php');
  $obj=new connect();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>E-shop</title>
<style type="text/css">
<!--
table{
		top:30px;
		left:400px;
		border:1px solid #000000;
		position:absolute;
	}
#a1{
		top:10px;
		height:20px;
		width:20px;
		left:30px;
		position:absolute;
	}
body{
		background-image: url(images/img01.gif);
	}
.style4 {color: #99FF00}
.style5 {
			font-size: 36px;
			font-weight: bold;
		}
.style6 {color: #FF0000}
.err{color:#FF0000}
.match{color:#00CC00}
-->
</style>
<script language="javascript" src="js/script.js">
</script>
</head>
<body <?php if(isset($_GET['reg'])){?> onload="wrong()" <?php } ?> >

<form id="form1" name="form1" method="post" action="save.php">

<div id=a1>
<h1 class="style6"><a href="index.php">Mobile Store Home</a></h1>
</div>

<table width="508" align="center" cellpadding="10" cellspacing="0" rules="none">
  <tr>
    <td height="64" colspan="2" nowrap="nowrap" bgcolor="#0033FF"><div align="center" class="style3 style4 style5">REGISTER</div></td>
  </tr>
  <tr>
    <td colspan="2" nowrap="nowrap"><p><span class="style6"> *</span> marked fields are mandatory</p></td>
  </tr>
  <tr>
    <td width="151" nowrap="nowrap">First Name <span class="style6"> *</span></td>
    <td width="286"><label>
      <input name="fname" type="text" id="fname" size="30" />
    </label></td>
  </tr>
  <tr>
    <td>Last Name <span class="style6"> *</span></td>
    <td><input name="lname" type="text" id="lname" size="30" /></td>
  </tr>
  <tr>
    <td>User ID<span class="style6"> * </span></td>
    <td><input name="uid" type="text" id="uid" size="30" onchange="availability(this.value)"/><br /><span id="avail"></span></td>
  </tr>
  <tr>
    <td>Password<span class="style6"> *</span></td>
    <td><input name="pwd1" type="password" id="pwd1" size="30"  onkeyup="getlength(this.value)"/><br /><span id="msg"></span></td>
  </tr>
  <tr>
    <td nowrap="nowrap">Confirm Password <span class="style6"> *</span></td>
    <td><input name="pwd2" type="password" id="pwd2" size="30" onchange="confirm()"/><div id="cp" class="err"></div></td>
  </tr>
  <tr>
    <td>Address</td>
    <td><label>
    <textarea name="addr" cols="30" rows="5" id="addr"></textarea>
    </label></td>
  </tr>
  <tr>
    <td>Pin Code<span class="style6"> *</span> </td>
    <td><input name="pin" type="text" id="pin" onchange="pincode(this.value)"/><div id="pc" class="err"></div></td>
  </tr>
  <tr>
    <td>Country<span class="style6"> *</span></td>
    <td nowrap="nowrap"><label>
      <select name="country" id="country">
        <option value="">Select Country</option>	
        <option value="India">India</option>
        <option value="Others">Others</option>
      </select>
    </label></td>
  </tr>
  <tr>
    <td>State<span class="style6"> *</span></td>
    <td nowrap="nowrap"><label>
    <select name="state" id="state" onchange="getcity(this.value)">
      <option value="">Select State</option>
	  <?php
	    $res=$obj->getstate();
		while($arr=mysql_fetch_row($res))
		{
	  ?>
      <option value="<?php echo $arr[0];?>"><?php echo $arr[1];?></option>
	  <?php
	    }
	  ?>
    </select>
    </label></td>
  </tr>
  <tr>
    <td>City<span class="style6"> *</span></td>
    <td>
		  
         <label>
         <select name="city" id="city">
           <option value="">Select City</option>
           <option value="-1">Not available</option>
		   <span id="city"></span>  
         </select>
      </label></td>
  </tr>
  <tr>
    <td>Area</td>
    <td><input name="area" type="text" id="area" /></td>
  </tr>
  <tr>
    <td>Occupation</td>
    <td><input name="occup" type="text" id="occup" /></td>
  </tr>
  <tr>
    <td>Gender<span class="err"> *</span></td>
    <td><label>
      <input name="gen" type="radio" value="male" checked="checked" />
      Male
      <input name="gen" type="radio" value="female" />
      Female </label></td>
  </tr>
  <tr>
    <td>DOB</td>
    <td><label>
      <select name="dd" id="dd">
        <option value="">dd</option>
        <?php
		  for($i=1;$i<=31;$i++)
		  {
		?>
        <option value="<?php echo $i;?>"><?php echo $i;?></option>
        <?php
		  }
		?>
      </select>
      <select name="mm" id="mm">
        <option value="">mm</option>
        <?php
		  $arr=array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sept","Oct","Nov","Dec");
		  for($i=0;$i<12;$i++)
		  {
		?>
        <option value="<?php echo $i+1;?>"><?php echo $arr[$i];?></option>
        <?php
		  }
		?>
      </select>
      <select name="yy" id="yy">
        <option value="">yyyy</option>
        <?php
		  $yy=date('Y');
		  for($i=$yy-50;$i<=$yy;$i++)
		  {
		?>
        <option value="<?php echo $i;?>"><?php echo $i;?></option>
        <?php
		  }
		?>
      </select>
    </label></td>
  </tr>
  
  <tr>
    <td>Mobile No <span class="err"> *</span></td>
    <td nowrap="nowrap"><label>
      <input name="code1" type="text" id="code1" value="+91" size="3" maxlength="3" />
      <input name="mno" type="text" id="mno" size="20" maxlength="10" onchange="tel(this.value)"/><div id="tn" class="err"></div>
    </label></td>
  </tr>
  <tr>
    <td>Telephone no </td>
    <td><input name="code2" type="text" id="code2" size="5" maxlength="5" />
      <input name="tno" type="text" id="tno" size="20" maxlength="10" /></td>
  </tr>
  <tr>
    <td>email-id<span class="style6"> *</span> </td>
    <td><input name="mailid" type="text" id="mailid" size="30" /></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#FFFF00"><div align="center">
      <label>
        <input type="submit" name="Submit" value="Submit" />
        </label>
      <label>
        <input name="Reset" type="reset" id="Reset" value="Reset" />
        </label>
    </div></td>
  </tr>
</table>
</form>
</body>
</html>
