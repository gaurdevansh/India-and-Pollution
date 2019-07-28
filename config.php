<?php
$databaseHost = 'localhost';
$databaseName = 'db1';
$databaseUserName = 'root';
$databasePassword = '';

//OOP style programming to connect to database
$conn = new mysqli($databaseHost,$databaseUserName,$databasePassword,$databaseName); 

if($conn->connect_error){
	die('Connection Failed - ' . $mysqli->connect_error);
}
//Above connection can be made in procedural way as well.
?>