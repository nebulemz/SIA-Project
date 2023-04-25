<?php
session_start();
include('config/config.php');
include('config/checklogin.php');


check_login();
if (isset($_POST['UpdateProduct'])) {
  //Prevent Posting Blank Values
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

    $ret = "SELECT * FROM netlayout WHERE net_layout_id";
    $stmt = $mysqli->prepare($ret);
    $stmt->execute();
    $res = $stmt->get_result();
    while ($display = $res->fetch_object()) {
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
                <h3>Network Layout Plan</h3>
              </div>
              <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                  <div class="form-row">
                    <div class="col-md-12">
                      <label>Image</label>
                    <?php "<img src='assets/img/products/$display->net_image' height='250' width='300 class=''>"?> 
                    </div>
                  </div>
                  <hr>
                  <div class="form-row">
                    <div class="col-md-6">
                      <label>Product Image</label>
                      <input type="file" name="prod_img" class="btn btn-outline-success form-control" value="<?php echo $prod_img; ?>">
                    </div>
                    <div class="col-md-6">
                      <label>Product Price</label>
                      <input type="text" name="prod_price" class="form-control" value="<?php echo $prod->prod_price; ?>">
                    </div>
                  </div>
                  <hr>
                  <div class="form-row">
                    <div class="col-md-12">
                      <label>Product Description</label>
                      <textarea rows="5" name="prod_desc" class="form-control" value=""><?php echo $prod->prod_desc; ?></textarea>
                    </div>
                  </div>
                  <br>
                  <div class="form-row">
                    <div class="col-md-6">
                      <input type="submit" name="UpdateProduct" value="Update Product" class="btn btn-success" value="">
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
    }
      ?>
      </div>
  </div>
  <!-- Argon Scripts -->
  <?php
  require_once('partials/_scripts.php');
  ?>
</body>

</html>