<!--check  top_and_left_panel_campany.php for top and left panel  -->
<?php
require_once("top_and_left_panel_campany.php");
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
                  <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                  <li class="active"><a href="edit-company.php"><i class="fa fa-tv"></i> My Company</a></li>
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
          <div class="col-md-9 bg-white padding-2">
            <h2><i>My Company</i></h2>
            <p>In this section you can change your company details</p>
            <div class="row">
              <form action="update-company.php" method="post" enctype="multipart/form-data">
                <?php
                $sql = "SELECT * FROM company WHERE id_company='$_SESSION[id_company]'";
                $result = $conn->query($sql);

                if($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {
                ?>
                <div class="col-md-6 latest-job ">
                  <div class="form-group">
                     <label>Company Name</label>
                    <input type="text" class="form-control input-lg" name="companyname" value="<?php echo $row['companyname']; ?>" required="">
                  </div>
                  <div class="form-group">
                     <label>Website</label>
                    <input type="text" class="form-control input-lg" name="website" value="<?php echo $row['website']; ?>" required="">
                  </div>
                  <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control input-lg" id="email" placeholder="Email" value="<?php echo $row['email']; ?>" readonly>
                  </div>
                  <div class="form-group">
                    <label>About Me</label>
                    <textarea class="form-control input-lg" rows="4" name="aboutme"><?php echo $row['aboutme']; ?></textarea>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-flat btn-success">Update Company Profile</button>
                  </div>
                </div>
                <div class="col-md-6 latest-job ">
                  <div class="form-group">
                    <label for="contactno">Contact Number</label>
                    <input type="text" class="form-control input-lg" id="contactno" name="contactno" placeholder="Contact Number" value="<?php echo $row['contactno']; ?>">
                  </div>
                  <div class="form-group">
                    <label for="city">City</label>
                    <input type="text" class="form-control input-lg" id="city" name="city" value="<?php echo $row['city']; ?>" placeholder="city">
                  </div>
                  <div class="form-group">
                    <label for="state">State</label>
                    <input type="text" class="form-control input-lg" id="state" name="state" placeholder="state" value="<?php echo $row['state']; ?>">
                  </div>
                  <div class="form-group">
                    <label>Change Company Logo</label>
                    <input type="file" name="image" class="btn btn-default">
                    <?php if($row['logo'] != "") { ?>
                    <img src="../uploads/logo/<?php echo $row['logo']; ?>" class="img-responsive" style="max-height: 200px; max-width: 200px;">
                    <?php } ?>
                  </div>
                </div>
                    <?php
                    }
                  }
                ?>  
              </form>
            </div>
            <?php if(isset($_SESSION['uploadError'])) { ?>
            <div class="row">
              <div class="col-md-12 text-center">
                <?php echo $_SESSION['uploadError']; ?>
              </div>
            </div>
            <?php unset($_SESSION['uploadError']); } ?>
            
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
