<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		table,th,td{
			border:1px solid black;
			border:collapse;
			text-align:center;
		}
	</style>
</head>
<body>

<?php
	include_once('config.php');
	$q=$_GET['q'];
	$sql="SELECT * FROM complain WHERE complain_id='".$q."'";
	$result=$conn->query($sql);
	if(mysqli_num_rows($result)>0){

		while($row=mysqli_fetch_assoc($result))
		{
			echo "<style>#complain{border:1px solid black; padding:20px; width:40%; margin-left:440px;margin-bottom:20px;margin-top:10px;}</style>";
			echo "<div id='complain'>";
			echo "<b>Complain Id :-</b> ".$row['complain_id']."<br><br>";
			echo "<b>Username :-</b> ".$row['username']."<br><br>";
			echo "<b>Subject :-</b> ".$row['subject']."<br><br>";
			echo "<b>Complain :-</b> ".$row['complain']."<br><br>";
			echo "<b>Locality :-</b> ".$row['locality']."<br><br>";
			echo "<b>City :-</b> ".$row['city']."<br><br>";
			echo "<b>Authority :-</b> ".$row['authority']."<br><br>";
			echo "<b>Upvotes :-</b> ".$row['upvote']."<br><br>";
			if($row['mail_status'])
			{
				echo "<b>Mail Status :-</b> Mail Sent<br><br>";
			}
			else
			{
				echo "<b>Mail Status :-</b> Pending<br><br>";
			}
			echo "<b>Date :-</b> ".$row['date']."<br><br>";
			$src=$row['image_path'];
			echo "<img src='$src' height=200 width=250><br>";
			echo "<button style='height:30px;width:80px;'><a href='voting.php?id=$q'><b>Vote</b></a></button>";
			echo "</div>";
			/*echo "<tr>";
			echo "<td>".$row['username']."</td>";
			echo "<td>".$row['complain_id']."</td>";
			echo "<td>".$row['complain']."</td>";
			echo "<td>".$row['locality']."</td>";
			echo "<td>".$row['city']."</td>";
			echo "<td>".$row['authority']."</td>";
			echo "<td>".$row['upvote']."</td>";
			echo "<td>";
			if($row['mail_status']){
				echo "Mail Sent"."</td>";
			}
			else{
				echo "Pending"."</td>";
			}
			echo "<td><button><a href='voting.php?id=$q'>Vote</a></button></td>";
			echo "</tr>";
			*/
		}
	}
	else
	{
		echo "<h2 style='text-align:center'>Invalid Complain Id</h2>";
	}

?>



</body>
</html>