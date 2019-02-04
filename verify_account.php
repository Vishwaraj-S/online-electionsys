<?php
	require "connect_sepro.php";
	require 'core.php';
	if(!loggedin())
	{
		?>
		<script>
			alert('You need to login first!');
			window.location.replace('login.php');
		</script>
		
		<?php
	}

	if(isset($_SESSION['k'])&&!empty($_SESSION['k']))
	{
		?>
		<script>
		alert('Account is already verified');
		window.location.replace('index.php');
		</script>
		<?php
	}
	
	?>
<html>
<head>
	<title>Account Verification</title>
	<link href="styles/style_verify.css" type="text/css" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Berkshire+Swash" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Monoton" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Limelight" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Bungee+Inline|Fredericka+the+Great" rel="stylesheet">
	<link href="img/favicon.png" rel="icon">
</head>
<body>
	<h1 class="header">Verify Your Account</h1>
		<div class="grid">
		<a href="index.php" class="tabbutton" title="Home"> <img class="icon" src="img/home.png"> </a>

		<a href="vote_panel.php" class="tabbutton" title="Vote now"> <img class="icon" src="img/unnamed.png"> </a>
		<a href="registration.php" class="tabbutton" title="Register Now"> <img class="icon" src="img/icon_reg4.png"> </a>
		<?php 
		if(loggedin()){
			echo "<p class='par'>".$_SESSION['user']."</p>";
		}
		else
		{
			echo "<a href='login.php' class='tabbutton' title='Login'><img class='icon' src='img/icon_login1.png' ></a>";
		}
		?>
		<div class="droptrigger">
		<a class="tabbutton" style="height: 45px;width: 40px;padding-top: 12px;">&#9660</a>
		<div class="dropcontent">
		<?php
			if(loggedin())
			{
					$real= $_SESSION['image'];
					echo "<img src='$real' class='item' style='height:150px; width: 150px;margin-top:10px;'>";
					echo "<a href='verify_account.php' class='item'>Verify Account</a>";
					echo "<a href='logout_user.php' class='item'>Log Out</a>";
			}
			else
			{
				echo "<img src='img/default_user.jpg' class='item' style='height:150px; width: 150px;margin-top:10px;'>";
				echo "<p class='item'>Not logged in</p>";
			}
		?>
	</div></div>
	</div>
	<hr style="width:94%;background-color:rgb(244, 66, 83);border: none;height: 2px ">
	<div class="pic">
	<div id="otp" style="display:block;">
	<p style="display: inline-block;margin-left: 70px;">Click the button to get OTP:</p>
	<input type='button' class="button" id="resend" onclick="location.href='send_code.php'" value="Send OTP">
	</div>
	<div id="hide" style="display:none;">
	<p style="margin-left: 70px;">Copy the code and paste it in the box below.</p>
	<form action="verify_account.php" method="POST">
		<input type="text" name="code" style="margin-left: 70px;" placeholder="Paste your code here" maxlength="10" autofocus>
		<input type="submit" class="button" style="margin-top: 5px;" value="Verify">
	</form>
	</div></div>
		<?php 
		if(isset($_SESSION['success'])&&$_SESSION['success']==0)
	{
		?>
			<script>
				document.getElementById("hide").style.display = "block";
				document.getElementById("otp").style.display = "none";
				</script>
		<?php
	}
		if(isset($_POST['code']))
	{
		$code=$_POST['code'];
		if($code==$_SESSION['final'])
		{
			$_SESSION['k']=1;
			$mal=$_SESSION['email'];
			$query="UPDATE users SET verified='1' WHERE email='".mysqli_real_escape_string($link,$mal)."'";
			mysqli_query($link,$query);
			header('Location: verified.php');
		}
		else
		{
			?>
			<script>
				alert("Verification code didn't matched. Please retry.");
				document.getElementById("hide").style.display = "none";
				document.getElementById("otp").style.display = "block";
				document.getElementById("resend").value = "Resend OTP";
				//window.location.replace('index.php');
			</script>
			<?php	
			//header('Location: index.php');
		}
	}
	
	?>
</body>
</html>