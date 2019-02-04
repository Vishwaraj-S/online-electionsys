<?php
	require 'core.php';
	
	if(!admin())
	{
		?>
			<script>
				alert('Please log in as Admin first');
				window.location.replace('admin_login.php');
			</script>
		<?php
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
	<title>Welcome</title>
</head>
<body>
	<h1 class='header'>Admin Panel</h1>
	<div class="pic">
	<br><br><br>
	<div class="link">
		<a href="add_anouncement.php" class="tab" >Add Anouncement</a>
		<a href="new_election.php" class="tab">New Election</a>
		<a href="add_candidate.php" class="tab">Add Candidate</a>
		<a href="delete_ucan.php" class="tab">Edit User/Candidate</a>
		<a href="end_election.php" class="tab">Start/End Election, Result Calculation</a>
		 <?php 
			if(admin())
			{
				echo "<a href='logout_admin.php' class='tab'>"."Logout"."</a>";
			}
		?>
	</div>
	<div class="vl"></div>
	<div class="body">
	<p>Welcome <?php echo $_SESSION['admin'];?></p><br>
	<p>&#8592; Please select an option from left pane.</p>
	</div></div>
</body>
</html>