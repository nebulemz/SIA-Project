<!DOCTYPE html> 
<html>
<?php
session_start();
include('config/config.php');
include('config/checklogin.php');

//Delete customer
if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $adn = "DELETE FROM  product WHERE prod_id = ?";
  $stmt = $mysqli->prepare($adn);
  $stmt->bind_param('s', $id);
  $stmt->execute();
  $stmt->close();
  if ($stmt) {
    $success = "Deleted" && header("refresh:1; url=products.php");
  } else {
    $err = "Try Again Later";
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
            <label> Products </label>
            <div class="shopping-cart" style="float: right; margin-right:auto;">
              <div class="sum-prices">
                <!--Shopping cart logo-->
                <i class="fas fa-shopping-cart shoppingCartButton"></i>
                <!--The total prices of products in the shopping cart -->
                <h6 id="sum-prices"></h6>
              </div>
            </div>
            
            <div class="col-md-12">
              <input type="text" class="form-control" id="live_search_product" autocomplete="off" placeholder="Search">
              <table class="table align-items-center table-flush" id="table-data-product">
                <thead class="thead-light">
                  <?php
                  $ret = "SELECT * FROM product";
                  $stmt = $mysqli->prepare($ret);
                  $stmt->execute();
                  $res = $stmt->get_result();
                  ?>
                  <tr>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while ($row = mysqli_fetch_assoc($res)){
                    $prod_id = $row['prod_id'];
                    $prod_img = $row['prod_img'];
                    $prod_name = $row['prod_name'];
                    $prod_price = $row['prod_price'];
                  ?>
                  <tr>
                    <td>
                      <?php
                      if ($prod_img) {
                        echo "<img src='assets/img/products/$prod_img' height='60' width='60 class='img-thumbnail'>";
                      } else {
                        echo "<img src='assets/img/products/default.jpg' height='60' width='60 class='img-thumbnail'>";
                      }
                      ?>
                    </td>
                    <td><?php echo $prod_name; ?></td>
                    <td>₱<?php echo $prod_price; ?></td>
                    <td>
                      <button class="btn btn-sm btn-warning add-to-cart" data-price="<?php echo $prod_price; ?>">
                        <i class="fas fa-cart-plus"></i>
                        Add to Cart
                      </button>
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
  </div>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    // Initialize total price
    var totalPrice = 0;
    
    // Function to update the total price
    function updateTotalPrice() {
      $("#sum-prices").text("Total Price: ₱" + totalPrice.toFixed(2));
    }
    
    // Add to Cart button click event
    $(".add-to-cart").click(function() {
      var price = parseFloat($(this).data("price"));
      totalPrice += price;
      updateTotalPrice();
    });
    
    // Live search product keyup event
    $("#live_search_product").keyup(function() {
      var input = $(this).val();
      
      if (input !== "") {
        $.ajax({
          url: "productso.php",
          method: "POST",
          data: { input: input },
          success: function(data) {
            $("#table-data-product").html(data);
          }
        });
      }
    });
  });
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script type="text/javascript">    
    $(document).ready(function(){
        $("#live_search_product").keyup(function(){
            var input = $(this).val();
            //alert(input);
            
            if(input !=""){
                $.ajax({
                    url:"productso.php",
                    method:"POST",
                    data:{input:input}, 
                    
                    success:function(data){
                        $("#table-data-product").html(data);
                    }
                });
                }
        });
    });

</script>