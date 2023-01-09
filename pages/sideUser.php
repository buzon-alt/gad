<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">GENDER & DEVELOPMENT PROJECT MONITORING SYSTEM</a>
    </div> 
      <div class="navbar-default sidebar" role="navigation" style="padding:10px;">
            <div class="sidebar-nav navbar-collapse">
              <center>
                  <br>
                  <img src="../img/slsulogo.png" alt="" style="width:120px;">
                  <hr>
                  <h4>WELCOME</h4>

                  <?php if (empty($_SESSION['id_session'])) {
                  ?>
                          <h5><i class="fa fa-user"></i>&nbsp; WELCOME USER</h5>
                          <a href="login.php"><i class="fa fa-sign-in"></i>&nbsp;Sign in</a>
                          <?php
                  } else {
                    ?>
                          <h3><i><?=$_SESSION['user']?></i></h3>
                          <h5><i><?=$_SESSION['usertype']?></i></h5>
                          <h5><i class="fa fa-user"></i>&nbsp; <?=$_SESSION['username']?></h5>
                          <i><a href="change_password.php"><i class="fa fa-lock"></i>&nbsp;Change Password</a></i>
                          <hr>

                          <?php 
                  }
                  ?>
              </center>
              <ul class="nav" id="side-menu"> 
                         <?php  if ($_SESSION['usertype'] == 'Administrator' ) {?>
                        <li>
                            <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li> 
                        <?php } ?>
                        <li>
                            <a href="projects.php"><i class="fa fa-table fa-fw"></i> Projects 
                            <?php 
                               $user_id = $_SESSION['user_id'];
                         if ($_SESSION['usertype'] == 'Proponent' ) {
                            $notif = 0;
                            $countcomplete = mysqli_query($con,"SELECT projects.*,u.name FROM projects LEFT JOIN proponents as p ON projects.id = p.project_id LEFT JOIN users as u ON projects.project_leader = u.id where project_title LIKE '%$project_title%' AND department = '$department' AND YEAR(date_submitted) = '$year_submitted' AND  p.users_id = '$user_id' AND projects.flag = '1'");
                            $notif = mysqli_num_rows($countcomplete);
                            ?>

                            <span class="badge"><?=$notif;?></span>
                            <?php   }  ?>
                        </a>
                        </li>
                        <?php  if ($_SESSION['usertype'] == 'Administrator' || $_SESSION['usertype'] == 'Department Head') {?>
                        <li>
                            <a href="allevaluation.php"><i class="fa fa-check-square-o fa-fw"></i> Evaluations</a>
                        </li>
                        <?php 
                        } if ($_SESSION['usertype'] == 'Administrator' ) {?>
                        <li>
                            <a href="proponents.php"><i class="fa fa-users fa-fw"></i> Users</a>
                        </li> 
                        <?php } ?>
                        <li>
                           <a href="../php/dologout.php"><i class="fa fa-sign-out"></i>&nbsp;Signout</a>
                        </li> 
                    </ul>
            </div>
        <!-- /.sidebar-collapse -->
      </div>

    <script type="text/javascript">
    var counter = 0;
    var id;
    id = setInterval(function() {
        counter++;
        if (counter == 1) {
            $("#notifymessgae").load("../php/notify.php");
            counter = 0;
        }
    }, 2000);
    </script>
</nav>