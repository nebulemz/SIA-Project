<!DOCTYPE html>
<html>
<head>
  <?php
  session_start();
  include('config/config.php');
  include('config/checklogin.php');

  // Delete customer
  if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $adn = "DELETE FROM product WHERE prod_id = ?";
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
</head>
<body>
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
    <div style="background-image: url(assets/img/theme/bg4.jpg); background-size: cover;" class="header  pb-8 pt-5 pt-md-8">
      <span class="mask bg-gradient-dark opacity-8"></span>
      <div class="container-fluid">
        <div class="header-body">
        </div>
      </div>
    </div>

    <!-- Main content -->
    <div class="main-content">

      <!-- Page content -->
      <div class="container-fluid mt--8">
        <!-- Table -->
        <div class="row">
          <div class="col">
            <div class="card shadow">
              <div class="card-header border-0">
                <label> Products </label>
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
                        <th scope="col">Quantity</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php while ($row = mysqli_fetch_assoc($res)) {
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
                            <input type="number" class="form-control quantity-input" min="1" value="1">
                          </td>
                          <td>
                            <button class="btn btn-sm btn-warning add-to-cart" data-price="<?php echo $prod_price; ?>" data-name="<?php echo $prod_name; ?>" data-image="<?php echo $prod_img; ?>">
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
    </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script type="text/javascript">
  $(document).ready(function() {
    // Add to Cart button click event
    $(".add-to-cart").click(function() {
      console.log("Add to Cart button clicked"); // Log a message when the button is clicked

      var price = parseFloat($(this).data("price"));
      var name = $(this).data("name");
      var image = $(this).data("image");
      var quantity = parseInt($(this).closest("tr").find(".quantity-input").val());

      if (isNaN(quantity) || quantity <= 0) {
        alert("Invalid quantity. Please enter a valid number greater than zero.");
        return;
      }

      var item = {
        name: name,
        price: price,
        image: image,
        quantity: quantity
      };

      console.log("Item:", item); // Log the item object

      // Save cart data in session
      $.ajax({
        url: "cart.php?item=" + encodeURIComponent(JSON.stringify(item)), // Encode the item data
        method: "GET",
        success: function(response) {
          console.log("Response:", response); // Log the response from the server
          alert("Item added to cart");
        }
      });
    });

    // Live search product keyup event
    $("#live_search_product").keyup(function() {
      console.log("Live search product keyup event"); // Log a message when the key is pressed

      var input = $(this).val();

      if (input !== "") {
        $.ajax({
          url: "productso.php",
          method: "POST",
          data: {
            input: input
          },
          success: function(data) {
            console.log("Response:", data); // Log the response from the server
            $("#table-data-product").html(data);
          }
        });
      }
    });
  });
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</body>
</html>
