<?php

//To Handle Session Variables on This Page
session_start();


//Including Database Connection From db.php file to avoid rewriting in all files
require_once("db.php");
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

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <style>
        .navbar-nav a,
        .logo-lg {
            color: #fff;
        }

        .content-header {
            margin-top: 50px
        }

        .content-wrapper {
            background-color: #fff
        }
    </style>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <header class="main-header">

            <!-- Logo -->
            <a href="index.php" class="logo navbar-fixed-top " style="background:#007399 ">

                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>Job</b> Portal</span>
            </a>


            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-fixed-top" style="background-color:  #007399">
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <?php if(empty($_SESSION['id_user']) && empty($_SESSION['id_company'])) 
          { ?>
                        <li>
                            <a href="login.php">Login</a>
                        </li>
                        <li>
                            <a href="sign-up.php">Sign Up</a>
                        </li>
                        <?php } 
          else 
          { 

            if(isset($_SESSION['id_user'])) { 
          ?>
                        <li>
                            <a href="user/index.php">Dashboard</a>
                        </li>
                        <?php
          } else if(isset($_SESSION['id_company'])) { 
          ?>
                        <li>
                            <a href="company/index.php">Dashboard</a>
                        </li>
                        <?php } ?>
                        <li>
                            <a href="logout.php">Logout</a>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </nav>
        </header>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col"></div>
                        <div class="col-md-12 col-lg-9 latest-job">
                            <h1 class="text-center">Latest Jobs</h1>
                            <div class="input-group input-group-lg">
                                <!-- search option box -->
                                <input type="text" id="searchBar" class="form-control" placeholder="Search job">
                                <span class="input-group-btn">
                                    <button id="searchBtn" type="button" class="btn btn-info btn-flat">Go!</button>
                                </span>
                            </div>
                        </div>
                        <div class="col"></div>
                    </div>
                </div>
            </section><br>
            <section id="candidates" class="content-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col"></div>
                        <div class="col-md-12 col-lg-9">
                            <?php

          $limit = 2;

          $sql = "SELECT * FROM job_post";
          $result = $conn->query($sql);
          // $result=mysql_query($conn,"SELECT COUNT(id_jobpost) AS id FROM job_post");
          if($result->num_rows > 0)
          {         
             $row = $result->fetch_assoc();
             $total_records = $row['id_jobpost'];
             $total_pages = ($total_records / $limit);
          }  else {
             $total_pages = 1;
          }

        ?>
                            <div id="target-content"></div>
                            <div class="text-center">
                                <ul class="pagination text-center" id="pagination"></ul>
                            </div>
                        </div>
                        <div class="col"></div>
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

    <script>
        function Pagination() {
            $("#pagination").twbsPagination({
                totalPages: <?php echo $total_pages; ?>,
                visible: 5,
                onPageClick: function(e, page) {
                    e.preventDefault();
                    $("#target-content").html("loading....");
                    $("#target-content").load("jobpagination.php?page=" + page);
                }
            });
        }
    </script>

    <script>
        $(function() {
            Pagination();
        });
    </script>



    <!-- search script -->
    <script>
        $("#searchBtn").on("click", function(e) {
            e.preventDefault();
            var searchResult = $("#searchBar").val();
            var filter = "searchBar";
            if (searchResult != "") {
                $("#pagination").twbsPagination('destroy');
                Search(searchResult, filter); //direct to search
            } else {
                $("#pagination").twbsPagination('destroy');
                Pagination();
            }
        });
    </script>


    <script>
        function Search(val, filter) {
            $("#pagination").twbsPagination({
                totalPages: <?php echo $total_pages; ?>,
                visible: 5,
                onPageClick: function(e, page) {
                    e.preventDefault();
                    val = encodeURIComponent(val);
                    $("#target-content").html("loading....");
                    $("#target-content").load("search.php?page=" + page + "&search=" + val + "&filter=" + filter);
                }
            });
        }
    </script>


</body>

</html>