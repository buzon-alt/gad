<?php require '../controllers/db/connection.php';
SESSION_START();
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

   
    <style media="screen">
    input[type=month]::-webkit-inner-spin-button,
    input[type=month]::-webkit-outer-spin-button {
        -webkit-appearance: none;
    }

    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
    }

    input[type="number"] {
        border: 0px;
        text-align: center;
    }

    .unstyled::-webkit-inner-spin-button,
    .unstyled::-webkit-calendar-picker-indicator {
        display: none;
        -webkit-appearance: none;
    }

    tr td {
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
            <?php require '../popups/payslip.php' ?>

            <div class="row" style="padding-top:10px;">
                <div class="col-md-6">
                    <h4>Evaluations</h4>
                </div>
                <div class="col-md-3 pull-right" style=" padding-top: 10px;padding-bottom: 10px;">
                <?php
                if($_SESSION['usertype'] == 'Administrator' && isset($_GET['pid'])){
                    ?>
                    <a href="evaluation2.php?pid=<?=$_GET['pid']?>&projecttype=<?=$_GET['projecttype']?>" class="btn btn-primary btn-sm pull-right">Evaluation 2</a>
                    <a href="<?=$_GET['projecttype'] =='Generic'? 'evaluation1_generic.php':'evaluation1_infrastructure.php';?>?pid=<?=$_GET['pid']?>&projecttype=<?=$_GET['projecttype']?>" class="btn btn-primary btn-sm pull-right" style="margin-right:10px;">Evaluation 1</a>
                    <?php
                }
                
                ?>
                
             </div>
            </div>
            <!-- /.row -->

        
            <div class="row">
                <div class="col-md-12">
                    <table class="table" style="border-top:2px solid #333!important; border:0px solid #ddd;">
                        <thead>
                            <tr>
                                <td>Project Title</td> 
                                <td>Evaluation</td> 
                                <td>Score</td>
                                <td>Date Created</td>
                                <td>Interpretation</td>
                                <td style="text-align:right; padding-right:50px;">Attribution</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody id="translist">
                        <?php
                          
                          if (isset($_GET['pid'])) {
                            $pid = $_GET['pid']; 
                            $evaluation = mysqli_query($con,"SELECT e.id, e.project_id, e.evaluation_id, e.evaluation, e.type, e.score, e.attribution, e.interpretation, DATE(e.date_created) AS date_created, p.project_title,p.project_type FROM evaluation as e  left join projects as p on e.project_id = p.id where e.project_id = $pid"); 
                          }else {  
                            $evaluation = mysqli_query($con,"SELECT e.id, e.project_id, e.evaluation_id, e.evaluation, e.type, e.score, e.attribution, e.interpretation, DATE(e.date_created) AS date_created, p.project_title,p.project_type FROM evaluation as e left join projects as p on e.project_id = p.id "); 
                          }
                           if (mysqli_num_rows($evaluation) == 0) {
                            echo "No Evaluation";
                          }
                          while ($value = mysqli_fetch_array($evaluation)) {
                            echo '<tr>
                              <td>'.$value['project_title'].'</td>
                              <td>'.$value['evaluation'].'</td>
                              <td>'.$value['score'].'</td>
                              <td>'.$value['date_created'].'</td>
                              <td>'.$value['interpretation'].'</td>
                              <td style="text-align:right; padding-right:50px;">
                                <span>&#8369;</span>
                                <span>'.number_format($value['attribution'],2).'</span>
                              </td>
                              <td>';
                              
                              if ($_SESSION["usertype"] == 'Administrator') {
                                echo'<a class="btn-sm" href="'.($value['evaluation'] == 'Evaluation 1' ? ($value['type'] == 'Infrastructure' ? 'evaluation1_infrastructure_edit.php?pid='.$value['project_id'].'&eid='.$value['evaluation_id']:'evaluation1_generic_edit.php?pid='.$value['project_id'].'&eid='.$value['evaluation_id']):'evaluation2_edit.php?pid='.$value['project_id'].'&eid='.$value['evaluation_id'].'&projecttype='.$value['project_type']).'"><i class="fa fa-pencil"></i> Edit</a>&nbsp;';
                              }
                              
                            


                              echo'<a class="btn-sm" href="'.($value['evaluation'] == 'Evaluation 1' ? ($value['type'] == 'Infrastructure' ? 'evaluation1_infrastructure_view.php?pid='.$value['project_id'].'&eid='.$value['evaluation_id']:'evaluation1_generic_view.php?pid='.$value['project_id'].'&eid='.$value['evaluation_id']):'evaluation2_view.php?pid='.$value['project_id'].'&eid='.$value['evaluation_id'].'&projecttype='.$value['project_type']).'"><i class="fa fa-eye"></i> View</a>
                              <a class="btn-sm" href="'.($value['evaluation'] == 'Evaluation 1' ? ($value['type'] == 'Infrastructure' ? 'evaluation1_infrastructure_print.php?pid='.$value['project_id'].'&eid='.$value['evaluation_id']:'evaluation1_generic_print.php?pid='.$value['project_id'].'&eid='.$value['evaluation_id']):'evaluation2_print.php?pid='.$value['project_id'].'&eid='.$value['evaluation_id'].'&projecttype='.$value['project_type']).'" target="_blank"><i class="fa fa-print"></i> Print</a>
                              </td>
                            </tr>';
                          }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- /.row -->

        </div>
        <!-- /#page-wrapper -->

    </div>


    </div>


    <script type="text/javascript">
    function submitNewFolder() {
        var folderNumber = document.getElementById("folderNumber").value;
        var folderName = document.getElementById("folderName").value;

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "../php/addfolder.php?folderNumber=" + folderNumber + "&folderName=" + folderName, false);
        xmlhttp.send(null);
        var notify = xmlhttp.responseText;
        notify = notify.trim();


        if (notify == 'success') {
            location.reload();
        } else {
            alert(notify);
        }

    }


    function thousands_separators(num) {
        var num_parts = num.toString().split(".");
        num_parts[0] = num_parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        return num_parts.join(".");
    }

    function printInventory(val) {
        window.open('printInventory.php?mnth=' + val, 'Inventory Report',
            'toolbar=0,location=0,menubar=0,width=1000,height=600,top=50,left=50');
    }
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