<?php
session_start();

require_once('../INCLUDES/dbh.inc.php');

if(isset($_GET['patientid'])){

    $patientid = $_GET['patientid'];



    $sql = "SELECT * FROM patients WHERE patientid = '$patientid'";

    $result = $conn->query($sql);


    if($result->num_rows == 1){
        $row = $result->fetch_assoc();
    }else{
        $_SESSION['delete'] = "user not found";
        header("Location: dashboard.php");
        die();


    }
    
}


if(isset($_POST['submit'])){

    if (isset($_POST['submit'])) {
        $patientid = $_POST['patientid']; 
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $contact = $_POST['contact'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
    
        $update = "UPDATE patients 
                   SET firstname='$firstname',
                       lastname='$lastname',
                       contact='$contact',
                       email='$email',
                       gender='$gender'
                   WHERE patientid='$patientid'";
        
        $update_result = $conn->query($update);
        
        if ($update_result === TRUE) {
            $_SESSION['edit'] = "Update was successful.";
            header("Location: dashboard.php");
            die();
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }
}
       

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit record</title>
     <link rel="stylesheet" href="../CSS/admitpatient.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<a href="dashboard.php"><i class="fa-solid fa-arrow-left"></i></a>
    <form method="POST"  action="edit.php" >
        <h2>Edit Patient Details</h2>
        <input type="hidden" name="patientid" value="<?php echo $row['patientid'] ?>">
      <input type="text" name="firstname" value="<?php echo htmlspecialchars($row['firstname']);?>" required>
      <input type="text" name="lastname" value="<?php echo htmlspecialchars($row['lastname']);?>" required>
      <input type="text" name="contact" value="<?php echo htmlspecialchars($row['contact']);?>" required>
      <input type="text" name="email" value="<?php echo htmlspecialchars($row['email']);?>" required>
      <label for="">Male</label>

      <?php
        $gender = isset($row['gender']) ? $row['gender'] : '';
      ?>
      <div class="gender">
      <label for="">Male</label>
      <input type="radio" name="gender"  value="Male"<?php if($gender === 'Male' ) echo 'checked';?>>
      <label for="">Female</label>
      <input type="radio" name="gender" value="Female"<?php if($gender === 'Female' ) echo 'checked';?>>
    </div>
    <input type="submit"  name="submit" value="Update">
    </form>
</body>
</html>


