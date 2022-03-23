<?php
session_start();
if(isset($_SESSION['id'])) {
     header("Location: index.php");
     exit(); 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>TODO | LOGIN</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <style>
    .error {
      color : red;
      width : 100%;
      margin-top : 1px;
      /* display : block, */
    }
  </style>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <?php 
    // include 'nav_bar.php';
    // include 'side_bar.php';
  ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->

  <!-- Content Wrapper. Contains page content -->
  <!-- <div class="content-wrapper"> -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6" style="margin : auto; margin-top : 150px">
            <h1 class="text-center">Log in</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<form action="check_login.php" method="post" id="loginform" name="loginform">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-4" style="margin : auto">
            <div class="card card-info">
              <div class="card-body">
                <div class="input-group mb-3">
                  <div class="input-group-append">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                  </div>
                  <input type="email" class="form-control" name="emailid" id="emailid" placeholder="Email">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-append">
                      <span class="input-group-text"><i class="fas fa-eye"></i></span>
                    </div>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                  </div>
                  <div class="input-group mb-3">
                    <button type="submit" name="submit" class="btn btn-outline-success form-control" value="Submit"> Log In <i class="fa fa-paper-plane"></i> 
                    </div>
                  </div>
                  <div class="text-center">
                    Not a Member than <a href="../../Form_CRUD/first.html">Register</a> Here..
                  </div>
                <!-- /input-group -->
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <!--/.col (left) -->
          <!-- right column -->
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </form>
    <!-- form  -->
  <!-- </div> -->
  <!-- /.content-wrapper -->
  <footer>
    <?php 
    // include 'footer.php';
    ?>
  </footer>

  <!-- Control Sidebar -->
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- Page specific script -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.js"></script>
<script>

  jQuery('#loginform').validate({
    rules:{
      emailid: {
        required: true,
        email : true,
      },
      password: {
        required: true,
        minlength : 8,
      },
    }, 
    messages: {
      emailid: {
        required : "can't be empty",
        email : "Eneter Valid email id",
      },
      password: {
        required : "can't be empty",
        minlength : "Required minimum 8 character long",
      }
    },

    submitHanler:function (form) {
      form.submit();
    }
  });
 
</script>
</body>
</html>
