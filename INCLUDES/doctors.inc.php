<?php
session_start();
if(isset($_POST['submit'])){

    require_once('dbh.inc.php');
  $fisrtname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $speciality = $_POST['speciality'];
  $contact = $_POST['contact'];
  $email= $_POST['email'];
  $password = $_POST['password'];
  $confirm_password = $_POST['confirm-password'];


  
  $passwordPattern = "/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";


  if (!preg_match($passwordPattern,$password)) {
      $_SESSION['message'] = "Password must be at least 8 characters long, include an uppercase letter, lowercase letter, a number, and a special character!";
      header("Location:  ../VIEWS/doctors.php");
      die();
  }

    
  if($password !==  $confirm_password){

    $_SESSION['message'] = "Passwords do not match!";
    header("Location:  ../VIEWS/doctors.php");

    die();


 }

 $query = $conn->prepare( "SELECT * FROM  doctors WHERE  email = ?");
  $query->bind_param('s',$email);

  $query->execute();

  $result=$query->get_result();

  if($result->num_rows>0){

     $_SESSION['message'] = "User ulready exists!";
     header("Location:  ../VIEWS/doctors.php");
      die();
  }

  $hash = password_hash($password,PASSWORD_DEFAULT);

  $stmt = $conn->prepare("INSERT INTO doctors(firstname,lastname,specialty,contact,email,password) VALUES(?,?,?,?,?,?)");

  $stmt->bind_param('ssssss',$fisrtname,$lastname,$speciality,$contact,$email,$hash);

  if($stmt->execute()){

    $_SESSION['success']="Account created successfully.";
    header("Location:  ../VIEWS/doctors.php");
    die();
  }



}