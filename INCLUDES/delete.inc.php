<?php


session_start();



if(isset($_POST['patientid'])){
require_once('dbh.inc.php');
$patientid = $_POST['patientid'];

$query = "DELETE  FROM patients where patientid = '$patientid'";

  if($conn->query($query) === TRUE){

   
    $_SESSION['delete'] = "Deleted successfully.";
    header("Location:  ../VIEWS/dashboard.php");
    die();
  }

}