<?php
require '../controllers/db/connection.php';

$project_id = $_POST['project_id'];
 
if(isset($_FILES["files"]["type"]))
{ 
  $temporary = explode(".", $_FILES["files"]["name"]);
  $file_extension = end($temporary);
 
        $filename = round(microtime(true)) . '.' . end($temporary);;
        $sourcePath = $_FILES['files']['tmp_name']; // Storing source path of the file in a variable
        $targetPath = '../files/'.$filename; // Target path where file is to be stored
        // move_uploaded_file($sourcePath,$targetPath); 
          if (move_uploaded_file($sourcePath,$targetPath)) {
            $submit =  mysqli_query($con,"INSERT INTO attachment (project_id,filename) values ($project_id,'$filename')");

            $lastid = mysqli_insert_id($con); 
            $data = array("message" => 'Cash Advance submitted successfully', "status_code" => '200',"file_id"=>$lastid,"filename" => $filename);
 
          } // Moving Uploaded file
          else{
            $data = array("message" => 'Cash Advance submitted successfully', "status_code" => '403');

          }  
}


echo json_encode($data);
?>