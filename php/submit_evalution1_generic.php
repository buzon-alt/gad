<?php
    require '../controllers/db/connection.php';
 

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
	$f_2_4 = $_POST['f_2_4']; 
	$f_2_desc = $_POST['f_2_desc']; 
	$f_3 = $_POST['f_3']; 
	$f_3_desc = $_POST['f_3_desc']; 
	$f_3_1 = $_POST['f_3_1']; 
	$f_3_1_4 = $_POST['f_3_1_4']; 
	$f_3_1_desc = $_POST['f_3_1_desc']; 
	$f_3_2 = $_POST['f_3_2']; 
	$f_3_2_4 = $_POST['f_3_2_4']; 
	$f_3_2_desc = $_POST['f_3_2_desc']; 
	$f_4 = $_POST['f_4']; 
	$f_4_4 = $_POST['f_4_4']; 
	$f_4_desc = $_POST['f_4_desc']; 
	$f_5 = $_POST['f_5']; 
	$f_5_4 = $_POST['f_5_4']; 
	$f_5_desc = $_POST['f_5_desc']; 
	$f_6 = $_POST['f_6']; 
	$f_6_desc = $_POST['f_6_desc']; 
	$f_6_1 = $_POST['f_6_1']; 
	$f_6_1_4 = $_POST['f_6_1_4']; 
	$f_6_1_desc = $_POST['f_6_1_desc']; 
	$f_6_2 = $_POST['f_6_2']; 
	$f_6_2_4 = $_POST['f_6_2_4']; 
	$f_6_2_desc = $_POST['f_6_2_desc']; 
	$f_6_3 = $_POST['f_6_3']; 
	$f_6_3_4 = $_POST['f_6_3_4']; 
	$f_6_3_desc = $_POST['f_6_3_desc']; 
	$f_7 = $_POST['f_7']; 
	$f_7_4 = $_POST['f_7_4']; 
	$f_7_desc = $_POST['f_7_desc']; 
	$f_8 = $_POST['f_8']; 
	$f_8_4 = $_POST['f_8_4']; 
	$f_8_desc = $_POST['f_8_desc']; 
	$f_9 = $_POST['f_9']; 
	$f_9_desc = $_POST['f_9_desc']; 
	$f_9_1 = $_POST['f_9_1']; 
	$f_9_1_4 = $_POST['f_9_1_4']; 
	$f_9_1_desc = $_POST['f_9_1_desc']; 
	$f_9_2 = $_POST['f_9_2']; 
	$f_9_2_4 = $_POST['f_9_2_4']; 
	$f_9_2_desc = $_POST['f_9_2_desc']; 
	$f_10 = $_POST['f_10']; 
	$f_10_desc = $_POST['f_10_desc']; 
	$f_10_1 = $_POST['f_10_1']; 
	$f_10_1_4 = $_POST['f_10_1_4']; 
	$f_10_1_desc = $_POST['f_10_1_desc']; 
	$f_10_2 = $_POST['f_10_2']; 
	$f_10_2_4 = $_POST['f_10_2_4']; 
	$f_10_2_desc = $_POST['f_10_2_desc']; 
	$f_10_3 = $_POST['f_10_3']; 
	$f_10_3_4 = $_POST['f_10_3_4']; 
	$f_10_3_desc = $_POST['f_10_3_desc']; 
	$total_score = $_POST['total_score']; 
	$interpretation = $_POST['interpretation'];	

    mysqli_query($con,"INSERT INTO evaluation1_generic 
	(project_id, 
	f_1, 
	f_1_desc, 
	f_1_1, 
	f_1_1_4, 
	f_1_1_desc, 
	f_1_2, 
	f_1_2_4, 
	f_1_2_desc, 
	f_2, 
	f_2_4, 
	f_2_desc, 
	f_3, 
	f_3_desc, 
	f_3_1, 
	f_3_1_4, 
	f_3_1_desc, 
	f_3_2, 
	f_3_2_4, 
	f_3_2_desc, 
	f_4, 
	f_4_4, 
	f_4_desc, 
	f_5, 
	f_5_4, 
	f_5_desc, 
	f_6, 
	f_6_desc, 
	f_6_1, 
	f_6_1_4, 
	f_6_1_desc, 
	f_6_2, 
	f_6_2_4, 
	f_6_2_desc, 
	f_6_3, 
	f_6_3_4, 
	f_6_3_desc, 
	f_7, 
	f_7_4, 
	f_7_desc, 
	f_8, 
	f_8_4, 
	f_8_desc, 
	f_9, 
	f_9_desc, 
	f_9_1, 
	f_9_1_4, 
	f_9_1_desc, 
	f_9_2, 
	f_9_2_4, 
	f_9_2_desc, 
	f_10, 
	f_10_desc, 
	f_10_1, 
	f_10_1_4, 
	f_10_1_desc, 
	f_10_2, 
	f_10_2_4, 
	f_10_2_desc, 
	f_10_3, 
	f_10_3_4, 
	f_10_3_desc, 
	total_score, 
	interpretation
	)
	VALUES
	('$project_id', 
	'$f_1', 
	'$f_1_desc', 
	'$f_1_1', 
	'$f_1_1_4', 
	'$f_1_1_desc', 
	'$f_1_2', 
	'$f_1_2_4', 
	'$f_1_2_desc', 
	'$f_2', 
	'$f_2_4', 
	'$f_2_desc', 
	'$f_3', 
	'$f_3_desc', 
	'$f_3_1', 
	'$f_3_1_4', 
	'$f_3_1_desc', 
	'$f_3_2', 
	'$f_3_2_4', 
	'$f_3_2_desc', 
	'$f_4', 
	'$f_4_4', 
	'$f_4_desc', 
	'$f_5', 
	'$f_5_4', 
	'$f_5_desc', 
	'$f_6', 
	'$f_6_desc', 
	'$f_6_1', 
	'$f_6_1_4', 
	'$f_6_1_desc', 
	'$f_6_2', 
	'$f_6_2_4', 
	'$f_6_2_desc', 
	'$f_6_3', 
	'$f_6_3_4', 
	'$f_6_3_desc', 
	'$f_7', 
	'$f_7_4', 
	'$f_7_desc', 
	'$f_8', 
	'$f_8_4', 
	'$f_8_desc', 
	'$f_9', 
	'$f_9_desc', 
	'$f_9_1', 
	'$f_9_1_4', 
	'$f_9_1_desc', 
	'$f_9_2', 
	'$f_9_2_4', 
	'$f_9_2_desc', 
	'$f_10', 
	'$f_10_desc', 
	'$f_10_1', 
	'$f_10_1_4', 
	'$f_10_1_desc', 
	'$f_10_2', 
	'$f_10_2_4', 
	'$f_10_2_desc', 
	'$f_10_3', 
	'$f_10_3_4', 
	'$f_10_3_desc', 
	'$total_score', 
	'$interpretation'
	)");


mysqli_query($con,"UPDATE projects set status = '$status' where id = '$project_id'");
$budget = mysqli_query($con,"SELECT * FROM projects where id = '$project_id'");
$budget = mysqli_fetch_array($budget);

$attribution = ($budget['project_cost'] * $total_score) / (20 * 1);

$getlast_id = mysqli_query($con,"SELECT id FROM evaluation1_generic ORDER BY id DESC limit 1");

$eval_id = mysqli_fetch_array($getlast_id);
$id = $eval_id['id'];

	mysqli_query($con,"INSERT INTO evaluation 
	(project_id, 
	evaluation_id, 
	evaluation, 
	type, 
	score, 
	attribution, 
	interpretation
	)
	VALUES
	( '$project_id',
	'$id', 
	'Evaluation 1', 
	'$project_type', 
	'$total_score', 
	'$attribution', 
	'$interpretation'
	)");



echo json_encode([
    "message" => "Evaluation save!",
    "status_code" => 201, 
    "project_id" => $project_id, 
    "project_type" => $project_type, 
  ]);



    
?>