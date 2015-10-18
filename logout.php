<?php
  include('lib/connect.php');
  $obj=new connect();
  session_start();
  $obj->remove_session_details();
  session_destroy();
  $msg=md5('logout');
  header('Location:index.php?logout='.$msg);
?>