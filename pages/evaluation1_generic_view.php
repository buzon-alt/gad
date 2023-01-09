<?php require '../controllers/db/connection.php';
SESSION_START();
$eid = $_GET['eid'];
$pid = $_GET['pid'];
$project = mysqli_query($con,"SELECT evaluation1_generic.*,e.attribution FROM evaluation1_generic left join evaluation as e on evaluation1_generic.id  = e.evaluation_id where evaluation1_generic.id = $eid");
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

    <script type="text/javascript">
    var cols = new Array();
    cols[0] = "A";
    cols[1] = "B";
    cols[2] = "C";

    function EditModal(_row) {

        document.getElementById("fnum").value = document.getElementById("row" + _row + cols[0]).innerHTML;
        document.getElementById("fnam").value = document.getElementById("row" + _row + cols[1]).innerHTML;
        document.getElementById("identt").value = document.getElementById("row" + _row + cols[2]).innerHTML;
        $("#editfile").modal('show');
    }
    </script>

</head>

<body>

    <div id="wrapper">

       <!-- /.navbar-header -->

       <?php require 'sideUser.php'; ?>
            <!-- /.navbar-static-side -->

        <div id="page-wrapper">

            <div class="row" style="padding-top:10px;">
                <div class="col-md-6">
                <h4><b>Evaluations 1: <?=$projectname['project_title']?> - <?=$projectname['department']?></b></h4>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <form id="submit_evaluation1" enctype="multipart/form-data" method="POST">
                    <input type="hidden" name="project_id" value="<?=$_GET['pid']?>">
                    <input type="hidden" name="e_id" value="<?=$_GET['eid']?>">
                    <input type="hidden" name="project_type" value="Generic">
                    <div class="col-md-12">
                        <h5><b>Instruction:</b>Put a check in the appropriate column to signify the degree to which a
                            project proponent has accomplished with each GAD criterion. Under column 2a if nothing has
                            been done; under column 2b if the dimension or question has been partly accomplished or
                            complied with; and column 2c if the item has been fully complied with.</h5>

                        <table class="table" border="1" id="checklist"
                            style="border-top:2px solid #333!important; border:0px solid #ddd;">
                            <thead>
                                <tr>
                                    <td rowspan="2">Element and Guide Question (col. 1)</td>
                                    <td colspan="3">
                                        <center>Done?(col.2)</center>
                                    </td>
                                    <td rowspan="2">Score of the item or element <br>(col. 3)</td>
                                    <td rowspan="2">Gender issues identified<br>(col. 4)</td>
                                </tr>
                                <tr>
                                    <td>No (2a)</td>
                                    <td>Partly yes (2b)</td>
                                    <td>Yes (2c)</td>
                                </tr>
                            </thead>
                            <tbody id="translist">
                                <tr>
                                    <td><b>1.0 Involvement of women and men (max score: 2; for each item, 1)</b></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <center><input type="text" name="f_1" id="f_1" value="<?=$value['f_1']?>"></center>
                                    </td>
                                    <td>
                                        <textarea name="f_1_desc" id="f_1_desc" cols="30" rows="2"><?=$value['f_1_desc']?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:60%;">1.1 Participation of women and men in beneficiary groups in
                                        identification of the problem (possible scores: 0, 0.5,1.0)</td>
                                    <td>
                                        <center><input type="radio" name="f_1_1" id="f_1_1_1" value="0" <?=$value['f_1_1'] == 0 ? 'checked':''?>>
                                        </center>
                                    </td>
                                    <td>
                                        <center><input type="radio" name="f_1_1" id="f_1_1_2" value="0.5" <?=$value['f_1_1'] == 0.5 ? 'checked':''?>></center>
                                    </td>
                                    <td>
                                        <center><input type="radio" name="f_1_1" id="f_1_1_3" value="1" <?=$value['f_1_1'] == 1 ? 'checked':''?>></center>
                                    </td>
                                    <td>
                                        <center><input type="text" name="f_1_1_4" id="f_1_1_4" value="<?=$value['f_1_1_4']?>"></center>
                                    </td>
                                    <td>
                                        <textarea name="f_1_1_desc" id="f_1_1_desc" cols="30" rows="2"><?=$value['f_1_1_desc']?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:60%;">1.2 Participation of women and men in beneficiary groups in
                                        project design (possible scores: 0, 0.5, 1.0)
                                    </td>
                                    <td>
                                        <center><input type="radio" name="f_1_2" id="f_1_2_1" value="0" <?=$value['f_1_2'] == 0 ? 'checked':''?>>
                                        </center>
                                    </td>
                                    <td>
                                        <center><input type="radio" name="f_1_2" id="f_1_2_2" value="0.5" <?=$value['f_1_2'] == 0.5 ? 'checked':''?>></center>
                                    </td>
                                    <td>
                                        <center><input type="radio" name="f_1_2" id="f_1_2_3" value="1"  <?=$value['f_1_2'] == 1 ? 'checked':''?>></center>
                                    </td>
                                    <td>
                                        <center><input type="text" name="f_1_2_4" id="f_1_2_4" value=" <?=$value['f_1_2_4']?>"></center>
                                    </td> 
                                    <td>
                                        <textarea name="f_1_2_desc" id="f_1_2_desc" cols="30" rows="2"> <?=$value['f_1_2_desc']?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>2.0 Collection of sex-disaggregated data and gender-related information
                                            (possible scores: 0, 1.0, 2.0)</b></td>
                                    <td>
                                        <center><input type="radio" name="f_2" id="f_2_1" value="0"  <?=$value['f_2'] == 0 ? 'checked':''?>></center>
                                    </td>
                                    <td>
                                        <center><input type="radio" name="f_2" id="f_2_2" value="1" <?=$value['f_2'] == 1 ? 'checked':''?>></center>
                                    </td>
                                    <td>
                                        <center><input type="radio" name="f_2" id="f_2_3" value="2" <?=$value['f_2'] == 2 ? 'checked':''?>></center>
                                    </td>
                                    <td>
                                        <center><input type="text" name="f_2_4" id="f_2_4" value="<?=$value['f_2_4']?>"></center>
                                    </td>
                                    <td>
                                        <textarea name="f_2_desc" id="f_2_desc" cols="30" rows="2"> <?=$value['f_2_desc']?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>3.0 Conduct of gender analysis and identification of gender issues(max score:
                                            2; for each item, 1)</b></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <center><input type="text" name="f_3" id="f_3" value="<?=$value['f_3']?>"></center>
                                    </td>
                                    <td>
                                        <textarea name="f_3_desc" id="f_3_desc" cols="30" rows="2"> <?=$value['f_3_desc']?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:60%;">3.1 Analysis of gender gaps and inequalities related to
                                        gender roles, perspectives and needs, or access to and control of resources
                                        (possible scores: 0, 0.5, 1.0)</td>
                                    <td>
                                        <center><input type="radio" name="f_3_1" id="f_3_1_1" value="0" <?=$value['f_3_1'] == 0 ? 'checked':''?>>
                                        </center>
                                    </td>
                                    <td>
                                        <center><input type="radio" name="f_3_1" id="f_3_1_2" value="0.5" <?=$value['f_3_1'] == 0.5 ? 'checked':''?>></center>
                                    </td>
                                    <td>
                                        <center><input type="radio" name="f_3_1" id="f_3_1_3" value="1" <?=$value['f_3_1'] == 1 ? 'checked':''?>></center>
                                    </td>
                                    <td>
                                        <center><input type="text" name="f_3_1_4" id="f_3_1_4" value="<?=$value['f_3_1_4']?>"></center>
                                    </td>
                                    <td>
                                        <textarea name="f_3_1_desc" id="f_3_1_desc" cols="30" rows="2"><?=$value['f_3_1_desc'] == 0 ? 'checked':''?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:60%;">3.2 Analysis of constraints and opportunities related to
                                        women and men’s participation in the project (possible scores: 0, 0.5, 1.0)
                                    </td>
                                    <td>
                                        <center><input type="radio" name="f_3_2" id="f_3_2_1" value="0" <?=$value['f_3_2'] == 0 ? 'checked':''?>>
                                        </center>
                                    </td>
                                    <td>
                                        <center><input type="radio" name="f_3_2" id="f_3_2_2" value="0.5" <?=$value['f_3_2'] == 0.5 ? 'checked':''?>></center>
                                    </td>
                                    <td>
                                        <center><input type="radio" name="f_3_2" id="f_3_2_3" value="1" <?=$value['f_3_2'] == 1 ? 'checked':''?>></center>
                                    </td>
                                    <td>
                                        <center><input type="text" name="f_3_2_4" id="f_3_2_4" value="<?=$value['f_3_2_4']?>"></center>
                                    </td>
                                    <td>
                                        <textarea name="f_3_2_desc" id="f_3_2_desc" cols="30" rows="2"><?=$value['f_3_2_desc']?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>4.0 Gender equality goals, outcomes, and outputs (possible scores: 0, 1.0,
                                            2.0) Does the project have clearly stated gender equality goals, objectives,
                                            outcomes or outputs?</b></td>
                                    <td>
                                        <center><input type="radio" name="f_4" id="f_4_1" value="0" <?=$value['f_4'] == 0 ? 'checked':''?>></center>
                                    </td>
                                    <td>
                                        <center><input type="radio" name="f_4" id="f_4_2" value="1" <?=$value['f_4'] == 1 ? 'checked':''?>></center>
                                    </td>
                                    <td>
                                        <center><input type="radio" name="f_4" id="f_4_3" value="2" <?=$value['f_4'] == 2 ? 'checked':''?>></center>
                                    </td>
                                    <td>
                                        <center><input type="text" name="f_4_4" id="f_4_4" value="<?=$value['f_4_4']?>"></center>
                                    </td>
                                    <td>
                                        <textarea name="f_4_desc" id="f_4_desc" cols="30" rows="2"><?=$value['f_4_desc']?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>5.0 Matching of strategies with gender issues (possible scores: 0, 1.0, 2.0)
                                            Do the strategies and activities match the gender issues and gender equality
                                            goals identified?</b></td>
                                    <td>
                                        <center><input type="radio" name="f_5" id="f_5_1" value="0" <?=$value['f_5'] == 0 ? 'checked':''?>></center>
                                    </td>
                                    <td>
                                        <center><input type="radio" name="f_5" id="f_5_2" value="1" <?=$value['f_5'] == 1 ? 'checked':''?>></center>
                                    </td>
                                    <td>
                                        <center><input type="radio" name="f_5" id="f_5_3" value="2" <?=$value['f_5'] == 2 ? 'checked':''?>></center>
                                    </td>
                                    <td>
                                        <center><input type="text" name="f_5_4" id="f_5_4" value="<?=$value['f_5_4']?>"></center>
                                    </td>
                                    <td>
                                        <textarea name="f_5_desc" id="f_5_desc" cols="30" rows="2"><?=$value['f_5_desc']?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>6.0 Gender analysis of likely impacts of the project (max score: 2; for each
                                            item, 0.67)</b></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <center><input type="text" name="f_6" id="f_6" value="<?=$value['f_6']?>"></center>
                                    </td>
                                    <td>
                                        <textarea name="f_6_desc" id="f_6_desc" cols="30" rows="2"><?=$value['f_6_desc']?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:60%;">6.1 Are women and girl children among the direct or indirect
                                        beneficiaries?(possible scores: 0, 0.33, 0.67)</td>
                                    <td>
                                        <center><input type="radio" name="f_6_1" id="f_6_1_1" value="0" <?=$value['f_6_1'] == 0 ? 'checked':''?>>
                                        </center>
                                    </td>
                                    <td>
                                        <center><input type="radio" name="f_6_1" id="f_6_1_2" value="0.33" <?=$value['f_6_1'] == 0.33 ? 'checked':''?>></center>
                                    </td>
                                    <td>
                                        <center><input type="radio" name="f_6_1" id="f_6_1_3" value="0.67" <?=$value['f_6_1'] == 0.67 ? 'checked':''?>></center>
                                    </td>
                                    <td>
                                        <center><input type="text" name="f_6_1_4" id="f_6_1_4" value="<?=$value['f_6_1_4']?>"></center>
                                    </td>
                                    <td>
                                        <textarea name="f_6_1_desc" id="f_6_1_desc" cols="30" rows="2"><?=$value['f_6_1_desc']?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:60%;">6.2 Has the project considered its long- term impact on
                                        women’s socioeconomic status and empowerment? (possible scores: 0, 0.33, 0.67)
                                    </td>
                                    <td>
                                        <center><input type="radio" name="f_6_2" id="f_6_2_1" value="0" <?=$value['f_6_2'] == 0 ? 'checked':''?>>
                                        </center>
                                    </td>
                                    <td>
                                        <center><input type="radio" name="f_6_2" id="f_6_2_2" value="0.33" <?=$value['f_6_2'] == 0.33 ? 'checked':''?>></center>
                                    </td>
                                    <td>
                                        <center><input type="radio" name="f_6_2" id="f_6_2_3" value="0.67" <?=$value['f_6_2'] == 0.67 ? 'checked':''?>></center>
                                    </td>
                                    <td>
                                        <center><input type="text" name="f_6_2_4" id="f_6_2_4" value="<?=$value['f_6_2_4']?>"></center>
                                    </td>
                                    <td>
                                        <textarea name="f_6_2_desc" id="f_6_2_desc" cols="30" rows="2"><?=$value['f_6_2_desc']?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:60%;">6.3 Has the project included strategies for avoiding or
                                        minimizing negative impacts on women’s status and welfare? (possible scores: 0,
                                        0.33, 0.67)</td>
                                    <td>
                                        <center><input type="radio" name="f_6_3" id="f_6_3_1" value="0" <?=$value['f_6_3'] == 0 ? 'checked':''?>>
                                        </center>
                                    </td>
                                    <td>
                                        <center><input type="radio" name="f_6_3" id="f_6_3_2" value="0.33" <?=$value['f_6_3'] == 0.33 ? 'checked':''?>></center>
                                    </td>
                                    <td>
                                        <center><input type="radio" name="f_6_3" id="f_6_3_3" value="0.67" <?=$value['f_6_3'] == 0.67 ? 'checked':''?>></center>
                                    </td>
                                    <td>
                                        <center><input type="text" name="f_6_3_4" id="f_6_3_4" value="<?=$value['f_6_3_4']?>"></center>
                                    </td>
                                    <td>
                                        <textarea name="f_6_3_desc" id="f_6_3_desc" cols="30" rows="2"><?=$value['f_6_3_desc']?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>7.0 Monitoring targets and indicators (possible scores: 0, 1.0, 2.0) Does the
                                            project include gender equality targets and indicators to measure gender
                                            equality outputs and outcomes?</b></td>
                                    <td>
                                        <center><input type="radio" name="f_7" id="f_7_1" value="0" <?=$value['f_7'] == 0 ? 'checked':''?>></center>
                                    </td>
                                    <td>
                                        <center><input type="radio" name="f_7" id="f_7_2" value="1" <?=$value['f_7'] == 1 ? 'checked':''?></center>
                                    </td>
                                    <td>
                                        <center><input type="radio" name="f_7" id="f_7_3" value="2" <?=$value['f_7'] == 2 ? 'checked':''?></center>
                                    </td>
                                    <td>
                                        <center><input type="text" name="f_7_4" id="f_7_4" value="0" <?=$value['f_7_4']?></center>
                                    </td>
                                    <td>
                                        <textarea name="f_7_desc" id="f_7_desc" cols="30" rows="2"><?=$value['f_7_desc']?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>8.0 Sex-disaggregated database requirement (possible scores: 0, 1.0, 2.0)
                                            Does the project M&E system require the collection of sex-disaggregated
                                            data?</b></td>
                                    <td>
                                        <center><input type="radio" name="f_8" id="f_8_1" value="0" <?=$value['f_8'] == 0 ? 'checked':''?>></center>
                                    </td>
                                    <td>
                                        <center><input type="radio" name="f_8" id="f_8_2" value="1" <?=$value['f_8'] == 1 ? 'checked':''?>></center>
                                    </td>
                                    <td>
                                        <center><input type="radio" name="f_8" id="f_8_3" value="2" <?=$value['f_8'] == 2 ? 'checked':''?>></center>
                                    </td>
                                    <td>
                                        <center><input type="text" name="f_8_4" id="f_8_4" value="<?=$value['f_8_4']?>"></center>
                                    </td>
                                    <td>
                                        <textarea name="f_8_desc" id="f_8_desc" cols="30" rows="2"><?=$value['f_8_desc']?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>9.0 Resources (max score: 2; for each question, 1)</b></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <center><input type="text" name="f_9" id="f_9" value="<?=$value['f_9']?>"></center>
                                    </td>
                                    <td>
                                        <textarea name="f_9_desc" id="f_9_desc" cols="30" rows="2"><?=$value['f_9_desc']?></textarea>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="width:60%;">9.1 Is the budget allotted by the project sufficient for
                                        gender equality promotion or integration? OR, will the project tap counterpart
                                        funds from LGUs/partners for its GAD efforts? (possible scores: 0, 0.5, 1.0)
                                    </td>
                                    <td>
                                        <center><input type="radio" name="f_9_1" id="f_9_1_1" value="0" <?=$value['f_9_1'] == 0 ? 'checked':''?>>
                                        </center>
                                    </td>
                                    <td>
                                        <center><input type="radio" name="f_9_1" id="f_9_1_2" value="0.5" <?=$value['f_9_1'] == 0.5 ? 'checked':''?>></center>
                                    </td>
                                    <td>
                                        <center><input type="radio" name="f_9_1" id="f_9_1_3" value="1" <?=$value['f_9_1'] == 1 ? 'checked':''?>></center>
                                    </td>
                                    <td>
                                        <center><input type="text" name="f_9_1_4" id="f_9_1_4" value="<?=$value['f_9_1_4']?>"></center>
                                    </td>
                                    <td>
                                        <textarea name="f_9_1_desc" id="f_9_1_desc" cols="30" rows="2"><?=$value['f_9_1_desc']?></textarea>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="width:60%;">9.2 Does the project have the expertise to promote gender
                                        equality and women’s empowerment? OR, is the project committing itself to invest
                                        project staff time in building capacities within the project to integrate GAD or
                                        promote Gender equality? (possible scores: 0, 0.5, 1.0)</td>
                                    <td>
                                        <center><input type="radio" name="f_9_2" id="f_9_2_1" value="0" <?=$value['f_9_2'] == 0 ? 'checked':''?>>
                                        </center>
                                    </td>
                                    <td>
                                        <center><input type="radio" name="f_9_2" id="f_9_2_2" value="0.5" <?=$value['f_9_2'] == 0.5 ? 'checked':''?>></center>
                                    </td>
                                    <td>
                                        <center><input type="radio" name="f_9_2" id="f_9_2_3" value="1" <?=$value['f_9_2'] == 1 ? 'checked':''?>></center>
                                    </td>
                                    <td>
                                        <center><input type="text" name="f_9_2_4" id="f_9_2_4" value="<?=$value['f_9_2_4']?>"></center>
                                    </td>
                                    <td>
                                        <textarea name="f_9_2_desc" id="f_9_2_desc" cols="30" rows="2"><?=$value['f_9_2_desc']?></textarea>
                                    </td>
                                </tr>

                                <tr>
                                    <td><b>10. Relationship with the agency’s GAD efforts (max score: 2; for each
                                            question or item, 0.67)</b></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <center><input type="text" name="f_10" id="f_10" value="<?=$value['f_10']?>"></center>
                                    </td>
                                    <td>
                                        <textarea name="f_10_desc" id="f_10_desc" cols="30" rows="2"><?=$value['f_10_desc']?></textarea>
                                    </td>
                                </tr>


                                <tr>
                                    <td style="width:60%;">10.1 Will the project build on or strengthen the
                                        agency/NCRFW/ government’s commitment to the empowerment of women? (possible
                                        scores: 0, 0.33, 0.67)<br> IF THE AGENCY HAS NO GAD PLAN: Will the project help
                                        towards the formulation of the implementing agency’s GAD plan?</td>
                                    <td>
                                        <center><input type="radio" name="f_10_1" id="f_10_1_1" value="0" <?=$value['f_10_1'] == 0 ? 'checked':''?>>
                                        </center>
                                    </td>
                                    <td>
                                        <center><input type="radio" name="f_10_1" id="f_10_1_2" value="0.33" <?=$value['f_10_1'] == 0.33 ? 'checked':''?>></center>
                                    </td>
                                    <td>
                                        <center><input type="radio" name="f_10_1" id="f_10_1_3" value="0.67" <?=$value['f_10_1'] == 0.67 ? 'checked':''?>></center>
                                    </td>
                                    <td>
                                        <center><input type="text" name="f_10_1_4" id="f_10_1_4" value="<?=$value['f_10_1_4']?>"></center>
                                    </td>
                                    <td>
                                        <textarea name="f_10_1_desc" id="f_10_1_desc" cols="30" rows="2"><?=$value['f_10_1_desc']?></textarea>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="width:60%;">10.2 Will it build on the initiatives or actions of other
                                        organizations in the area? (possible scores: 0, 0.33, 0.67)</td>
                                    <td>
                                        <center><input type="radio" name="f_10_2" id="f_10_2_1" value="0" <?=$value['f_10_2'] == 0 ? 'checked':''?>>
                                        </center>
                                    </td>
                                    <td>
                                        <center><input type="radio" name="f_10_2" id="f_10_2_2" value="0.33" <?=$value['f_10_2'] == 0.33 ? 'checked':''?>></center>
                                    </td>
                                    <td>
                                        <center><input type="radio" name="f_10_2" id="f_10_2_3" value="0.67" <?=$value['f_10_2'] == 0.67 ? 'checked':''?>></center>
                                    </td>
                                    <td>
                                        <center><input type="text" name="f_10_2_4" id="f_10_2_4" value="<?=$value['f_10_2_4']?>"></center>
                                    </td>
                                    <td>
                                        <textarea name="f_10_2_desc" id="f_10_2_desc" cols="30" rows="2"><?=$value['f_10_2_desc']?></textarea>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="width:60%;">10.3 Does the project have an exit plan that will ensure the
                                        sustainability of GAD efforts and benefits? (possible scores: 0, 0.33, 0.67)
                                    </td>
                                    <td>
                                        <center><input type="radio" name="f_10_3" id="f_10_3_1" value="0" <?=$value['f_10_3'] == 0 ? 'checked':''?>>
                                        </center>
                                    </td>
                                    <td>
                                        <center><input type="radio" name="f_10_3" id="f_10_3_2" value="0.33" <?=$value['f_10_3'] == 0.33 ? 'checked':''?>></center>
                                    </td>
                                    <td>
                                        <center><input type="radio" name="f_10_3" id="f_10_3_3" value="0.67" <?=$value['f_10_3'] == 0.67 ? 'checked':''?>></center>
                                    </td>
                                    <td>
                                        <center><input type="text" name="f_10_3_4" id="f_10_3_4" value="<?=$value['f_10_3_4']?>"></center>
                                    </td>
                                    <td>
                                        <textarea name="f_10_3_desc" id="f_10_3_desc" cols="30" rows="2"><?=$value['f_10_3_desc']?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>TOTAL GAD SCORE FOR PROJECT DEVELOPMENT STAGE</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <center><input type="text" name="total_score" id="total_score" value="<?=$value['total_score']?>">
                                        </center>
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