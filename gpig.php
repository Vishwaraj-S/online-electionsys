
<html>
<head>
</head>
<body>
	<form action='gpig.php' method='get'>
	<input name='d' type='date'>
	<input type='submit'>
	</form>
</body>
</html>
<?php
	/*echo date_default_timezone_get();
	echo date("h:i:sa");
	date_default_timezone_set("Asia/Kolkata");
	echo date_default_timezone_get();
	echo date("h:i:sa");*/
	//phpinfo();
	//d7fb3c87b102ec5f1c8ddb51baeb4cbc
	if(isset($_GET['d']))
	{
		//date_default_timezone_set("Asia/Kolkata");
		//echo date("d-m-Y").date("h:i:sa");
		$t=strtotime($_GET['d']);
		echo check_age($t);
		/*echo date("Y",$t);
		if(date("Y")-date("Y",$t)==0)
			echo 'true';
		echo date("Y")-date("d",$t);*/
	}
		function check_age($age)
		{
			echo 'in'; 
		date_default_timezone_set("Asia/Kolkata");
		if(date("Y")-date("Y",$age)>18)
		{
			echo '>in';
			return true;
		}
		else if(date("Y")-date("Y",$age)==18)
		{
			echo '==in';
			if(date("m",$age)-date("m")<0)
			{
				return true;
			}
			else if(date("m",$age)-date("m")==0)
			{
				if(date("d",$age)-date("d")<=0){
				return true;}
				return false;
			}
			return false;
		}
		return false;
	}		
	
?>