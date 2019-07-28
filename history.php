<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>History</title>
	<meta name="viewport" content="width=device-width">
	<meta name="description" content="India and Pollution">
	<meta name="keywords" content="report pollution">
	<link rel="stylesheet" href="style.css">
	<style> table,th,td{
		border: 1px solid black;
		border-collapse:collapse;
		}
		th,td{
			padding:15px;
			text-align: left;
		}
	</style>
</head>
<body>
	<header style="position: fixed; top:0; width:100%">
		<div class="container">
			<div id="branding">
				<h1><span class="highlight"><?php echo $_SESSION['username'];?></h1>
			</div>
			<nav>
				<ul>
					<li><a href="user.php">HOME</a></li>
					<li><a href="complain.php">COMPLAIN</a></li>
					<li><a href="vote.php">UPVOTE</a></li>
					<li class="current"><a href="history.php">HISTORY</a></li>
					<li><a href="logout.php">LOGOUT</a></li>
				</ul>
			</nav>
	</header>
	<h2 style='text-align:center; margin-top:120px'>Your Previous Complains</h2>
	<div style="margin-top:30px;margin-bottom:30px;margin-left:20px">
	<table>
		<thead>
			<th>Compalin Id</th>
			<th>Subject</th>
			<th>Complain</th>
			<th>Authority</th>
			<th>Upvotes</th>
			<th>Email Status</th>
			<th>Date</th>
		</thead>
		<tbody>
			

<?php
	include_once('config.php');

	$n=$_SESSION['username'];

	$sql2="SELECT * FROM `complain` WHERE `username`='$n' ORDER BY `date` DESC;";
	$result=mysqli_query($conn,$sql2);
	//echo "result:".$result;
	
	if(mysqli_num_rows($result) > 0){
		while($row=mysqli_fetch_assoc($result)){

			echo "<tr><td>".$row['complain_id']."</td><td>".$row['subject']."</td><td>".$row['complain']."</td><td>".$row['authority']."</td><td>".$row['upvote']."</td>";
			if($row['mail_status'])
				echo "<td>Mail Sent</td>";
			else
				echo "<td>Pending</td>";
			echo "<td>".$row['date']."</td></tr>";
			
		}
	}
	mysqli_close($conn);
?>


		</tbody>


	</table>
</div>
</body>
</html>

