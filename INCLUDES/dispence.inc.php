<?php
session_start();
if (isset($_POST['dispense'])) {
    require_once('dbh.inc.php');
    $med_name = $_POST['med_name'];
    $quantity = $_POST['quantity_dispensed'];
    $patient = $_POST['patient_name'];

    
    $result = $conn->query("SELECT unit_price, quantity FROM inventory WHERE med_name='$med_name'");
    $med = $result->fetch_assoc();
    $unit_price = $med['unit_price'];
    $available_qty = $med['quantity'];

    if ($available_qty >= $quantity) {
        $total_price = $unit_price * $quantity;

 
        $stmt = $conn->prepare("INSERT INTO dispensed (patient_name, med_name, quantity_dispensed, total_price) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssid", $patient, $med_name, $quantity, $total_price);
        $stmt->execute();

    
        $conn->query("UPDATE inventory SET quantity = quantity - $quantity WHERE med_name = '$med_name'");

        echo "<p style='color:green;'></p>";
        $_SESSION['message'] = "💊 Dispensed successfully to $patient";
        header('Location: ../VIEWS/dispence.php');
        die();
    } else {
        $_SESSION['message'] = "⚠️ Not enough stock (Available: $available_qty)";
        header('Location: ../VIEWS/dispence.php');
        die();
    }
}
?>