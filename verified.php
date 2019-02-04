<?php
	require "core.php";
?>
<html>
<head>
	<title>Verification Successful</title>
	<link href="img/favicon.png" rel="icon">
	<link href="styles/style_verify.css" type="text/css" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Berkshire+Swash" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Monoton" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Limelight" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Bungee+Inline|Fredericka+the+Great" rel="stylesheet">
</head>
<body>
<h1 class="header">Verification Successful</h1>
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
<div class="pic2">
</div>
</body>
</html>