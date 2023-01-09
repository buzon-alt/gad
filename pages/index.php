<?php require '../controllers/db/connection.php';
SESSION_START();

if (empty($_SESSION['id_session'])) {
    header("location: login.php");
}
 
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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- /.navbar-header -->
            <?php require 'sideUser.php'; ?>
            <!-- /.navbar-static-side -->
             

        <div id="page-wrapper">
          <br>
            <!-- /.row -->
            <div class="row"> 

                <?php
                
                $total_projects = mysqli_query($con,"SELECT status from projects ");
                $complete_data = mysqli_query($con,"SELECT status from projects where status = 'Complete'");
                $ongoing_data = mysqli_query($con,"SELECT status from projects where status <> 'Complete' AND status <> 'Pending'");
                $pending_data = mysqli_query($con,"SELECT status from projects where status = 'Pending'");
                
                ?>
                
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-default" style="border:2px solid #337ab7;">
                        <div class="panel-heading" style="height:150px; background-color:#f5f9ff;">
                            <div class="row"> 
                                <div class="col-xs-12 text-center">
                                      <h1 style="font-size:80px; color:#337ab7;"><?= !empty($total_projects)? mysqli_num_rows($total_projects) : '0';?></h1>
                                </div>
                            </div>
                        </div> 
                        <div class="panel-footer text-center" style=" background-color:#f5f9ff;">
                            <span class=""><a href="projects.php">TOTAL PROJECT <i class="fa fa-arrow-right"></i></a> </span>
                            <div class="clearfix"></div>
                        </div> 
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-default" style="border:2px solid #7da800;">
                        <div class="panel-heading" style="height:150px; background-color:#faffed;">
                            <div class="row"> 
                                <div class="col-xs-12 text-center">
                                      <h1 style="font-size:80px; color:#7da800;"><?= !empty($complete_data)? mysqli_num_rows($complete_data) : '0';?></h1>
                                </div>
                            </div>
                        </div> 
                        <div class="panel-footer text-center" style=" background-color:#faffed;"> 
                        <span class=""><a href="projects.php?department=&status=Complete&year_submitted=2022&project_title=&submit=">TOTAL COMPLETE <i class="fa fa-arrow-right"></i></a> </span>
                            <div class="clearfix"></div>
                        </div> 
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-default" style="border:2px solid #d89800;">
                        <div class="panel-heading" style="height:150px; background-color:#fff9e3;">
                            <div class="row"> 
                                <div class="col-xs-12 text-center">
                                      <h1 style="font-size:80px; color:#d89800;"><?= !empty($ongoing_data)? mysqli_num_rows($ongoing_data) : '0';?></h1>
                                </div>
                            </div>
                        </div> 
                        <div class="panel-footer text-center" style=" background-color:#fff9e3;"> 
                            <span class=""><a href="projects.php?department=&status=Ongoing&year_submitted=2022&project_title=&submit=">TOTAL ONGOING EVALUATION <i class="fa fa-arrow-right"></i></a> </span> 
                            <div class="clearfix"></div>
                        </div> 
                    </div>
                </div> 
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-default" style="border:2px solid #858585;">
                        <div class="panel-heading" style="height:150px; background-color:#fff9e3;">
                            <div class="row"> 
                                <div class="col-xs-12 text-center">
                                      <h1 style="font-size:80px; color:#858585;"><?= !empty($pending_data)? mysqli_num_rows($pending_data) : '0';?></h1>
                                </div>
                            </div>
                        </div> 
                        <div class="panel-footer text-center" style=" background-color:#fff9e3;"> 
                            <span class=""><a href="projects.php?department=&status=Pending&year_submitted=2022&project_title=&submit=">TOTAL PENDING <i class="fa fa-arrow-right"></i></a> </span> 
                            <div class="clearfix"></div>
                        </div> 
                    </div>
                </div> 

            </div>
            <!-- /.row -->
            <hr>
            <div class="row">
            <div class="col-md-12">
                <table class="table table-responsive" style="border-top:2px solid #333!important; border:0px solid #ddd;">
                    <thead>
                      <tr> 
                        <td>Project Title</td>
                        <td>Project Cost</td> 
                        <td>Department/UnitCollege</td>
                        <td>Project Leader</td>
                        <td>Project Duration</td>
                        <td>Project Location</td>
                        <td>Status</td>
                        <td>Date Submitted</td> 
                      </tr>
                    </thead>
                    <tbody id="translist">
                      <?php
                      $user_id = $_SESSION['user_id'];

                      if (!isset($_GET['submit'])) {
                        if ($_SESSION['usertype'] == 'Proponent') { 
                          $project = mysqli_query($con,"SELECT p.*,u.name FROM proponents LEFT JOIN projects as p ON proponents.project_id = p.id LEFT JOIN users as u ON p.project_leader = u.id where proponents.users_id = '$user_id'");
                        }else {
                          $project = mysqli_query($con,"SELECT projects.*,u.name FROM projects LEFT JOIN users as u ON projects.project_leader = u.id where status <> 'Complete'");
                        }
                      }else{
                        $department = $_GET['department'];
                        $project_title = $_GET['project_title'];
                        $year_submitted = $_GET['year_submitted']; 
                        if ($_SESSION['usertype'] == 'Proponent') { 
                          $project = mysqli_query($con,"SELECT projects.*,u.name FROM projects LEFT JOIN proponents as p ON projects.id = p.project_id LEFT JOIN users as u ON projects.project_leader = u.id where project_title LIKE '%$project_title%' AND department = '$department' AND YEAR(date_submitted) = '$year_submitted' AND  p.users_id = '$user_id'");
                        }else {
                          $project = mysqli_query($con,"SELECT projects.*,u.name FROM projects LEFT JOIN users as u ON projects.project_leader = u.id where project_title LIKE '%$project_title%' AND department = '$department' AND YEAR(date_submitted) = '$year_submitted'");
                        }
                        
                      }
 
                        while ($value = mysqli_fetch_array($project)) { 
                          echo '<tr> 
                          <td>'.$value['project_title'].'</td>
                          <td style="text-align:right;">'.number_format($value['project_cost'],2).'</td>
                          <td>'.$value['department'].'</td>
                          <td>'.$value['name'].'</td>
                          <td>'.$value['project_duration'].'</td>
                          <td>'.$value['project_location'].'</td>
                          <td>'.$value['status'].'</td>
                          <td>'.$value['date_submitted'].'</td> 
                           </tr>';
                        }

                      ?>
                    </tbody>
                </table>
              </div>
            </div>

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../vendor/raphael/raphael.min.js"></script>
    <script src="../vendor/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
