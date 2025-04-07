<?php

session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../CSS/login.css">
</head>
<body>
    <section>
    <i class="fa-solid fa-circle-info" id="info"></i>
     <h1>Welcome to Amani Hospital</h1>
     <form action="../INCLUDES/login.inc.php"   method="POST">
      <?php
           if(isset(   $_SESSION['success-message'])){
              
            echo  '<p  class="success">'. $_SESSION['success-message'].'</p>';
            unset($_SESSION['success-message']);
           }
      
      
      ?>
          <h2>Login</h2>
       <div class="inputBox">
        <input type="email"   name="email" placeholder="email" required>
       </div>
       <div class="inputBox">
       <img  id="eye-one" src="../IMG/eyebrow.png" >
       <input type="password" name="password"  placeholder="password" autocomplete="new password" id="password" required>
       </div>
 
       <input type="submit"  name="submit" value="Login">
     </form>
       <button id="btn">Forgot Password</button>
    
       
     <?php
     if(isset($_SESSION['error'])){

        echo '<p   class="error">'.$_SESSION['error'].'</p>';
        unset($_SESSION['error']);
     }
       
     ?>
     <div class="link">
        <p>Dont  have an Account yet?</p>
        <a href="doctors.php">Create Account</a>
     </div>
    </section>
    <section class="forgot" id="forgot">
         <form action="../INCLUDES/forgotpwd.inc.php"   method="POST">
            <span id="exit">❌</span>
         <h2>Forgot Password</h2>
         <div class="inputBox">
        <input type="email"   name="email" placeholder="email" required>
       </div>
       <input type="submit"  name="submit" value="Send OTP">
         </form>
    </section>
    <div class="info" id="win">
      <hr>
      <div class="infoBox">
      <span id="exit2">❌</span>
         <h2>Amani Hospital</h2>
           
    
            <p>    Amani Hospital is not just a healthcare facility, but a sanctuary that embraces nature and life. Founded by  <strong>Beldine Akoth</strong> alongside co-founders  <strong>Amana Lizlyn</strong> and <strong>Sherrine Kipng'etich</strong>, Amani Hospital aims to provide exceptional healthcare services, blending modern medical care with compassionate, holistic treatment. The hospital's mission is to improve the well-being of individuals by offering accessible, quality healthcare while promoting healing through a serene, natural environment. With a focus on patient-centered care, Amani Hospital prioritizes the physical, mental, and emotional health of its patients, ensuring a holistic approach to wellness.</p>
      </div>
    </div>
</body>

<script>
   const btnShow = document.getElementById('btn');
   const section = document.getElementById('forgot');
   const exitBtn = document.getElementById('exit');
   const exitbtn2 = document.getElementById('exit2');
   const show =   document.getElementById('info');
   const winshow =  document.getElementById('win');
btnShow.addEventListener('click', function(){

  section.classList.add('show');
   

});

exitBtn.onclick=function(){

   section.classList.remove('show');

}

show.onclick=function(){

   winshow.classList.add("showinfo")
}
exitbtn2.onclick=function(){
  
   winshow.classList.remove("showinfo")
}
</script>
<script src="../SCRIPTS/index.js"></script>


</html>