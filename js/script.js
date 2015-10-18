// JavaScript Document

	var http = false;

	if(navigator.appName == ("Microsoft Internet Explorer"))
	{
		http = new ActiveXObject("Microsoft.XMLHTTP");
	}
	else
	{
		http = new XMLHttpRequest();
	}

	function wrong()
	{
		alert("Mandatory fields should not be left empty");
	}

	function availability(ava)
	{
		http.open("GET","user.php?uname="+ava,true);
		http.onreadystatechange = function()
		{

			if(http.readyState == 4)
			{
				document.getElementById("avail").innerHTML = http.responseText;
				
			}
		}
		http.send(null);
	}

	function getlength(len)
	{
		http.open("GET","length.php?len="+len,true);
		http.onreadystatechange = function()
		{

			if(http.readyState == 4)
			{
				document.getElementById("msg").innerHTML = http.responseText;
				
			}
		}
		http.send(null);
	}

	function confirm()
	{
		if(document.form1.pwd2.value != document.form1.pwd1.value)
		{
			document.getElementById("cp").innerHTML = "Password not matched!";
			document.form1.pwd2.value = "";
			return false;
		}
		else
		{
			document.getElementById("cp").innerHTML = "";
			return true;
		}
	}

	function pincode(b)
	{
		if(isNaN(b))
		{
			document.getElementById("pc").innerHTML = "Invalid pin code!";
			document.form1.pin.value = "";
			return false;
		}
		else
		{
			document.getElementById("pc").innerHTML = "";
			return true;
		}
	}

	function getcity(c)
	{
		http.open("GET","city.php?city="+c,true);
		http.onreadystatechange = function()
		{

			if(http.readyState == 4)
			{
				document.getElementById("city").innerHTML = http.responseText;
				
			}
		}
		http.send(null);
	}

	function tel(b)
	{
		if(isNaN(b))
		{
			document.getElementById("tn").innerHTML = "Invalid telephone no!";
			document.form1.mno.value = "";
			return false;
		}
		else
		{
			document.getElementById("tn").innerHTML = "";
			return true;
		}
	}

	function calc(qty)
	{
		var amt = parseInt(document.form1.amount.value)*qty;
		document.form1.amt.value = "";
		document.form1.amt.value = amt;
	}
