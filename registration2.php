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

		$insert="insert into `tb1` (firstname,lastname,username,email,password,phone,age,gender,address,city,state,complain_voted)  values ('$firstname','$lastname','$username','$email','$password',$phone,$age,'$gender','$address','$city','$state','a');";
	
	
	
		if($conn->query($insert)==TRUE)
		{  
		
		/*echo "<script>alert('Registration Successful')</script>";*/
		//echo "<script>alert('Registration Successful')</script>";

		header("Location: http://localhost/inertia/login.html");
		}
		else
			
		{
		echo "<script>alert('Registration Unsuccessful')</script>";
		ech
		//echo $conn->error;
		//echo "Registration Unsuccessful";
			header("Location: http://localhost/inertia/registration2.php");
		}

		mysqli_close($conn);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration Form</title>
	<meta name="viewport" content="width=device-width">
	<meta name="description" content="India and Pollution">
	<meta name="keywords" content="report pollution">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" type="text/css" href="registration.css">

	<script type="text/javascript">
		temp=0;
		temp1=0;
		function checkuser()
		{
			temp1=0;
            var name=document.getElementById('username').value;
            xmlhttp=new XMLHttpRequest();
            
            xmlhttp.onreadystatechange=function()
            {
                if(this.readyState==4 && this.status==200)
                {
                    document.getElementById("d1").innerHTML=this.responseText;
                    if(document.getElementById("d1").innerHTML=="Username Already Exists")
                    {
                    	temp1=1; 
                    }   
                }
            };
            xmlhttp.open("GET","Auth.php?id="+name,true);
            xmlhttp.send();
		}
		function checkemail()
		{
			temp=0;
                email=document.getElementById('email').value;
                xmlhttp2=new XMLHttpRequest();
                
                xmlhttp2.onreadystatechange=function() 
                {
                    if(this.readyState==4 && this.status==200)
                    {
                        document.getElementById("d2").innerHTML=this.responseText;
                         if(document.getElementById("d2").innerHTML=="Email Already Exists")
                     	 temp=1;
                     }
                };
                xmlhttp2.open("GET","Auth.php?id1="+email,true);
                xmlhttp2.send();

		}
		function validate()
            {
                if(temp==1)
               return false;
           if(temp1==1)
               return false;
           else 
               return true;
            }
	</script>
	
	
</head>
<body>

	<header>
        <div class="container">
            <div id="branding">
                <h1><span class="highlight">INDIA</span> and POLLUTION</h1>
            </div>
            <nav>
                <ul>
                    <li class="current"><a href="index.html">HOME</a></li>
                    <li><a href="about.html">ABOUT</a></li>
                    <li><a href="login.html">REPORT</a></li>
                    <li><a href="registration.html">SIGN UP</a></li>
                </ul>
            </nav>
    </header>

	<div class="registration">
		<img src="https://exelord.com/ember-initials/images/default-d5f51047d8bd6327ec4a74361a7aae7f.jpg" class="avatar">
	<h1>Register Here</h1>
	<table>
	<tbody>
	<form onsubmit="return validate()" method="POST" >
		
					
			<tr>
				

	    <td>Name* : 		</td><td><input type="text" placeholder="First Name" name="firstname"></td>
		<td><input type="text" placeholder="Last Name" name="lastname"></td></tr><br>
		
		<tr>
		<td>Userame* : 			</td><td colspan="2"><input type="text" id='username' placeholder="Enter Userame" name="username" size="50" onchange="checkuser()"></td></tr><br>
		<tr><td></td><td><div id='d1' style="color:red"></div></td></tr>
		
		<tr>
		<td>Email* 	  : 		</td><td colspan="2"><input type="text" id='email' placeholder="mail@example.com" name="email" size="50" onchange="checkemail()"></td></tr><br>
		<tr><td></td><td><div id='d2' style="color:red"></div></td></tr>
		
		<tr>
		<td>Password* : 		</td><td colspan="2"><input type="Password" placeholder="Enter Password" name="password" size="50"></td></tr><br>
		
		<tr>
		<td>Phone No  : 		</td><td colspan="2"><input type="text" placeholder=" Enter Phone No" name="phoneNo" size="50"></td></tr><br>
		
		<tr>
		<td>Age       : 		</td><td colspan="2"><input type="text" placeholder="Enter Age" name="age" size="50"></td></tr><br>
		
		<tr>
		<td>Gender    : 		</td><td colspan="2"><input type="radio" name="gender" value="male"> Male <input  type="radio" name="gender" value="female" size="50"> Female </td></tr><br>
		
		<tr>
		<td>Address   : 		</td><td colspan="2"><input type="text" placeholder="Enter Address" name="address" size="50"></td></tr><br>
		
		<tr>
		<td>City      : 		</td><td colspan="2"><input type="text" placeholder="Enter City" name="city" size="50"></td></tr><br>
		
		<tr>
		<td>State     : 		</td><td colspan="2"><input type="text" placeholder="Enter State" name="state" size="50"></td></tr><br>

		
		<td colspan="3">
		<input type="submit" name="Button" value="Register"></td>


	</form>

	</div></tbody></table>
		
	

</body>
</html>

