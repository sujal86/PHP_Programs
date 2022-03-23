<?php 
  require 'db_con.php';
  include 'nav_bar.php';
  include 'side_bar.php';
  session_start();
    
  if (isset($_SESSION['id'])) {
    $user_id = $_SESSION['id'];
    
    $sql = " SELECT firstname FROM user_info WHERE user_id = '$user_id' ";
    $result = $conn->query($sql);
    if($result->num_rows > 0) {
      while ($row=$result->fetch_assoc()) {
        $firstname = $row['firstname'];
        $_SESSION['firstname'] = $firstname;
      }
    }
  } else {
    header('location: login.php');
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>TODO | Task</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <style>
    .error {
      color : red;
      width : 100%;
      margin-top : 1px;
    }
    #user_id {
      display : none;
    }
  </style>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6" style="margin : auto">
            <h1><?php echo "Hello " . $firstname . " Manage Your Tasks" ; ?></h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <form method="post" name="taskform" id="taskform">
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <section class="col-lg-6 connectedSortable" style="margin: auto">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">
                    <i class="fa fa-clipboard-list"></i>
                    Save Task
                  </h3>
                </div>
                <div class="card-body">
                  <div class="input-group mb-3">
                    <div>
                      <input type="text" name="user_id" id="user_id" value="<?php echo $user_id ?>">
                    </div>
                    
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-tasks"></i></span>
                    </div>
                      <input type="text" class="form-control" name="task_desc" id="task_desc" placeholder="Add Task" >
                    </div>
                    <div class="card-footer clearfix">
                      <button type="submit" name="submittask" id="submittask" class="btn btn-primary float-right">
                        <i class="fas fa-plus"></i> Save Task
                      </button>
                    </div>
                  </div>
                </div>
              </section>
            </div>
          </div><!-- /.container-fluid -->
      </section>
    </form>
    <!-- /.content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- /.card -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Task List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?php 
                      echo '<table id="example1" class="table table-bordered table-striped">'; 
                      echo "<thead class='text-center'>";
                      echo "<tr>";
                      echo "<th> Task ID</th>";
                      echo "<th> Task Description</th>";
                      echo "<th> Task Added</th>";
                      echo "<th> Update</th>";
                      echo "<th> Remove</th>";
                      echo "</tr>";
                      echo "</thead>";
                      echo "<tbody id='tbody'></tbody></table>";
                ?>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
  </div>
  <!-- /.content-wrapper -->
  <footer>
  <?php 
    require 'footer.php';
  ?>
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Datatable plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.js"></script>
<!-- AJAX -->
<script src="ajax_task.js"></script>
<script>
  // $(function () {
  //   $("#example1").DataTable({
  //     "responsive": true, "lengthChange": false, "autoWidth": false,
  //     "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
  //   }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  //   $('#example2').DataTable({
  //     "paging": true,
  //     "lengthChange": false,
  //     "searching": false,
  //     "ordering": true,
  //     "info": true,
  //     "autoWidth": false,
  //     "responsive": true,
  //   });
  // });
</script>
</body>
</html>