<?php
	session_start();
	include_once('config.php');
	if(isset($_POST['submit'])){

		$username=$_SESSION['username'];
		$sub=$_POST['subject'];
		$email='devanshgaur75@gmail.com';
		$complain=$_POST['complain'];
		$authority='MDDA';
		$locality=$_POST['locality'];
		$city=$_POST['city'];
		
		$file_name = $_FILES['image']['name']; 
		$file_tmp =$_FILES['image']['tmp_name'];
		$img_path="files/".$file_name;
		move_uploaded_file($file_tmp,"files/".$file_name);
			
		$timezone = date_default_timezone_get();
		$t= date_default_timezone_set('Asia/Kolkata'); 
		$ar=explode('-',date('d-m-Y'));
		$date=$ar[2]."-".$ar[1]."-".$ar[0];

		do{
			$flag=0;
			$complain_id=rand(100,999).rand(100,999);
			$sql="SELECT * FROM `complain` WHERE `complain_id`='$complain_id';";
			$res=$conn->query($sql);
			if(mysqli_num_rows($res)>0)
			{
				$flag=1;
			}
		}while($flag==1);

		$upvote=0;
		
	
		$sql="insert into complain (username,complain_id,complain, locality, city, authority,authority_mail,upvote,image_path,date,subject)  values ('$username','$complain_id','$complain','$locality','$city','$authority','$email','$upvote','$img_path','$date','$sub');";
		$res=$conn->query($sql);
		if($res>0)
		{
			echo "<script>alert('Complain Successfully Registered')</script>";
			echo "<script>window.location.href='user.php'</script>";
			//header('location:http://localhost/inertia/user.php');
		}
		else
		{
			echo "<script>alert('Compalin Unsuccessfull')</script>";
			echo "<script>window.location.href='user.php'</script>";
			//echo "Complain Unsuccessful : ".$conn->error;
		}
	}
	
	
?>