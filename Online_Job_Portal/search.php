<?php

session_start();

require_once("db.php");

$limit = 10;

if(isset($_GET["page"])) {
	$page = $_GET['page'];
} else {
	$page = 1;
}

$start_from = ($page-1) * $limit;


if(isset($_GET['filter']) && $_GET['filter']=='city') {

  $sql = "SELECT * FROM company inner join job_post on company.id_company=job_post.id_company WHERE city='$_GET[search]' LIMIT $start_from, $limit";

  $result = $conn->query($sql);
  if($result->num_rows > 0) {
    while($row1 = $result->fetch_assoc()) {
      // $sql1 = "SELECT * FROM job_post WHERE id_company='$row1[id_company]' LIMIT $start_from, $limit";
      //           $result1 = $conn->query($sql1);
      //           if($result1->num_rows > 0) {
      //             while($row = $result1->fetch_assoc()) 
      //             {
               ?>

         <div class="attachment-block clearfix">
                <img class="attachment-img" src="uploads/logo/<?php echo $row1['logo']; ?>" alt="Attachment Image">
                <div class="attachment-pushed">
                  <h4 class="attachment-heading"><a href="view-job-post.php?id=<?php echo $row1['id_jobpost']; ?>"><?php echo $row1['jobtitle']; ?></a> <span class="attachment-heading pull-right">$<?php echo $row1['maximumsalary']; ?>/Month</span></h4>
                  <div class="attachment-text">
                      <div><strong><?php echo $row1['companyname']; ?> | <?php echo $row1['city']; ?> | Experience <?php echo $row1['experience']; ?> Years</strong></div>
                  </div>
                </div>
              </div>

      <?php
        }
      
  }


} else {

  if(isset($_GET['filter']) && $_GET['filter']=='searchBar') {

    $search = $_GET['search'];
    $sql = "SELECT * FROM job_post  inner join company on company.id_company=job_post.id_company WHERE jobtitle LIKE '%$search%' LIMIT $start_from, $limit";
    

  } else if(isset($_GET['filter']) && $_GET['filter']=='experience') {
      $choice = $_GET['search'];
      //experience
    if($choice!=6)
   { $sql = "SELECT * FROM  job_post  inner join company on company.id_company=job_post.id_company WHERE experience>='$_GET[search]' LIMIT $start_from, $limit";  }
    else{   //sorting by salary
     $sql = "SELECT * FROM job_post  job_post  inner join company on company.id_company=job_post.id_company order by maximumsalary desc LIMIT $start_from, $limit";
    
    }

  }
//company sorting
  else if(isset($_GET['filter']) && $_GET['filter']=='company') {
      $choice = $_GET['search'];
 
  $sql = "SELECT * FROM job_post inner join company on company.id_company=job_post.id_company WHERE companyname='$_GET[search]' LIMIT $start_from, $limit";  
   
  }

  $result = $conn->query($sql);
  if($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      // $sql1 = "SELECT * FROM company WHERE id_company='$row[id_company]'";
      //           $result1 = $conn->query($sql1);
      //           if($result1->num_rows > 0) {
      //             while($row1 = $result1->fetch_assoc()) 
      //             {
               ?>

         <div class="attachment-block clearfix">
                <img class="attachment-img" src="uploads/logo/<?php echo $row['logo']; ?>" alt="Attachment Image">
                <div class="attachment-pushed">
                  <h4 class="attachment-heading"><a href="view-job-post.php?id=<?php echo $row['id_jobpost']; ?>"><?php echo $row['jobtitle']; ?></a> <span class="attachment-heading pull-right">$<?php echo $row['maximumsalary']; ?>/Month</span></h4>
                  <div class="attachment-text">
                      <div><strong><?php echo $row['companyname']; ?> | <?php echo $row['city']; ?> | Experience <?php echo $row['experience']; ?> Years</strong></div>
                  </div>
                </div>
              </div>

      <?php
        }
      }
    
}




$conn->close();