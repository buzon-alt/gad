<?php
require '../controllers/db/connection.php';

$file_id = $_POST['file_id']; 
mysqli_query($con,"DELETE FROM attachment where id= $file_id");
 
?>