<?php
    require '../controllers/db/connection.php';
    if(!isset($_SESSION))
    {
      session_start(); 
    }
    $pid = $_POST['pid']; 


    $password = md5("12345");

    mysqli_query($con,"UPDATE users SET password = '$password' where id = '$pid'");
    $_SESSION['message'] = "Reset password successfully!";
    echo json_encode([
        "message" => "Reset password successfully!",
        "status_code" => 201, 
      ]);

?>