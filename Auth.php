<?php
include_once('config.php');
if(isset($_GET['id']))
{
	$id=$_GET['id'];
	$sql="SELECT * FROM `tb1` WHERE `username`='$id';";
	$res=$conn->query($sql);
	if(mysqli_num_rows($res)>0)
	{
		echo "Username Already Exists";
	}
}

if(isset($_GET['id1']))
{
	$id1=$_GET['id1'];
	$sql="SELECT * FROM `tb1` WHERE `email`='$id1';";
	$res=$conn->query($sql);
	if(mysqli_num_rows($res)>0)
	{
		echo "Email Already Exists";
	}
}

?>