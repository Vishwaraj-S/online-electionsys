<?php
	require 'connect_sepro.php';
	require 'core.php';
	if(!admin())
	{
		?>
		<script>
		alert('Please log in as Admin first.');
		window.location.replace('admin_login.php');
		</script>
		<?php
	}

	$query="SELECT * FROM elections WHERE active='0'";
	$result=mysqli_query($link,$query);
	if(mysqli_num_rows($result)>0)
	{
		while($row=mysqli_fetch_assoc($result))
		{
			$no=$row['sno'];
			$gil=$row['election'];
			$query="SELECT fname,lname,vcount FROM candidates WHERE election='$no' ORDER BY vcount DESC";
			$res=mysqli_query($link,$query);
			if(mysqli_num_rows($res)>0)
			{
				echo "<u>".$gil."</u><br><br>";
				while($el=mysqli_fetch_assoc($res))
				{
					echo $el['fname']." ".$el['lname'].": ".$el['vcount']."<br>";
				}
				?>
					<form action="result.php" method="GET">
						<input type="hidden" name="eletion" value="<?php echo $no;?>">
						<input type="hidden" name="elet" value="<?php echo $gil;?>">
						<input type="submit" style="display:block;" value="Set Announcement" name="sub">
					</form>
				<?php
				echo "<hr><br>";
			}
		}
	}
	else
	{
		?>
			<script>
				alert('No closed elections found.');
				window.location.replace('end_election.php');
			</script>
		<?php
	}
	
	if(isset($_GET['sub'])&&isset($_GET['eletion']))
	{
		$eletion=$_GET['eletion'];
		$elet=$_GET['elet'];
		$quey="SELECT lname,fname,email FROM candidates WHERE election=$eletion AND vcount= (SELECT MAX(vcount) FROM candidates WHERE election=$eletion)";
		if(!$reslt=mysqli_query($link,$quey)){
			echo 'iuvg';
		}
		//echo mysqli_num_rows($reslt);
		if(mysqli_num_rows($reslt)>1)
		{
			?>
				<script>
					alert('Conflicting winner results. No new announcements added.');
				</script>
			<?php
		}
		else
		{
			$rw=mysqli_fetch_assoc($reslt);
			date_default_timezone_set("Asia/Kolkata");
			$add=date("d-m-Y")."(".date("h:i:sa")."):".$rw['fname']." ".$rw['lname']."(".$rw['email'].") is the winner for election:\"".$elet."\".";
			$quey="INSERT INTO anouncement (line) VALUES ('$add')";
			mysqli_query($link,$quey);
			?>
				<script>
					alert('Announcement added successfully');
				</script>
			<?php
		}
	}

?>