<?php
   require '../controllers/db/connection.php';
 
$e_id = $_POST['e_id'];
$project_id = $_POST['project_id'];
$project_type = $_POST['project_type'];
$status = $_POST['status'];
$f_1 = $_POST['f_1'];
$f_1_desc = $_POST['f_1_desc'];
$f_1_1 = $_POST['f_1_1'];
$f_1_1_4 = $_POST['f_1_1_4'];
$f_1_1_desc = $_POST['f_1_1_desc'];
$f_1_2 = $_POST['f_1_2'];
$f_1_2_4 = $_POST['f_1_2_4'];
$f_1_2_desc = $_POST['f_1_2_desc'];
$f_2 = $_POST['f_2'];
$f_2_desc = $_POST['f_2_desc'];
$f_2_1 = $_POST['f_2_1'];
$f_2_1_4 = $_POST['f_2_1_4'];
$f_2_1_desc = $_POST['f_2_1_desc'];
$f_2_2 = $_POST['f_2_2'];
$f_2_2_4 = $_POST['f_2_2_4'];
$f_2_2_desc = $_POST['f_2_2_desc'];
$f_2_3 = $_POST['f_2_3'];
$f_2_3_4 = $_POST['f_2_3_4'];
$f_2_3_desc = $_POST['f_2_3_desc'];
$f_3 = $_POST['f_3'];
$f_3_desc = $_POST['f_3_desc'];
$f_3_1 = $_POST['f_3_1'];
$f_3_1_4 = $_POST['f_3_1_4'];
$f_3_1_desc = $_POST['f_3_1_desc'];
$f_3_2 = $_POST['f_3_2'];
$f_3_2_4 = $_POST['f_3_2_4'];
$f_3_2_desc = $_POST['f_3_2_desc'];
$f_4 = $_POST['f_4'];
$f_4_desc = $_POST['f_4_desc'];
$f_4_1 = $_POST['f_4_1'];
$f_4_1_4 = $_POST['f_4_1_4'];
$f_4_1_desc = $_POST['f_4_1_desc'];
$f_4_2 = $_POST['f_4_2'];
$f_4_2_4 = $_POST['f_4_2_4'];
$f_4_2_desc = $_POST['f_4_2_desc'];
$f_4_3 = $_POST['f_4_3'];
$f_4_3_4 = $_POST['f_4_3_4'];
$f_4_3_desc = $_POST['f_4_3_desc'];
$f_4_4 = $_POST['f_4_4'];
$f_4_4_4 = $_POST['f_4_4_4'];
$f_4_4_desc = $_POST['f_4_4_desc'];
$total_score16 = $_POST['total_score16'];
$ff_1 = $_POST['ff_1'];
$ff_1_desc = $_POST['ff_1_desc'];
$ff_1_1 = $_POST['ff_1_1'];
$ff_1_1_4 = $_POST['ff_1_1_4'];
$ff_1_1_desc = $_POST['ff_1_1_desc'];
$ff_1_2 = $_POST['ff_1_2'];
$ff_1_2_4 = $_POST['ff_1_2_4'];
$ff_1_2_desc = $_POST['ff_1_2_desc'];
$ff_2 = $_POST['ff_2'];
$ff_2_desc = $_POST['ff_2_desc'];
$ff_2_1 = $_POST['ff_2_1'];
$ff_2_1_4 = $_POST['ff_2_1_4'];
$ff_2_1_desc = $_POST['ff_2_1_desc'];
$ff_2_2 = $_POST['ff_2_2'];
$ff_2_2_4 = $_POST['ff_2_2_4'];
$ff_2_2_desc = $_POST['ff_2_2_desc'];
$ff_2_3 = $_POST['ff_2_3'];
$ff_2_3_4 = $_POST['ff_2_3_4'];
$ff_2_3_desc = $_POST['ff_2_3_desc'];
$ff_2_4 = $_POST['ff_2_4'];
$ff_2_4_4 = $_POST['ff_2_4_4'];
$ff_2_4_desc = $_POST['ff_2_4_desc'];
$ff_3 = $_POST['ff_3'];
$ff_3_desc = $_POST['ff_3_desc'];
$ff_3_1 = $_POST['ff_3_1'];
$ff_3_1_4 = $_POST['ff_3_1_4'];
$ff_3_1_desc = $_POST['ff_3_1_desc'];
$ff_3_2 = $_POST['ff_3_2'];
$ff_3_2_4 = $_POST['ff_3_2_4'];
$ff_3_2_desc = $_POST['ff_3_2_desc'];
$ff_4 = $_POST['ff_4'];
$ff_4_4 = $_POST['ff_4_4'];
$ff_4_desc = $_POST['ff_4_desc'];
$ff_5 = $_POST['ff_5'];
$ff_5_desc = $_POST['ff_5_desc'];
$ff_5_1 = $_POST['ff_5_1'];
$ff_5_1_4 = $_POST['ff_5_1_4'];
$ff_5_1_desc = $_POST['ff_5_1_desc'];
$ff_5_2 = $_POST['ff_5_2'];
$ff_5_2_4 = $_POST['ff_5_2_4'];
$ff_5_2_desc = $_POST['ff_5_2_desc'];
$total_score17 = $_POST['total_score17'];
$alltotal_score = $_POST['alltotal_score'];
$interpretation = $_POST['interpretation'];


mysqli_query($con,"UPDATE evaluation2 
	SET
	f_1 = '$f_1' , 
	f_1_desc = '$f_1_desc' , 
	f_1_1 = '$f_1_1' , 
	f_1_1_4 = '$f_1_1_4' , 
	f_1_1_desc = '$f_1_1_desc' , 
	f_1_2 = '$f_1_2' , 
	f_1_2_4 = '$f_1_2_4' , 
	f_1_2_desc = '$f_1_2_desc' , 
	f_2 = '$f_2' , 
	f_2_desc = '$f_2_desc' , 
	f_2_1 = '$f_2_1' , 
	f_2_1_4 = '$f_2_1_4' , 
	f_2_1_desc = '$f_2_1_desc' , 
	f_2_2 = '$f_2_2' , 
	f_2_2_4 = '$f_2_2_4' , 
	f_2_2_desc = '$f_2_2_desc' , 
	f_2_3 = '$f_2_3' , 
	f_2_3_4 = '$f_2_3_4' , 
	f_2_3_desc = '$f_2_3_desc' , 
	f_3 = '$f_3' , 
	f_3_desc = '$f_3_desc' , 
	f_3_1 = '$f_3_1' , 
	f_3_1_4 = '$f_3_1_4' , 
	f_3_1_desc = '$f_3_1_desc' , 
	f_3_2 = '$f_3_2' , 
	f_3_2_4 = '$f_3_2_4' , 
	f_3_2_desc = '$f_3_2_desc' , 
	f_4 = '$f_4' , 
	f_4_desc = '$f_4_desc' , 
	f_4_1 = '$f_4_1' , 
	f_4_1_4 = '$f_4_1_4' , 
	f_4_1_desc = '$f_4_1_desc' , 
	f_4_2 = '$f_4_2' , 
	f_4_2_4 = '$f_4_2_4' , 
	f_4_2_desc = '$f_4_2_desc' , 
	f_4_3 = '$f_4_3' , 
	f_4_3_4 = '$f_4_3_4' , 
	f_4_3_desc = '$f_4_3_desc' , 
	f_4_4 = '$f_4_4' , 
	f_4_4_4 = '$f_4_4_4' , 
	f_4_4_desc = '$f_4_4_desc' , 
	total_score16 = 'total_score16' , 
	ff_1 = '$ff_1' , 
	ff_1_desc = '$ff_1_desc' , 
	ff_1_1 = '$ff_1_1' , 
	ff_1_1_4 = '$ff_1_1_4' , 
	ff_1_1_desc = '$ff_1_1_desc' , 
	ff_1_2 = '$ff_1_2' , 
	ff_1_2_4 = '$ff_1_2_4' , 
	ff_1_2_desc = '$ff_1_2_desc' , 
	ff_2 = '$ff_2' , 
	ff_2_desc = '$ff_2_desc' , 
	ff_2_1 = '$ff_2_1' , 
	ff_2_1_4 = '$ff_2_1_4' , 
	ff_2_1_desc = '$ff_2_1_desc' , 
	ff_2_2 = '$ff_2_2' , 
	ff_2_2_4 = '$ff_2_2_4' , 
	ff_2_2_desc = '$ff_2_2_desc' , 
	ff_2_3 = '$ff_2_3' , 
	ff_2_3_4 = '$ff_2_3_4' , 
	ff_2_3_desc = '$ff_2_3_desc' , 
	ff_2_4 = '$ff_2_4' , 
	ff_2_4_4 = '$ff_2_4_4' , 
	ff_2_4_desc = '$ff_2_4_desc' , 
	ff_3 = '$ff_3' , 
	ff_3_desc = '$ff_3_desc' , 
	ff_3_1 = '$ff_3_1' , 
	ff_3_1_4 = '$ff_3_1_4' , 
	ff_3_1_desc = '$ff_3_1_desc' , 
	ff_3_2 = '$ff_3_2' , 
	ff_3_2_4 = '$ff_3_2_4' , 
	ff_3_2_desc = '$ff_3_2_desc' , 
	ff_4 = '$ff_4' , 
	ff_4_4 = '$ff_4_4' , 
	ff_4_desc = '$ff_4_desc' , 
	ff_5 = '$ff_5' , 
	ff_5_desc = '$ff_5_desc' , 
	ff_5_1 = '$ff_5_1' , 
	ff_5_1_4 = '$ff_5_1_4' , 
	ff_5_1_desc = '$ff_5_1_desc' , 
	ff_5_2 = '$ff_5_2' , 
	ff_5_2_4 = '$ff_5_2_4' , 
	ff_5_2_desc = '$ff_5_2_desc' , 
	total_score17 = '$total_score17' , 
	alltotal_score = '$alltotal_score' , 
	interpretation = '$interpretation' 
	WHERE
	id = '$e_id'");
	$flag = 0;
if ($status == "Complete") {
	$flag = 1;
}
mysqli_query($con,"UPDATE projects set status = '$status',flag ='$flag' where id = '$project_id'");
$budget = mysqli_query($con,"SELECT * FROM projects where id = '$project_id'");
$budget = mysqli_fetch_array($budget);

$attribution = ($budget['project_cost'] * $alltotal_score) / (20 * 1);

mysqli_query($con,"UPDATE evaluation SET score = '$alltotal_score', attribution = '$attribution', interpretation = '$interpretation' WHERE evaluation_id = '$e_id'"); 


echo json_encode([
    "message" => "Evaluation save!",
    "status_code" => 201, 
    "project_id" => $project_id, 
    "project_type" => $project_type, 
  ]);


 
?>