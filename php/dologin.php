<?php
  require '../controllers/db/connection.php';

    $username = $_GET['username'];
    $password = md5($_GET['password']);

    $user = mysqli_query($con,"SELECT * FROM users where username = '$username' AND password = '$password'");
 
    if (mysqli_num_rows($user) <> 0) {
      // code...
      $info = mysqli_fetch_array($user);
      if(!isset($_SESSION))
      {
        session_start(); 
      }


      $_SESSION['id_session'] = md5(uniqid());
      $_SESSION['user_id'] = $info['id'];
      $_SESSION['username'] = $info['username'];
      $_SESSION['user'] = $info['name'];
      $_SESSION['usertype'] = $info['usertype'];
      $_SESSION['department'] = $info['office'];
      $_SESSION['currentpass'] = $password;
    
      echo 'success';
    }else {
      echo 'error';
    }
 ?>