<?php
session_start();
$count=0;
$server ="localhost";
$username="root";
$password="";
$db_name="quizes";

$conn = new mysqli($server,$username,$password,$db_name);

if(!$conn){
    die("Connection failed".mysqli_connect_error());
}

$question=$_POST['question'];
$score=$_POST['score'];
$ans_type=$_POST['ans_type'];

$ans;
$op1;
$op2;
$op3;
$op4;
if(isset($_POST['checkbox'])) {
    $selected_options = $_POST['checkbox'];
    foreach($selected_options as $option) {
        if($option == "Option 1") {
            $ans=$_POST['ans_one'];
            $op1=$_POST['ans_one'];
            $op2=$_POST['ans_two'];
            $op3=$_POST['ans_three'];
            $op4=$_POST['ans_four'];
        } elseif($option == "Option 2") {
            $ans=$_POST['ans_two'];
            $op1=$_POST['ans_one'];
            $op2=$_POST['ans_two'];
            $op3=$_POST['ans_three'];
            $op4=$_POST['ans_four'];
        } elseif($option == "Option 3") {
            $ans=$_POST['ans_three'];
            $op1=$_POST['ans_one'];
            $op2=$_POST['ans_two'];
            $op3=$_POST['ans_three'];
            $op4=$_POST['ans_four'];
        } elseif($option == "Option 4") {
            $ans=$_POST['ans_four'];
            $op1=$_POST['ans_one'];
            $op2=$_POST['ans_two'];
            $op3=$_POST['ans_three'];
            $op4=$_POST['ans_four'];
        }
    }
} 
$tb_name=$_SESSION['text1'];
$duration=$_SESSION['text4'];
$date=$_SESSION['text5'];
$title=$_SESSION['text2'];
$time=$_SESSION['text6'];


$sql="INSERT INTO $tb_name (title,question, ans, op1, op2, op3, op4, ans_type, score, duration, time, date) VALUES ('$title','$question', '$ans', '$op1', '$op2', '$op3', '$op4', '$ans_type', '$score', '$duration','$time', '$date')";

$que_num=1;

if($conn->query($sql) == true){
   do{
    header("Location:question.html");
    $que_num=$que_num-1;
    $count=$count+1;
   }while($count<$que_num);

    }else{
    echo "ERROR: $sql <br> $conn->error";
}

$conn->close();

?>
