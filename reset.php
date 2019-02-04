<?php
	require 'connect_sepro.php';
	if($_GET['key']&&$_GET['q'])
	{
		$email=$_GET['key'];
		$pass=$_GET['q'];
		$query="SELECT email FROM users WHERE md5(email)='$email' AND pass='$pass'";
		$result=mysqli_query($link,$query);
		if(mysqli_num_rows($result)==1)
		{
			$row=mysqli_fetch_assoc($result);
			?>
				<form action="new_pass.php" method="POST">
				<input type="hidden" name="ema" value="<?php echo $row['email']; ?>">
				<input type="password" name="paqword" maxlength="20" title="At least one number, and one uppercase and lowercase letter. Minimum 8 characters" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="New Password" required>
				<input type="submit" value="Change Password">
				</form>
			<?php
		}
		else
		{
			?>
				<script>
					alert('Link is invalid. Please try again');
				</script>
			<?php
		}
	}
?>