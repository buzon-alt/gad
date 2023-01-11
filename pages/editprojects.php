<?php require '../controllers/db/connection.php';
SESSION_START();

$projectid = $_GET['pid'];


$data = mysqli_query($con,"SELECT * FROM projects where id = $projectid ");
$project = mysqli_fetch_array($data);
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
                    <h3>Edit Projects</h3>
                </div>
            </div>

            <form id="submit_project" enctype="multipart/form-data" method="POST">
                <div class="row">
                    <div class="form-group col-md-5">
                        <label for="">PROJECT TITLE:</label>
                        <input type="text" class="form-control" name="project_title"  value="<?=$project['project_title']?>" required>
                        <input type="hidden" class="form-control" name="project_id"  value="<?=$project['id']?>" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-2">
                        <label for="">PROJECT COST:</label>
                        <input type="number" class="form-control" name="project_cost"
                            value="<?=$project['project_cost']?>" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">DEPARTMENT/UNITCOLLEGE </label>
                        <input type="text" class="form-control" name="department" value="<?=$project['department']?>" required>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-5">
                        <label for="">PROJECT LEADER:</label>
                        <select class="form-control" name="project_leader" id="project_leader" required>
                            <option value="" disabled>-Select Project Leader-</option>
                            <?php
                                $users = mysqli_query($con,"SELECT * FROM users where id = '".$_GET['uid']."'");
                                while ($value = mysqli_fetch_array($users)) { 
                                    $select = $project['id'] == $value['id'] ? 'selected' :'';
                                    echo '<option value="'.$value['id'].'" '.$select.' >'.$value['name'].'</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="">DATE SUBMITTED:</label>
                        <input type="DATE" class="form-control" name="date_submitted" value="<?=$project['date_submitted']?>" required>
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
                                <?php
                                 $proponents = mysqli_query($con,"SELECT * FROM proponents where project_id = $projectid "); 
                                 $countpro = mysqli_num_rows($proponents);
                                 while ($provalue = mysqli_fetch_array($proponents)) { 
                                ?>
                                <tr>
                                    <td>
                                        <select class="form-control" name="" id=""  >
                                            <option value="" selected disabled>- Select Proponent/Member -</option>
                                            <?php
                                                $users = mysqli_query($con,"SELECT * FROM users where usertype = 'Proponent' ");
                                                while ($value = mysqli_fetch_array($users)) {
                                                    $select = $provalue['users_id'] == $value['id'] ? 'selected' :'';
                                                    echo '<option value="'.$value['id'].'" '.$select.' >'.$value['name'].'</option>';
                                                }
                                            ?>

                                        </select>
                                    </td>
                                </tr>
                                <?php 
                                 } 

                                 $countpro = 3 - $countpro;
                                 
                                 for ($i=1; $i <= $countpro; $i++) {  

                                ?>
                                <tr>
                                    <td>
                                        <select class="form-control" name="" id="">
                                            <option value="" selected disabled>- Select Proponent/Member -</option>
                                            <?php
                                                $users = mysqli_query($con,"SELECT * FROM users where usertype = 'Proponent' ");
                                                while ($value = mysqli_fetch_array($users)) {
                                                echo '<option value="'.$value['id'].'">'.$value['name'].'</option>';
                                                }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <?php 
                                 }  
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-2">
                        <label for="">PROJECT DURATION:</label>
                        <input type="text" class="form-control" name="project_duration"  value="<?=$project['project_duration']?>">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">PROJECT LOCATION:</label>
                        <input type="text" class="form-control" name="project_location" value="<?=$project['project_location']?>">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="">PROJECT TYPE:</label>  
                        <select class="form-control" name="project_type">
                            <option value="Generic" <?=$project['project_type'] == 'Generic' ? 'selected':''?>>Generic</option>
                            <option value="Infrastructure" <?=$project['project_type'] == 'Infrastructure' ? 'selected':''?>>Infrastructure</option>
                        </select>
                    </div> 
                    <div class="form-group col-md-10">
                        <label for="">DESCRIPTION:</label>
                        <textarea name="descriptions" class="form-control" id="" cols="30" rows="3"><?=$project['descriptions']?></textarea>
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

        url = '../php/update_project.php';
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
                  location.href="projects.php";
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