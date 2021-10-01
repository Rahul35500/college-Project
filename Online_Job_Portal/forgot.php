
<?php

session_start();
error_reporting(0);

require_once("db.php");

// if(isset($_POST)) {
if(isset($_POST['change2'])){
  
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  
  $security_q = mysqli_real_escape_string($conn, $_POST['Security_question']);
  $security_a= mysqli_real_escape_string($conn, $_POST['Security_answer']);

  
  $sql = "SELECT id_user, firstname, lastname, email, active FROM users WHERE email='$email' AND security_question='$security_q' AND Security_answer='$security_a' ";
  $result = $conn->query($sql);

  
  if($result->num_rows > 0) {
  
    while($row = $result->fetch_assoc()) {
                 
              $_SESSION['id_user'] = $row['id_user'];  
                 $_SESSION['email'] = $row['email']; 
            header("Location: forgot3.php");
              
     
      } 
    }
  else {

    //if no matching record found in user table then redirect them back to login page
    $_SESSION['loginError'] = $conn->error;
    $_SESSION['errmsg']="email/ Security answer is wrong";
    header("Location: forgot.php");
    exit();
  }

  //Close database connection. Not compulsory but good practice.
  $conn->close();

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
  <!-- iCheck -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/skins/square/blue.css">

 

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>


<body class="hold-transition login-page ">
<div class="login-box"  style="background: #9ae0e7 ;">
  <div class="login-logo">
    <a href="index.php"><b>Job</b> Portal</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">

    <span style="color:red;" >
<?php
echo htmlentities($_SESSION['errmsg']);
?>
<?php
echo htmlentities($_SESSION['errmsg']="");
?>
  </span>
    <h2 class="login-box-msg">forgot password</h2>

    <form method="post"  >
      <div class="form-group has-feedback"  >
        <input type="email" class="form-control" id="email" name="email" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
            <div>
                 Security question :
                  <select id="Security"  class="form-control" name="Security_question">
                 
                    <option value="1">What is your car’s license plate number  </option>
                    <option value="2">What was your favorite elementary school teacher’s name?</option>
                    <option value="3">What is your pet’s name?</option>
                    <option value="4">What is your favorite song?</option>
                  </select> 
                
               </div>

               <div class="form-group">
                <input class="form-control input-lg" type="text" id="Security_answer" name="Security_answer" placeholder="Security answer" autocomplete="off">
              </div>

        <div class="col-xs-4">
          <button type="submit"  name="change2" class="btn btn-primary btn-block btn-flat">change</button>
        </div>
        <!-- /.col -->
      </div>

    </form>

    <br>

   

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="js/adminlte.min.js"></script>
<!-- iCheck -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
<script type="text/javascript">
      $(function() {
        $("#successMessage:visible").fadeOut(8000);
      });
    </script>
</body>
</html>
