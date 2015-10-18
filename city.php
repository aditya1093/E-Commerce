<?php
  include('lib/connect.php');
  $obj=new connect();
  $city=$_GET['city'];
  $res=$obj->getcity($city);
  $count=mysql_num_rows($res);
  echo "<select name='city' id='city'>";
  echo "<option value=''>Select City</option>";
  if($count)
  {
	while($arr=mysql_fetch_row($res))
	{
	  echo "<option value=".$arr[0].">".$arr[1]."</option>";
	}
  }
  else
	echo "<option value='-1'>Not available</option>";
  echo "</select>";
?>
