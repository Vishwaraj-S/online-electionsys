<?php
	require 'connect_sepro.php';
	require "core.php";
	
	function check_age($age){
		date_default_timezone_set("Asia/Kolkata");
		if(date("Y")-date("Y",$age)>18)
		{
			return true;
		}
		else if(date("Y")-date("Y",$age)==18)
		{
			if(date("m",$age)-date("m")<0)
			{
				return true;
			}
			else if(date("m",$age)-date("m")==0)
			{
				if(date("d",$age)-date("d")<=0)
					return true;
				return false;
			}
			return false;
		}
		return false;
	}		
	
	if(isset($_POST['fname']))
	{
		$fname=$_POST['fname'];
		$lname=$_POST['lname'];
		$uname=$_POST['uname'];
		$email=$_POST['email'];
		$pass=$_POST['pass'];
		$cpass=$_POST['cpass'];
		$dob=$_POST['dob'];
		$phno=$_POST['phno'];
		$sex=$_POST['sex'];
		$query="SELECT usern from users where usern='".mysqli_real_escape_string($link,$uname)."' OR email='".mysqli_real_escape_string($link,$email)."'";
		$result=mysqli_query($link,$query);
		if(mysqli_num_rows($result)==0)
		{
			if(check_age(strtotime($dob)))
			{
				if($pass==$cpass)
				{
					$passhash=md5($pass);
					$info= pathinfo($_FILES['image']['name']);
					$ext= $info['extension'];
					if($ext=='png'||$ext=='jpg'||$ext=='jpeg')
					{
						$query="INSERT INTO users (usern,firstn,lastn,dob,pass,email,phno,gender) VALUES ('".mysqli_real_escape_string($link,$uname)."','".mysqli_real_escape_string($link,$fname)."','".mysqli_real_escape_string($link,$lname)."','".mysqli_real_escape_string($link,$dob)."','".mysqli_real_escape_string($link,$passhash)."','".mysqli_real_escape_string($link,$email)."','".mysqli_real_escape_string($link,$phno)."','".mysqli_real_escape_string($link,$sex)."')";
						mysqli_query($link,$query);
						$query="SELECT sno FROM users WHERE usern='".mysqli_real_escape_string($link,$uname)."'";
						$result=mysqli_query($link,$query);
						$row=mysqli_fetch_assoc($result);
						$t=$row['sno'];
						$newname=$t.".".$ext;
						$target= 'user_img/'.$newname;
						move_uploaded_file($_FILES['image']['tmp_name'], $target);
						$query="UPDATE users SET image='$target' where sno='$t'";
						mysqli_query($link,$query);
						?>
							<script>
								alert("User successfully registered.");
							</script>
						<?php
					}
					else
					{
						echo "<script>";
						echo "alert('Please select valid image file. (jpg, jpeg or png)')";
						echo "</script>";
					}
				}
				else
				{
					echo "<script>";
					echo "alert('Password didn\'t matched. Please try again')";
					echo "</script>";
				}
			}
			else
			{
				?>
					<script>
						alert('User is below 18 years(minimum voting age) ');
					</script>
				<?php
			}
		}
		else
		{
			echo "<script>";
			echo "alert('Username or e-mail already exists. Please try again.')";
			echo "</script>";
		}
	}
?>
<html>
<head>
	<title>Registration</title>
	<link href="https://fonts.googleapis.com/css?family=Berkshire+Swash" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Monoton" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Limelight" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Bungee+Inline|Fredericka+the+Great" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
	<link href="styles/style_registration.css" type="text/css" rel="stylesheet">
	<link href="img/favicon.png" rel="icon">
</head>
<body style="background-color: #fff;">

	<h1 class = "header">Registration</h1>
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
		<br> <br>
		<br> <br>
		<form action="registration.php" method="POST" class="pink" enctype="multipart/form-data">
			
				
				<input type="text" class="field" name="fname" maxlength="15" pattern="[A-Za-z].{3,}" title="Characters allowed: A-Z, a-z" placeholder="First Name" required autofocus>
			
			
				
				<input type="text" class="field" name="lname" maxlength="15" pattern="[A-Za-z].{3,}" title="Characters allowed: A-Z, a-z" placeholder="Last Name" required>
			
				
				<input type="text" class="field" name="uname" maxlength="15" pattern="[A-Za-z0-9_].{3,}" title="Characters allowed: A-Z, a-z, 0-9 and '_'(underscore)" placeholder="Username" required>
			
				
				<input type="email" class="field" name="email" maxlength="60" placeholder="e-mail" required>
			
				<input type="password" class="field" name="pass" maxlength="20" title="At least one number, and one uppercase and lowercase letter. Minimum 8 characters" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="Password" required>
		
				
				<input type="password" class="field" name="cpass" maxlength="20" placeholder="Confirm password" required>
			
				
				<input Placeholder="DOB" onfocus="(this.type='date')" class="field" name="dob" required>
			
				<input type="number" class="field" name="phno" pattern="{10}" min="7000000000" max="9999999999" placeholder="Phone no." maxlength="10" required>
			
				<input type="radio" name="sex" value="M" style="margin-left: 65px;"checked>Male
				<input type="radio" name="sex" value="F" style="margin-left: 20px;">Female
			
			<p style="display: inline; margin-left: 20px;">Select your image:</p> <input type="file" name="image" required>
			<input type="submit" class="button" value="Register">
		</form>
	
	</div>
</body>
</html>