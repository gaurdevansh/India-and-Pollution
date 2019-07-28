<?php
	require_once('config.php');

	if(isset($_POST['Button']))
	{
		$firstname=$_POST['firstname'];
		$lastname=$_POST['lastname'];
		$username=$_POST['username'];
		$email=$_POST['email'];
		$password=$_POST['password'];
		$phone=$_POST['phoneNo'];
		$age=$_POST['age'];
		$gender=$_POST['gender'];
		$address=$_POST['address'];
		$city=$_POST['city'];
		$state=$_POST['state'];
	}

	echo "$email";

	$insert="insert into tb1 (firstname,lastname,username,email,password,phone,age,gender,address,city,state)  values ('$firstname','$lastname','$username','$email','$password',$phone,$age,'$gender','$address','$city','$state');";
	
	
	
	if($conn->query($insert)==TRUE)
	{  
		
		/*echo "<script>alert('Registration Successful')</script>";*/

		header("Location: http://localhost/inertia/login.html");
	}
	else
	{
		echo $conn->error;
		echo "Registration Unsuccessful";
	}

	mysqli_close($conn);
?>