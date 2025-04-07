<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admit Patient</title>
    <link rel="stylesheet" href="../CSS/admitpatient.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<a href="dashboard.php"><i class="fa-solid fa-arrow-left"></i></a>
  <?php
    session_start();
     
    if(isset($_SESSION['success'])){
      echo '<p>'.$_SESSION['success'].'</p>';
      unset($_SESSION['success']);

    }
  
    
  
  ?>


<form action="../INCLUDES/admit.inc.php"   method="POST">
  <h2>Admit Patient</h2>
<input type="text"  name="firstname"  placeholder="firstname" required>
<input type="text"  name="lastname"  placeholder="lastname"  required>
<input type="number"  name="contact"  placeholder="contact"  required>
<input type="email"  name="email"  placeholder="email"  required>
<label for="">Gender</label>
<div class="gender">
   <label for="">Male</label>
   <input type="radio"  name="gender"  value="Male" required>
   <label for="">Female</label>
   <input type="radio"  name="gender" value="Female"  required>
</div>
  <input type="submit"  name="submit" value="Admit patient">
</form>

</body>
</html>