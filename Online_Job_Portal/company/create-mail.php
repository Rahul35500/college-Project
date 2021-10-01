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
                                <li><a href="edit-company.php"><i class="fa fa-tv"></i> My Company</a></li>
                                <li><a href="create-job-post.php"><i class="fa fa-file-o"></i> Create Job Post</a></li>
                                <li><a href="my-job-post.php"><i class="fa fa-file-o"></i> My Job Post</a></li>
                                <li><a href="job-applications.php"><i class="fa fa-file-o"></i> Job Application</a></li>
                                <li class="active"><a href="mailbox.php"><i class="fa fa-envelope"></i> Mailbox</a></li>
                                <li><a href="settings.php"><i class="fa fa-gear"></i> Settings</a></li>
                                <li><a href="resume-database.php"><i class="fa fa-user"></i> Resume Database</a></li>
                                <li><a href="experience.php"><i class="fa fa-arrow-circle-o-right"></i> View Experience</a></li>
                                <li><a href="../logout.php"><i class="fa fa-arrow-circle-o-right"></i> Logout</a></li>
                            </ul>
                        </div>
                    </div>

                </div>

          <div class="col-md-9 bg-white padding-2">
          <form action="add-mail.php" method="post">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Compose New Message</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div class="form-group">
                  <select name="to" class="form-control">
                    <?php 
                    $sql = "SELECT * FROM apply_job_post INNER JOIN users ON apply_job_post.id_user=users.id_user WHERE apply_job_post.id_company='$_SESSION[id_company]' AND apply_job_post.status='2'";
                    $result = $conn->query($sql);
                    if($result->num_rows > 0) {
                      while($row = $result->fetch_assoc()) {
                        echo '<option value="'.$row['id_user'].'">'.$row['firstname'].' '.$row['lastname'].'</option>';
                      }
                    }
                    ?>
                  </select>
                </div>
                <div class="form-group">
                  <input class="form-control" name="subject" placeholder="Subject:">
                </div>
                <div class="form-group">
                  <textarea class="form-control input-lg" id="description" name="description" placeholder="Job Description"></textarea>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <div class="pull-right">
                  <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send</button>
                </div>
                <a href="mailbox.php" class="btn btn-default"><i class="fa fa-times"></i> Discard</a>
              </div>
              <!-- /.box-footer -->
            </div>
          </form>
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
<!-- DataTables -->
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script>
  $(function () {
    $('#example1').DataTable();
  })
</script>

</body>
</html>
