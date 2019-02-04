<?php 
	require 'core.php';
	require 'connect_sepro.php';
	 
	if(admin())
	{
		header("Location: se_pro/admin_welcome.php");
	}		
	if(isset($_POST['name']))
	{
		//SET ADMIN USERNAME AND PASSWORD HERE.
		$admin_username="Admin";
		$admin_password= "Admin123";
		//ADMIN ENDS
		$name=$_POST['name'];
		$password=$_POST['password'];
		if($name==$admin_username&&$password==$admin_password)
		{
			$_SESSION['admin']="Vishwaraj";
			header("Location: admin_welcome.php");
		}
		else 
		{
			echo "<script>";
			echo "alert('Wrong username or password. Please try again')";
			echo "</script>";
		}
	}
?>
<html>
<head>
	<link href="img/favicon.png" rel="icon">
	<link href="styles/style_admin.css" type="text/css" rel="stylesheet">
			<link href="https://fonts.googleapis.com/css?family=Berkshire+Swash" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Monoton" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Limelight" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Bungee+Inline|Fredericka+the+Great" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
	<title>Admin Login</title>
</head>
<body>
	<h1 class="header">Admin Panel</h1>
	<div class="pic">
	<br>
	<br>
	<br>
	<div class="link">
		<a href="add_anouncement.php" class="tab" >Add Anouncement</a>
		<a href="new_election.php" class="tab">New Election</a>
		<a href="add_candidate.php" class="tab">Add Candidate</a>
		<a href="delete_ucan.php" class="tab">Edit User/Candidate</a>
		<a href="end_election.php" class="tab">Start/End Election, Result Calculation</a>
		 <?php 
			if(admin())
			{
				echo "<a href='logout_admin.php' class='tab'>Logout</a>";
			}
		?>
	</div>
	<div class="vl"></div>
	<div class="body">
		<p style="color:white;">Enter Admin Details</p>
		<form action="admin_login.php" method="POST">
			<input type='text' maxlength='30' placeholder='Username' name="name" class="field" autofocus required>
			<input type="password" maxlength='40' class="field" name="password" placeholder="Password" required>
			<input type="submit" value="Log in" class="button">
		</form>
	</div>
	</div>
</body>
</html>