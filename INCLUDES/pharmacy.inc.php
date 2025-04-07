<?php

session_start();
if (isset($_POST['add_med'])) {
    require_once('dbh.inc.php');
    $stmt = $conn->prepare("INSERT INTO inventory (med_name, med_type, quantity, unit_price, expiry_date) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssids", $_POST['med_name'], $_POST['med_type'], $_POST['quantity'], $_POST['unit_price'], $_POST['expiry_date']);
    $stmt->execute();
     $_SESSION['message'] = "✔️ Medicine added to inventory!";
     header("Location:   ../VIEWS/pharmacy.php");
     die();
      
}
