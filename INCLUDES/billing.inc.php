<?php
 session_start();
if (isset($_POST['bill'])) {
    require_once('dbh.inc.php');
    $patient_name = $_POST['patient_name'];
    $service = $_POST['service'];
    $cost = $_POST['cost'];

    $stmt = $conn->prepare("INSERT INTO billing (patient_name, service, cost) VALUES (?, ?, ?)");
    $stmt->bind_param("ssd", $patient_name, $service, $cost);

    if ($stmt->execute()) {
      
        $_SESSION["message"] = "Bill created for" . $patient_name;
        header('Location:  ../VIEWS/billing.php');
        die();
    } else {
         $_SESSION["message"] = "An error occured!";;
         header('Location:  ../VIEWS/billing.php');
         die();
    }

    $stmt->close();
}