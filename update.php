<?php
  include('lib/connect.php');
  $obj=new connect();
  $mno=$_POST['mno'];
  $qty=$_POST['qty'];
  $obj->modify($mno,$qty);
  header('Location:cart.php');
?>