<!DOCTYPE html>
<html>
<head>
    <title>Update Employee</title>
    <link rel="stylesheet" href="hiii1.css">
</head>
<body>
<div class="navbar" style="position:fixed;z-index:1;">
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
        <a id="creat" href="create.html">
            <div id="cr" ></div>Create Quiz</a>
        <a id="update" href="update.php">
            <div id="upd" ></div>Update Quiz</a>
        <a id="history" href="history.php">
            <div id="his"></div>History</a>
        <a id="profile" href="profile.html">
            <div id="pro"></div>Profile</a>
        
    </div>

<div class='content'>
<div id='up' style=" position: relative;top: 90px;width:250px;margin-bottom:30px;margin-left:-25px;">Update Quize</div>

<?php
// Retrieve the employee ID from the URL
session_start();
$id = $_GET["id"];
$_SESSION['id'] = $id;
$tb = $_GET["id1"];
$db_name="quizes";
// Connect to your database
$conn = mysqli_connect("localhost", "root", "", "quizes");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$_SESSION['table_name']=$tb;
// Fetch employee details from the database
$sql = "SELECT id, question, op1, op2, op3, op4, score FROM  $tb WHERE id='$id'";
$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) {
    $row = mysqli_fetch_assoc($result);
?>
        <!-- <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
        <label>Name:</label>
        <input type="text" name="name" value="<?php echo $row["question"]; ?>"><br><br>
        <label>Email:</label>
        <input type="email" name="email" value="<?php echo $row["ans"]; ?>"><br><br>
        <input type="submit" value="Update"> -->
        <form class="quizes" style="height:470px;" method="post" action="hiii_process.php"  >
           <div id="quiz_one" ><input type="text" name="question" style="height:50px;width:90%;font-size:20px;border:2px solid black;border-radius:10px;padding-left:10px" value="<?php echo $row["question"]; ?>"> </div>
           <div id="image">Add Image: <button id="plus"></button></div>  
           <div id="ans1">1 <input type="text" name="ans_one" id="ans_one" value=" <?php  echo $row["op1"]; ?>"><input type="checkbox" name="checkbox[]" value="Option 1" id="check1"></div>
           <div id="ans2">2 <input type="text" name="ans_two" id="ans_two" value=" <?php  echo $row["op2"]; ?>"> <input type="checkbox" name="checkbox[]" value="Option 2" id="check2"></div>
           <div id="ans3">3 <input type="text" name="ans_three" id="ans_three" value=" <?php echo $row["op3"]; ?>"><input type="checkbox" name="checkbox[]" value="Option 3" id="check3"></div>
           <div id="ans4">4 <input type="text" name="ans_four" id="ans_four" value=" <?php  echo $row["op4"]; ?>"><input type="checkbox" name="checkbox[]" value="Option 4" id="check4"></div>
           <div id="score">Score <input name="score"  id="score_one" value="<?php  echo $row["score"]; ?>"></div>
           <button id="done" style="margin-left:0px;margin-bottom:10px;" >Update</button> 
    </form>
<?php
} else {
   echo "$id";
   echo "$tb";
    
}

// Close connection
mysqli_close($conn);
?>
</div>
</body>
</html>
