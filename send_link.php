<?php
require 'connect_sepro.php';
	if(isset($_POST['email']))
	{
		$email=$_POST['email'];
		$query="SELECT email,pass FROM users WHERE email='".mysqli_real_escape_string($link,$email)."'";
		$result=mysqli_query($link,$query);
		if(mysqli_num_rows($result)==1)
		{
			$row= mysqli_fetch_assoc($result);
			$em=md5($row['email']);
			$pass=$row['pass'];
			$relink="<a href='localhost/se_pro/reset.php?key=".$em."&q=".$pass."'>here</a>";
			$to=$row['email'];
			$body="Click ".$relink." to reset password.\nPlease don't share this link with anyone.";
			$subject="Password Reset";
			$headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$headers .= 'From: Password Reset<vcode@vishelect.com>' . "\r\n";
			if(!mail($to,$subject,$body,$headers))
			{
				echo "<script>";
				echo "alert('Cannot connect to server. Please check your internet connection and try again later.')";
				echo "</script>";
			}
			else
			{
				?>
					<script>
					alert('Email sent. Check your e-mail for password reset link');
					window.location.replace('login.php');
					</script>
				<?php
			}
		}
		else
		{
			?>
				<script>
					alert('E-mail is not registered. Please try again.');
					window.location.replace('preset_email.php');
				</script>
			<?php
		}
	}
	else
	{
		?>
		<script>
		alert('Enter e-mail first');
		window.location.replace('preset_email.php');
		</script>
		<?php
	}
?>