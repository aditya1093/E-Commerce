<?php
  session_start();
  include('lib/connect.php');
  $obj=new connect();
  $mid='';
  $m_id='';
  if(isset($_POST['cat']))
	$mid=$_POST['cat'];
  if(isset($_GET['cat']))
	$m_id=$_GET['cat'];

  $mname='';
  if(isset($_GET['mname']))
	$mname=$_GET['mname'];
  $price=$obj->getprice($mname);
  $company=$obj->getcompany($mname);
  $img=$obj->getimage($mname);
  $count=$obj->getcount();
  $tot_item=0;
  $tot_price=0;
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
.style3 {
	font-size: 24px;
	color: #FF0000;
}
.style7 {font-size: 14px; font-weight: bold; }
.style8 {color: #990066}
.style9 {font-size: 16px}
-->
</style>
</head>
<body>
<div id="wrapper">
  <div id="inner">
    <div id="header">
      <h1><img src="images/logo.gif" width="519" height="63" alt="Online Movie Store" /></h1>
      <div id="nav"> <a href="#">View cart(<?php echo $count; ?>)</a> | <a href="register.php">Register </a>| 
	   	<?php
	  	  if(isset($_SESSION['uid']))
		  {
	  	?>
		 	<a href="logout.php">Logout</a>
		<?php
		  }
		  else
		  {
		?>
			<a href="login.php">Login</a>
		<?php
		  }	
		  if(isset($_SESSION['uid']))
		  {
			$name=$_SESSION['name'];
		?>
        <p>Welcome Mr./Ms. <?php echo $name;?></p>
		<?php
		  }
		?>
	  </div>
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
		<form action="index.php" method="post" name="f1" id="f1">
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
        <table width="542" border="1">
          <tr>
            <td height="46" colspan="6"><div align="center" class="style3"> 
              <div align="left">CART(<?php echo $count; ?>)</div>
            </div></td>
          </tr>
          <tr>
            <td width="251" height="31"><div align="center" class="style7">ITEM</div></td>
            <td width="76"><div align="center" class="style7">QUANTITY</div></td>
            <td width="72"><div align="center" class="style7">PRICE</div></td>
            <td colspan="2"><div align="center" class="style7">SUBTOTAL</div></td>
          </tr>
		  <?php
			$res=$obj->getitems(); 
		  	while($arr=mysql_fetch_row($res))
			{
			  $price=$obj->getprice($arr[0]);
			  $img=$obj->getimage($arr[0]);
			  $company_id=$obj->getcompany($arr[0]);
			  $company=$obj->companyname($company_id);
		  ?>
          <tr>
            <td height="31"><img src="uploaded_files/<?php echo $img?>" width="93" height="95" alt="photo 1" class="left"><span class="style9"><?php echo $company."&nbsp;".$arr[0]; ?></span></td>
			<form action="update.php" method="post" name="f1" target="f1">
            <td><div align="center">
              <input name="qty" type="text" size="2" maxlength="2" value="<?php echo $arr[1]; ?>" onchange="javascript:submit()"/>
            </div></td>
			<input name="mno" type="hidden" value="<?php echo $arr[0];?>" />
			</form>
            <td><span class="style9">Rs. <?php echo $price; ?></span></td>
            <td width="84"><span class="style9">Rs. <?php echo $price*$arr[1]; ?></span></td>
            <td valign="top" width="20"><div align="center"><a href="delete.php?mno=<?php echo $arr[0];?>"><img src="uploaded_files/cross.png" alt="remove item" width="20" height="20" title="remove item"/></a></div></td>
          </tr>
		  <?php
			  $tot_price+=$arr[1]*$price;
		    }
		  ?>
          <tr>
            <td height="31" colspan="3"><div align="center" class="style7">
              <div align="right">AMOUNT PAYABLE</div>
            </div></td>
            <td height="31" colspan="3"><span class="style9">Rs. <?php echo $tot_price;?></span></td>
          </tr>
          <tr>
            <td height="18" colspan="6"><div align="right" class="style8"><a href="index.php">Continue Shopping </a></div></td>
          </tr>
          <tr>
            <td height="31" colspan="6"><div align="center">
                <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="105" height="33">
                  <param name="BGCOLOR" value="" />
                  <param name="movie" value="button2.swf" />
                  <param name="quality" value="high" />
                  <embed src="button2.swf" quality="high" pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="105" height="33" ></embed>
                </object>
            </div></td>
          </tr>
        </table>
      </div>
      <!-- end .inner -->
    </div>
    <!-- end body -->
    <div class="clear"></div>
    <div id="footer"> &nbsp;
      <div id="footnav">
	    <a href="index.php">Home</a>
	  </div>
      <!-- end footnav -->
    </div>
    <!-- end footer -->
  </div>
  <!-- end inner -->
</div>
<!-- end wrapper -->
</body>
</html>
