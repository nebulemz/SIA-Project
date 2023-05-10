<!DOCTYPE html> 
<html>
<?php
session_start();
include('config/config.php');
include('config/checklogin.php');

check_login();
if (isset($_POST['make'])) {
  //Prevent Posting Blank Values
  if (empty($_POST["order_qty"])) {
    $err = "Blank Values Not Accepted";
  } else {

    $order_qty = $_POST['order_qty'];
   

    //Insert Captured information to a database table
    $postQuery = "INSERT INTO orders (order_qty) VALUES(?)";
    $postStmt = $mysqli->prepare($postQuery);
    //bind paramaters
    $rc = $postStmt->bind_param('s', $order_qty);
    $postStmt->execute();

    //Object productuct Quantity minus productuct Count 
    

    //declare a varible which will be passed to alert function
    if ($postStmt) {
      $success = "Order Submitted" && header("refresh:1; url=orders.php");
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

            <div class="card-header border-6">
              Select On Any Product To Make An Order
            </div>
            
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col"><b>Image</b></th>
                    <th scope="col"><b>Product Code</b></th>
                    <th scope="col"><b>Name</b></th>
                    <th scope="col"><b>Price</b></th>
                    <th scope="col"><b>Item Count</b></th>
                    <th scope="col"><b>Order Quantity</b></th>
                    <th scope="col"><b>Action</b></th>
                  </tr>
                </thead>

                <tbody>
                <div class="col-md-12">
                <label>Search Product</label>
                <?php
                //Load All productuct
                          
                 $ret = "SELECT * FROM  productuct ";
                 $stmt = $mysqli->prepare($ret);
                 $stmt->execute();
                 $res = $stmt->get_result();
                 while ($product = $res->fetch_object()) {
                 ?> 
                <option><?php echo $product->product_name; ?></option>
                 <?php
                 }
                
                 ?>

                </div>



                  <?php
                  $ret = "SELECT * FROM  productuct ";
                  $stmt = $mysqli->prepare($ret);
                  $stmt->execute();
                  $res = $stmt->get_result();
                  while ($product = $res->fetch_object()) {
                  ?>

                    <tr>
                      <td>
                        <?php
                        if ($product->product_img) {
                          echo "<img src='assets/img/productucts/$product->product_img' height='60' width='60 class='img-thumbnail'>";
                        } else {
                          echo "<img src='assets/img/productucts/default.jpg' height='60' width='60 class='img-thumbnail'>";
                        }

                        ?>
                      </td>
                      <td><?php echo $product->product_code; ?></td>
                      <td><?php echo $product->product_name; ?></td>
                      <td>₱<?php echo $product->product_price; ?></td>
                      <td><?php echo $product->product_count;?></td>      
                      <td> <input type="text" name="order_qty" class="form-control" value=""></td>         
                      <td>
                        <a href="make_oder.php?product_id=<?php echo $product->product_id; ?>&product_name=<?php echo $product->product_name; ?>&product_price=<?php echo $product->product_price; ?>">
                          <button class="btn btn-sm btn-warning">
                            <i class="fas fa-cart-plus"></i>
                            Add to Cart
                          </button>
                        </a>
                      </td>
                    
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
             
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
///  ?>
</body>


</html>