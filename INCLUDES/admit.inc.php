<?php
session_start();


if(isset($_POST['submit'])){
    require_once('dbh.inc.php');
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$contact  = $_POST['contact'];
$email =$_POST['email'];
$gender =$_POST['gender'];
  

$query = "INSERT INTO patients(firstname,lastname,contact,email,gender)  VALUES('$firstname','$lastname','$contact','$email','$gender')";


$result = $conn->query($query);


if($result){
   $_SESSION['success'] = "patient admited succefully.";

   header("Location:  ../VIEWS/admitpatient.php");
   die();

}




    
}