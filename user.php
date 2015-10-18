<?php
  include('lib/connect.php');
  $obj=new connect();
  $uname=$_GET['uname'];
  $res=$obj->getuser($uname);
  $count=mysql_num_rows($res);
  if($count)
	echo"<div class='err'>user id is not available!</div>";
  else
	echo"<div class='match'>user id available!</div>";
?>