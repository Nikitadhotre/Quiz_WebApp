<?php
session_start();
$server = "localhost";
$username = "root";
$password = "";
$db_name = "submit";

$conn = mysqli_connect($server, $username, $password, $db_name);

if (!$conn) {
    die("Failed to connect: " . mysqli_connect_error());
}

// Check if all necessary POST data is set
if(isset($_POST['question'], $_POST['checkbox'])) {
    $question = $_POST['question'];
    $ans;
    $id = $_SESSION['id_table'];
    
    $selected_options = $_POST['checkbox'];
    foreach ($selected_options as $option) {
        if ($option == "Option 1") {
            $ans = $_POST['ans_one'];
        } elseif ($option == "Option 2") {
            $ans = $_POST['ans_two'];
        } elseif ($option == "Option 3") {
            $ans = $_POST['ans_three'];
        } elseif ($option == "Option 4") {
            $ans = $_POST['ans_four'];
        }
    }

    $tb_name = $_SESSION['tb_name1'];

    // Prepared statement to prevent SQL injection
    $sql = "SELECT * FROM $tb_name WHERE question = ? AND id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $question, $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($row['ans'] == $ans) {
            $_SESSION['count'] += $row['score'];
            echo $_SESSION['count'];
        }
    } else {
        echo "No matching question found.";
    }

    $stmt->close();
} else {
    echo "Not all necessary data received.";
}

$conn->close();
?>
