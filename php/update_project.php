<?php
 
  require '../controllers/db/connection.php';
  if(!isset($_SESSION))
  {
    session_start(); 
  }
  $project_title = $_POST['project_title'];
  $project_cost = $_POST['project_cost'];
  $department = $_POST['department'];
  $project_leader = $_POST['project_leader'];
  $date_submitted = $_POST['date_submitted'];
  $project_duration = $_POST['project_duration'];
  $project_location = $_POST['project_location'];
  $project_type = $_POST['project_type'];
 
  $description = $_POST['descriptions'];

  
  $project_id = $_POST['project_id'];

mysqli_query($con,"UPDATE projects SET project_title = '$project_title',project_cost = '$project_cost',department = '$department',project_leader = '$project_leader',date_submitted = '$date_submitted',project_duration = '$project_duration',project_location = '$project_location',descriptions = '$description',project_type = '$project_type'  WHERE id = $project_id");

 
$members = json_decode($_POST['members']);

mysqli_query($con,"DELETE FROM proponents WHERE project_id = $project_id");

foreach ($members as $value) { 
  if ($value->id != "") {
      mysqli_query($con,"INSERT INTO proponents
      (users_id,project_id) VALUES ('$value->id','$project_id')"); 
      }
}

$_SESSION['message'] = "Project successfully updated!";
echo json_encode([
  "message" => "Project successfully updated!".$project_id,
  "status_code" => 201, 
]);


?>