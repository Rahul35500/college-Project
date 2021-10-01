<!--check  top_and_left bar.php for top and left panel  -->
<?php
require_once("top_and_left bar.php");
?>
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
                                <li><a href="edit-profile.php"><i class="fa fa-user"></i> Edit Profile</a></li>
                                <li class="active"><a href="index.php"><i class="fa fa-address-card-o"></i> My Applications</a></li>
                                <li><a href="../jobs.php"><i class="fa fa-briefcase"></i> Jobs</a></li>
                                <li><a href="mailbox.php"><i class="fa fa-envelope"></i> Mailbox</a></li>
                                <li><a href="fill-experience.php"><i class="fa fa-user"></i>Fill your Expereince</a></li>
                                <li><a href="settings.php"><i class="fa fa-gear"></i> Settings</a></li>
                                <li><a href="../logout.php"><i class="fa fa-arrow-circle-o-right"></i> Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-9 bg-white padding-2">
                    <h2><i>Recent Applications</i></h2>
                    <p>Below you will find job roles you have applied for</p>

                    <?php
             $sql = "SELECT * FROM job_post INNER JOIN apply_job_post ON job_post.id_jobpost=apply_job_post.id_jobpost WHERE apply_job_post.id_user='$_SESSION[id_user]'";
                  $result = $conn->query($sql);

                  if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) 
                    {     
            ?>
                    <div class="attachment-block clearfix padding-2">
                        <h4 class="attachment-heading"><a href="view-job-post.php?id= <?php echo $row['id_jobpost']; ?>"><?php echo $row['jobtitle']; ?></a></h4>
                        <h4 class="pull-right "> <a href="delete-job-post.php?id=<?php echo $row['id_jobpost']; ?>"><i class="fa fa-trash"></i></a></h4>

                        <div class="attachment-text padding-2">
                            <div class="pull-left"><i class="fa fa-calendar"></i> <?php echo $row['createdat']; ?></div>
                            <?php 

                  if($row['status'] == 0) {
                    echo '<div class="pull-right" style="margin-right: 30px;"><strong class="text-orange">Pending</strong></div>';
                  } else if ($row['status'] == 1) {
                    echo '<div class="pull-right" style="margin-right: 30px;"><strong class="text-red">Rejected</strong></div>';
                  } else if ($row['status'] == 2) {
                    echo '<div class="pull-right" style="margin-right: 30px;"><strong class="text-green">Accepted</strong></div> ';
                  }
                  
                  ?>

                        </div>
                    </div>

                    <?php
              }
            } else { ?>
                    <div>
                        <h4>No job applied till now.</h4>
                    </div>
                    <?php  
            }
            ?>

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
<script src="../js/adminlte.min.js"></script>
</body>

</html>