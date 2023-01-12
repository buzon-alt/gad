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
          <?php require '../popups/payslip.php' ?>

          <div class="row"> 
            <div class="col-md-12">
            <?php if (!empty($_SESSION['message'])) {
                  echo '<div class="bg-success" style="padding:5px;">'.$_SESSION['message'].'</div>';
                  $_SESSION['message'] = '';
                }?>
            </div>
              <div class="col-md-6"> 
                  <h4>Proponents</h4>
              </div>
              <div class="col-md-3 pull-right" style="padding-top: 10px;">
                <a href="addusers.php" class="btn btn-primary btn-sm pull-right" >Add User</a>
              </div>
            </div>  
            <!-- /.row -->
            <div class="row">
              <div class="col-md-12">
                <table class="table" style="border-top:2px solid #333!important; border:0px solid #ddd;">
                    <thead>
                      <tr>
                        <td>Name</td> 
                        <td>Position</td> 
                        <td>Department/Office</td>
                        <td>Contact</td>
                        <td>Email Address</td>
                        <td>Username</td> 
                      </tr>
                    </thead>
                    <tbody id="translist">
                      <?php

                        $users = mysqli_query($con,"SELECT * FROM users");

                        while ($value = mysqli_fetch_array($users)) { 
                          echo '<tr>
                          <td>'.$value['name'].'</td>
                          <td>'.$value['usertype'].'</td>
                          <td>'.$value['office'].'</td>
                          <td>'.$value['contact'].'</td>
                          <td>'.$value['email'].'</td>
                          <td>'.$value['username'].'</td> 
                          <td>
                            <a href="editusers.php?pid='.$value['id'].'" class="btn btn-primary btn-sm">Edit</a>
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


<!-- MODAL FOR UPDATING FOLDER DESCRIPTION AND NUMBER -->
             <div class="modal fade" id="editfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel" style=""><strong>UPDATE FOLDER</strong> <button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button></h4>
                  </div>
                  <form class="form" action="../php/updatefolder.php" method="POST" enctype="multipart/form-data" id="editFolder">
                  <div class="modal-body">
                    <div class="row">
                      <div class="col-md-12">
                        <input type="text" class="form-control" id="identt"  name="identt" value="" placeholder="Folder Number" style="display: none;">
                        <input type="text" class="form-control" id="fnum"  name="folderNumber" value="" placeholder="Folder Number">
                      </div>
                      <div class="col-md-12" style="padding: 5px;">
                      </div>
                      <div class="col-md-12">
                        <input type="text" class="form-control" id="fnam" name="folderName" value="" placeholder="Folder Name/Description">
                      </div>
                      <div class="col-md-12" style="padding: 5px;">
                      </div>
                      <br>
                    </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                  </div>
                </form>
                </div>
              </div>
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
