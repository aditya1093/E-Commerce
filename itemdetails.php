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
  $company_name=$obj->companyname($company);
  $img=$obj->getimage($mname);
  $count=$obj->getcount();
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
.style2 {font-size: 18}
-->
</style>
</head>
<body>
<div id="wrapper">
  <div id="inner">
    <div id="header">
      <h1><img src="images/logo.gif" width="519" height="63" alt="Online Movie Store" /></h1>
      <div id="nav"> 
       <p><a href="cart.php">View cart(<?php echo $count; ?>)</a> | <a href="register.php">Register</a> | 
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
              <input type="submit" name="Submit2" value="Submit" />
            </label>
          </div>
        </form>
      </dd>
    </dl>
    <div id="body">
      <div class="inner">
	    <form id="form1" name="form1" method="post" action="savecart.php">
	      <input type="hidden" name="amount" value="<?php echo $price;?>" />
		  <input type="hidden" name="modelid" value="<?php echo $mname;?>" />
		  <table width="526" border="1" cellspacing="10px" cellpadding="10px">
            <tr>
              <td width="120" rowspan="5"><img src="uploaded_files/<?php echo $img;?>" width="93" height="95"  /></td>
              <td width="96" colspan="2">Company Name </td>
              <td width="159"><?php echo $company_name;?></td>
            </tr>
            <tr>
              <td colspan="2">Model No </td>
              <td><?php echo $mname;?></td>
            </tr>
            <tr>
              <td colspan="2">Price</td>
              <td><?php echo $price;?></td>
            </tr>
            <tr>
              <td>Select Quantity </td>
              <td>
                <label>
                  <select name="qnty" id="qnty" onchange="calc(this.value)">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                  </select>
                </label>
			  </td>
              <td><label>
                <span id="calc"></span><input name="amt" type="text" id="amt" value="<?php echo $price;?>" />
              </label></td>
            </tr>
            <tr>
              <td colspan="3"><div align="center">
                <label>
                  <input type="submit" name="Submit" value="Add to Cart" />
                </label>
              </div></td>
            </tr>
          </table>
		</form>
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
