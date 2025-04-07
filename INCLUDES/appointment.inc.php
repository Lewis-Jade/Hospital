<?php
session_start();

if(isset($_POST['submit'])){
  require_once('dbh.inc.php');

  $patient_id = $_POST['patient_id'];
  $date = $_POST['date'];
  $status = 'Pending';

  $stmt = $conn->prepare("INSERT INTO appointments (patient_id, appointment_date, status) VALUES (?, ?, ?)");
  $stmt->bind_param("iss", $patient_id, $date, $status);

  if($stmt->execute()){
    $_SESSION['success'] = "Appointment booked successfully.";
    header('Location: ../VIEWS/appointment.php');
    exit();
  } else {
    echo "Error: " . $stmt->error;
  }

  $stmt->close();
  $conn->close();
}
?>
