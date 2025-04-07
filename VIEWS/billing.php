
<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Billing</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../CSS/billing.css">
</head>
<body>

   <div class="main">
     <section>
     <a href="dashboard.php"><i class="fa-solid fa-arrow-left"></i></a>
      
   <?php
     if(isset($_SESSION['message'])){

      echo '<p>'.$_SESSION['message'].'</p>';
      unset($_SESSION['message']);
     }
   
   ?>

 <form   action="../INCLUDES/billing.inc.php"  method="post">
  <h3>Billing </h3>
  
  <input type="text" name="patient_name"  placeholder="Patient Name" required><br>

  
  <input type="text" name="service" placeholder="Service" required><br>


  <input type="number" name="cost" step="0.01" placeholder="Cost (Ksh)" required><br>

  <button type="submit" name="bill">Generate Bill</button>
</form>

     </section>
     <section  class="two">
     <h2>Billing History</h2>
   <div class="container"> 
   <?php
require_once('../INCLUDES/dbh.inc.php');
$result = $conn->query("SELECT * FROM billing ORDER BY billing_date DESC");


echo "<table border='1'>
<tr><th>Patient</th><th>Service</th><th>Cost</th><th>Date</th></tr>";

while ($row = $result->fetch_assoc()) {
  echo "<tr>
      <td>{$row['patient_name']}</td>
      <td>{$row['service']}</td>
      <td>Ksh {$row['cost']}</td>
      <td>{$row['billing_date']}</td>
  </tr>";
}

echo "</table>";
?>

     </section>
   </div>



</body>
</html>





 
 


   
     
