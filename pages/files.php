<?php require '../controllers/db/connection.php';
SESSION_START();

  if (isset($_POST['submitfiles'])) {
    // code...
    if(isset($_FILES["files"]["type"]))
      {

      $temporary = explode(".", $_FILES["files"]["name"]);
      $file_extension = end($temporary);
      $folderNumber = $_POST['folderNumber'];
      $fileDescription = $_POST['fileDescription'];
            $filename = pathinfo($_FILES["files"]["name"], PATHINFO_FILENAME);
            $filename = str_replace(" ","_",$filename);
            $FILETXT = $filename.'_'.round(microtime(true)) . '.' . end($temporary);
            $sourcePath = $_FILES['files']['tmp_name']; // Storing source path of the file in a variable
            $targetPath = '../files/'.$FILETXT; // Target path where file is to be stored

            $checkfile = MySQLi_Query($con,"SELECT * FROM filelist WHERE FILEDESC ='$fileDescription' AND FOLDERNUMBER ='$folderNumber'");
            $count = mysqli_num_rows($checkfile);
              
              if ($count == 1)
              {

                 echo '<script>alert("File exist, check your file list");</script>';

              }
              elseif (move_uploaded_file($sourcePath,$targetPath)) 
              {

                $submit =  mysqli_query($con,"INSERT INTO filelist (FOLDERNUMBER,FILEDESC,FILENAME) VALUES ('$folderNumber','$fileDescription','$FILETXT')");
                  echo '<script>alert("File uploaded...");</script>';

              } // Moving Uploaded file
              else
              {

                echo "<script>alert('***Invalid file Size or Type***');</script>";

              }

      }
  }

  if (isset($_POST['editfile']))
  {

     
    $id = $_POST['identt']; 
    $desc = $_POST['desc'];

    mysqli_query($con,"UPDATE filelist SET FILEDESC ='$desc' WHERE id = '$id'");
    
     echo "<script>alert('***Update File success***');</script>";
   

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

    function EditModal(_row){
    
      document.getElementById("identt").value = document.getElementById("row"+_row+cols[0]).innerHTML;
      document.getElementById("desc").value = document.getElementById("row"+_row+cols[1]).innerHTML;
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
          <?php
          $folderNumber = $_GET['folder'];
           $getfolder = MySQLi_Query($con,"SELECT * FROM folderlist where FOLDERNUMBER = '$folderNumber'");
           $fname = mysqli_fetch_array($getfolder);

          ?>
                               
          <div class="row">
              <div class="col-md-12">
                  <h3>List of Files</h3>
              </div>
              <div class="col-md-12" style="padding-bottom: 10px;">
                <form class="" id="selectfolder" action="" method="GET" style="float:left;">
                  <label for="" style="float:left; margin: 10px 10px 0px 0px;">Select Folder:</label>
                  <select type="text" class="form-control" id="folder" name="folder" value="" onchange="changeFolder()" style="float:left; width:400px; border-top-right-radius:0px; border-bottom-right-radius:0px; ">
                    <?php
                        $getfolder1 = MySQLi_Query($con,"SELECT * FROM folderlist ORDER BY FOLDERNUMBER asc");
                        while ($fname1 = mysqli_fetch_array($getfolder1)) {
                          // code...
                          if ($_GET['folder'] == $fname1['FOLDERNUMBER']) {
                            // code...
                            echo '<option value="'.$fname1['FOLDERNUMBER'].'" selected>'.$fname1['FOLDERNUMBER'].' - '.$fname1['FOLDERNAME'].'</option>';
                          }else {
                            echo '<option value="'.$fname1['FOLDERNUMBER'].'">'.$fname1['FOLDERNUMBER'].' - '.$fname1['FOLDERNAME'].'</option>';
                          }
                        }
                     ?>
                  </select>
                  <button type="submit" class="btn btn-default" id="submitfolder" name="submitfolder" style=" border-top-left-radius:0px; border-bottom-left-radius:0px; display:none;">GO</button>
                </form>

                <button type="button" class="btn btn-primary pull-right" name="button" data-toggle="modal" data-target="#addFolder">Add File</button>
              </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="addFolder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog " role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel" style=""><strong>ADD FILE</strong> <button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button> <a href="" class="btn btn-default">Export List</a></h4>
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
              <div class="col-md-12">
                <table class="table" style="border-top:2px solid #333!important; border:0px solid #ddd;">
                    <thead>
                      <tr>
                        <td>Files Description</td>
                        <td style="text-align:center;"></td>
                      </tr>
                    </thead>
                    <tbody id="translist">
                      <?php
                        $getfolder =MySQLi_Query($con,"SELECT * FROM filelist WHERE FOLDERNUMBER = '$folderNumber' ORDER BY FILEDESC ASC ");
                        $i = 1;
                        while ($result = mysqli_fetch_array($getfolder)) {
                          echo '<tr>
                          <td style="display:none;" id = "row'.$i.'A">'.$result['id'].'</td>
                          <td id = "row'.$i.'B">'.$result['FILEDESC'].'</td>
                          <td> <a href="../files/'.$result['FILENAME'].'" class="btn pull-right" target="_blank"><i class="fa fa-download"></i>&nbsp; download</a>';  
                          if(!empty($_SESSION['id_session'])){
                            echo'<a href="../php/deletefiles.php?folder='.$result['FOLDERNUMBER'].'&id='.$result['id'].'" class="btn pull-right text-danger" style="margin-right:10px;"><i class="fa fa-trash"></i>&nbsp; Delete File</a>
                            <a class="btn pull-right text-success" data-toggle="modal" onclick = "EditModal('.$i.')"  style="margin-right:10px;"><i class="fa fa-pencil"></i>&nbsp; Edit File</a>
                            ';
                          }
                        echo'
                          </td>
                          </tr>';
                          $i++;
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

    <!-- MODAL FOR UPDATING FOLDER DESCRIPTION -->
             <div class="modal fade" id="editfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel" style=""><strong>EDIT FILE DESCRIPTION</strong> <button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button></h4>
                  </div>
                  <form class="form" action="" method="POST" enctype="multipart/form-data" id="editFolder">
                  <div class="modal-body">
                    <div class="row">
                      <div class="col-md-12">
                        <input type="text" class="form-control" id="identt"  name="identt" value="" placeholder="Folder Number" style="display: none;">
                        <input type="text" class="form-control" id="desc"  name="desc" value="" placeholder="Folder Number">
                      </div>
                      <div class="col-md-12" style="padding: 5px;">
                      </div>
                      <br>
                    </div>
                  <div class="modal-footer">
                    <button type="submit" name="editfile" class="btn btn-primary">Save</button>
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


function changeFolder(){

    $("#selectfolder").submit();
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
