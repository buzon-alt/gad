<?php
    require '../controllers/db/connection.php';
    if(!isset($_SESSION))
    {
      session_start(); 
    }
    $pid = $_POST['pid'];
    $proponents_name = $_POST['proponents_name'];
    $department = $_POST['department'];
    $contact = $_POST['contact'];
    $email_address = $_POST['email_address']; 
    $usertype = $_POST['usertype'];


    $password = md5("12345");

    mysqli_query($con,"UPDATE users SET name = '$proponents_name',contact = '$contact',office = '$department',email = '$email_address',usertype = '$usertype',password = '$password' where id = '$pid'");
    $_SESSION['message'] = "Update proponent successfully added!";
    echo json_encode([
        "message" => "Update proponent successfully save!",
        "status_code" => 201, 
      ]);

?>