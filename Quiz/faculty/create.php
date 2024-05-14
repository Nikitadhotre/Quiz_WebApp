<?php
// Database connection parameters
session_start();
error_reporting(0);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quizes";
$tb_name=$_POST['text1'];
$_SESSION['text1'] = $_POST['text1'];
$_SESSION['text2'] = $_POST['text2'];
$_SESSION['text4'] = $_POST['text4'];
$_SESSION['text5'] = $_POST['text5'];
$_SESSION['text6'] = $_POST['text6'];

try {
    // Create connection
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // SQL query to create the table
    $sql = "CREATE TABLE $tb_name (
        title VARCHAR(1000) NOT NULL,
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        question VARCHAR(2000) NOT NULL,
        ans VARCHAR(1000) NOT NULL,
        op1 VARCHAR(1000) NOT NULL,
        op2 VARCHAR(1000) NOT NULL,
        op3 VARCHAR(1000) NOT NULL,
        op4 VARCHAR(1000) NOT NULL,
        ans_type VARCHAR(255) NOT NULL,
        score INT(6) UNSIGNED,
        duration INt(6) UNSIGNED,
        time TIME,
        date DATE 
    )";

    // Use exec() because no results are returned
    
    $conn->exec($sql);
    
    header("Location:submit.html");
} catch(PDOException $e) {
    echo "Error creating table: " . $e->getMessage();
}

// Close connection
$conn = null;
?>

</body>
</html>