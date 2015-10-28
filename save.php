<?php 
  $fname=$_POST['fname'];
  $lname=$_POST['lname'];
  $uid=$_POST['uid'];
  $pwd=$_POST['pwd1'];
  $addr=$_POST['addr'];
  $pin=$_POST['pin'];
  $country=$_POST['country'];
  $state=$_POST['state'];
  $city=$_POST['city'];
  $area=$_POST['area'];
  $occup=$_POST['occup'];
  $gen=$_POST['gen'];
  $dob=$_POST['yy'].'-'.$_POST['mm'].'-'.$_POST['dd'];
  $mno=$_POST['code1'].$_POST['mno'];
  $tno=$_POST['code2'].$_POST['tno'];
  $mail=$_POST['mailid'];
  $pwd1=md5($pwd);

  session_start();
  include('lib/connect.php');
  $obj=new connect();
  $n=$obj->database($fname,$lname,$uid,$pwd1,$addr,$country,$state,$city,$mno,$tno,$dob,$gen,$mail,$occup,$area,$pin);
  $mid='';
  $m_id='';
  if(isset($_POST['cat']))
	$mid=$_POST['cat'];
  if(isset($_GET['cat']))
	$m_id=$_GET['cat'];

  $mno='';
  if(isset($_GET['mno']))
	$mno=$_GET['mno'];
  $price=$obj->getprice($mno);
  $count=$obj->getcount();
  $qnty=$obj->getquantity($mno);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>E- Shop</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="js/script.js">
</script>
<style type="text/css">
<!--
.style8 {
	font-size: 14px;
	color: #009900;
}
.style9 {
	font-size: 16px;
	color: #000000;
	font-weight: bold;
}
.style10 {font-size: 16px}
-->
</style>
</head>
<body>
<div id="wrapper">
  <div id="inner">
    <div id="header">
      <h1><img src="images/logo.gif" width="744" height="63" alt="Online Movie Store" /></h1>
      <div id="nav"><a href="cart.php">View cart(<?php echo $count; ?>)</a> | <a href="register.php">Register</a> | <a href="login.php">Login</a></div>
      <!-- end nav -->
      <a href="#"><img src="images/header_1.jpg" width="744" height="145" alt="Harry Potter cd" /></a> 
	  <a href="#"><img src="images/header_2.jpg" width="745" height="48" alt="" /></a> 
	</div>
    <!-- end header -->
    <dl id="browse">
      <dt>Full Category Lists</dt>
	  <?php
	  	$model=$obj->getmodel();
		while($arr=mysql_fetch_row($model))
		{
	  ?>
      <dd class="first"><a href="index.php?cat=<?php echo $arr[0];?>"><?php echo $arr[1]; ?></a></dd>
	  <?php
		}
	  ?>	
      <dt>Search Your Favourite Mobile</dt>
      <dd class="searchform">
        <form action="#" method="post" name="f1" id="f1">
          <div>
            <select name="cat" onchange="javascript:submit()">
			  <option value="-" selected="selected">CATEGORIES</option>
              <?php 
			  	$model=$obj->getmodel();
			 	while($arr=mysql_fetch_row($model))
			  	{
			  ?>
			  <option value="<?php echo $arr[0];?>" <?php if($arr[0]==$mid) echo "selected='selected'";?>><?php echo $arr[1];?></option>
              <?php
				}
			  ?>
			</select>
		  </div>
		</form>
        <form action="index.php" method="post" name="f2" id="f2"> 
		  <div>
            <label>
			  <select  name="iname">
			    <option value="" selected="selected">MODEL</option>
			    <?php 
				  $modelname=$obj->allname($mid);
			  	  while($arr=mysql_fetch_row($modelname))
			  	  { 
			    ?>
			    <option value="<?php echo $arr[0];?>" selected="selected"><?php echo $arr[0];?></option>
                <?php
				  }
			    ?>
			  </select>
            </label>
          </div>
          <div class="softright">
            <label>
              <input type="submit" name="Submit" value="Submit" />
            </label>
          </div>
        </form>
      </dd>
    </dl>
    <div id="body">
      <div class="inner">
	    <?php
	  	  if($n)
		  {
		?>
        <div align="center" class="style8">You have successfully registered.click here to <a href="login.php">Login </a></div>
		<?php
		  }
		  else
		  {
			header('Location:register.php?reg=failed');
		?>
		<table width="544" border="1">
		  <tr>
            <td width="534" height="33" bgcolor="#FF0000"><span class="style9">Problem in Saved </span></td>
		  </tr>
		  <tr>
            <td height="33" bgcolor="#CCFF00"><div align="right"><span class="style10"><a href="register.php">Try Again</a></span> </div></td>
		  </tr>
		</table>
		<?php
		  }
		?>
      </div>
      <!-- end .inner -->
    </div>
    <!-- end body -->
    <div class="clear"></div>
    <div id="footer">&nbsp;
      <div id="footnav"> <a href="index.php">Home</a> </div>
      <!-- end footnav -->
    </div>
    <!-- end footer -->
  </div>
  <!-- end inner -->
</div>
<!-- end wrapper -->
</body>
</html>
