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
</head>

<body>

    <div id="wrapper">

             <!-- /.navbar-header -->

            <?php require 'sideUser.php'; ?>
            <!-- /.navbar-static-side -->

        <div id="page-wrapper">
          <div class="row">
              <div class="col-md-12">
                  <h3>Quick Search</h3>
              </div>
              <div class="col-md-12" style="padding-bottom: 10px;">
                  <input type="text" class="form-control input-lg" id="keyword" name="keyword" value="" placeholder="Seach using file description..." onkeyup="searchFile()">
              </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="addFolder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog " role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel" style=""><strong>ADD FILE</strong> <button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button></h4>
                  </div>
                  <form class="form" action="" method="POST" enctype="multipart/form-data">
                  <div class="modal-body">
                    <div class="row">
                      <div class="col-md-12">
                        <input type="hidden" class="form-control" id="folderNumber" name="folderNumber" value="<?= $_GET['folder'];?>" placeholder="File Description">
                        <input type="text" class="form-control" id="fileDescription" name="fileDescription" value="" placeholder="File Description">
                      </div>
                      <div class="col-md-12" style="padding: 5px;">
                      </div>
                      <div class="col-md-12">
                        <input type="file" class="form-control" id="files" name="files" value="" placeholder="Folder Name/Description" required>
                      </div>
                      <div class="col-md-12" style="padding: 5px;">
                      </div>
                      <br>
                    </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>  <button type="submit" class="btn btn-primary" name="submitfiles">Save</button>
                  </div>
                </form>
                </div>
              </div>
            </div>
            </div>


            <!-- /.row -->
            <div class="row">
              <div class="col-md-12" id="results">
                <h3 style="color:#9a9a9a;">No results found...</h3>
              </div>
            </div>

            <!-- /.row -->

        </div>
        <!-- /#page-wrapper -->

    </div>


    <script type="text/javascript">
      function searchFile(){
        var key = document.getElementById("keyword").value;
        $("#results").load("../php/results.php?key="+key);
      }

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
