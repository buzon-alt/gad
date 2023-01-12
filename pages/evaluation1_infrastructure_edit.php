<?php require '../controllers/db/connection.php';
SESSION_START();

$eid = $_GET['eid'];
$pid = $_GET['pid'];
$project = mysqli_query($con,"SELECT evaluation1_infra.*,e.attribution FROM evaluation1_infra left join evaluation as e on evaluation1_infra.id  = e.evaluation_id where evaluation1_infra.id = $eid");
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
                    <input type="hidden" name="project_type" value="Infrastructure">
                    <div class="col-md-12">
                        <h5><b>Instruction:</b>Put a check in the appropriate column to signify the degree to which a
                            project proponent has accomplished with each GAD criterion. Under column 2a if nothing has
                            been
                            done; under column 2b if the dimension or question has been partly accomplished or complied
                            with; and column 2c if the item has been fully complied with. </h5>
                        <table class="table" id="checklist" border="1" style="border-top:2px solid #333!important; border:0px solid #ddd;">
                            <thead>
                                <tr>
                                    <td rowspan="2">Dimension and Question <br>(Column 1)</td>
                                    <td colspan="3">
                                        <center>Response(col.2)</center>
                                    </td>
                                    <td rowspan="2">Score of the item or element <br>(col. 3)</td>
                                    <td rowspan="2">Result or Comment<br>(col. 4)</td>
                                </tr>
                                <tr>
                                    <td>No (2a)</td>
                                    <td>Partly(2b)</td>
                                    <td>Yes (2c)</td>
                                </tr>
                            </thead>
                            <tbody id="translist">
                                <tr>
                                    <td><b>1.0 Participation of women and men in project identification (max score: 2;
                                            for
                                            each
                                            item or question, 0.67)</b></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <center><input type="text" name="f_1" id="f_1" value="<?=$value['f_1']?>"
                                                style="font-weight:bold;">
                                        </center>
                                    </td>
                                    <td>
                                        <textarea name="f_1_desc" id="f_1_desc" cols="30" rows="2" ><?=$value['f_1_desc']?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:60%;">1.1 Has the project consulted women on the problem or issue
                                        that
                                        the intervention must solve and on the development of the solution? (possible
                                        scores: 0, 0.33, 0.67)</td>
                                    <td>
                                        <center><input type="radio" name="f_1_1" id="f_1_1_1" value="0" <?=$value['f_1_1'] == 0 ? 'checked':''?>>
                                        </center>
                                    </td>
                                    <td>
                                        <center><input type="radio" name="f_1_1" id="f_1_1_2" value="0.33" <?=$value['f_1_1'] == 0.33 ? 'checked':''?>></center>
                                    </td>
                                    <td>
                                        <center><input type="radio" name="f_1_1" id="f_1_1_2" value="0.67" <?=$value['f_1_1'] == 0.67 ? 'checked':''?>></center>
                                    </td>
                                    <td>
                                        <center><input type="text" name="f_1_1_4" id="f_1_1_4" value="<?=$value['f_1_1_4']?>" ></center>
                                    </td> 
                                    <td>
                                        <textarea name="f_1_1_desc" id="f_1_1_desc" cols="30" rows="2"><?=$value['f_1_1_desc']?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:60%;">1.2 Have women’s inputs been considered in the design of the
                                        project? (possible scores: 0, 0.33, 0.67)</td>
                                    <td>
                                        <center><input type="radio" name="f_1_2" id="f_1_2_1" value="0" <?=$value['f_1_2'] == 0 ? 'checked':''?>>
                                        </center>
                                    </td>
                                    <td>
                                        <center><input type="radio" name="f_1_2" id="f_1_2_2" value="0.33" <?=$value['f_1_2'] == 0.33 ? 'checked':''?>></center>
                                    </td>
                                    <td>
                                        <center><input type="radio" name="f_1_2" id="f_1_2_2" value="0.67" <?=$value['f_1_2'] == 0.67 ? 'checked':''?>></center>
                                    </td>
                                    <td>
                                        <center><input type="text" name="f_1_2_4" id="f_1_2_4" value="<?=$value['f_1_2_4']?>"></center>
                                    </td> 
                                    <td>
                                        <textarea name="f_1_2_desc" id="f_1_2_desc" cols="30" rows="2"><?=$value['f_1_2_desc']?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:60%;">1.3 Are both women and men seen as stakeholders, partners, or
                                        agents of change in the project design? (possible scores: 0, 0.33, 0.67)</td>
                                    <td>
                                        <center><input type="radio" name="f_1_3" id="f_1_3_1" value="0" <?=$value['f_1_3'] == 0 ? 'checked':''?>>
                                        </center>
                                    </td>
                                    <td>
                                        <center><input type="radio" name="f_1_3" id="f_1_3_2" value="0.33" <?=$value['f_1_3'] == 0.33 ? 'checked':''?>></center>
                                    </td>
                                    <td>
                                        <center><input type="radio" name="f_1_3" id="f_1_3_2" value="0.67" <?=$value['f_1_3'] == 0.67 ? 'checked':''?>></center>
                                    </td>
                                    <td>
                                        <center><input type="text" name="f_1_3_4" id="f_1_3_4" value="<?=$value['f_1_3_4']?>"></center>
                                    </td>
                                    <td>
                                        <textarea name="f_1_3_desc" id="f_1_3_desc" cols="30" rows="2"><?=$value['f_1_3_desc']?></textarea>
                                    </td>
                                </tr>

                                <tr>
                                    <td><b>2.0 Collection of sex-disaggregated data and gender-related information prior
                                            to
                                            project design </b>(possible scores: 0, 1.0, 2.0) <br>
                                        Has the project tapped sex-disaggregated data and gender-related information
                                        from
                                        secondary and primary sources at the project identification stage? OR, does the
                                        project document include sex-disaggregated and gender information in the
                                        analysis of
                                        the development issue or problem?
                                    </td>
                                    <td>
                                        <center><input type="radio" name="f_2" id="f_2_1" value="0" <?=$value['f_2'] == 0 ? 'checked':''?>>
                                        </center>
                                    </td>
                                    <td>
                                        <center><input type="radio" name="f_2" id="f_2_2" value="1" <?=$value['f_2'] == 1 ? 'checked':''?>></center>
                                    </td>
                                    <td>
                                        <center><input type="radio" name="f_2" id="f_2_3" value="2" <?=$value['f_2'] == 2 ? 'checked':''?>></center>
                                    </td>
                                    <td>
                                        <center><input type="text" name="f_2_4" id="f_2_4" value="<?=$value['f_2_4']?>"
                                                style="font-weight:bold;"></center>
                                    </td>
                                    <td>
                                        <textarea name="f_2_desc" id="f_2_desc" cols="30" rows="2"><?=$value['f_2_desc']?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>3.0 Conduct of gender analysis and identification of gender issues
                                        </b>(possible
                                        scores: 0, 1.0, 2.0) <br>
                                        (possible scores: 0, 1.0, 2.0). Has a gender analysis been done to identify
                                        gender
                                        issues prior to project design? OR, does the discussion of development issues in
                                        the
                                        project document include gender issues that the project must address?egated and
                                        gender information in the analysis of
                                        the development issue or problem?
                                    </td>
                                    <td>
                                        <center><input type="radio" name="f_3" id="f_3_1" value="0" <?=$value['f_3'] == 0 ? 'checked':''?>>
                                        </center>
                                    </td>
                                    <td>
                                        <center><input type="radio" name="f_3" id="f_3_2" value="1" <?=$value['f_3'] == 1 ? 'checked':''?>></center>
                                    </td>
                                    <td>
                                        <center><input type="radio" name="f_3" id="f_3_3" value="2" <?=$value['f_3'] == 2 ? 'checked':''?>></center>
                                    </td>
                                    <td>
                                        <center><input type="text" name="f_3_4" id="f_3_4" value="<?=$value['f_3_4']?>"
                                                style="font-weight:bold;"></center>
                                    </td> 
                                    <td>
                                        <textarea name="f_3_desc" id="f_3_desc" cols="30" rows="2"><?=$value['f_3_desc']?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>4.0 Gender equality goals, outcomes, and outputs </b>(max score: 2; for each
                                        item, 1)</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <center><input type="text" name="f_4" id="f_4" value="<?=$value['f_4']?>"
                                                style="font-weight:bold;">
                                        </center>
                                    </td>
                                    <td>
                                        <textarea name="f_4_desc" id="f_4_desc" cols="30" rows="2"><?=$value['f_4_desc']?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:60%;">4.1 Do project objectives explicitly refer to women and men?
                                        Do
                                        they target women’s and men’s need for infrastructure? (possible scores: 0, 0.5,
                                        1.0)</td>
                                    <td>
                                        <center><input type="radio" name="f_4_1" id="f_4_1_1" value="0" <?=$value['f_4_1'] == 0 ? 'checked':''?>>
                                        </center>
                                    </td>
                                    <td>
                                        <center><input type="radio" name="f_4_1" id="f_4_1_2" value="0.5" <?=$value['f_4_1'] == 0.5 ? 'checked':''?>></center>
                                    </td>
                                    <td>
                                        <center><input type="radio" name="f_4_1" id="f_4_1_3" value="1" <?=$value['f_4_1'] == 1 ? 'checked':''?>></center>
                                    </td>
                                    <td>
                                        <center><input type="text" name="f_4_1_4" id="f_4_1_4" value="<?=$value['f_4_1_4']?>"></center>
                                    </td>
                                    <td>
                                        <textarea name="f_4_1_desc" id="f_4_1_desc" cols="30" rows="2"><?=$value['f_4_1_desc']?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:60%;">4.2 Does the project have gender equality outputs or
                                        outcomes?
                                        (see examples in the text) (possible scores: 0, 0.5, 1.0)</td>
                                    <td>
                                        <center><input type="radio" name="f_4_2" id="f_4_2_1" value="0" <?=$value['f_4_2'] == 0 ? 'checked':''?>>
                                        </center>
                                    </td>
                                    <td>
                                        <center><input type="radio" name="f_4_2" id="f_4_2_2" value="0.5" <?=$value['f_4_2'] == 0.5 ? 'checked':''?>></center>
                                    </td>
                                    <td>
                                        <center><input type="radio" name="f_4_2" id="f_4_2_3" value="1" <?=$value['f_4_2'] == 1 ? 'checked':''?>></center>
                                    </td>
                                    <td>
                                        <center><input type="text" name="f_4_2_4" id="f_4_2_4" value="<?=$value['f_4_2_4']?>" ></center>
                                    </td>
                                    <td>
                                        <textarea name="f_4_2_desc" id="f_4_2_desc" cols="30" rows="2"><?=$value['f_4_2_desc']?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>5.0 Matching of strategies with gender issues </b>(max score: 2; for each
                                        item,
                                        1)</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <center><input type="text" name="f_5" id="f_5" value="<?=$value['f_5']?>"
                                                style="font-weight:bold;">
                                        </center>
                                    </td>
                                    <td>
                                        <textarea name="f_5_desc" id="f_5_desc" cols="30" rows="2"><?=$value['f_5_desc']?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:60%;">5.1 Do the strategies match the gender issues and gender
                                        equality
                                        goals identified? That is, will the activities or interventions reduce gender
                                        gaps
                                        and inequalities? (possible scores: 0, 0.5, 1.0)</td>
                                    <td>
                                        <center><input type="radio" name="f_5_1" id="f_5_1_1" value="0" <?=$value['f_5_1'] == 0 ? 'checked':''?>>
                                        </center>
                                    </td>
                                    <td>
                                        <center><input type="radio" name="f_5_1" id="f_5_1_2" value="0.5" <?=$value['f_5_1'] == 0.5 ? 'checked':''?>></center>
                                    </td>
                                    <td>
                                        <center><input type="radio" name="f_5_1" id="f_5_1_3" value="1" <?=$value['f_5_1'] == 1 ? 'checked':''?>></center>
                                    </td>
                                    <td>
                                        <center><input type="text" name="f_5_1_4" id="f_5_1_4" value="<?=$value['f_5_1_4']?>"></center>
                                    </td>
                                    <td>
                                        <textarea name="f_5_1_desc" id="f_5_1_desc" cols="30" rows="2"><?=$value['f_5_1_desc']?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:60%;">5.2 Does the project build on women’s and men’s knowledge and
                                        skills? (possible scores: 0, 0.5, 1.0)</td>
                                    <td>
                                        <center><input type="radio" name="f_5_2" id="f_5_2_1" value="0" <?=$value['f_5_2'] == 0 ? 'checked':''?>>
                                        </center>
                                    </td>
                                    <td>
                                        <center><input type="radio" name="f_5_2" id="f_5_2_2" value="0.5" <?=$value['f_5_2'] == 0.5 ? 'checked':''?>></center>
                                    </td>
                                    <td>
                                        <center><input type="radio" name="f_5_2" id="f_5_2_3" value="1" <?=$value['f_5_2'] == 1 ? 'checked':''?>></center>
                                    </td>
                                    <td>
                                        <center><input type="text" name="f_5_2_4" id="f_5_2_4" value="<?=$value['f_5_2_4']?>"></center>
                                    </td>
                                    <td>
                                        <textarea name="f_5_2_desc" id="f_5_2_desc" cols="30" rows="2"><?=$value['f_5_2_desc']?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>6.0. Gender analysis of the designed project</b>(max score: 2;)</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <center><input type="text" name="f_6" id="f_6" value="<?=$value['f_6']?>"
                                                style="font-weight:bold;">
                                        </center>
                                    </td> 
                                    <td>
                                        <textarea name="f_6_desc" id="f_6_desc" cols="30" rows="2"><?=$value['f_6_desc']?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:60%;">6.1 Gender division of labor (max score: 0.67; for each
                                        question,
                                        0.33)</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <center><input type="text" name="f_6_1_4" id="f_6_1_4" value="<?=$value['f_6_1_4']?>"></center>
                                    </td>
                                    <td>
                                        <textarea name="f_6_1_desc" id="f_6_1_desc" cols="30" rows="2"><?=$value['f_6_1_desc']?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:60%;">6.1.1 Has the project considered whether the infrastructure
                                        or
                                        participation in the project will affect current activities and responsibilities
                                        of
                                        women and men, girls and boys? (possible scores: 0, 0.17, 0.33)</td>
                                    <td>
                                        <center><input type="radio" name="f_6_1_1" id="f_6_1_1_1" value="0" <?=$value['f_6_1_1'] == 0 ? 'checked':''?>>
                                        </center>
                                    </td>
                                    <td>
                                        <center><input type="radio" name="f_6_1_1" id="f_6_1_1_2" value="0.17" <?=$value['f_6_1_1'] == 0.17 ? 'checked':''?>></center>
                                    </td>
                                    <td>
                                        <center><input type="radio" name="f_6_1_1" id="f_6_1_1_3" value="0.33" <?=$value['f_6_1_1'] == 0.33 ? 'checked':''?>></center>
                                    </td>
                                    <td>
                                        <center><input type="text" name="f_6_1_1_4" id="f_6_1_1_4" value="<?=$value['f_6_1_1_4']?>"></center>
                                    </td> 
                                    <td>
                                        <textarea name="f_6_1_1_desc" id="f_6_1_1_desc" cols="30" rows="2"><?=$value['f_6_1_1_desc']?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:60%;">6.1.2 Will the needs of women and men, including those
                                        affected
                                        by involuntary resettlement, be considered in the design of the infrastructure?
                                        (possible score: 0, 0.17, 0.33)</td>
                                    <td>
                                        <center><input type="radio" name="f_6_1_2" id="f_6_1_2_1" value="0" <?=$value['f_6_1_2'] == 0 ? 'checked':''?>>
                                        </center>
                                    </td>
                                    <td>
                                        <center><input type="radio" name="f_6_1_2" id="f_6_1_2_2" value="0.17" <?=$value['f_6_1_2'] == 0.17 ? 'checked':''?>></center>
                                    </td>
                                    <td>
                                        <center><input type="radio" name="f_6_1_2" id="f_6_1_2_3" value="0.33" <?=$value['f_6_1_2'] == 0.33 ? 'checked':''?>></center>
                                    </td>
                                    <td>
                                        <center><input type="text" name="f_6_1_2_4" id="f_6_1_2_4" value="<?=$value['f_6_1_2_4']?>"></center>
                                    </td>
                                    <td>
                                        <textarea name="f_6_1_2_desc" id="f_6_1_2_desc" cols="30" rows="2"></textarea>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="width:60%;">6.2 Access to and control of resources (max score: 0.67; for
                                        each
                                        question, 0.33)</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <center><input type="text" name="f_6_2_4" id="f_6_2_4" value="<?=$value['f_6_2_4']?>"></center>
                                    </td>
                                    <td>
                                        <textarea name="f_6_2_desc" id="f_6_2_desc" cols="30" rows="2"><?=$value['f_6_2_desc']?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:60%;">6.2.1 Will women and men have equal access to the
                                        infrastructure
                                        and other resources (including employment) distributed by the project? (possible
                                        score: 0, 0.17, 0.33) </td>
                                    <td>
                                        <center><input type="radio" name="f_6_2_1" id="f_6_2_1_1" value="0" <?=$value['f_6_2_1'] == 0 ? 'checked':''?>>
                                        </center>
                                    </td>
                                    <td>
                                        <center><input type="radio" name="f_6_2_1" id="f_6_2_1_2" value="0.17" <?=$value['f_6_2_1'] == 0.17 ? 'checked':''?>></center>
                                    </td>
                                    <td>
                                        <center><input type="radio" name="f_6_2_1" id="f_6_2_1_3" value="0.33" <?=$value['f_6_2_1'] == 0.33 ? 'checked':''?>></center>
                                    </td>
                                    <td>
                                        <center><input type="text" name="f_6_2_1_4" id="f_6_2_1_4" value="<?=$value['f_6_2_1_4']?>"></center>
                                    </td>
                                    <td>
                                        <textarea name="f_6_2_1_desc" id="f_6_2_1_desc" cols="30" rows="2"><?=$value['f_6_2_1_desc'] == 0 ? 'checked':''?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:60%;">6.2.2 Will women be involved in the decision making over
                                        rules
                                        for the use and operation and maintenance of the infrastructure or
                                        transport-related
                                        resources? (possible score: 0, 0.17, 0.33)</td>
                                    <td>
                                        <center><input type="radio" name="f_6_2_2" id="f_6_2_2_1" value="0" <?=$value['f_6_2_2'] == 0 ? 'checked':''?>>
                                        </center>
                                    </td>
                                    <td>
                                        <center><input type="radio" name="f_6_2_2" id="f_6_2_2_2" value="0.17" <?=$value['f_6_2_2'] == 0.17 ? 'checked':''?>></center>
                                    </td>
                                    <td>
                                        <center><input type="radio" name="f_6_2_2" id="f_6_2_2_3" value="0.33" <?=$value['f_6_2_2'] == 0.33 ? 'checked':''?>></center>
                                    </td>
                                    <td>
                                        <center><input type="text" name="f_6_2_2_4" id="f_6_2_2_4" value="<?=$value['f_6_2_2_4']?>"></center>
                                    </td>
                                    <td>
                                        <textarea name="f_6_2_2_desc" id="f_6_2_2_desc" cols="30" rows="2"><?=$value['f_6_2_2_desc']?></textarea>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="width:60%;">6.3 Constraints (max score: 0.67; for each item, 0.33)</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <center><input type="text" name="f_6_3_4" id="f_6_3_4" value="<?=$value['f_6_3_4']?>"></center>
                                    </td>
                                    <td>
                                        <textarea name="f_6_3_desc" id="f_6_3_desc" cols="30" rows="2"><?=$value['f_6_3_desc']?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:60%;">6.3.1 Is the proposed infrastructure socially or culturally
                                        acceptable and accessible to women? Or, can they use it? ( possible scores: 0,
                                        0.17,
                                        0.33)</td>
                                    <td>
                                        <center><input type="radio" name="f_6_3_1" id="f_6_3_1_1" value="0" <?=$value['f_6_3_1'] == 0 ? 'checked':''?>>
                                        </center>
                                    </td>
                                    <td>
                                        <center><input type="radio" name="f_6_3_1" id="f_6_3_1_2" value="0.17" <?=$value['f_6_3_1'] == 0.17 ? 'checked':''?>></center>
                                    </td>
                                    <td>
                                        <center><input type="radio" name="f_6_3_1" id="f_6_3_1_3" value="0.33" <?=$value['f_6_3_1'] == 0.33 ? 'checked':''?>></center>
                                    </td>
                                    <td>
                                        <center><input type="text" name="f_6_3_1_4" id="f_6_3_1_4" value="<?=$value['f_6_3_1_4']?>"></center>
                                    </td>
                                    <td>
                                        <textarea name="f_6_3_1_desc" id="f_6_3_1_desc" cols="30" rows="2"><?=$value['f_6_3_1_desc']?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:60%;">6.3.2 Has the project designed measures to address
                                        constraints to
                                        equal participation and benefits of women and men? (possible scores: 0, 0.17,
                                        0.33)
                                    </td>
                                    <td>
                                        <center><input type="radio" name="f_6_3_2" id="f_6_3_2_1" value="0" <?=$value['f_6_3_2'] == 0 ? 'checked':''?>>
                                        </center>
                                    </td>
                                    <td>
                                        <center><input type="radio" name="f_6_3_2" id="f_6_3_2_2" value="0.17" <?=$value['f_6_3_2'] == 0.17 ? 'checked':''?>></center>
                                    </td>
                                    <td>
                                        <center><input type="radio" name="f_6_3_2" id="f_6_3_2_3" value="0.33" <?=$value['f_6_3_2'] == 0.33 ? 'checked':''?>></center>
                                    </td>
                                    <td>
                                        <center><input type="text" name="f_6_3_2_4" id="f_6_3_2_4" value="<?=$value['f_6_3_2_4']?>"></center>
                                    </td>
                                    <td>
                                        <textarea name="f_6_3_2_desc" id="f_6_3_2_desc" cols="30" rows="2"><?=$value['f_6_3_2_desc']?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>7.0 Monitoring targets and indicators </b>(possible scores:0, 1.0, 2.0) <br>
                                        Does
                                        the project include gender equality targets and indicators for welfare, access,
                                        consciousness raising, participation, and control? For instance, will the
                                        following
                                        gender differences be monitored:</td>
                                    <td>
                                        <center><input type="radio" name="f_7" id="f_7_1" value="0" <?=$value['f_7'] == 0 ? 'checked':''?>>
                                        </center>
                                    </td>
                                    <td>
                                        <center><input type="radio" name="f_7" id="f_7_2" value="1" <?=$value['f_7'] == 1 ? 'checked':''?>></center>
                                    </td>
                                    <td>
                                        <center><input type="radio" name="f_7" id="f_7_3" value="2" <?=$value['f_7'] == 2 ? 'checked':''?>></center>
                                    </td>
                                    <td>
                                        <center><input type="text" name="f_7_4" id="f_7_4" value="<?=$value['f_7_4']?>"
                                                style="font-weight:bold;"></center>
                                    </td>
                                    <td>
                                        <textarea name="f_7_desc" id="f_7_desc" cols="30" rows="2"><?=$value['f_7_desc']?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td> -- Utilization rate of the infrastructure or facility <br>
                                        -- Membership and leadership in users’ organizations <br>
                                        -- Participation in training and similar project activities, by type of training
                                        Or activity <br>
                                        -- Employment generated by the project <br>
                                        -- Loss of livelihood as a result of the project <br>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>

                                <tr>
                                    <td><b>8.0 Sex-disaggregated database</b>(possible scores: 0, 1.0, 2.0) Does the
                                        proposed project monitoring framework or plan include the collection of
                                        sex-disaggregated data?

                                    </td>
                                    <td>
                                        <center><input type="radio" name="f_8" id="f_8_1" value="0" <?=$value['f_8'] == 0 ? 'checked':''?>>
                                        </center>
                                    </td>
                                    <td>
                                        <center><input type="radio" name="f_8" id="f_8_2" value="1" <?=$value['f_8'] == 1 ? 'checked':''?>></center>
                                    </td>
                                    <td>
                                        <center><input type="radio" name="f_8" id="f_8_3" value="2" <?=$value['f_8'] == 2 ? 'checked':''?>></center>
                                    </td>
                                    <td>
                                        <center><input type="text" name="f_8_4" id="f_8_4" value="<?=$value['f_8_4']?>"
                                                style="font-weight:bold;"></center>
                                    </td>
                                    <td>
                                        <textarea name="f_8_desc" id="f_8_desc" cols="30" rows="2"><?=$value['f_8_desc']?></textarea>
                                    </td>
                                </tr>

                                <tr>
                                    <td><b>9.0 Resources </b>(max score: 2; for each question, 1) </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <center><input type="text" name="f_9_4" id="f_9_4" value="<?=$value['f_9_4']?>"
                                                style="font-weight:bold;"></center>
                                    </td>
                                    <td>
                                        <textarea name="f_9_desc" id="f_9_desc" cols="30" rows="2"><?=$value['f_9_desc']?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>9.1 Is the budget allotted by the project sufficient for gender equality
                                        promotion
                                        or integration? (possible scores: 0, 0.5, 1.0)</td>
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
                                    <td>9.2 Does the project have the expertise to integrate GAD or promote gender
                                        equality
                                        and women’s empowerment? OR, will the project invest in building capacity for
                                        integrating GAD or promoting gender equality? (possible scores: 0, 0.5, 1.0)
                                    </td>
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
                                        <center><input type="text" name="f_9_2_4" id="f_9_2_4" value=" <?=$value['f_9_2_4']?>"></center>
                                    </td>
                                    <td>
                                        <textarea name="f_9_2_desc" id="f_9_2_desc" cols="30" rows="2"> <?=$value['f_9_2_desc']?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>10.0 Relationship with the agency’s GAD efforts </b>(max score: 2; for each
                                        item
                                        or question, 0.67)</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <center><input type="text" name="f_10_4" id="f_10_4" value="<?=$value['f_10_4']?>"
                                                style="font-weight:bold;"></center>
                                    </td>
                                    <td>
                                        <textarea name="f_10_desc" id="f_10_desc" cols="30" rows="2"><?=$value['f_10_desc']?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>10.1 Will the project build on or strengthen agency/NCRFW/ government’s
                                        commitment
                                        to the advancement of women? (possible scores: 0, 0.33, 0.67)</td>
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
                                    <td>10.2 Does the project have an exit plan that will ensure the sustainability of
                                        GAD
                                        efforts and benefits? (possible scores: 0, 0.33, 0.67)</td>
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
                                    <td>10.3 Will the project build on the initiatives or actions of other organizations
                                        in
                                        the area? (possible scores: 0, 0.33, 0.67)</td>
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
                                    <td>TOTAL GAD SCORE – PROJECT IDENTIFICATION AND DESIGN STAGES</td>
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
                        <select class="form-control" name="status">
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
                            <button type="submit" class="btn btn-primary">Submit</button>
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
  $('#checklist').on('click', 'input[type="radio"]', function() {
        var score = $(this).closest("tr").find("input[type='radio']:checked").val();
        $(this).closest("tr").find("input[type='text']").val(score);


        var f_1_1_4 = Number($("#f_1_1_4").val());
        var f_1_2_4 = Number($("#f_1_2_4").val());
        var f_1_3_4 = Number($("#f_1_3_4").val());
        var f_1 = $("#f_1").val(parseFloat(f_1_1_4 + f_1_2_4 + f_1_3_4).toFixed(2));

        var f_4_1_4 = Number($("#f_4_1_4").val());
        var f_4_2_4 = Number($("#f_4_2_4").val());
        var f_4 = $("#f_4").val(f_4_1_4 + f_4_2_4);

        var f_5_1_4 = Number($("#f_5_1_4").val());
        var f_5_2_4 = Number($("#f_5_2_4").val());
        var f_5 = $("#f_5").val(f_5_1_4 + f_5_2_4);

        var f_6_1_1_4 = Number($("#f_6_1_1_4").val());
        var f_6_1_2_4 = Number($("#f_6_1_2_4").val()); 
        var f_6_1_4 = $("#f_6_1_4").val(parseFloat(f_6_1_1_4 + f_6_1_2_4).toFixed(2));

        var f_6_2_1_4 = Number($("#f_6_2_1_4").val());
        var f_6_2_2_4 = Number($("#f_6_2_2_4").val()); 
        var f_6_2_4 = $("#f_6_2_4").val(parseFloat(f_6_2_1_4 + f_6_2_2_4).toFixed(2));

        var f_6_3_1_4 = Number($("#f_6_3_1_4").val());
        var f_6_3_2_4 = Number($("#f_6_3_2_4").val()); 
        var f_6_3_4 = $("#f_6_3_4").val(parseFloat(f_6_3_1_4 + f_6_3_2_4).toFixed(2));

        $("#f_6").val(parseFloat(Number($("#f_6_1_4").val()) + Number($("#f_6_2_4").val()) + Number($("#f_6_3_4").val())).toFixed(2));


        var f_9_1_4 = Number($("#f_9_1_4").val());
        var f_9_2_4 = Number($("#f_9_2_4").val());
        var f_9 = $("#f_9_4").val(f_9_1_4 + f_9_2_4);

        var f_10_1_4 = Number($("#f_10_1_4").val());
        var f_10_2_4 = Number($("#f_10_2_4").val());
        var f_10_3_4 = Number($("#f_10_3_4").val());
        var f_10 = $("#f_10_4").val(parseFloat(f_10_1_4 + f_10_2_4 + f_10_3_4).toFixed(2));

        var total_score = Number($("#f_1").val()) + Number($("#f_2_4").val()) + Number($("#f_3_4").val()) + Number($("#f_4").val()) + Number($("#f_5").val()) + Number($("#f_6").val()) + Number($("#f_7_4").val())  + Number($("#f_8_4").val()) + Number($("#f_9_4").val()) + Number($("#f_10_4").val());

        $("#total_score").val(parseFloat(total_score).toFixed(2));
        var interpretation = "";
        if (total_score >= 0 && total_score <= 3.9) {
            interpretation = "GAD is invisible in the project (proposal is returned).";
        } else if (total_score >= 4 && total_score <= 7.9) {
            interpretation = 'Proposed project has promising GAD prospects (proposal earns a “conditional pass,” pending identification of gender issues and strategies and activities to address these, and inclusion of the collection of sex-disaggregated data in the monitoring and evaluation plan).';
        } else if (total_score >= 8 && total_score <= 14.9) {
            interpretation = "Proposed project is gender-sensitive (proposal passes the GAD test).";
        } else if (total_score > 15) {
            interpretation = "Proposed project is gender-responsive (proponent is commended).";
        }

        let attribution = parseFloat((<?php echo $projectname['project_cost']?> * total_score) / (20 * 1)).toFixed(2); 
        
        $("#attribution").val(attribution);
        $("#interpretation").val(interpretation);
        $("#interpretationtext").text(interpretation);
    });



    $('#submit_evaluation1').on('submit', function() {
        event.preventDefault();
        var formData = new FormData($(this)[0]); 

        url = '../php/update_evalution1_infra.php';
        fetch(url, {
                method: 'post',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                },
                body: formData,
            })
            .then(response => response.json())
            .then(data => {
                if (data.status_code == 201) {
                    location.href = "evaluation.php?pid="+data.project_id+"&projecttype="+data.project_type; 
                } else {
                    $('#message').html('<p class="text-danger">' + data.message + '</p>');
                }
            })
            .catch(function(error) {

            });
    })
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