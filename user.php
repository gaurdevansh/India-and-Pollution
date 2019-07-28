<?php
	session_start();
	if(!isset($_SESSION['username']))
		header('localhost:http://localhost/inertia/login.php');
	include_once('config.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width">
	<meta name="description" content="India and Pollution">
	<meta name="keywords" content="report pollution">
	<title>User</title>
	<link rel="stylesheet" href="style.css">
	<style type="text/css">
		#feed{
			border:1px solid black;
			float:center;
			padding:20px;
			margin:20px;
			width:50%;
			margin-left:350px;
			height:110px;
		}
	</style>
</head>
<body>
	<header style="position:fixed; top:0; width:100%">       <!-- Top Header  -->
		<div class="container"> 
			<div id="branding">
				<h1><span class="highlight"><?php echo $_SESSION['username'];?></h1>
			</div>
			<nav >
				<ul>
					<li class="current"><a href="user.php">HOME</a></li>
					<li><a href="complain.php">COMPLAIN</a></li>
					<li><a href="vote.php">UPVOTE</a></li>
					<li><a href="history.php">HISTORY</a></li>
					<li><a href="logout.php">LOGOUT</a></li>
				</ul>
			</nav>
	</header>
	<!--<h2>Hello, <?php echo $_SESSION['username'];?></h2>-->
	<h3>HOME PAGE OF USER</h3>
	<!--<a href="logout.php">Logout</a>-->
	<div style="margin-top: 100px">

	<?php                                                      //Display Latest Complains in user's town
	$username=$_SESSION['username'];                           
	$sql="SELECT * FROM `tb1` WHERE `username`='$username';";
	$result=$conn->query($sql);
	if(mysqli_num_rows($result)>0)
	{
		$row=mysqli_fetch_assoc($result);
		$city=$row['city'];                                      //Get user's city
		$sql="SELECT * FROM `complain` WHERE `city`='$city' ORDER BY `date` DESC;";     //Display complains by date
		$result=$conn->query($sql);
		if(mysqli_num_rows($result)>0)
		{	
			echo "<h2 style='text-align:center'>Complains in your City</h2>";
			$flag=0;
			while(($row=mysqli_fetch_assoc($result))&&$flag<10)       //Display latest 10 complains
			{
				echo "<div id='feed'>";
				echo "<div style='float:left'><b>Complain Id</b> : ".$row['complain_id']."<br>";
				echo "<b>Locality</b> : ".$row['locality']."<br>"; 
				echo "<b>Subject</b> : ".$row['complain']."<br>";
				echo "<b>Upvotes</b> :".$row['upvote']."<br>";
				$cid=$row['complain_id'];
				echo "<button><a href='vote.php?id=$cid'>View Complain</a></button ></div>";
				$img_path=$row['image_path'];
				echo "<div style='float:right'><img src='$img_path' height=120 width=150></div>"."<br>";
				echo "</div>";
				$flag+=1;
			}
		}
	}
	

	?>
	</div>
</body>
</html>