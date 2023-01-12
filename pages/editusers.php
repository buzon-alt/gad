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

    .unstyled::-webkit-inner-spin-button,
    .unstyled::-webkit-calendar-picker-indicator {
        display: none;
        -webkit-appearance: none;
    }

    tr td {
        vertical-align: middle !important;
    }

    tr th,
    label {
        font-size: 10px !important;
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
            <?php require '../popups/payslip.php' ?>

            <div class="row">
                <div class="col-md-6">
                    <h3>Edit User</h3>
                </div>
            </div>
            <?php
            $id = $_GET['pid'];
                $data = mysqli_query($con,"SELECT * FROM users where id = '$id'");
                $info = mysqli_fetch_array($data);
            ?>
            <form id="submit_newusers" enctype="multipart/form-data" method="POST">
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="">Name:</label>
                        <input type="text" class="form-control" name="proponents_name" value="<?=$info['name']?>" required>
                        <input type="hidden" class="form-control" name="pid" id="pid" value="<?=$id?>" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="">Department:</label>
                        <input type="text" class="form-control" name="department" value="<?=$info['office']?>" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="">Position:</label>
                        <select class="form-control" name="usertype" id="usertype">
                            <option value="Proponent" <?=$info['usertype'] == 'Proponent'?'selected':'';?> >Proponent</option>
                            <option value="Department Head" <?=$info['usertype'] == 'Department Head'?'selected':'';?>>Department Head</option>
                            <option value="Administrator" <?=$info['usertype'] == 'Administrator'?'selected':'';?>>Administrator</option>
                        </select> 
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="">Contact:</label>
                        <input type="text" class="form-control" name="contact" value="<?=$info['contact']?>" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="">Email Address:</label>
                        <input type="email" class="form-control" name="email_address" value="<?=$info['email']?>" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="">Username:</label>
                        <input type="text" class="form-control" name="username" value="<?=$info['username']?>"  required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4"> 
                        <div id="message"> 
                        </div>
                        <button type="submit" name="btn_submit" class="btn btn-primary pull-right">Submit</button>
                        <button type="submit" class="btn btn-primary pull-right resetpassword" style="margin-right:10px;">Reset</button>
                    </div>
                </div>
            </form>

        </div>
        <!-- /#page-wrapper -->

    </div>


    </div>


    <script type="text/javascript">
    $('#submit_newusers').on('submit', function() {
        event.preventDefault();
        var formData = new FormData($(this)[0]); 
        url = '../php/submit_editusers.php';
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
                    location.href="proponents.php";
                    $('#message').html('<p class="text-success">'+data.message+'</p>');
                } else { 
                    $('#message').html('<p class="text-danger">'+data.message+'</p>');
                }
            })
            .catch(function(error) {
                console.log(`Error`, error);
            });
    })
    $('.resetpassword').on('click', function() {
        event.preventDefault();
        var formData = new FormData(); 
        formData.append("pid", $(".pid").val());
        url = '../php/resetpassword.php';
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
                    
                    // location.href="proponents.php";
                    $('#message').html('<p class="text-success">'+data.message+'</p>');
                } else { 
                    $('#message').html('<p class="text-danger">'+data.message+'</p>');
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