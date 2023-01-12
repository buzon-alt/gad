<?php require '../controllers/db/connection.php';
SESSION_START(); 

$eid = $_GET['eid'];
$pid = $_GET['pid'];
$project = mysqli_query($con,"SELECT evaluation2.*,e.attribution FROM evaluation2 left join evaluation as e on evaluation2.id  = e.evaluation_id where evaluation2.id = $eid");
$value = mysqli_fetch_array($project);
 
$title = mysqli_query($con,"SELECT * FROM projects where id= '$pid'");
$projectname = mysqli_fetch_array($title);
$status = $projectname['status'];
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>GAD PROJECT</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">


    <script src="../js/jquery-3.6.0.min.js"></script>

    <style media="screen">
    input[type=month]::-webkit-inner-spin-button,
    input[type=month]::-webkit-outer-spin-button {
        -webkit-appearance: none;
    }

    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
    }

    input[type="text"] {
        border: 0px;
        text-align: center;
    }
   
    input[type="radio"]:disabled {
        background-color: #000; 
    }
   
    .unstyled::-webkit-inner-spin-button,
    .unstyled::-webkit-calendar-picker-indicator {
        display: none;
        -webkit-appearance: none;
    }

    thead tr td {
        text-align: center;
        vertical-align: middle !important;
    }

    tbody tr td {
        vertical-align: middle !important;
    }
    </style>
 

</head>

<body>

    <div id="wrapper">

        <!-- /.navbar-header -->

        <?php require 'sideUser.php'; ?>
            <!-- /.navbar-static-side -->

        <div id="page-wrapper">

            <div class="row" style="padding-top:10px;">
                <div class="col-md-6"> 
                <h4><b>Evaluations 2: <?=$projectname['project_title']?> - <?=$projectname['department']?></b></h4>
                </div> 
            </div>
            <!-- /.row -->
            <div class="row">

                <form id="submit_evaluation2" enctype="multipart/form-data" method="POST">
                    <input type="hidden" name="project_id" value="<?=$_GET['pid']?>">
                    <input type="hidden" name="e_id" value="<?=$_GET['eid']?>">
                    <input type="hidden" name="project_type" value="<?=$_GET['projecttype']?>">
                    <div class="col-md-12">
                        <h5><b>Instruction:</b>Put a check in the appropriate column to signify the degree to which a project proponent has accomplished with each GAD criterion. Under column 2a if nothing has been done; under column 2b if the dimension or question has been partly accomplished or complied with; and column 2c if the item has been fully complied with. </h5>
                        <b><center>Box. 16 GAD Checklist for Project Management and Implementation</center></b>
                            <table class="table" id="checklist" border="1"
                                style="border-top:2px solid #333!important; border:0px solid #ddd;">
                                <thead>
                                    <tr>
                                        <td rowspan="2">Element and Guide Question (col. 1)</td>
                                        <td colspan="3">
                                            <center>Response (col. 2)</center>
                                        </td>
                                        <td rowspan="2">Score of the item or element <br>(col. 3)</td>
                                        <td rowspan="2">Result or comment<br>(col. 4)</td>
                                    </tr>
                                    <tr>
                                        <td>No (2a)</td>
                                        <td>Partly yes (2b)</td>
                                        <td>Yes (2c)</td>
                                    </tr>
                                </thead>
                                <tbody id="translist">
                                    <tr>
                                        <td><b>1.0 Supportive project management (max score: 2; for each item, 1.0) </b>
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <center><input type="text" name="f_1" id="f_1" value="<?=$value['f_1']?>"
                                                    style="font-weight:bold;"></center>
                                        </td>
                                        <td>
                                            <textarea name="f_1_desc" id="f_1_desc" cols="30" rows="2"><?=$value['f_1_desc']?></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width:60%;">1.1 Is the project leadership (project steering/advisory committee or management) supportive of GAD or gender equality goals? For instance, has it mobilized adequate resources to support strategies that address gender issues or constraints to women’s and men’s participation during project implementation? (possible scores: 0, 0.5, 1.0)</td>
                                        <td>
                                            <center><input type="radio" name="f_1_1" id="f_1_1_1" value="0" <?=$value['f_1_1'] == 0 ? 'checked':''?>>
                                            </center>
                                        </td>
                                        <td>
                                            <center><input type="radio" name="f_1_1" id="f_1_1_2" value="0.5" <?=$value['f_1_1'] == 0.5 ? 'checked':''?>></center>
                                        </td>
                                        <td>
                                            <center><input type="radio" name="f_1_1" id="f_1_1_2" value="1" <?=$value['f_1_1'] == 1 ? 'checked':''?>></center>
                                        </td>
                                        <td>
                                            <center><input type="text" name="f_1_1_4" id="f_1_1_4" value="<?=$value['f_1_1_4']?>"></center>
                                        </td>
                                        <td>
                                            <textarea name="f_1_1_desc" id="f_1_1_desc" cols="30" rows="2"><?=$value['f_1_1_desc']?></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width:60%;">1.2 Has adequate gender expertise has been made available throughout the project? For example, are gender issues adequately addressed in the project management contract and scope of services? (possible scores: 0, 0.5, 1.0)
                                        </td>
                                        <td>
                                            <center><input type="radio" name="f_1_2" id="f_1_2_1" value="0" <?=$value['f_1_2'] == 0 ? 'checked':''?>>
                                            </center>
                                        </td>
                                        <td>
                                            <center><input type="radio" name="f_1_2" id="f_1_2_2" value="0.5" <?=$value['f_1_2'] == 0.5 ? 'checked':''?>></center>
                                        </td>
                                        <td>
                                            <center><input type="radio" name="f_1_2" id="f_1_2_3" value="1" <?=$value['f_1_2'] == 1 ? 'checked':''?>></center>
                                        </td>
                                        <td>
                                            <center><input type="text" name="f_1_2_4" id="f_1_2_4" value="<?=$value['f_1_2_4']?>"></center>
                                        </td>
                                        <td>
                                            <textarea name="f_1_2_desc" id="f_1_2_desc" cols="30" rows="2"><?=$value['f_1_2_desc']?></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>2.0 Technically competent staff or consultants (max score: 2; for each item, 0.67)</b>
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <center><input type="text" name="f_2" id="f_2" value="<?=$value['f_2']?>"
                                                    style="font-weight:bold;"></center>
                                        </td>
                                        <td>
                                            <textarea name="f_2_desc" id="f_2_desc" cols="30" rows="2"><?=$value['f_2_desc']?></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width:60%;">2.1 Are the project staff members technically prepared to promote gender equality or integrate GAD in their respective positions/locations? OR, is there an individual or group responsible for promoting gender equality in the project? OR, has the project tapped local gender experts to assist its staff/partners in integrating gender equality in their activities or in project operations? (possible scores: 0, 0.33, 0.67)</td>
                                        <td>
                                            <center><input type="radio" name="f_2_1" id="f_2_1_1" value="0" <?=$value['f_2_1'] == 0 ? 'checked':''?>>
                                            </center>
                                        </td>
                                        <td>
                                            <center><input type="radio" name="f_2_1" id="f_2_1_2" value="0.33" <?=$value['f_2_1'] == 0.33 ? 'checked':''?>></center>
                                        </td>
                                        <td>
                                            <center><input type="radio" name="f_2_1" id="f_2_1_2" value="0.67" <?=$value['f_2_1'] == 0.67 ? 'checked':''?>></center>
                                        </td>
                                        <td>
                                            <center><input type="text" name="f_2_1_4" id="f_2_1_4" value="<?=$value['f_2_1_4']?>"></center>
                                        </td>
                                        <td>
                                            <textarea name="f_2_1_desc" id="f_2_1_desc" cols="30" rows="2"><?=$value['f_2_1_desc']?></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width:60%;">2.2 Does the project require the presence of women and men in the project implementation team? (possible scores: 0, 0.33, 0.67)</td>
                                        <td>
                                            <center><input type="radio" name="f_2_2" id="f_2_2_1" value="0" <?=$value['f_2_2'] == 0 ? 'checked':''?>>
                                            </center>
                                        </td>
                                        <td>
                                            <center><input type="radio" name="f_2_2" id="f_2_2_2" value="0.33" <?=$value['f_2_2'] == 0.33 ? 'checked':''?>></center>
                                        </td>
                                        <td>
                                            <center><input type="radio" name="f_2_2" id="f_2_2_2" value="0.67" <?=$value['f_2_2'] == 0.67 ? 'checked':''?>></center>
                                        </td>
                                        <td>
                                            <center><input type="text" name="f_2_2_4" id="f_2_2_4" value="<?=$value['f_2_2_4']?>"></center>
                                        </td>
                                        <td>
                                            <textarea name="f_2_2_desc" id="f_2_2_desc" cols="30" rows="2"><?=$value['f_2_2_desc']?></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width:60%;">2.3 Does the project require its monitoring and evaluation team (personnel or consultants) to have technical competence for GAD evaluation? (possible scores: 0, 0.33, 0.67)</td>
                                        <td>
                                            <center><input type="radio" name="f_2_3" id="f_2_3_1" value="0" <?=$value['f_2_3'] == 0 ? 'checked':''?>>
                                            </center>
                                        </td>
                                        <td>
                                            <center><input type="radio" name="f_2_3" id="f_2_3_2" value="0.33" <?=$value['f_2_3'] == 0.33 ? 'checked':''?>></center>
                                        </td>
                                        <td>
                                            <center><input type="radio" name="f_2_3" id="f_2_3_2" value="0.67" <?=$value['f_2_3'] == 0.67 ? 'checked':''?>></center>
                                        </td>
                                        <td>
                                            <center><input type="text" name="f_2_3_4" id="f_2_3_4" value="<?=$value['f_2_3_4']?>"></center>
                                        </td>
                                        <td>
                                            <textarea name="f_2_3_desc" id="f_2_3_desc" cols="30" rows="2"><?=$value['f_2_3_desc']?></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>3.0 Committed Philippine government agency (max score: 2; for each item, 1) </b>
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <center><input type="text" name="f_3" id="f_3" value="<?=$value['f_3']?>"
                                                    style="font-weight:bold;"></center>
                                        </td>
                                        <td>
                                            <textarea name="f_3_desc" id="f_3_desc" cols="30" rows="2"><?=$value['f_3_desc']?></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width:60%;">3.1 Are regular agency personnel involved in implementing project GAD initiatives? OR, are agency officials or personnel participating in GAD training sponsored by the project? (possible scores: 0, 0.5, 1.0) </td>
                                        <td>
                                            <center><input type="radio" name="f_3_1" id="f_3_1_1" value="0" <?=$value['f_3_1'] == 0 ? 'checked':''?>>
                                            </center>
                                        </td>
                                        <td>
                                            <center><input type="radio" name="f_3_1" id="f_3_1_2" value="0.5" <?=$value['f_3_1'] == 0.5 ? 'checked':''?>></center>
                                        </td>
                                        <td>
                                            <center><input type="radio" name="f_3_1" id="f_3_1_2" value="1" <?=$value['f_3_1'] == 1 ? 'checked':''?>></center>
                                        </td>
                                        <td>
                                            <center><input type="text" name="f_3_1_4" id="f_3_1_4" value="<?=$value['f_3_1_4']?>"></center>
                                        </td>
                                        <td>
                                            <textarea name="f_3_1_desc" id="f_3_1_desc" cols="30" rows="2"><?=$value['f_3_1_desc'] == 0 ? 'checked':''?></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width:60%;">3.2 Has the agency included the project’s GAD efforts in its GAD plans? (possible scores: 0, 0.5, 1.0)</td>
                                        <td>
                                            <center><input type="radio" name="f_3_2" id="f_3_2_1" value="0" <?=$value['f_3_2'] == 0 ? 'checked':''?>>
                                            </center>
                                        </td>
                                        <td>
                                            <center><input type="radio" name="f_3_2" id="f_3_2_2" value="0.5" <?=$value['f_3_2'] == 0.5 ? 'checked':''?>></center>
                                        </td>
                                        <td>
                                            <center><input type="radio" name="f_3_2" id="f_3_2_2" value="1" <?=$value['f_3_2'] == 1 ? 'checked':''?>></center>
                                        </td>
                                        <td>
                                            <center><input type="text" name="f_3_2_4" id="f_3_2_4" value=" <?=$value['f_3_2_4']?>"></center>
                                        </td>
                                        <td>
                                            <textarea name="f_3_2_desc" id="f_3_2_desc" cols="30" rows="2"> <?=$value['f_3_2_desc']?></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>4.0 GAD implementation processes and procedures (max score: 2; for each item, 0.5)</b>
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <center><input type="text" name="f_4" id="f_4" value="<?=$value['f_4']?>"
                                                    style="font-weight:bold;"></center>
                                        </td>
                                        <td>
                                            <textarea name="f_4_desc" id="f_4_desc" cols="30" rows="2"> <?=$value['f_4_desc']?></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width:60%;">4.1 Do project implementation documents incorporate a discussion of GAD concerns? IF APPLICABLE: Are subproject proposals required to have explicit GAD objectives and to have been supported by gender analysis? (possible scores: 0, 0.25, 0.50)</td>
                                        <td>
                                            <center><input type="radio" name="f_4_1" id="f_4_1_1" value="0" <?=$value['f_4_1'] == 0 ? 'checked':''?>>
                                            </center>
                                        </td>
                                        <td>
                                            <center><input type="radio" name="f_4_1" id="f_4_1_2" value="0.25"<?=$value['f_4_1'] == 0.25 ? 'checked':''?>></center>
                                        </td>
                                        <td>
                                            <center><input type="radio" name="f_4_1" id="f_4_1_2" value="0.5"<?=$value['f_4_1'] == 0.5 ? 'checked':''?>></center>
                                        </td>
                                        <td>
                                            <center><input type="text" name="f_4_1_4" id="f_4_1_4" value="<?=$value['f_4_1_4']?>"></center>
                                        </td>
                                        <td>
                                            <textarea name="f_4_1_desc" id="f_4_1_desc" cols="30" rows="2"><?=$value['f_4_1_desc']?></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width:60%;">4.2 Does the project have an operational GAD strategy? Alternately, has the project been effective in integrating GAD into the development activity? (possible scores: 0, 0.25, 0.50</td>
                                        <td>
                                            <center><input type="radio" name="f_4_2" id="f_4_2_1" value="0" <?=$value['f_4_2'] == 0 ? 'checked':''?>>
                                            </center>
                                        </td>
                                        <td>
                                            <center><input type="radio" name="f_4_2" id="f_4_2_2" value="0.25" <?=$value['f_4_2'] == 0.25 ? 'checked':''?>></center>
                                        </td>
                                        <td>
                                            <center><input type="radio" name="f_4_2" id="f_4_2_2" value="0.5" <?=$value['f_4_2'] == 0.5 ? 'checked':''?>></center>
                                        </td>
                                        <td>
                                            <center><input type="text" name="f_4_2_4" id="f_4_2_4" value="<?=$value['f_4_2_4']?>"></center>
                                        </td>
                                        <td>
                                            <textarea name="f_4_2_desc" id="f_4_2_desc" cols="30" rows="2"><?=$value['f_4_2_desc']?></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width:60%;">4.3 Does the project have a budget for activities that will build capacities for doing GAD tasks (gender analysis, monitoring, etc.) (possible scores: 0, 0.25, 0.50)</td>
                                        <td>
                                            <center><input type="radio" name="f_4_3" id="f_4_3_1" value="0"  <?=$value['f_4_3'] == 0 ? 'checked':''?>>
                                            </center>
                                        </td>
                                        <td>
                                            <center><input type="radio" name="f_4_3" id="f_4_3_2" value="0.25" <?=$value['f_4_3'] == 0.25 ? 'checked':''?>></center>
                                        </td>
                                        <td>
                                            <center><input type="radio" name="f_4_3" id="f_4_3_2" value="0.5" <?=$value['f_4_3'] == 0.5 ? 'checked':''?>></center>
                                        </td>
                                        <td>
                                            <center><input type="text" name="f_4_3_4" id="f_4_3_4" value="<?=$value['f_4_3_4']?>"></center>
                                        </td>
                                        <td>
                                            <textarea name="f_4_3_desc" id="f_4_3_desc" cols="30" rows="2"><?=$value['f_4_3_desc']?></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width:60%;">4.4 Does the project involve women and men in various phases of subprojects? (possible scores: 0, 0.25, 0.50)</td>
                                        <td>
                                            <center><input type="radio" name="f_4_4" id="f_4_4_1" value="0" <?=$value['f_4_4'] == 0 ? 'checked':''?>>
                                            </center>
                                        </td>
                                        <td>
                                            <center><input type="radio" name="f_4_4" id="f_4_4_2" value="0.25" <?=$value['f_4_4'] == 0.25 ? 'checked':''?>></center>
                                        </td>
                                        <td>
                                            <center><input type="radio" name="f_4_4" id="f_4_4_2" value="0.5" <?=$value['f_4_4'] == 0.5 ? 'checked':''?>></center>
                                        </td>
                                        <td>
                                            <center><input type="text" name="f_4_4_4" id="f_4_4_4" value="<?=$value['f_4_4_4']?>"></center>
                                        </td>
                                        <td>
                                            <textarea name="f_4_4_desc" id="f_4_4_desc" cols="30" rows="2"><?=$value['f_4_4_desc']?></textarea>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td style="width:60%;"><b>TOTAL GAD SCORE-PROJECT MANAGEMENT</b></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <center><input type="text" name="total_score16" id="total_score16" value="<?=$value['total_score16']?>">
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td colspan="6" style="width:60%;"><b><center></b></td> 
                                    </tr>
                                    <tr>
                                        <td colspan="6" style="width:60%;"><b><center>Box. 17 GAD Checklist for Project Monitoring and Evaluation </center></b></td> 
                                    </tr>
                                    <tr>
                                        <td><b>1.0 Project monitoring system being used by the project includes indicators that measure gender differences in outputs, results, and outcomes (max score: 2; for each item, 1) </b>
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <center><input type="text" name="ff_1" id="ff_1" value="<?=$value['ff_1']?>"
                                                    style="font-weight:bold;"></center>
                                        </td>
                                        <td>
                                            <textarea name="ff_1_desc" id="ff_1_desc" cols="30" rows="2"><?=$value['ff_1_desc']?></textarea>
                                        </td>
                                    </tr><tr>
                                        <td style="width:60%;">1.1 Does the project require gender-sensitive outputs and outcomes? (possible scores: 0, 0.5, 1.0)</td>
                                        <td>
                                            <center><input type="radio" name="ff_1_1" id="ff_1_1_1" value="0" <?=$value['ff_1_1'] == 0 ? 'checked':''?>>
                                            </center>
                                        </td>
                                        <td>
                                            <center><input type="radio" name="ff_1_1" id="ff_1_1_2" value="0.5" <?=$value['ff_1_1'] == 0.5 ? 'checked':''?>></center>
                                        </td>
                                        <td>
                                            <center><input type="radio" name="ff_1_1" id="ff_1_1_2" value="1" <?=$value['ff_1_1'] == 1 ? 'checked':''?>></center>
                                        </td>
                                        <td>
                                            <center><input type="text" name="ff_1_1_4" id="ff_1_1_4" value="<?=$value['ff_1_1_4']?>"></center>
                                        </td>
                                        <td>
                                            <textarea name="ff_1_1_desc" id="ff_1_1_desc" cols="30" rows="2"><?=$value['ff_1_1_desc']?></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width:60%;">1.2 Does the project monitor its activities, inputs, outputs, and results using GAD or gender equality indicators? (possible scores: 0, 0.5, 1.0)</td>
                                        <td>
                                            <center><input type="radio" name="ff_1_2" id="ff_1_2_1" value="0" <?=$value['ff_1_2'] == 0 ? 'checked':''?>>
                                            </center>
                                        </td>
                                        <td>
                                            <center><input type="radio" name="ff_1_2" id="ff_1_2_2" value="0.5" <?=$value['ff_1_2'] == 0.5 ? 'checked':''?>></center>
                                        </td>
                                        <td>
                                            <center><input type="radio" name="ff_1_2" id="ff_1_2_3" value="1" <?=$value['ff_1_2'] == 1 ? 'checked':''?>></center>
                                        </td>
                                        <td>
                                            <center><input type="text" name="ff_1_2_4" id="ff_1_2_4" value="<?=$value['ff_1_2_4']?>"></center>
                                        </td>
                                        <td>
                                            <textarea name="ff_1_2_desc" id="ff_1_2_desc" cols="30" rows="2"><?=$value['ff_1_2_desc']?></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>2.0 Project database includes sex-disaggregated and gender-related information (max score: 2; for each item, 0.5)</b>
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <center><input type="text" name="ff_2" id="ff_2" value="<?=$value['ff_2']?>"
                                                    style="font-weight:bold;"></center>
                                        </td>
                                        <td>
                                            <textarea name="ff_2_desc" id="ff_2_desc" cols="30" rows="2"><?=$value['ff_2_desc']?></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width:60%;">2.1 Does the project support studies to assess gender issues and impacts? OR, have sex-disaggregated data been collected on the project’s impact on women and men in connection with welfare, access to resources and benefits, awareness or consciousness raising, participation, and control? (possible scores: 0, 0.25, 0.50)</td>
                                        <td>
                                            <center><input type="radio" name="ff_2_1" id="ff_2_1_1" value="0" <?=$value['ff_2_1'] == 0 ? 'checked':''?>>
                                            </center>
                                        </td>
                                        <td>
                                            <center><input type="radio" name="ff_2_1" id="ff_2_1_2" value="0.25" <?=$value['ff_2_1'] == 0.25 ? 'checked':''?>></center>
                                        </td>
                                        <td>
                                            <center><input type="radio" name="ff_2_1" id="ff_2_1_2" value="0.5" <?=$value['ff_2_1'] == 0.5 ? 'checked':''?>></center>
                                        </td>
                                        <td>
                                            <center><input type="text" name="ff_2_1_4" id="ff_2_1_4" value="<?=$value['ff_2_1_4']?>"></center>
                                        </td>
                                        <td>
                                            <textarea name="ff_2_1_desc" id="ff_2_1_desc" cols="30" rows="2"><?=$value['ff_2_1_desc']?></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width:60%;">2.2 Have sex-disaggregated data been collected on the distribution of project resources to women and men, and on the participation of women and men in project activities and in decision-making? IF APPLICABLE: Does the project require its subprojects to include sex-disaggregated data in their reports? (possible scores: 0, 0.25, 0.50)</td>
                                        <td>
                                            <center><input type="radio" name="ff_2_2" id="ff_2_2_1" value="0" <?=$value['ff_2_2'] == 0 ? 'checked':''?>>
                                            </center>
                                        </td>
                                        <td>
                                            <center><input type="radio" name="ff_2_2" id="ff_2_2_2" value="0.25" <?=$value['ff_2_2'] == 0.25 ? 'checked':''?>></center>
                                        </td>
                                        <td>
                                            <center><input type="radio" name="ff_2_2" id="ff_2_2_3" value="0.5" <?=$value['ff_2_2'] == 0.5 ? 'checked':''?>></center>
                                        </td>
                                        <td>
                                            <center><input type="text" name="ff_2_2_4" id="ff_2_2_4" value="<?=$value['ff_2_2_4']?>"></center>
                                        </td>
                                        <td>
                                            <textarea name="ff_2_2_desc" id="ff_2_2_desc" cols="30" rows="2"><?=$value['ff_2_2_desc']?></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width:60%;">2.3 Do project and subproject reports include sex-disaggregated data or cover gender equality or GAD concerns, initiatives, and results (that is, information on gender issues and how these are addressed)? (possible score: 0, 0.25, 0.50)</td>
                                        <td>
                                            <center><input type="radio" name="ff_2_3" id="ff_2_3_1" value="0" <?=$value['ff_2_3'] == 0 ? 'checked':''?>>
                                            </center>
                                        </td>
                                        <td>
                                            <center><input type="radio" name="ff_2_3" id="ff_2_3_2" value="0.25" <?=$value['ff_2_3'] == 0.25 ? 'checked':''?>></center>
                                        </td>
                                        <td>
                                            <center><input type="radio" name="ff_2_3" id="ff_2_3_3" value="0.5" <?=$value['ff_2_3'] == 0.5 ? 'checked':''?>></center>
                                        </td>
                                        <td>
                                            <center><input type="text" name="ff_2_3_4" id="ff_2_3_4" value="<?=$value['ff_2_3_4']?>"></center>
                                        </td>
                                        <td>
                                            <textarea name="ff_2_3_desc" id="ff_2_3_desc" cols="30" rows="2"><?=$value['ff_2_3_desc']?></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width:60%;">2.4 Are sex-disaggregated data being “rolled up” from the field to the national level? (possible scores: 0, 0.25, 0.50)</td>
                                        <td>
                                            <center><input type="radio" name="ff_2_4" id="ff_2_4_1" value="0" <?=$value['ff_2_4'] == 0 ? 'checked':''?>>
                                            </center>
                                        </td>
                                        <td>
                                            <center><input type="radio" name="ff_2_4" id="ff_2_4_2" value="0.25" <?=$value['ff_2_4'] == 0.25 ? 'checked':''?>></center>
                                        </td>
                                        <td>
                                            <center><input type="radio" name="ff_2_4" id="ff_2_4_3" value="0.5" <?=$value['ff_2_4'] == 0.5 ? 'checked':''?>></center>
                                        </td>
                                        <td>
                                            <center><input type="text" name="ff_2_4_4" id="ff_2_4_4" value="<?=$value['ff_2_4_4']?>"></center>
                                        </td>
                                        <td>
                                            <textarea name="ff_2_4_desc" id="ff_2_4_desc" cols="30" rows="2"><?=$value['ff_2_4_desc']?></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>3.0 Gender equality and women’s empowerment targets are being met (max score: 4)</b>
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <center><input type="text" name="ff_3" id="ff_3" value="<?=$value['ff_3']?>"
                                                    style="font-weight:bold;"></center>
                                        </td>
                                        <td>
                                            <textarea name="ff_3_desc" id="ff_3_desc" cols="30" rows="2"><?=$value['ff_3_desc']?></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width:60%;">3.1 Has women’s welfare and status been improved as a result of the project? (possible scores: 0, 1.0, 2.0)</td>
                                        <td>
                                            <center><input type="radio" name="ff_3_1" id="ff_3_1_1" value="0" <?=$value['ff_3_1'] == 0 ? 'checked':''?>>
                                            </center>
                                        </td>
                                        <td>
                                            <center><input type="radio" name="ff_3_1" id="ff_3_1_2" value="1" <?=$value['ff_3_1'] == 1 ? 'checked':''?>></center>
                                        </td>
                                        <td>
                                            <center><input type="radio" name="ff_3_1" id="ff_3_1_2" value="2" <?=$value['ff_3_1'] == 2 ? 'checked':''?>></center>
                                        </td>
                                        <td>
                                            <center><input type="text" name="ff_3_1_4" id="ff_3_1_4" value="<?=$value['ff_3_1_4']?>"></center>
                                        </td>
                                        <td>
                                            <textarea name="ff_3_1_desc" id="ff_3_1_desc" cols="30" rows="2"><?=$value['ff_3_1_desc']?></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="5">Example of indicators: 
                                            <ul>
                                                <li>The project has helped in raising the education levels and health status of disadvantaged groups of women</li>
                                                <li>Women’s access to productive resources, employment opportunities, and political and legal status has improved</li>
                                                <li>The project has created new opportunities or roles for women and men</li>
                                                <li>Men and women have been sensitized to gender issues and women’s human rights</li>
                                                <li>The project has supported or instituted strategies to overcome any adverse effects on women</li>
                                                <li>The project has introduced follow-up activities to promote the sustainability of its gender equality results</li>
                                                <li>There are project initiatives to ensure that improvements in the status of women and girls will be sustained and supported after project completion    </li>
                                            </ul>
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td style="width:60%;">3.2 Has the project helped in developing the capacity of the implementing agency for implementing gender-sensitive projects? (possible scores: 0, 1.0, 2.0)</td>
                                        <td>
                                            <center><input type="radio" name="ff_3_2" id="ff_3_2_1" value="0" <?=$value['ff_3_2'] == 0 ? 'checked':''?>>
                                            </center>
                                        </td>
                                        <td>
                                            <center><input type="radio" name="ff_3_2" id="ff_3_2_2" value="1" <?=$value['ff_3_2'] == 1 ? 'checked':''?>></center>
                                        </td>
                                        <td>
                                            <center><input type="radio" name="ff_3_2" id="ff_3_2_3" value="2" <?=$value['ff_3_2'] == 2 ? 'checked':''?>></center>
                                        </td>
                                        <td>
                                            <center><input type="text" name="ff_3_2_4" id="ff_3_2_4" value="<?=$value['ff_3_2_4']?>"></center>
                                        </td>
                                        <td>
                                            <textarea name="ff_3_2_desc" id="ff_3_2_desc" cols="30" rows="2"><?=$value['ff_3_2_desc']?></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width:60%;"><b>4.0 Project addresses gender issues arising from or during its implementation (possible scores: 0, 1.0, 2.0) </b> <br>Has the project responded to gender issues that were identified during project implementation or M&E? OR: Has the project addressed gender issues arising from its implementation?</td>
                                        <td>
                                            <center><input type="radio" name="ff_4" id="ff_4_1" value="0" <?=$value['ff_4'] == 0 ? 'checked':''?>>
                                            </center>
                                        </td>
                                        <td>
                                            <center><input type="radio" name="ff_4" id="ff_4_2" value="1" <?=$value['ff_4'] == 1 ? 'checked':''?>></center>
                                        </td>
                                        <td>
                                            <center><input type="radio" name="ff_4" id="ff_4_2" value="2" <?=$value['ff_4'] == 2 ? 'checked':''?>></center>
                                        </td>
                                        <td>
                                            <center><input type="text" name="ff_4_4" id="ff_4_4" value="<?=$value['ff_4_4']?>"></center>
                                        </td>
                                        <td>
                                            <textarea name="ff_4_desc" id="ff_4_desc" cols="30" rows="2"><?=$value['ff_4_desc']?></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="5">Examples of gender issues: 
                                            <ul>
                                                <li>Negative effects on the gender relationship as a result of new roles or resources created for women</li>
                                                <li>Additional workloads for women and men</li>
                                                <li>Displacement of women by men</li>
                                                <li>Loss of access to resources because of project rules</li> 
                                            </ul>
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td><b>5.0 Participatory monitoring and evaluation processes (max score: 2; for each item, 1)</b>
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <center><input type="text" name="ff_5" id="ff_5" value="<?=$value['ff_2']?>"
                                                    style="font-weight:bold;"></center>
                                        </td>
                                        <td>
                                            <textarea name="ff_5_desc" id="ff_5_desc" cols="30" rows="2"><?=$value['ff_5_desc']?></textarea>
                                        </td>
                                    </tr><tr>
                                        <td style="width:60%;">5.1 Does the project involve or consult women and men implementers during project monitoring and evaluation? Does it involve women and men beneficiaries? (possible scores: 0, 0.5, 1.0)</td>
                                        <td>
                                            <center><input type="radio" name="ff_5_1" id="ff_5_1_1" value="0" <?=$value['ff_5_1'] == 0 ? 'checked':''?>>
                                            </center>
                                        </td>
                                        <td>
                                            <center><input type="radio" name="ff_5_1" id="ff_5_1_2" value="0.5" <?=$value['ff_5_1'] == 0.5 ? 'checked':''?>></center>
                                        </td>
                                        <td>
                                            <center><input type="radio" name="ff_5_1" id="ff_5_1_2" value="1" <?=$value['ff_5_1'] == 1 ? 'checked':''?>></center>
                                        </td>
                                        <td>
                                            <center><input type="text" name="ff_5_1_4" id="ff_5_1_4" value="<?=$value['ff_5_1_4']?>"></center>
                                        </td>
                                        <td>
                                            <textarea name="ff_5_1_desc" id="ff_5_1_desc" cols="30" rows="2"><?=$value['ff_5_1_desc']?></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width:60%;">5.2 Have women and men been involved in or consulted on the assessment of the gender impacts of the Project? (possible scores: 0, 0.5, 1.0)</td>
                                        <td>
                                            <center><input type="radio" name="ff_5_2" id="ff_5_2_1" value="0" <?=$value['ff_5_2'] == 0 ? 'checked':''?>>
                                            </center>
                                        </td>
                                        <td>
                                            <center><input type="radio" name="ff_5_2" id="ff_5_2_2" value="0.5" <?=$value['ff_5_2'] == 0.5 ? 'checked':''?>></center>
                                        </td>
                                        <td>
                                            <center><input type="radio" name="ff_5_2" id="ff_5_2_3" value="1" <?=$value['ff_5_2'] == 1 ? 'checked':''?>></center>
                                        </td>
                                        <td>
                                            <center><input type="text" name="ff_5_2_4" id="ff_5_2_4" value="<?=$value['ff_5_2_4']?>"></center>
                                        </td>
                                        <td>
                                            <textarea name="ff_5_2_desc" id="ff_5_2_desc" cols="30" rows="2"><?=$value['ff_5_2_desc']?></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width:60%;"><b>TOTAL GAD SCORE-MONITORING AND EVALUATION (Box 17) </b></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <center><input type="text" name="total_score17" id="total_score17" value="<?=$value['total_score17']?>">
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td style="width:60%;"><b>TOTAL GAD SCORE-PROJECT IMPLEMENTATION </b></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <center><input type="text" name="alltotal_score" id="alltotal_score" value="<?=$value['alltotal_score']?>">
                                        </td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">Status:</label>
                        <select class="form-control" name="status" disabled>
                                    <option value=""></option>
                                    <option value="Pending" <?=$status == 'Pending' ? 'selected':''?>>Pending</option>
                                    <option value="Evaluation 1 Complete" <?=$status == 'Evaluation 1 Complete' ? 'selected':''?>>Evaluation 1 Complete</option>
                                    <option value="Evaluation 1 Re-evaluate" <?=$status == 'Evaluation 1 Re-evaluate' ? 'selected':''?>>Evaluation 1 Re-evaluate</option>
                                    <option value="Evaluation 2 Re-evaluate" <?=$status == 'Evaluation 2 Re-evaluate' ? 'selected':''?>>Evaluation 2 Re-evaluate</option>
                                    <option value="Complete" <?=$status == 'Complete' ? 'selected':''?>>Complete</option>
                                </select>
                        </div>
                    <div class="form-group col-md-3">
                        <label for="">Attribution:</label>
                        <span class="peso_symbol_1">&#8369;</span>
                        <input type="text"  class="form-control" id="attribution" value="<?=$value['attribution']?>" disable>
                        
                    </div>
                    <div class="col-md-12">
                        <input type="hidden" name="interpretation" id="interpretation" value="<?=$value['interpretation']?>">
                        <center>
                            <h3 id="interpretationtext"><?=$value['interpretation']?></h3> 
                            <br><br><br>

                        </center>
                    </div>
                </form>
            </div>

            <!-- /.row -->

        </div>
        <!-- /#page-wrapper -->

    </div>


    </div>


    <script type="text/javascript"> 
 $("input,textarea").attr("disabled","disabled");
    </script>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>


    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>