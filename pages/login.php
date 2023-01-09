<?php  
require '../controllers/db/connection.php';
if(!isset($_SESSION))
{
  session_start(); 
}else{

}
 
if (!empty($_SESSION['id_session']) && $_SESSION['usertype'] == 'Administrator') { 
  header('location: index.php');
}elseif (!empty($_SESSION['id_session']) && ($_SESSION['usertype'] == 'Proponent' || $_SESSION['usertype'] == 'Department Head')) {
  header('location: projects.php');
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
  <link rel="shortcut icon" href="../../img/B94LOGO.ico" />

  <!-- Bootstrap Core CSS -->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom Fonts -->
  <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

  <script src="../js/jquery-3.6.0.min.js"></script>
  <script type="text/javascript">
  function zoom() {
    document.body.style.zoom = "90%"
  }

  function showMessage(msgtype, title, message) {

    if (msgtype == "success") {

      var html_msg = '<h4 class="text-success"><i class="fa fa-check-circle"></i><i>' + title + '</i></h4><p>' +
        message +
        '</p>';

      $("#msgsuccessbody").html(html_msg);
      $("#messageSucess").modal("show");

    } else if (msgtype == "success1") {

      var html_msg = '<h4 class="text-success"><i class="fa fa-check-circle"></i><i>' + title + '</i></h4><p>' +
        message +
        '</p>';

      $("#msgbody").html(html_msg);
      $("#messageBox").modal("show");

    } else if (msgtype == "error") {

      var html_msg = '<h4 class="text-danger"><i>' + title + '</i></h4><p>' +
        message +
        '</p>';

      $("#msgbody").html(html_msg);
      $("#messageBox").modal("show");

    } else if (msgtype == "info") {

      var html_msg = '<h4 class="text-info"><i>' + title + '</i></h4><p>' +
        message +
        '</p>';

      $("#msgbody").html(html_msg);
      $("#messageBox").modal("show");
    }


  }


  function closeModal() {
    location.reload();
  }
  </script>
   <style>
	body{
		background-image: url("../img/bg.jpg");
		background-repeat:no-repeat;
		background-size:cover; 
	}
	
	.form{
		background-color: rgb(255,255,255);
	}
  </style>
</head>

<body onload="zoom()">


  <!-- Modal -->
  <div class="modal fade" id="messageBox" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-body" id="msgbody">

        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="messageSucess" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" onclick="closeModal()">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-body" id="msgsuccessbody">

        </div>
      </div>
    </div>
  </div>

  <!-- /.row -->
  <div class="row">
    <div class="col-md-12">
      <br><br><br>
    </div>
    <div class="col-md-3 col-md-offset-4 form" style="border-radius: 10px;border:1px solid #ddd;">
      <br>
      <center>
        <img src="../img/slsulogo.png" alt="" style="width:120px;">
        <h4>GENDER AND DEVELOPMENT MONITORING SYSTEM</h4> 
      </center>
      <div class="row">
        <hr>
        <div class="col-md-12">
          <form id="login_form" enctype="multipart/form-data" method="POST">
            <div class="form-group">
              <input type="text" class="form-control" id="username" name="" value="" placeholder="Username">
            </div>
            <div class="form-group">
              <input type="password" class="form-control" id="password" name="" value="" placeholder="Password">
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary pull-right" name="button" onclick="login()"><i
                  class="fa fa-sign-in"></i>&nbsp;&nbsp;Login</button><br>
                  <br>
            </div>
          </form>
        </div>

      </div>

    </div>

  </div>
  <!-- /.row -->


  <!-- /#page-wrapper -->

  <script type="text/javascript">
   $('#login_form').on('submit', function() {
        event.preventDefault();
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;

    if (username == "") {
      // alert("Please fill up username!");
      showMessage("error", "Login Failed", "Please fill up username!");
    } else if (password == "") { 
      showMessage("error", "Login Failed", "Password is empty!");
    } else {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.open("GET", "../php/dologin.php?username=" + username + "&password=" + password, false);
      xmlhttp.send(null);
      var notify = xmlhttp.responseText;
      notify = notify.trim();
      if (notify == "success") {
        location.reload();
      } else {
        showMessage("error", "Login Failed", "Username and password not match!");
      }
    }
  })
  </script>

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