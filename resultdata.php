<?php
session_start();
include('config/config.php');

//Add Staff
if (isset($_GET['addArea'])) {
  //Prevent Posting Blank Values
  if (empty($_GET["net_layout_area"])|| empty($_GET["net_institution"]) || empty($_GET['net_ergo'])) {
    $err = "Blank Values Not Accepted";
  } else {
    $net_layout_area = $_GET['net_layout_area'];
    $net_instituion = $_GET['net_institution'];
    $net_ergo = $_GET['net_ergo'];

    //Insert Captured information to a database table
    $postQuery = " SELECT FROM netlayout (net_layout_area, net_institution, net_ergo) VALUES(?,?,?)";
    $postStmt = $mysqli->prepare($postQuery);
    //bind paramaters
    $rc = $postStmt->bind_param('sss', $net_layout_area, $net_institution, $net_ergo);
    $postStmt->execute();
    //declare a varible which will be passed to alert function
    if ($postStmt) {
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
                <div class="form-row">
                <hr>

              </form>
            </div>
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