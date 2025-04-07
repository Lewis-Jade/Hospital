<?php

session_start();

if(isset($_POST['submit'])){
    require_once('dbh.inc.php');
$email = $_POST['email'];
$password = $_POST['password'];


$stmt = $conn->prepare("SELECT * FROM doctors WHERE email = ?");
$stmt->bind_param('s',$email);

$stmt->execute();

$result = $stmt->get_result();

if($result->num_rows>0){

    $row = $result->fetch_assoc();


    if(password_verify($password,$row['password'])){
       $_SESSION['username'] = $row['firstname'];
       $_SESSION['userid'] = $row['doctors_id'];
        header("Location: ../VIEWS/dashboard.php");
        die();
    }else{
        $_SESSION['error'] = "Incorrect email or password!";
        header("Location: ../VIEWS/login.php");
        die();
    }
}else{
    $_SESSION['error'] = "User not found!";
    header("Location: ../VIEWS/login.php");
    die();
}


}