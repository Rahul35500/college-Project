<?php

//To Handle Session Variables on This Page
session_start();

if(empty($_SESSION['id_user']))
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
     <a href="index.php" class="logo navbar-fixed-top " style="background:#007399 ">

         <span class="logo-lg"><b>Job</b> Portal</span>
     </a>



     <!-- Header Navbar: style can be found in header.less -->
     <nav class="navbar navbar-fixed-top" style="background-color:  #007399">
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

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper margin-top-50" style="margin-left: 0px;">

    <section id="candidates" class="content-header">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="box box-solid">
              <div class="box-header with-border">
                <h3 class="box-title">Welcome <b><?php echo "$_SESSION[name]"; ?></b></h3>
              </div>
              <div class="box-body no-padding">
                <p class="mine">Here you can see experience of the user for a company.</p>
              </div>
            </div>
          </div>
          
          <div class="col-md-9 bg-white">
            <h3>Experience</h3>
            <div class="row">
              <div class="col-md-12">
                <div class="box-body table-responsive no-padding">
                  <table id="example2" class="table table-hover">
                    <thead>
                      <th>Name</th>
                      <th>Company Name</th>
                      <th>View Experience</th>
                    </thead>
                    <tbody>
                      <?php
                      $sql = "SELECT users.*, company.companyname, experience.id_experience FROM experience INNER JOIN company ON experience.id_company=company.id_company INNER JOIN users ON experience.id_user=users.id_user";
                      $result = $conn->query($sql);
                      if($result->num_rows > 0) {
                        $i = 0;
                        while($row = $result->fetch_assoc()) {
                      ?>
                      <tr>
                        <td><?php echo $row['firstname']; echo ' '; echo $row['lastname']; ?></td>
                        <td><?php echo $row['companyname']; ?></td>
                        <td><a href="view-experience.php?id=<?php echo $row['id_experience']; ?>">click here &nbsp; <i class="fa fa-arrow-circle-o-right"></i></a></td>
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

  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="js/adminlte.min.js"></script>
<script src="js/jquery.twbsPagination.min.js"></script>

</body>
</html>
