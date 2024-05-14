<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
    <link rel="stylesheet" href="home1.css">
    <style>
        #done {
            height: 40px;
            width: 100px;
            position: fixed;
            bottom: 40px;
            left: 1400px;
            border-radius: 10px;
            font-size: 20px;
            font-weight: bold;
            background-color: red;
        }

        #done:hover {
            background-color: rgb(241, 120, 120);
        }
    </style>
</head>
<body>
<div class="navbar">
    <h1>Online Quiz Management System</h1>
    <div class="fac">
        <p id="faculty">Faculty</p>
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
$server = "localhost";
$username = "root";
$password = "";
$db_name = "quizes";
$count = 0;

$con = new mysqli($server, $username, $password, $db_name);

if (!$con) {
    die("connection failed: " . $con->connect_error);
}
$tb_name = $_GET['id'];
$query = "SELECT * FROM $tb_name";
$data = mysqli_query($con, $query);
$total = mysqli_num_rows($data);
$_SESSION['tb_name1'] = $tb_name;

if ($total != 0) {
    while ($result = mysqli_fetch_assoc($data)) {
        echo "
        <form action='home2.php' method='post' class='container' style='height:600px;'>
            <div id='question' name='question'>" . $result['id'] . ".  " . $result['question'] . "</div>
            <div id='option1'><input type='radio' id='radio1' name='checkbox[]' value='Option 1'><label for='radio1' id='label1'>" . $result['op1'] . "</label></div>
            <div id='option1'><input type='radio' id='radio2' name='checkbox[]' value='Option 2'><label for='radio2' id='label1'>" . $result['op2'] . "</label></div>
            <div id='option1'><input type='radio' id='radio3' name='checkbox[]' value='Option 3'><label for='radio3' id='label1'>" . $result['op3'] . "</label></div>
            <div id='option1'><input type='radio' id='radio4' name='checkbox[]' value='Option 4'><label for='radio4' id='label1'>" . $result['op4'] . "</label></div>
            <div style='display:flex; flex-direction:row;'>
                <button type='submit' id='update' style='height:40px; padding-top:5px;margin-left:10px;margin-top:10px;'>Save</button>
                <div id='score' style='width:100px;'>Score: " . $result['score'] . "</div>
            </div>
        </form>";
        $_SESSION['id_table'] = $result['id'];
    }
}

$con->close();
?>
<!-- Submit button should be placed inside the form -->
<button type="submit" id="done">Submit</button>

</body>
</html>
