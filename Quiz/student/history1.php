<html>
<head>
<link rel="stylesheet" href="history1.css">
</head>
<body >
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
$server="localhost";
$username="root";
$password="";
$db_name="quizes";

$con=new mysqli($server,$username,$password,$db_name);

if(!$con){
    die("connection failed: ".$con->connect_error);
}
$tb_name=$_GET['id'];
$query = "SELECT * FROM $tb_name";
$data = mysqli_query($con,$query);
$total = mysqli_num_rows($data);


if($total != 0){
   // $result= mysqli_fetch_assoc($data);
    while($result=mysqli_fetch_assoc($data)){
        echo "
        <div class='container' style='height:600px;'>
    <div id='question'>".$result['id'].".  ".$result['question']."</div>
    <div id='option1'><input type='radio' id='radio1' name='option'></radio><label for='radio1' id='label1'>".$result['op1']."</label></div>
    <div id='option1'><input type='radio' id='radio2' name='option'></radio><label for='radio2' id='label1'>".$result['op2']."</label></div>
    <div id='option1'><input type='radio' id='radio3' name='option'></radio><label for='radio3' id='label1'>".$result['op3']."</label></div>
    <div id='option1'><input type='radio' id='radio4' name='option'></radio><label for='radio4' id='label1'>".$result['op4']."</label></div>
    <div style='display:flex; flex-direction:row;'> <div id='answer' style=' font-weight:bold;margin-bottom:15px;margin-top:7px;padding-top:5px;font-size:22px;padding-left:5px;padding-right:5px;width:wrap-content;background-color:white;height:wrap-content;border: 2px solid black;border-radius: 20px;margin-left: 10px;'>Answer: ".$result['ans']."</div>
    <div id='score' style='width:100px;'>Score: ".$result['score']."</div></div>
</div>";
    }
}

echo "$total";

$con->close();

?>
</body>
</html>     
