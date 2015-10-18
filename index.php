<?php
  session_start();
  $sid=session_id();

  if(isset($_SESSION['sid']))
	$sid=$_SESSION['sid'];
  else
	$_SESSION['sid']=$sid;

  include('lib/connect.php');
  $obj=new connect();
  $mid='';
  $m_id='';
  $iname='';
  $value=1;
  if(isset($_POST['cat']))
	$mid=$_POST['cat'];
  if(isset($_POST['iname']))
	$iname=$_POST['iname'];
  if(isset($_GET['cat']))
	$m_id=$_GET['cat'];
  if(isset($_GET['page']))
	$value=$_GET['page'];
  $value=($value-1)*6;
  $count=$obj->getcount();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>E- Shop</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style1 {
	font-size: 14px;
	font-weight: bold;
}
.style4 {font-size: 14px}
-->
</style>
</head>
<body>
<div id="wrapper">
  <div id="inner">
    <div id="header">
      <h1><img src="images/logo.gif" width="519" height="63" alt="Online Shopping Store" /></h1>
      <div id="nav"> 
        <p><a href="cart.php">View Cart(<?php echo $count; ?>)</a> | <a href="register.php">Register</a> |  
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
		?>
		</p>
		<?php 	
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
      <dt>All Brands List</dt>
	 	<?php
	  	  $model=$obj->getmodel();
		  while($arr=mysql_fetch_row($model))
		  {
	 	?>
      		<dd class="first"><a href="index.php?cat=<?php echo $arr[0];?>"><?php echo $arr[1];?></a></dd>
		<?php
		  }
		?>
	  <dt>Search Your Favourite Mobile</dt>
        <dd class="searchform">
          <form action="#" method="post" name="f1" id="f1">
            <div>
              <select name="cat" onchange="javascript:submit()">
				<option value="-" selected="selected">BRANDS</option>
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
		  <form action="#" method="post" name="f2" id="f2">
			<div>
              <label>
				<select  name="iname">
				  <option value="" selected="selected">MODEL</option>
			 	  <?php 
					$modelname=$obj->allname($mid);
			  		while($arr=mysql_fetch_row($modelname))
			  		{
				?>
				  <option value="<?php echo $arr[0];?>"><?php echo $arr[0];?></option>
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
		  if($iname!='')
		  {
			$ccode=$obj->getcompany($iname);
			$company=$obj->companyname($ccode);
		  	$img=$obj->getimage($iname);
			$pri=$obj->getprice($iname);
			$dis=$obj->getdiscount($iname);
			$war=$obj->getwarranty($iname);
			$disp=$obj->getdispsize($iname);
		?>
		<div class="leftbox">
		  <h3><?php echo $company;?>&nbsp;<?php echo $iname;?></h3>
          <img src="uploaded_files/<?php echo $img;?>" width="90" height="95" alt="photo 1" class="left" />
          <p><b>Warranty:</b><?php echo $war;?> months </p>
		  <p><b>Display size:</b><?php echo $disp;?></p>
		  <?php 
		    if($dis!=0.00)
			{
		  ?>
          <p><b><?php echo $dis;?>% OFF </b></p>
		  <?php
			}
		  ?>
		  <p class="style1">Price: Rs. <?php echo $pri;?></p>
          <p class="readmore"><a href="itemdetails.php?mname=<?php echo $iname;?>"><b>BUY NOW</b></a></p>
          <div class="clear"></div>
		</div>
		<?php 
		  }
		  else
		  {
			$m_name=$obj->getname($m_id,$value);
			$cnt=mysql_num_rows($m_name);
			for($i=1;$i<=$cnt;$i++)
			{
			  $arr=mysql_fetch_row($m_name);
			  $ccode=$obj->getcompany($arr[0]);
			  $company=$obj->companyname($ccode);
		  	  $img=$obj->getimage($arr[0]);
			  $pri=$obj->getprice($arr[0]);
			  $dis=$obj->getdiscount($arr[0]);
			  $war=$obj->getwarranty($arr[0]);
			  $disp=$obj->getdispsize($arr[0]);
			  if($i%2)
			  {
		?>
		<div class="leftbox">
		  <h3><?php echo $company;?>&nbsp;<?php echo $arr[0];?></h3>
          <img src="uploaded_files/<?php echo $img;?>" width="90" height="95" alt="photo 1" class="left" />
          <p><b>Warranty:</b><?php echo $war;?> months </p>
		  <p><b>Display size:</b><?php echo $disp;?></p>
		  <?php 
		    if($dis!=0.00)
			{
		  ?>
          <p><b><?php echo $dis;?>% OFF </b></p>
		  <?php
		 	}
		  ?>
		  <p class="style1">Price: Rs. <?php echo $pri;?></p>
          <p class="readmore"><a href="itemdetails.php?mname=<?php echo $arr[0];?>"><b>BUY NOW</b></a></p>
          <div class="clear"></div>
		</div>
		<!-- end .leftbox -->
		<?php
			}
			else
			{
		?>
        <div class="rightbox">
          <h3><?php echo $company;?>&nbsp;<?php echo $arr[0];?></h3>
          <img src="uploaded_files/<?php echo $img;?>" width="90" height="95" alt="photo 4" class="left" />
		  <p><b>Warranty:</b><?php echo $war;?> months </p>
		  <p><b>Display size:</b><?php echo $disp;?></p>
		  <?php 
		  	if($dis!=0.00)
			{
		  ?>
          <p><b><?php echo $dis;?>% OFF </b></p>
		  <?php
		  	}
		  ?>
		  <p><span class="style4"><b>Price:</b> <b>Rs. <?php echo $pri;?></b></span></p>
          <p class="readmore"><a href="itemdetails.php?mname=<?php echo $arr[0];?>"><b>BUY NOW</b></a></p>
          <div class="clear"></div>
        </div>
        <!-- end .rightbox -->
        <div class="clear br"></div>
		<?php
			}
		  }
		  $count=$obj->tot_names($m_id);
		  $page=ceil($count/6);	
		?>
	  </div>
      <!-- end .inner -->
	  <?php
	  	for($i=1;$i<=$page;$i++)
		  echo "<a href=index.php?page=$i&cat=".$m_id.">".$i."</a>  |  ";
		}
	  ?>
    </div>
    <!-- end body -->
    <div class="clear"></div>
    <div id="footer">
	  <?php
		if(isset($_GET['logout']))
		  echo "You have successfully logged out";
	  ?>&nbsp;
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
