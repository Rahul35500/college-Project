<!--check  top_and_left_panel_campany.php for top and left panel  -->
<?php
require_once("top_and_left_panel_campany.php");
?>
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
                                <li class="active"><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                                <li><a href="edit-company.php"><i class="fa fa-tv"></i> My Company</a></li>
                                <li><a href="create-job-post.php"><i class="fa fa-file-o"></i> Create Job Post</a></li>
                                <li><a href="my-job-post.php"><i class="fa fa-file-o"></i> My Job Post</a></li>
                                <li><a href="job-applications.php"><i class="fa fa-file-o"></i> Job Application</a></li>
                                <li><a href="mailbox.php"><i class="fa fa-envelope"></i> Mailbox</a></li>
                                <li><a href="settings.php"><i class="fa fa-gear"></i> Settings</a></li>
                                <li><a href="resume-database.php"><i class="fa fa-user"></i> Resume Database</a></li>
                                <li><a href="experience.php"><i class="fa fa-arrow-circle-o-right"></i> View Experience</a></li>
                                <li><a href="../logout.php"><i class="fa fa-arrow-circle-o-right"></i> Logout</a></li>
                            </ul>
                        </div>
                    </div>

                </div>


                <div class="col-md-9 bg-white padding">

                    <h3>Overview</h3>
                    <hr>

                    <div class="row">

                        <div class="col-md-6">
                            <a href="my-job-post.php">
                                <div class="info-box bg-c-yellow">
                                    <span class="info-box-icon bg-red"><i class="ion ion-ios-people-outline"></i></span>
                                    <div class="info-box-content ">
                                        <span class="info-box-text">Job Posted</span>
                                        <?php
                    $sql = "SELECT * FROM job_post WHERE id_company='$_SESSION[id_company]'";
                    $result = $conn->query($sql);

                    if($result->num_rows > 0) {
                      $total = $result->num_rows; 
                    } else {
                      $total = 0;
                    }

                    ?>
                                        <span class="info-box-number"><?php echo $total; ?></span>
                                    </div>
                                </div>
                            </a>


                        </div>
                        <div class="col-md-6">
                            <a href="job-applications.php">
                                <div class="info-box bg-c-yellow">
                                    <span class="info-box-icon bg-green"><i class="ion ion-ios-browsers"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Application For Portal</span>
                                        <?php
                    $sql = "SELECT * FROM apply_job_post WHERE id_company='$_SESSION[id_company]'";
                    $result = $conn->query($sql);

                    if($result->num_rows > 0) {
                      $total = $result->num_rows; 
                    } else {
                      $total = 0;
                    }
                  ?>
                                        <span class="info-box-number"><?php echo $total; ?></span>
                                    </div>
                                </div>
                        </div>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section>



</div>
<!-- /.content-wrapper -->



</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="../js/adminlte.min.js"></script>
</body>

</html>