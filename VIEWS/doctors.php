<?php

session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctors registration</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../CSS/docters.css">
</head>
<body>
    <section>

    <div class="banner">
      Amani Hospital
      <br>
      <strong>We save Lives</strong>
    </div>
    <?php
    
    if(isset($_SESSION['message'])){

       echo '<p>' .$_SESSION['message'].'</p>';
       unset($_SESSION['message']);
    }
    if(isset($_SESSION['success'])){

       echo '<p  class="success">' .$_SESSION['success'].'</p>';
       unset($_SESSION['success']);
    }
 
 ?>
  
      <form action="../INCLUDES/doctors.inc.php"  method="POST">
         
        <h2>Doctors Registration</h2>
          <div class="container">
          <div class="inputbox">
        <input type="text"  name="firstname" placeholder="firstname" required>
        </div>

        <div class="inputbox">
          <input type="text"  name="lastname"  placeholder="lastname" required>
        </div>
        <div class="inputbox">
        <input type="text"  name="speciality" placeholder="speciality" required>
        </div>
        <div class="inputbox">
        <input type="number"  name="contact"  placeholder="contact" required>
        </div>
          </div>
        



          <div class="container">
          <div class="inputbox">
        <input type="email"  name="email"  placeholder="email" required >
        </div>
          <div class="inputbox">
            <img  id="eye-one" src="../IMG/eyebrow.png" >
        <input type="password" name="password"  placeholder="password" autocomplete="new password" id="password" required>
        </div>
        
        <div class="inputbox">
        <img  id="eye-two" src="../IMG/eyebrow.png" >
            <input type="password"  name="confirm-password"  placeholder="confirm password" autocomplete="new password" id="confirm-password" required>
        </div>
          </div>
             <input type="submit" name="submit" value="Register">
             <a href="login.php"><i class="fa-solid fa-arrow-left"></i>login</a>
      </form>
    </section>
</body>
<script src="../SCRIPTS/index.js"></script>
</html>