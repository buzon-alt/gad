<?php
    require '../controllers/db/connection.php';
    if(!isset($_SESSION))
    {
      session_start(); 
    }


    $oldpassword = md5($_POST['oldpassword']);
    $newpassword = md5($_POST['newpassword']); 
 

    if ($oldpassword != $_SESSION['currentpass']) {
      echo json_encode([
        "message" => "Old Password not match!",
        "status_code" => 403, 
      ]);

    }else {
      $userid = $_SESSION['user_id'];
      mysqli_query($con,"UPDATE users set password = '$newpassword' where id = '$userid'");
      
      $_SESSION['currentpass'] = $newpassword;

    echo json_encode([
        "message" => "Password successfully change!",
        "status_code" => 201, 
      ]);

    }

   
?>