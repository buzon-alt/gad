<?php require '../controllers/db/connection.php';
SESSION_START();

$status = "";
$department = $_SESSION['department'];
global $project_title;
$year_submitted = 2022;  
if (isset($_GET['submit'])) { 
  $status = $_GET['status'];
  if (isset($_GET['department'])) {
    $department = $_GET['department'];
  } 
  $project_title = $_GET['project_title'];
  $year_submitted = $_GET['year_submitted'];   
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
    <link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style media="screen">
    input[type=month]::-webkit-inner-spin-button,
input[type=month]::-webkit-outer-spin-button {
-webkit-appearance: none;
}
    input[type=number]::-webkit-inner-spin-button,
input[type=number]::-webkit-outer-spin-button {
-webkit-appearance: none;
}

input[type="number"]{
  border:0px;
  text-align:center;
}

.unstyled::-webkit-inner-spin-button,
.unstyled::-webkit-calendar-picker-indicator {
    display: none;
    -webkit-appearance: none;
}

tr td{
  vertical-align: middle!important;
}
    </style>

<script type = "text/javascript">
    var cols = new Array();
    cols[0]="A";
    cols[1]="B";
    cols[2]="C";

    function EditModal(_row){
    
      document.getElementById("fnum").value = document.getElementById("row"+_row+cols[0]).innerHTML;
      document.getElementById("fnam").value = document.getElementById("row"+_row+cols[1]).innerHTML;
      document.getElementById("identt").value = document.getElementById("row"+_row+cols[2]).innerHTML;
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

          <div class="row"> 
              <div class="col-md-12">
                
                <?php if (!empty($_SESSION['message'])) {
                    echo '<div class="bg-success" style="padding:5px;">'.$_SESSION['message'].'</div>';
                    $_SESSION['message'] = '';
                  }?>
                
                  <h4>LIST OF PROJECTS</h4>
              </div>
              <div class="col-md-9">
                <form class="form-inline" action="" method="GET">
                  <?php   if ($_SESSION['usertype'] == 'Administrator'){?>
                  <label for="">Department</label> 
                  <select class="form-control input-sm" name="department" id="department">
                    <option value="" ></option>
                    <?php 
                    $departmentlist = mysqli_query($con,"SELECT office FROM users GROUP BY office");
                    while ($value = mysqli_fetch_array($departmentlist)) {  
                    ?> 
                    <option value="<?=$value['office']?>" <?=$value['office'] == $department ? (isset($_GET['department'])?'selected':''):'';?>  ><?=$value['office']?>    </option>
                    <?php 
                    } 
                    ?>
                  </select>
                  <?php 
                    } 
                
                    ?>
                  <label for="">Status:</label>
                  <select class="form-control" name="status">
                            <option value=""></option>
                            <option value="Pending" <?=$status == 'Pending' ? 'selected':''?>>Pending</option>
                            <option value="Evaluation 1 Complete" <?=$status == 'Evaluation 1 Complete' ? 'selected':''?>>Evaluation 1 Complete</option>
                            <option value="Evaluation 1 Re-evaluate" <?=$status == 'Evaluation 1 Re-evaluate' ? 'selected':''?>>Evaluation 1 Re-evaluate</option>
                            <option value="Evaluation 2 Re-evaluate" <?=$status == 'Evaluation 2 Re-evaluate' ? 'selected':''?>>Evaluation 2 Re-evaluate</option>
                            <option value="Complete" <?=$status == 'Complete' ? 'selected':''?>>Complete</option>
                        </select>
              
                  <label for="">Year</label>
                  <select class="form-control input-sm" name="year_submitted" id="year_submitted">
                    <?php 
                      $year = 2022;
                      for ($i=0; $i < 20; $i++) { 
                        echo '<option value="'.$year.'"  '.($year_submitted == $year? 'selected':'').'  >'.$year.'</option>';
                        
                        $year = $year + 1;
                      }
                    
                    ?>
                  </select>
                  <label for="">Project Title</label>
                  <input type="text" class="form-control input-sm" name="project_title" value="<?=(isset($_GET['project_title'])? $_GET['project_title']:'');?>">
                
                  <button type="submit" name="submit">Search</button>
                </form>
              </div>
              <?php  if ($_SESSION['usertype'] == 'Administrator' ) {?>
              <div class="col-md-3 pull-right" style="margin-bottom: 10px;">
                <a href="addprojects.php" class="btn btn-primary btn-sm pull-right" >Add Project</a>
              </div>
              <?php } ?>
            </div>  
            <!-- /.row -->
            <div class="row">
              <div class="col-md-12 table-responsive">
                <table class="table " style="border-top:2px solid #333!important; border:0px solid #ddd;">
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
                        <td  style="text-align:center;"></td>
                      </tr>
                    </thead>
                    <tbody id="translist">
                      <?php 
                      $user_id = $_SESSION['user_id'];
                      if (!isset($_GET['submit'])) {
                        if ($_SESSION['usertype'] == 'Proponent' ) {
                        
                          $project = mysqli_query($con,"SELECT p.*,u.name FROM proponents LEFT JOIN projects as p ON proponents.project_id = p.id LEFT JOIN users as u ON p.project_leader = u.id where proponents.users_id = '$user_id' AND department = '$department'");
                        }
                        elseif ($_SESSION['usertype'] == 'Department Head') {
                          $project = mysqli_query($con,"SELECT projects.*,u.name FROM projects LEFT JOIN users as u ON projects.project_leader = u.id where  projects.department = '$department'");
                        }else {
                          $project = mysqli_query($con,"SELECT projects.*,u.name FROM projects LEFT JOIN users as u ON projects.project_leader = u.id ");
                        }

                      }else{
                        if ( $_SESSION['usertype'] == 'Proponent') {
                          $project = mysqli_query($con,"SELECT projects.*,u.name FROM projects LEFT JOIN proponents as p ON projects.id = p.project_id LEFT JOIN users as u ON projects.project_leader = u.id where project_title LIKE '%$project_title%' AND department = '$department' AND YEAR(date_submitted) = '$year_submitted' AND  p.users_id = '$user_id'");
                        }elseif ($_SESSION['usertype'] == 'Department Head') { 
                          // $project = mysqli_query($con,"SELECT projects.*,u.name FROM projects LEFT JOIN proponents as p ON projects.id = p.project_id LEFT JOIN users as u ON projects.project_leader = u.id where project_title LIKE '%$project_title%' AND department = '$department' AND YEAR(date_submitted) = '$year_submitted'  ");
                          if($status){
                            $project = mysqli_query($con,"SELECT projects.*,u.name FROM projects LEFT JOIN users as u ON projects.project_leader = u.id where (projects.department = '$department' AND YEAR(projects.date_submitted) = '$year_submitted'  AND projects.project_title LIKE '%$project_title%') AND status = '$status'");
                          }else{
                            $project = mysqli_query($con,"SELECT projects.*,u.name FROM projects LEFT JOIN users as u ON projects.project_leader = u.id where (projects.department = '$department' AND YEAR(projects.date_submitted) = '$year_submitted'  AND projects.project_title LIKE '%$project_title%')");
                          }
                        }else {
                          if ($status == 'Ongoing') {
                            $project = mysqli_query($con,"SELECT projects.*,u.name FROM projects LEFT JOIN users as u ON projects.project_leader = u.id where status <> 'Complete' AND status <> 'Pending' ");
                          }else {
                            $project = mysqli_query($con,"SELECT projects.*,u.name FROM projects LEFT JOIN users as u ON projects.project_leader = u.id where (projects.department = '$department' AND YEAR(projects.date_submitted) = '$year_submitted' AND projects.project_title LIKE '%$project_title%') OR status = '$status' ");
                          }
                        }
                        
                      }
 
                        while ($value = mysqli_fetch_array($project)) { 
                            if ( $_SESSION['usertype'] == 'Proponent') {
                              $projid = $value['id']; 
                              mysqli_query($con,"UPDATE projects SET flag = '0' where id = '$projid'");
                            }

                            echo '<tr> 
                            <td class="text-nowrap">'.$value['project_title'].'</td>
                            <td style="text-align:right;">'.number_format($value['project_cost'],2).'</td>
                            <td>'.$value['department'].'</td>
                            <td class="text-nowrap">'.$value['name'].'</td>
                            <td class="text-nowrap">'.$value['project_duration'].'</td>
                            <td class="text-nowrap">'.$value['project_location'].'</td>
                            <td class="text-nowrap">'.$value['status'].'</td>
                            <td class="text-nowrap">'.$value['date_submitted'].'</td>
                            <td class="text-nowrap" style="text-align:center;">';

                            if ($_SESSION['usertype'] == 'Administrator' ) {
                              echo '<a href="editprojects.php?pid='.$value['id'].'&uid='.$value['project_leader'].'" class="btn btn-primary btn-sm">Edit</a>&nbsp;';
                            }
                          echo '<a href="evaluation.php?pid='.$value['id'].'&projecttype='.$value['project_type'].'" class="btn btn-primary btn-sm">View Evaluation</a> ';

                          if ($_SESSION['usertype'] == 'Administrator' || $_SESSION['usertype'] == 'Proponent') {
                            echo ' <a href="attachment.php?pid='.$value['id'].'&projecttype='.$value['project_type'].'" class="btn btn-primary btn-sm">Attachment</a>&nbsp;';
                          }
                        echo'</td>
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
        function submitNewFolder(){
            var folderNumber = document.getElementById("folderNumber").value;
            var folderName = document.getElementById("folderName").value;

            var xmlhttp = new XMLHttpRequest();
             xmlhttp.open("GET","../php/addfolder.php?folderNumber="+folderNumber+"&folderName="+folderName,false);
             xmlhttp.send(null);
             var notify =xmlhttp.responseText;
             notify = notify.trim();


          if (notify == 'success') {
             location.reload();
          }else{
            alert(notify);
          }

        }


  function thousands_separators(num)
  {
    var num_parts = num.toString().split(".");
    num_parts[0] = num_parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    return num_parts.join(".");
  }

  function printInventory(val){
   window.open('printInventory.php?mnth='+val, 'Inventory Report', 'toolbar=0,location=0,menubar=0,width=1000,height=600,top=50,left=50');
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
