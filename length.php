<?php
  $len=$_GET['len'];
  $a=strlen($len);
  if($a<=3)
	echo "<img src='images/weak.png' height='30 px' width='200 px'>";
  else if($a<=5)
	echo "<img src='images/fair.png' height='30 px' width='200 px'>";
  else if($a<=8)
	echo "<img src='images/good.png' height='30 px' width='200 px'>";
  else
	echo "<img src='images/strong.png' height='30 px' width='200 px'>";
?>