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
  $descriptions = $_POST['descriptions'];

mysqli_query($con,"INSERT INTO projects (project_title,project_cost,department,project_leader,date_submitted,project_duration,project_location,project_type,descriptions) values ('$project_title','$project_cost','$department','$project_leader','$date_submitted','$project_duration','$project_location','$project_type','$descriptions')");

$getlastproject = mysqli_query($con,"SELECT id FROM projects ORDER BY id DESC LIMIT 1");
$projectvalue = mysqli_fetch_array($getlastproject);
$project_id = $projectvalue['id'];
$members = json_decode($_POST['members']);

foreach ($members as $value) { 
  if ($value->id != "") {
      mysqli_query($con,"INSERT INTO proponents
      (users_id,project_id) VALUES ('$value->id','$project_id')"); 
      }
}



$_SESSION['message'] = "Project successfully save!";
echo json_encode([
  "message" => "Project successfully save!",
  "status_code" => 201, 
]);


?>