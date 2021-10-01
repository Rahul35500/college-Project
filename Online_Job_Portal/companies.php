<?php

//To Handle Session Variables on This Page
session_start();


//Including Database Connection From db.php file to avoid rewriting in all files
require_once("db.php");
if(empty($_SESSION['id_user']) or empty($_SESSION['id_company'])) {
  ?>
<script>
      alert("Please login");
      window.location.href="index.php";
</script>
 <?php
  exit();
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Job Portal</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="css/AdminLTE.min.css">
    <link rel="stylesheet" href="css/_all-skins.min.css">
    <!-- Custom -->
    <link rel="stylesheet" href="css/custom.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-green sidebar-mini">
    <div class="wrapper">

        <header class="main-header">

            <!-- Logo -->
            <a href="index.php" class="logo navbar-fixed-top " style="background:#007399 ">

                <span class="logo-lg"><b>Job</b> Portal</span>
            </a>



            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-fixed-top" style="background-color:  #007399">
                <div class="navbar-custom-menu">
                    <?php if(isset($_SESSION["id_user"]) && empty($_SESSION['companyLogged'])) { ?>
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="user/index.php">Dashboard</a>
                        </li>
                        <li>
                            <a href="logout.php">Logout</a>
                        </li>
                    </ul>
                    <?php } else { ?>
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="login.php">Login</a>
                        </li>
                        <li>
                            <a href="sign-up.php">Sign Up</a>
                        </li>
                    </ul>
                    <?php } ?>
                </div>
            </nav>
        </header>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper margin-top-50" style="margin-left: 0px;">

    <section id="candidates" class="content-header">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="box box-solid">
              <div class="box-header with-border">
                <h3 class="box-title">Welcome <b><?php echo $_SESSION['name']; ?></b></h3>
              </div>
              <div class="box-body no-padding">
               <ul class="nav nav-pills nav-stacked">
                  <li><a href="user/edit-profile.php"><i class="fa fa-user"></i> Edit Profile</a></li>
                  <li><a href="user/index.php"><i class="fa fa-address-card-o"></i> My Applications</a></li>
                  <li><a href="jobs.php"><i class="fa fa-briefcase"></i> Jobs</a></li>
                  <li><a href="user/mailbox.php"><i class="fa fa-envelope"></i> Mailbox</a></li>
                  <li><a href="user/fill-experience.php"><i class="fa fa-user"></i>Fill your Expereince</a></li>
                  <li><a href="user/settings.php"><i class="fa fa-gear"></i> Settings</a></li>
                  <li><a href="logout.php"><i class="fa fa-arrow-circle-o-right"></i> Logout</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-9 bg-white">

            <h3>Companies</h3>
            <div class="row margin-top-20">
              <div class="col-md-12">
                <div class="box-body table-responsive no-padding">
                  <table id="example2" class="table table-hover">
                    <thead>
                      <th>Company Name</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>City</th>
                      <th>State</th>
                      <th>Country</th>
                    </thead>
                    <tbody>
                      <?php
                      $sql = "SELECT * FROM company";
                      $result = $conn->query($sql);
                      if($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                      ?>
                      <tr>
                        <td><?php echo $row['companyname']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['contactno']; ?></td>
                        <td><?php echo $row['city']; ?></td>
                        <td><?php echo $row['state']; ?></td>
                        <td><?php echo $row['country']; ?></td>
                      </tr>  
                     <?php
                        }
                      }
                    ?>
                    </tbody>                    
                  </table>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </section>


  </div>
        <!-- /.content-wrapper -->


    <!-- ./wrapper -->

    <!-- jQuery 3 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="js/adminlte.min.js"></script>



</body>

</html>
