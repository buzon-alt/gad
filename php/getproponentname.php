<?php

require '../controllers/db/connection.php';

$id = $_POST['id'];

$proponent = mysqli_query($con,"SELECT name FROM users where id = $id");
 
while ($value = mysqli_fetch_array($proponent)) {
    print_r($value['name']);
}




?>