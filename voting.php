<?php
session_start();
include_once('config.php');
$id=$_GET['id'];

$username=$_SESSION['username'];								//get the complain_voted string
$sql="SELECT * FROM `tb1` WHERE `username`='$username';";
$res=$conn->query($sql);
$row=mysqli_fetch_assoc($res);
$str=$row['complain_voted'];
$flag=0;
if(!empty($str))                            //check is complain_voted string is empty
{
	$ar=explode('-',$str);                 //break string into array

	for($i=0;$i<count($ar);$i++)
	{
		if(strcmp($ar[$i],$id)==0)
			$flag=1;
	}
}
if($flag==0){                                //if user has not voted earlier

	$sql="SELECT * FROM `tb1` WHERE `username`='$username';";
		$res=$conn->query($sql);
		
		$row=mysqli_fetch_assoc($res);
		$comp_str=$row['complain_voted']."-".$id;
		$sql="UPDATE `tb1` SET `complain_voted`='$comp_str' WHERE `username`='$username';";       //appen new complain to complain_voted 
		$res=$conn->query($sql);

	$sql="SELECT * FROM `complain` WHERE `complain_id`='$id';";       //get number of upvotes
	$result=$conn->query($sql);
	if(mysqli_num_rows($result)>0){
		$row=mysqli_fetch_assoc($result);
		$votes=$row['upvote'];
		$votes=$votes+1;
		if($row['mail_status']==0)                       //check  if mail is already sent
		{
			if($votes>=$row['thresh_hold'])        //check if upvotes are greater than mail sending limit
			{
				require 'PHPMailerAutoload.php';          //code for php mailer
				require 'credentials.php';
				$mail = new PHPMailer;       
				$mail->isSMTP();                                            
			    $mail->Host       = 'smtp.gmail.com';  
			    $mail->SMTPAuth   = true;                                  
			    $mail->Username   = EMAIL;                     
			    $mail->Password   = PASS;                               
			    $mail->SMTPSecure = 'tls';                                  
			    $mail->Port       = 587;                                 
			    $mail->setFrom(EMAIL, 'India And Pollution');
			    $mail->addAddress($row['authority_mail']);
				$mail->addReplyTo(EMAIL);
				$mail->isHTML(true); 
	    		$mail->Subject = $row['subject'];
	    		$mail->Body    = $row['complain'];

	   			$mail->send();
	   			$sql="UPDATE complain SET `mail_status`=1 WHERE `complain_id`='$id';";     //update mail_status in complain table to 1
				$result=$conn->query($sql);

			}
		}
		$sql="UPDATE complain SET `upvote`=$votes WHERE `complain_id`='$id';";       //update upvote in complain table
		$result=$conn->query($sql);
	}
	else
	{
		echo "No Vote";
	}
	echo "<script>alert('Successfully Voted')</script>";
	echo "<script>window.location.href='vote.php'</script>";        //redirect to same page
}
else       //if user has already voted
{
	echo "<script>alert('Already Voted')</script>";
	echo "<script>window.location.href='vote.php'</script>";   //redirect to vote.php
	echo $flag;
	//header("Location: vote.php");
}
echo $flag;
?>