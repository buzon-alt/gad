<?php
    require '../controllers/db/connection.php';
    if(!isset($_SESSION))
    {
      session_start(); 
    }
    $proponents_name = $_POST['proponents_name'];
    $department = $_POST['department'];
    $contact = $_POST['contact'];
    $email_address = $_POST['email_address'];
    $username = $_POST['username'];
    $usertype = $_POST['usertype'];


    $password = md5("12345");

    mysqli_query($con,"INSERT INTO users (name,contact,office,username,email,password,usertype) values ('$proponents_name','$contact','$department','$username','$email_address','$password','$usertype')");
    $_SESSION['message'] = "New proponent successfully added!";
    echo json_encode([
        "message" => "New proponent successfully added!",
        "status_code" => 201, 
      ]);

?>