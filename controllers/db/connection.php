<?php
date_default_timezone_set('Asia/Manila');
$DB_host = "localhost";
$DB_user = "root";
$DB_pass = "";
$DB_name = "dbgadproject";

$con = new MySQLi($DB_host,$DB_user,$DB_pass,$DB_name);

 if($con->connect_errno)
 {
		 die("ERROR : -> ".$con->connect_error);
 }

 $host1 = explode("/",$_SERVER['REQUEST_URI']);
 $main="http://".$_SERVER['HTTP_HOST']."/".$host1[1];



?>
