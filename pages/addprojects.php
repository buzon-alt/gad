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
                    <h3>New Projects</h3>
                </div>
            </div>

            <form id="submit_project" enctype="multipart/form-data" method="POST">
                <div class="row">
                    <div class="form-group col-md-5">
                        <label for="">PROJECT TITLE:</label>
                        <input type="text" class="form-control" name="project_title" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-2">
                        <label for="">PROJECT COST:</label>
                        <input type="number" class="form-control" name="project_cost" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">DEPARTMENT/UNITCOLLEGE </label>
                        <input type="text" class="form-control" name="department" required>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-5">
                        <label for="">PROJECT LEADER:</label>
                        <select class="form-control" name="project_leader" id="project_leader" required>
                            <option value="" selected disabled>-Select Project Leader-</option>
                            <?php
                                $users = mysqli_query($con,"SELECT * FROM users where usertype <> 'Administrator' ");
                                while ($value = mysqli_fetch_array($users)) {
                                echo '<option value="'.$value['id'].'">'.$value['name'].'</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="">DATE SUBMITTED:</label>
                        <input type="DATE" class="form-control" name="date_submitted" value="<?=date("Y-m-d");?>">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-5">
                        <label for="">PROJECT MEMBER/PROPONENT:</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <table id="project_member" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>NAME</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <select class="form-control" name="" id="" required>
                                            <option value="" selected disabled>- Select Proponent/Member -</option>
                                            <?php
                                                $users = mysqli_query($con,"SELECT * FROM users where usertype <> 'Administrator' ");
                                                while ($value = mysqli_fetch_array($users)) {
                                                echo '<option value="'.$value['id'].'">'.$value['name'].'</option>';
                                                }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <select class="form-control" name="" id="">
                                            <option value="" selected disabled>- Select Proponent/Member -</option>
                                            <?php
                                                $users = mysqli_query($con,"SELECT * FROM users where usertype <> 'Administrator' ");
                                                while ($value = mysqli_fetch_array($users)) {
                                                echo '<option value="'.$value['id'].'">'.$value['name'].'</option>';
                                                }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <select class="form-control" name="" id="">
                                            <option value="" selected disabled>- Select Proponent/Member -</option>
                                            <?php
                                                $users = mysqli_query($con,"SELECT * FROM users where usertype <> 'Administrator' ");
                                                while ($value = mysqli_fetch_array($users)) {
                                                echo '<option value="'.$value['id'].'">'.$value['name'].'</option>';
                                                }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-2">
                        <label for="">PROJECT DURATION:</label>
                        <input type="text" class="form-control" name="project_duration" id="">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">PROJECT LOCATION:</label>
                        <input type="text" class="form-control" name="project_location" id="">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="">PROJECT TYPE:</label>
                        <select class="form-control" name="project_type">
                            <option value="Generic">Generic</option>
                            <option value="Infrastructure">Infrastructure</option>
                        </select>
                    </div>
              
                    <div class="form-group col-md-10">
                        <label for="">DESCRIPTION:</label>
                        <textarea name="descriptions" class="form-control" id="" cols="30" rows="3"></textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-10">
                        <div id="message"></div>
                        <button type="submit" class="btn btn-primary pull-right">Submit</button>
                    </div>
                </div>
            </form>

        </div>
        <!-- /#page-wrapper -->

    </div>


    </div>


    <script type="text/javascript">
    $('#submit_project').on('submit', function() {
        event.preventDefault();
        var formData = new FormData($(this)[0]);
        var members = [];
        $("#project_member > tbody > tr").each(function() {

            let id = $(this).find("td:eq(0) select").val();

            var tr = {
                id: id
            };
            members.push(tr);

        });

        formData.append("members", JSON.stringify(members));

        url = '../php/submit_project.php';
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
                    location.href = "projects.php";
                    $('#message').html('<p class="text-success">' + data.message + '</p>');
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