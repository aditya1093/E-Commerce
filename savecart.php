<?php
  include('lib/connect.php');
  $obj=new connect();
  $modelid=$_POST['modelid'];
  $qnty=$_POST['qnty'];
  $n=$obj->save_cart($modelid,$qnty);
  header('Location:cart.php');
?>