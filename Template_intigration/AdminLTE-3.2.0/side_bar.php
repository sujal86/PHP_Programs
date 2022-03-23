<?php 
  session_status();
  
  if (isset($_SESSION['id'])) {
    $user_id = $_SESSION['id'];

    $db_host="localhost";
    $db_user="root";
    $db_passwd="";
    $db_name="todo";

    $conn=new mysqli($db_host,$db_user,$db_passwd,$db_name);
    $sql = " SELECT firstname FROM user_info WHERE user_id = '$user_id' ";
    $result = $conn->query($sql);
    if($result->num_rows > 0) {
      while ($row=$result->fetch_assoc()) {
        $firstname = $row['firstname'];
        $_SESSION['firstname'] = $firstname;
      }
    }
  }

?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">A TODO</span>
    </a>
   
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Sujal Shah</a>
        </div>
      </div>
   
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="index.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="add.php" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Tasks
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="logout.php" class="nav-link">
              <i class="nav-icon fas fa-power-off"></i>
              <p>
                LOGOUT
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>