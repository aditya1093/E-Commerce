<?php 
  include('lib/connect.php');
  $obj=new connect();
  $mno=$_GET['mno'];
  $obj->remove_item($mno);
  header('Location:cart.php');
?>
	