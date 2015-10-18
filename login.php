<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by Free CSS Templates
http://www.freecsstemplates.org
Released for free under a Creative Commons Attribution 2.5 License

Title      : Imprimis
Version    : 1.0
Released   : 20090510
Description: A two-column fixed-width template suitable for small websites.

-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>E-shop</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="css/default.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style1 {
	font-size: 14px;
	color: #FF0000;
}
.style2 {color: #FFFFFF}
-->
</style>
</head>
<body>
<div id="wrapper">
	<div id="header">
		<div id="logo">
			<h1><a href="#">User Login</a></h1>
		</div>
		<!-- end div#logo -->
		<div id="menu">
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="cart.php">View Cart</a></li>
			</ul>
		</div>
		<!-- end div#menu -->
	</div>
	<!-- end div#header -->
	<div id="page">
		<div id="content">
			<div id="welcome">
			</div>
			<form name="form1" id="form1" method="post" action="check.php">
			  <table width="386" border="0">
                <tr>
                  <td width="144">User name </td>
                  <td width="226">
				  <label>
                    <input name="uid" type="text" id="uid" />
                  </label>				  </td>
                </tr>
                <tr>
                  <td height="16" colspan="2">&nbsp;</td>
                </tr>
                <tr>
                  <td>Password</td>
                  <td><input name="pwd" type="password" id="pwd" /></td>
                </tr>
				<?php
				  if(isset($_GET['payment']))
				  {
				?>
				<input name="payment" type="hidden" value="pay" />
				<?php
				  }
				?>
                <tr>
                  <td height="26" colspan="2">&nbsp;</td>
                </tr>
                
				<?php	
				  if(isset($_GET['error']))
				  {
				?>
                <tr>
                  <td height="29" colspan="2"><div align="center" class="style1">Wrong user id or password!</div></td>
                </tr>
				<?php
				  }
				?>
                <tr>
                  <td height="56" colspan="2">
				  <label>
                    <div align="center">
                      <input type="submit" name="Submit" value="Submit" />
                    </div>
                  </label>				  
				  </td>
                </tr>
              </table>
          </form>
			<!-- end div#welcome -->
			<div id="sample1" class="boxed">
				
			</div>
			<!-- end div#sample1 -->
			<div id="sample2" class="boxed">
				
			</div>
			<!-- end div#sample2 -->
		</div>
		<!-- end div#content -->
		<div id="sidebar">
			<ul>
				<li id="submenu">
					<h2>Other Links</h2>
					<ul>
						<li><a href="#"></a></li>
						<li><a href="#"></a></li>
						<li><a href="#"></a></li>
						<li><a href="#"></a></li>
						<li><a href="#"></a></li>
						<li><a href="#"></a></li>
						<li><a href="#"></a></li>
					</ul>
				</li>
				<!-- end li#submenu -->
				<li id="news">
					<h2>News &amp; Updates</h2>
					<ul>
						<li>
							<h3>10th May</h3>
							<p><a href="#">Best offers in Nokia mobiles </a></p>
						</li>
						<li>
							<h3>23rd April</h3>
							<p><a href="#">New designs in mobiles </a></p>
						</li>
						<li>
							<h3>21st April</h3>
							<p><a href="#">Discounts on Micromax mobiles </a></p>
						</li>
						<li>
							<h3>17th April </h3>
							<p><a href="#">Best deals in shopping </a></p>
						</li>
					</ul>
				</li>
				<!-- end li#news -->
			</ul>
		</div>
		<!-- end div#sidebar -->
		<div style="clear: both; height: 1px"></div>
	</div>
	<!-- end div#page -->
	<div id="footer">
		<p id="legal">Copyright &copy; 2007 Imprimis. All Rights Reserved. Designed by <a href="#">The mobile store </a></p>
		<p id="links"><a href="#">Privacy Policy</a> | <a href="#">Terms of Use</a></p>
	</div>
	<!-- end div#footer -->
</div>
<!-- end div#wrapper -->
</body>
</html>
