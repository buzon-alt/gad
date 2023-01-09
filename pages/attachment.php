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
                    <h4>Project Attachment</h4>
                </div> 
            </div>
            <!-- /.row -->

        
            <div class="row">
                <div class="col-md-12">
              <?php
              if ($_SESSION['usertype'] == 'Proponent') {
              ?>
                <form id="attachmentform" action="#" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="project_id" value="<?=$_GET['pid']?>">
                    <label for="files">Attach File:</label>
                    <input type="file" name="files" id="files" onchange="$('#submit').click()">
                    <button type="submit" name="submit" id="submit" style="display:none;">Submit</button>
                    <div class="col-md-6" id="popup_msg1" style="margin-top:20px;margin-bottom:20px;"></div>
                </form>
                <?php
              }
              ?>
                    <table class="table" id="attachment_tb" style="border-top:2px solid #333!important; border:0px solid #ddd;">
                        <thead>
                            <tr>
                                <td>Filename</td>  
                                <td></td>
                            </tr>
                        </thead>
                        <tbody id="translist">
                        <?php
                          $pid = $_GET['pid'];
                          $attachment = mysqli_query($con,"SELECT * FROM attachment where project_id = $pid");

                          if (mysqli_num_rows($attachment) == 0) {
                            echo "No Attachment";
                          }


                          while ($value = mysqli_fetch_array($attachment)) {
                            echo '<tr>
                              <td>'.$value['filename'].'</td>  
                              <td>'; 
                              echo'<a href="../files/'.$value['filename'].'" class="text-primary" target="_blank"><i class="fa fa-eye"></i> View</a>&nbsp;&nbsp;';
 
                              echo'<span class="text-primary removefile" data-id="'.$value['id'].'" style="cursor:pointer;"><i class="fa fa-trash"></i> Remove</span></td>
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

        $("#attachmentform").submit(function(e) {
            e.preventDefault();
        
            let attachmentform = new FormData($(this)[0]);
             
            url = '../php/add_attachment.php';
                fetch(url, {
                        method: 'POST',
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                        },
                        body: attachmentform,
                    })
                    .then(response => response.json())
                    .then(data => { 
                        if (data.status_code == 200) {
                            $("#attachment").val(1);
                            // $('#popup_msg1').html('<div class="bg-success radius" style="padding:10px;"><p class="text-white" style="margin:0px;">'+data.message+'</p></div>');
                            var tr = '<tr>'+
                                        '<td>'+data.filename+'</td>'+
                                        '<td><a href="../files/'+data.filename+'" class="text-primary" target="_blank"><i class="fa fa-eye"></i> View</a>&nbsp;&nbsp;<span class="text-primary removefile" data-id="'+data.file_id+'" style="cursor:pointer;"><i class="fa fa-trash"></i> Remove</span></td>'+
                                    '</tr>';

                                    $("#attachment_tb").append(tr);
                            
                        }else{
                            $('#popup_msg1').html('<div class="bg-danger radius" style="padding:10px;"><p class="text-white" style="margin:0px;">'+data.message+'</p></div>');
                        }

                    })
                    .catch(function(error) {
                        console.log(error);
                    });
                    

        });


        $('#attachment_tb').on('click', '.removefile', function() {
    var file_id = $(this).data('id');
    $(this).closest("tr").remove();

    let attachmentform = new FormData();
    
    attachmentform.append("file_id", JSON.stringify(file_id));

    url = '../php/delete_attachment.php';
        fetch(url, {
                method: 'POST',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                },
                body: attachmentform,
            })
            .then(response => response.json())
            .then(data => { 
               
            })
            .catch(function(error) {
                console.log(error);
            });
});

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