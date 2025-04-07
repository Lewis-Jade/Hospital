<?php
session_start();
require_once('../INCLUDES/dbh.inc.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dispencer</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
          @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');


                    *{
                        margin: 0;
                        padding: 0;
                        font-family: "Poppins", sans-serif;
                    }
                    body{
                        justify-content:center;
                        align-items:center;
                        display:flex;
                        height:100vh;
                        flex-direction:column;
                    }
                    form{

                    height: 450px;
                    width: 500px;
                    padding:10px;
                    background: #fff;
                    top: 5px;
                    left:10px; 
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    flex-direction: column;
                    border-radius: 10px;
                    box-shadow: 4px 4px 5px #00000023,
                    -4px -4px 5px #00000023;

                    }
                    input{
                    width: 70%;
                    height: 50px;
                    margin-top: 4px;
                    border: 2px solid #057a05;
                    padding: 0 0 0 30px;
                    border-radius: 10px;
                    outline: none;

                    }
                    button{
                    width: 70%;
                    height: 44px;
                    border: none;
                    background: #057a05;
                    color: #fff;
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
                    p{
                    color: #057a05;
                    font-weight: 300;
                    }
                    h3{
                        color: #057a05;
                        font-weight: 500;
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
                        select{
                            width: 70%;
                            height: 50px;
                            margin-top: 4px;
                            border: 2px solid #057a05;
                            padding: 0 0 0 30px;
                            border-radius: 10px;
                            outline: none;
                        }

    </style>
</head>
<body>
<a href="dashboard.php"><i class="fa-solid fa-arrow-left"></i></a>
<?php

     
    if(isset($_SESSION['message'])){
      echo '<p>'.$_SESSION['message'].'</p>';
      unset($_SESSION['message']);

    }
  
    
  
  ?>


<form method="post"   action="../INCLUDES/dispence.inc.php">
    <h3>Dispense Medicine</h3>
    <input type="text" name="patient_name" placeholder="Patient Name" required><br>
    <select name="med_name" required>
        <option value="">-- Select Medicine --</option>
        <?php
        $meds = $conn->query("SELECT med_name FROM inventory WHERE quantity > 0");
        while ($row = $meds->fetch_assoc()) {
            echo "<option value='{$row['med_name']}'>{$row['med_name']}</option>";
        }
        ?>
    </select><br>
    <input type="number" name="quantity_dispensed" placeholder="Quantity" required><br>
    <button type="submit" name="dispense">Dispense</button>
</form>
</body>
</html>