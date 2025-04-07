

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>OTP error</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');


*{
    margin: 0;
    padding: 0;
    font-family: "Poppins", sans-serif;
}
   body{
    display:flex;
    justify-content:center;
    align-items:center;
    background: #00000070;
    height:100vh;
   }
   div{
    height:250px;
    width: 350px;
    background:#fff;
    box-shadow: 4px 4px 5px #0000001e,
    -4px -4px 5px #0000001e;
    display:flex;
    justify-content:center;
    align-items:center;
    border-radius:10px;
    background:rgba(240, 236, 236, 0.91);

}
p{
    color:#ff0000;
    font-size:16px;
}
a{
    position: absolute;
     left:10px;
     top:10px;
     height:70px;
     width:70px;
     background:#fff;
     color:#0000ff;
     display:flex;
    justify-content:center;
    align-items:center;
    text-decoration:none;
    font-size:20px;
    border-radius:50%;
    
    box-shadow: 4px 4px 5px #0000001e,
    -4px -4px 5px #0000001e;
    
    }

    </style>
</head>
<body>
    <a href="login.php"><i class="fa-solid fa-arrow-left"></i></a>
      <div>


      <?php
      session_start();
      
        if(isset( $_SESSION['message'])){

            echo '<p>'. $_SESSION['message'].'</p>';
            unset( $_SESSION['message']);

        }
      
      ?>
      
      </div>
</body>
</html>