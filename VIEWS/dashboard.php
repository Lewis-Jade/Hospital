<?php
 session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard</title>
    <link rel="stylesheet" href="../CSS/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>


<header>
<?php
 if(!isset($_SESSION['userid'])){
  header("Location: login.php");
  exit();
 }
if(isset($_SESSION['username'])){
  echo '<p>  Welcome '. $_SESSION['username'].'</p>';
}

?>

<ul>
  <li><a href="admitpatient.php">Admit Patient</a></li>
  <li><a href="appointment.php">Book Appointment</a></li>
  <li><a href="billing.php">Billing</a></li>
  <li><a href="pharmacy.php">Pharmacy </a></li>
  <li><a href="dispence.php">Dispence </a></li>
</ul>
  <form action="../INCLUDES/logout.php" class="logout">

  <button type="submit">Logout </button>
  </form>
</header>
<section>
 <div class="container">
  <?php
     if(isset( $_SESSION['delete'])){
        echo '<p   class="delete">'.   $_SESSION['delete'].'</p>';
        unset( $_SESSION['delete']);
      
      }
     if(isset( $_SESSION['edit'])){
        echo '<p   class="delete edit">'.   $_SESSION['edit'].'</p>';
        unset( $_SESSION['edit']);
      
      }
  
  ?>
 
  <h2>Admited Patients</h2>
    
    <?php
    
     require_once('../INCLUDES/dbh.inc.php');

     $query = "SELECT * from patients";
     
     $result = $conn->query($query);

     echo  "<table>
     
            <tr>
                <th>ID</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Contact</th>
                <th>email</th>
                <th>Gender</th>
                <th>Time</th>
                <th  colspan='2' >Action</th>
       
            
            
            
            
            </tr>";
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                  echo "<tr>
                          <td>{$row['patientid']}</td>
                          <td>{$row['firstname']}</td>
                          <td>{$row['lastname']}</td>
                          <td>{$row['contact']}</td>
                          <td>{$row['email']}</td>
                          <td>{$row['gender']}</td>
                          <td>{$row['created_at']}</td>
                          <td id='action'>
          
                              <form action='../VIEWS/edit.php' method='GET'>
                                  <input type='hidden' name='patientid' value='{$row['patientid']}' />
                                  <button class='action edit' type='submit'><i class='fa-solid fa-file-pen'></i></button>
                              </form>
                              <br>
          
                              <form action='../INCLUDES/delete.inc.php' method='POST' onsubmit=\"return confirm('Are you sure that you want to delete?');\">
                                  <input type='hidden' name='patientid' value='{$row['patientid']}' />
                                  <button class='action delete' type='submit'><i class='fa-solid fa-trash'></i></button>
                              </form>
                          </td>
                      </tr>";
              }
          }
          


        echo "</table>";    
    
    
    ?>
 </div>
</section>
<section  class="appointments">

  <?php
  require_once('../INCLUDES/dbh.inc.php');
$query = "
    SELECT 
        a.appointment_id,
        a.appointment_date,
        a.status,
        CONCAT(p.firstname, ' ', p.lastname) AS full_name
    FROM appointments a
    JOIN patients p ON a.patient_id = p.patientid
";

$result = $conn->query($query);
?>

<div class="container">
  
<h2>Available Appointments</h2>
<table   cellpadding="5"">
    <tr>
        <th id="patient-apt">Appointment ID</th>
        <th id="patient-apt">Patient Name</th>
        <th id="patient-apt">Appointment Date</th>
        <th id="patient-apt">Status</th>
    </tr>
    <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['appointment_id']; ?></td>
            <td><?php echo htmlspecialchars($row['full_name']); ?></td>
            <td><?php echo $row['appointment_date']; ?></td>
            <td><?php echo $row['status']; ?></td>
        </tr>
    <?php endwhile; ?>
</table>
</div>
</section>
<section  class="treatment" id="pharmacy">
  <div class="container">
  <?php

$sql = "SELECT * FROM dispensed ORDER BY dispensed_date DESC";
$result = $conn->query($sql);
?>

<h2>Dispensed Medicines</h2>
<table cellpadding="10">
    <tr  >
        <th id="test">Dispense ID</th>
        <th id="test">Patient Name</th>
        <th id="test">Medicine Name</th>
        <th id="test">Quantity Dispensed</th>
        <th id="test">Total Price (Ksh)</th>
        <th id="test">Dispensed Date</th>
    </tr>

    <?php if ($result->num_rows > 0): ?>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['dispense_id']; ?></td>
                <td><?php echo htmlspecialchars($row['patient_name']); ?></td>
                <td><?php echo htmlspecialchars($row['med_name']); ?></td>
                <td><?php echo $row['quantity_dispensed']; ?></td>
                <td><?php echo number_format($row['total_price'], 2); ?></td>
                <td><?php echo $row['dispensed_date']; ?></td>
            </tr>
        <?php endwhile; ?>
    <?php else: ?>
        <tr>
            <td colspan="6">No medicines have been dispensed yet.</td>
        </tr>
    <?php endif; ?>
</table>
  </div>


</section>



    

 
</body>
</html>