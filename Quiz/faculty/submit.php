    <?php
    session_start();
// Database connection parameters
error_reporting(0);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "instructions";

try {
    // Create connection
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // SQL query to create the table
    $sql = "CREATE TABLE hello12 (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        question VARCHAR(2000) NOT NULL,
        ans VARCHAR(1000) NOT NULL,
        ans_type VARCHAR(255) NOT NULL,
        score INT(6) UNSIGNED
    )";

    // Use exec() because no results are returned
    $conn->exec($sql);
    echo "Table quizzes created successfully";
} catch(PDOException $e) {
   // echo "Error creating table: " . $e->getMessage();
}
$tb_name=$_SESSION['text1'];
// Close connection
$conn = null;
?>
