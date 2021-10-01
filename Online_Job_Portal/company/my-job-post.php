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
                  <li class="active"><a href="my-job-post.php"><i class="fa fa-file-o"></i> My Job Post</a></li>
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

          <div class="col-md-9 bg-white">
            <h2><i>My Job Posts</i></h2>
            <p>In this section you can view all job posts created by you.</p>
            <div class="row margin-top-20">
              <div class="col-md-12">
                <div class="box-body table-responsive no-padding">
                  <table id="example2" class="table table-hover">
                    <thead>
                      <th>Job Title</th>
                      <th>View</th>
                      <th>Delete</th>
                    </thead>
                    <tbody>
                    <?php
                     $sql = "SELECT * FROM job_post WHERE id_company='$_SESSION[id_company]'";
                      $result = $conn->query($sql);

                      //If Job Post exists then display details of post
                      if($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) 
                        {
                      ?>
                      <tr>
                        <td><?php echo $row['jobtitle']; ?></td>
                        <td><a href="view-job-post.php?id=<?php echo $row['id_jobpost']; ?>"><i class="fa fa-address-card-o"></i></a></td>
                        <td><a href="delete-job-post.php?id=<?php echo $row['id_jobpost']; ?>"><i class="fa fa-trash"></i></a></td>
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
<!-- DataTables -->
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<!-- AdminLTE App -->
<script src="../js/adminlte.min.js"></script>


<script>
  $(function () {
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    });
  });
</script>
</body>
</html>
