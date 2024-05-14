<?php
session_start();
    $server="localhost";
	$username="root";
	$password="";
	$db_name="registration"; 
  
    // Connect to your database
    $conn = mysqli_connect($server, $username, $password, $db_name);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

	$name=$_POST['name'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$name1=$_SESSION['name'];
	$email1=$_SESSION['email'];
	$password1=$_SESSION['password'];
	$user=$_SESSION['user'];
    // Update employee details in the database
    $sql = "UPDATE $user SET name='$name', email='$email', password='$password' WHERE email='$email1' AND password='$password1'";

    if (mysqli_query($conn, $sql)) {
        echo "Employee updated successfully";
    } else {
        echo "Error updating employee: " . mysqli_error($conn);
    }

    // Close connection
    mysqli_close($conn);

?>
