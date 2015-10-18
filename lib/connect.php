<?php
  class connect{
	private $con;
	private $host='localhost';
	private $uname='root';
	private $pwd='';
	private $db='mobile_store';
	
	public function __construct()
	{
	  $this->con=mysql_connect($this->host,$this->uname,$this->pwd)or die('Unable to connect to remote server');
	  mysql_select_db($this->db,$this->con)or die('Unable to connect to database');
	}
	
	public function database($fname,$lname,$uid,$pwd,$addr,$country,$state,$city,$mno,$tno,$dob,$gen,$mail,$occup,$area,$pin)
	{
	  $sql="insert into register_user values
			('$fname','$lname','$uid','$pwd','$addr','$country','$state','$city','$mno','$tno','$dob','$gen','$mail','$occup','$area','$pin')";
	  $n=mysql_query($sql,$this->con);
	  return $n;
	}
	
	public function getmodel()
	{
	  $sql="select * from company";
	  $res=mysql_query($sql,$this->con);
	  return $res;
	}
	
	public function allname($mid)
	{
	  $sql="select model_name from model where com_id='$mid'";
	  $res=mysql_query($sql);
	  return $res;
	}	
	
	public function getname($mid,$a)
	{
	  if($mid=='')
	    $sql="select model_name from model LIMIT $a,6";
	  else
		$sql="select model_name from model where com_id='$mid' LIMIT $a,6";
	  $res=mysql_query($sql,$this->con);
	  return $res;
	}
	
	public function tot_names($mid)
	{
	  if($mid=='')
	    $sql="select model_name from model";
	  else
		$sql="select model_name from model where com_id='$mid'";
	  $res=mysql_query($sql,$this->con);
	  $count=mysql_num_rows($res);
	  return $count;
	}
	
	public function getcompany($name)
	{
	  $sql="select com_name from specifications where model_id='$name'";
	  $res=mysql_query($sql,$this->con);
	  $arr=mysql_fetch_row($res);
	  return $arr[0];
	} 
	
	public function companyname($name)
	{ 	
	  $sql="select com_name from company where com_id='$name'";
	  $res=mysql_query($sql,$this->con);
	  $arr=mysql_fetch_row($res);
	  return $arr[0];
	}
	
	public function getimage($name)
	{ 	
	  $sql="select img_name from model_images where model_id='$name'";
	  $res=mysql_query($sql,$this->con);
	  $arr=mysql_fetch_row($res);
	  return $arr[0];
	}
	
	public function getprice($name)
	{
	  $sql="select price from specifications where model_id='$name'";
	  $res=mysql_query($sql,$this->con);
	  $arr=mysql_fetch_row($res);
	  return $arr[0];
	}
	
	public function getdiscount($name)
	{
	  $sql="select discount from specifications where model_id='$name'";
	  $res=mysql_query($sql,$this->con);
	  $arr=mysql_fetch_row($res);
	  return $arr[0];
	} 
	
	public function getwarranty($name)
	{
	  $sql="select warranty from specifications where model_id='$name'";
	  $res=mysql_query($sql,$this->con);
	  $arr=mysql_fetch_row($res);
	  return $arr[0];
	}
	
	public function getdispsize($name)
	{
	  $sql="select display_size from specifications where model_id='$name'";
	  $res=mysql_query($sql,$this->con);
	  $arr=mysql_fetch_row($res);
	  return $arr[0];
	} 
	
	public function getstate()
	{
	  $sql="select * from state";
	  $res=mysql_query($sql,$this->con);
	  return $res;
	} 
	
	public function getcity($state)
	{
	  $sql="select ccode,cityname from city where scode='$state'";
	  $res=mysql_query($sql,$this->con);
	  return $res;
	 }
	
	public function save_cart($mid,$qnty,$uid)
	{	
	  session_start();
	  $sid=$_SESSION['sid'];
	  $uid='';
	  if(isset($_SESSION['uid']))
		$uid=$_SESSION['uid'];
	  $sql="insert into cart(mname,qty,sid,uid)values('$mid','$qnty','$sid','$uid')";
	  $n=mysql_query($sql);
	  return $n;
	}
	
	public function getcount()
	{
	  $sid=$_SESSION['sid'];
	  if(isset($_SESSION['uid']))
	  {
		$uid=$_SESSION['uid'];
		$sql="select * from cart where uid='$uid'";
	  }
	  else
		$sql="select * from cart where sid='$sid' and uid=''";
	  $res=mysql_query($sql,$this->con);
	  $a=mysql_num_rows($res);
	  return $a;
	} 
	
	public function getitems()
	{
	  $sid=$_SESSION['sid'];
	  if(isset($_SESSION['uid']))
	  {
		$uid=$_SESSION['uid'];
		$sql="select * from cart where uid='$uid'";
	  }
	  else
		$sql="select * from cart where sid='$sid' and uid=''";
	  $res=mysql_query($sql,$this->con);
	  return $res;
	} 
	
	public function remove_item($name)
	{
	  session_start();
	  $sid=$_SESSION['sid'];
	  if(isset($_SESSION['uid']))
	  {
		$uid=$_SESSION['uid'];
		$sql="delete from cart where mname='$name' and uid='$uid'";
	  }
	  else
		$sql="delete from cart where mname='$name' and sid='$sid'";
	  mysql_query($sql,$this->con);
	} 
	
	public function getquantity($name)
	{
	  $sid=$_SESSION['sid'];
	  $sql="select qty from cart where mname='$name' and sid='$sid'";
	  $res=mysql_query($sql,$this->con);
	  $arr=mysql_fetch_row($res);
	  return $arr[0];
	}
	
	public function modify($name,$qty)
	{
	  session_start();
	  $sid=$_SESSION['sid'];
	  if(isset($_SESSION['uid']))
	  {
		$uid=$_SESSION['uid'];
		$sql="update cart set qty ='$qty' where mname='$name' and uid='$uid'";
	  }
	  else
		$sql="update cart set qty='$qty' where mname='$name' and sid='$sid'";
	  mysql_query($sql,$this->con);
	} 
	
	public function validate($uid,$pwd)
	{
	  $sql="select last_name from register_user where uid='$uid' and pwd='$pwd'";
	  $res=mysql_query($sql,$this->con);
	  return $res;
	}
	
	public function remove_session_details()
	{
	  $sid=$_SESSION['sid'];
	  if(!(isset($_SESSION['uid'])))
		$sql="delete from cart where sid='$sid'";
	  mysql_query($sql);
	}
	
	public function push_cart()
	{
	  $sid=$_SESSION['sid'];
	  $uid=$_SESSION['uid'];
	  $sql="update cart set uid='$uid' where sid='$sid'";
	  mysql_query($sql,$this->con);
	}
	
	public function fetch_details($uid)
	{
	  $sql="select * from register_user where uid='$uid'";
	  $res=mysql_query($sql,$this->con);
	  return $res;
	}
	
	public function getuser($uname)
	{
	  $sql="select uid from register_user where uid='$uname'";
	  $res=mysql_query($sql,$this->con);
	  return $res;
	}
  }//end of class
?>