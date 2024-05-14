<?php
session_start();
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registration";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$user_type = $_POST['user_type'];
$_SESSION['user_type'] = $user_type;
// Query to check if email and password exist in the database
$sql = "SELECT * FROM $user_type WHERE email='$email' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Redirect based on user type
    if ($user_type == "student") {
        header("Location: student/home.php");
    } else {
        header("Location: faculty/home.php");
    }
} else {
    echo '<script>alert("Invalid email or password");';
    echo 'window.location.href = "login.php";</script>';
}

$conn->close();
?>
