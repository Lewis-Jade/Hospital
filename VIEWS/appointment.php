<?php
session_start();

require_once('../INCLUDES/dbh.inc.php');


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book appointment</title>
    <link rel="stylesheet" href="../CSS/appointment.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<a href="dashboard.php"><i class="fa-solid fa-arrow-left"></i></a>
<?php

if(isset($_SESSION['success'])){

  echo '<p>'.$_SESSION['success'].'</p>';
  unset($_SESSION['success']);
}


?>
    <form action="../INCLUDES/appointment.inc.php"  method="POST">
  
    <h2>Book Appointment</h2>
    
 

<select name="patient_id" required>
    <option value="">-- Select Patient --</option>
    <?php
    $patients = $conn->query("SELECT patientid, firstname, lastname FROM patients");
    while ($p = $patients->fetch_assoc()) {
        $fullName = $p['firstname'] . " " . $p['lastname'];
        echo "<option value='{$p['patientid']}'>{$fullName}</option>";
    }
    ?>
</select>

     <label for="">Appointment Date</label>
       <input type="date"  name="date" required>
       <input type="submit"  name="submit" value="Book Appointment">
    </form>
    
</body>
</html>