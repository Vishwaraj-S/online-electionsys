<?php
	require 'connect_sepro.php';
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
	if(isset($_POST['select']))
	{
		$snod=$_POST['select'];
		$del="vcast".$snod;
		$query= "UPDATE elections SET active='0' WHERE sno='".mysqli_real_escape_string($link,$snod)."'";
		mysqli_query($link,$query);
		$query="ALTER TABLE users DROP $del";
		mysqli_query($link,$query);
		$query="SELECT election FROM elections WHERE sno='".mysqli_real_escape_string($link,$snod)."'";
		$result=mysqli_query($link,$query);
		$row=mysqli_fetch_assoc($result);
		date_default_timezone_set("Asia/Kolkata");
		$insert=date("d-m-Y")."(".date("h:i:sa").") :The voting for position \"".$row['election']."\" is now closed.";
		$query="INSERT INTO anouncement (line) VALUES ('".$insert."')";
		mysqli_query($link,$query);
		echo "<script>";
		echo "alert('The selected election has ended')";
		echo "</script>";
	}
		if(isset($_POST['select2']))
	{
		$snod=$_POST['select2'];
		$del="vcast".$snod;
		$query= "UPDATE elections SET active='1' WHERE sno='".mysqli_real_escape_string($link,$snod)."'";
		mysqli_query($link,$query);
		$query="UPDATE candidates SET vcount='0' WHERE election='".mysqli_real_escape_string($link,$snod)."'";
		mysqli_query($link,$query);
		$query="ALTER TABLE users ADD $del INT( 1 ) NULL DEFAULT '0'";
		mysqli_query($link,$query);
		$query="SELECT election FROM elections WHERE sno='".mysqli_real_escape_string($link,$snod)."'";
		$result=mysqli_query($link,$query);
		$row=mysqli_fetch_assoc($result);
		date_default_timezone_set("Asia/Kolkata");
		$insert=date("d-m-Y")."(".date("h:i:sa").") :The voting for position \"".$row['election']."\" is now open.";
		$query="INSERT INTO anouncement (line) VALUES ('".$insert."')";
		mysqli_query($link,$query);
		echo "<script>";
		echo "alert('The selected election has been started')";
		echo "</script>";
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
	<title>End Elections</title>
</head>
<body>
	<h1 class="header">Admin Panel</h1>
	<div class="pic">
	<br><br><br>
	<div class="link">
		<a href="add_anouncement.php" class="tab">Add Anouncement</a>
		<a href="new_election.php" class="tab">New Election</a>
		<a href="add_candidate.php" class="tab">Add Candidate</a>
		<a href="delete_ucan.php" class="tab">Edit User/Candidate</a>
		<a href="end_election.php" class="tab" style="margin-left: 0px; margin-right: 0px; background-color: rgb(244,66,83); color:white;">&#9654;Start/End Election, Result Calculation</a>
		 <?php 
			if(admin())
			{
				echo "<a href='logout_admin.php' class='tab'>"."Logout"."</a>";
			}
			
		?>
	</div>
	<div class="vl"></div>
	<div class="body">
	<div style="display: inline-block; width:49%;">
		<p>Select election to end:</p>
		<form action="end_election.php" method="POST">
			<select name="select" class="opt">
				<?php
					$query="SELECT sno,election FROM elections WHERE active='1'";
					$result=mysqli_query($link,$query);
					/*if(mysqli_num_rows($result)==0)
					{
						echo "<script>";
						echo "alert('No active elections currently')";
						echo "</script>";
					}
					else
					{*/
						while($row=mysqli_fetch_assoc($result))
						{
							$sno=$row['sno'];
							$election=$row['election'];
							echo "<option value='$sno'>".$election."</option>";
						}
					//}
				?>
			</select>
			<input type="submit" class="button" value="Submit">
		</form>
		</div><div style="display: inline-block;width:49%;">
				<p>Select an election to start:</p>

				<form action="end_election.php" method="POST">
			<select name="select2" class="opt">
				<?php
					$query="SELECT sno,election FROM elections WHERE active='0'";
					$result=mysqli_query($link,$query);
					/*if(mysqli_num_rows($result)==0)
					{
						echo "<script>";
						echo "alert('No active elections currently')";
						echo "</script>";
					}*/
					//else
					//{
						//$w= mysqli_fetch_assoc($result);
						//echo $w[0]['election'];
						while($row=mysqli_fetch_assoc($result))
						{
							$sno=$row['sno'];
							$election=$row['election'];
							echo "<option value='$sno'>".$election."</option>";
						}
					//}
				?>
			</select>
			<input type="submit" class="button" value="Submit">
		</form>

	</div>
			<button onclick="location.href='result.php'" class='button'>Generate Results</button>
	</div>
	</div>
	
</body>
</html>