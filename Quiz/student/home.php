<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="home.css">
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
        <a id="profile" href="profile.php">
            <div id="pro"></div>Profile</a>
        
    </div>
    <div class="content">
        <div id="up"><p style="color: black;" >Upcoming Quizes</p></div>
        <?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quizes";


$conn=new mysqli($servername,$username,$password,$dbname);

if(!$conn){
    die("connection failed. ".mysqli_connect_error());
}



$sql = "SHOW TABLES";
//$sql1 = "select * from sanskrit LIMIT 1";
$result = $conn->query($sql);
//$data = mysqli_query($conn,$query);
//$total = mysqli_num_rows($data);


if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        $tb_name=$row['Tables_in_'.$dbname];
        $sql1 = "SELECT * FROM $tb_name LIMIT 1";
        $result1=$conn->query($sql1);
        if(!$result1){
            die("");
        }
        $row1 = $result1->fetch_assoc();
        echo "
            <div class='quizes' style=' border:2px solid black; position: relative;top: 110px;margin-bottom: 20px;display:flex; flex-direction:row;height:120px;'>
               <a href='home1.php?id=" . $tb_name . "' style='color:black;text-decoration:none;padding-left:15px;''> Title: ".$row1['title']."<br>  Time: ".$row1['time']."<br>  Date: ".$row1['date']."  </a> 
               
            </div>
        </div>";
    }
}

?>
    </div>
</body>
</html>