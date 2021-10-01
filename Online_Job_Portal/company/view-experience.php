<?php

//To Handle Session Variables on This Page
session_start();

if(empty($_SESSION['id_company']))
{
  header("Location: ../index.php");
  exit();
}

//Including Database Connection From db.php file to avoid rewriting in all files
require_once("../db.php");
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
  <link rel="stylesheet" href="../css/AdminLTE.min.css">
  <link rel="stylesheet" href="../css/_all-skins.min.css">
  <!-- Custom -->
  <link rel="stylesheet" href="../css/custom.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="index.php" class="logo logo-bg">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>J</b>P</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Job</b> Portal</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li>
            <a href="index.php">Dashboard</a>
          </li>
          <li>
            <a href="../logout.php">Logout</a>
          </li>          
        </ul>
      </div>
    </nav>
  </header>



  <div class="content-wrapper" style="margin-left: 0px;">

  <?php
  
    $sql = "SELECT * FROM experience INNER JOIN users ON experience.id_user=users.id_user INNER JOIN company ON experience.id_company=company.id_company WHERE id_experience='$_GET[id]'";
    $result = $conn->query($sql);
    if($result->num_rows > 0) 
    {
      while($row = $result->fetch_assoc()) 
      {
  ?>

    <section id="candidates" class="content-header">
      <div class="container">
        <div class="row">          
          <div class="col-md-9 bg-white padding-2">
            <div class="pull-left">
              <h2><b><i><?php echo $row['companyname']; ?></i></b></h2>
            </div>
            <div class="pull-right">
              <a href="experience.php" class="btn btn-default btn-lg btn-flat margin-top-20"><i class="fa fa-arrow-circle-left"></i> Back</a>
            </div>
            <div class="clearfix"></div>
            <hr>
            <div>
              <h3><b><i class="fa fa-arrow-circle-right">&nbsp;Location</i> &nbsp;:&nbsp;<i><?php echo $row['city']; ?></i></b></h3>
            </div>
            <hr>
            <div>
              <h3><b><i class="fa fa-arrow-circle-right">&nbsp;User</i> &nbsp;:&nbsp;<i><?php echo $row['firstname']; echo ' '; echo $row['lastname'] ?></i></b></h3>
            </div>
            <hr>
            <div >
              <h3><b><i class="fa fa-arrow-circle-right">&nbsp;Job Profile</i> &nbsp;:&nbsp;<i><?php echo $row['job_profile']; ?></i></b></h3>
            </div>
            <hr>
            <div>
              <h3><b><i class="fa fa-arrow-circle-right">&nbsp;Selection Procedure</i></b></h3>
              <h4><?php echo $row['selection_procedure']; ?></h4>
            </div>
            <hr>
            <div>
              <h3><b><i class="fa fa-arrow-circle-right">&nbsp;Way To Prepare</i></b></h3>
              <h4><?php echo $row['way_to_prepare']; ?></h4>
            </div>
            <hr>
            <div>
              <h3><b><i class="fa fa-arrow-circle-right">&nbsp;Tips and Advise</i></b></h3>
              <h4><?php echo $row['tips_advise']; ?></h4>
            </div>
            <hr>
            <div>
              <h3><b><i class="fa fa-arrow-circle-right">&nbsp;Overall Experience</i> &nbsp;:&nbsp;<i><?php echo $row['overall_exp']; ?></i></b></h3>
            </div>
            
          </div>
          <div class="col-md-3">
            <div class="thumbnail">
              <img src="../uploads/logo/<?php echo $row['logo']; ?>" alt="companylogo">
              <div class="caption text-center">
                <h3><?php echo $row['companyname']; ?></h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <?php 
      }
    }
    ?>

    

  </div>
  <!-- /.content-wrapper -->

  
  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="js/adminlte.min.js"></script>



</body>
</html>
