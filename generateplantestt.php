<?php
session_start();
include('config/config.php');

//Add Staff
if (isset($_POST['addArea'])) {
  //Prevent Posting Blank Values
  if (empty($_POST["net_layout_area"])|| empty($_POST["net_institution"]) || empty($_POST['net_ergo'])) {
    $err = "Blank Values Not Accepted";
  } else {
    $net_layout_area = $_POST['net_layout_area'];
    $net_instituion = $_POST['net_institution'];
    $net_ergo = $_POST['net_ergo'];

    //Insert Captured information to a database table
    $ret = "SELECT * FROM netlayout";
    $stmt = $mysqli->prepare($ret);
    $stmt->execute();
    $res = $stmt->get_result();
    //declare a varible which will be passed to alert function
    if ($res) {
      $success = "Generating Layout" && header("refresh:1; url=resultdata.php");
    } else {
      $err = "Please Try Again Or Try Later";
    }
  }
}
require_once('partials/_head.php');
?>

<body>
  <!-- Sidenav -->
  <?php
  require_once('partials/_sidebar.php');
  ?>
  <!-- Main content -->
  <div class="main-content">
    <!-- Top navbar -->
    <?php
    require_once('partials/_topnav.php');
    ?>
    <!-- Header -->
    <div style="background-image: url(assets/img/theme/restro00.jpg); background-size: cover;" class="header  pb-8 pt-5 pt-md-8">
    <span class="mask bg-gradient-dark opacity-8"></span>
      <div class="container-fluid">
        <div class="header-body">
        </div>
      </div>
    </div>
    <!-- Page content -->
     <div class="container-fluid mt--8">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
              <h3>Assuming the room is Empty </h3>
            </div>
            <div class="card-body">
              <form method="POST">
              <form action = "resultdata.php">
                <div class="form-row">
                  <div class="col-md-6">
                    <label>Area in square meter</label> 
                    <input type="text" name="net_layout_area" class="form-control" placeholer="Input a number">
                  </div>
                  <div class="col-md-6">
                    <label>For which Institution? </label>
                    <select name="net_institution" class="form-control">
                    <option>-- Please Select Institution -- </option>"Please Select Institution">
                    <option>School</option> 
                    <option>Institution</option> 
                  </select>
                  </div>
                </div>
                <hr>
                <div class="form-row">
                  <div class="col-md-6">
                    <label>Ergonomically Designed? </label>
                    <select name="net_ergo" class="form-control">
                  
                    <option>-- Yes or No-- </option>
                    <option>Yes</option> 
                    <option>No</option> 
                  </select>
                  </div>
                </div><hr>
                <div class="form-row text-center">
                  <div class="col-md-12">
                    <input type="submit" name="addArea" value="Generate" class="btn btn-success">
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Footer -->
      <?php
      require_once('partials/_footer.php');
      ?>
    </div>
  </div>
  <!-- Argon Scripts -->
  <?php
  require_once('partials/_scripts.php');
  ?>
</body>

</html>