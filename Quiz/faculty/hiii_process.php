<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
 
    // $name = $_POST["name"];
    // $email = $_POST["email"];
    //$title = $_POST['title'];
    $question = $_POST['question'];
    $op1 = $_POST['ans_one'];
    $op2 = $_POST['ans_two'];
    $op3 = $_POST['ans_three'];
    $op4 = $_POST['ans_four'];
    $score = $_POST['score'];
    $id = $_SESSION['id'];
    // Connect to your database
    $conn = mysqli_connect("localhost", "root", "", "quizes");

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $tb_name=$_SESSION['table_name'];
    // Update employee details in the database
    $sql = "UPDATE $tb_name SET question='$question', op1='$op1', op2='$op2', op3='$op3', op4='$op4', score='$score' WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        echo "Employee updated successfully";
    } else {
        echo "Error updating employee: " . mysqli_error($conn);
    }

    // Close connection
    mysqli_close($conn);
}
?>
