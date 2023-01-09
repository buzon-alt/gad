<?php
require '../controllers/db/connection.php';

$folderNumber = $_GET['folder'];


$checkfolder = MySQLi_Query($con,"DELETE FROM folderlist where FOLDERNUMBER ='$folderNumber'");
 header('location: ../pages/folder.php?return=1');

 ?>
