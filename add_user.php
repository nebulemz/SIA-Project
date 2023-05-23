<?php
session_start();
include('config/config.php');
include('config/codegenerator.php');


//Add user
if (isset($_POST['adduser'])) {
  //Prevent Posting Blank Values
  if (empty($_POST["user_number"]) || empty($_POST["user_name"]) || empty($_POST['user_email']) || empty($_POST['user_password'])) {
    $err = "Blank Values Not Accepted";
  } else {
    $user_number = $_POST['user_number'];
    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $user_password = sha1(md5($_POST['user_password']));

    //Insert Captured information to a database table
    $postQuery = "INSERT INTO rpos_user (user_number, user_name, user_email, user_password) VALUES(?,?,?,?)";
    $postStmt = $mysqli->prepare($postQuery);
    //bind paramaters
    $rc = $postStmt->bind_param('ssss', $user_number, $user_name, $user_email, $user_password);
    $postStmt->execute();
    //declare a varible which will be passed to alert function
    if ($postStmt) {
      $success = "user Added" && header("refresh:1; url=hrm.php");
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
              <h3>Please Fill All Fields</h3>
            </div>
            <div class="card-body">
              <form method="POST">
                <div class="form-row">
                  <div class="col-md-6">
                    <label>User Number</label>
                    <input type="text" name="user_number" class="form-control" value="<?php echo $alpha; ?>-<?php echo $beta; ?>">
                  </div>
                  <div class="col-md-6">
                    <label>User Name</label>
                    <input type="text" name="user_name" class="form-control" value="">
                  </div>
                </div>
                <hr>
                <div class="form-row">
                  <div class="col-md-6">
                    <label>User Email</label>
                    <input type="email" name="user_email" class="form-control" value="">
                  </div>
                  <div class="col-md-6">
                    <label>User Password</label>
                    <input type="password" name="user_password" class="form-control" value="">
                  </div>
                </div>
                <br>
                <div class="form-row">
                  <div class="col-md-6">
                    <input type="submit" name="adduser" value="Add user" class="btn btn-success" value="">
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