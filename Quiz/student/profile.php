<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="profile.css">
</head>
<body>
    <div class="navbar">
        <h1>Online Quiz Management System</h1>
        <div class="fac">
            <p id="faculty">Student</p>
            <button id="button"></button>
        </div>
    </div>
    <div class="navbar1">
        <div class="diems"></div>
        <a id="home" href="home.php">
            <div id="ho"></div>Home
        </a> 
        <a id="history" href="history.php">
            <div id="his"></div>History</a>
        <a id="profile" href="profile.html">
            <div id="pro"></div>Profile</a>
        
    </div>
    
	<?php
	session_start();
	$server="localhost";
	$username="root";
	$password = "";
	$db_name="registration";

	$conn= new mysqli($server,$username,$password,$db_name);

	if(!$conn){
		die("failed connerction ". $conn->connnect_error);
	}
	
	$name=$_SESSION['name'];
	$email=$_SESSION['email'];
	$password=$_SESSION['password'];

	echo "<div class='content'>
	<div id='up'>Profile</div>
	<div class='profile1'>
		<div id='profile_pic'></div>
	   <a  href='profile-edit.php'><button id='edit'>Edit</button></a>
	   <div id='info' style='display:flex;justify-content:space-evenly;width:550px;position:absolut;left:250px;'>
		<a>1. Name:  <label id='name'>".$name."</label></a>
		<a>2. e-mail Id: <label id='email'>".$email."</label></a>
		<a>3. Password : <label id='password'>".$password."</label></a>
	   </div>
	</div>
</div>"
	?>
</body>
</html>