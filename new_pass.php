<?php
	require 'connect_sepro.php';
	if(isset($_POST['paqword']))
	{
		$pass=md5($_POST['paqword']);
		$email=$_POST['ema'];
		$query="UPDATE users SET pass='".mysqli_real_escape_string($link,$pass)."' WHERE email='$email'";
		mysqli_query($link,$query);
		?>
		<script>
			alert('Password has been changed successfully.');
			window.location.replace('login.php');
		</script>
		<?php
	}
	else
	{
		?>
		<script>
			alert('Wrong Gateway. Please try again');
			window.location.replace('preset_email.php');
		</script>
		<?php
	}
?>