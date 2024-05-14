<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="profile.css">
	<style>
		#name,#email,#password{
			width:300px;
			height:30px;
			border: 2px solid black;
			border-radius: 10px;
			position: relative;
			top:-5px;
			left:80px;
			padding-left:10px;
			font-size:20px;
		}
	</style>
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
	<form class='profile1'action='profile-delete.php' method='post'>
		<div id='profile_pic'></div>
	   <button id='edit' type='submit'>Done</button>
	   <div id='info' style='display:flex;justify-content:space-evenly;width:550px;position:absolut;left:250px;'>
		<a>1. Name:  <input id='name' type='text' name='name' value=".$name."></a>
		<a>2. e-mail Id: <input id='email' type='email' name='email' value=".$email." style='position:relative;left:43px;'></a>
		<a>3. Password : <input id='password' type='password' name='password' value=".$password." style='position:relative;left:33px;'></a>
	   </div>
	</form>
</div>"
	?>
</body>
</html>