<!DOCTYPE html>
<html>
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

<body>
<?php
  if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    echo "<table>";
    echo "<tr><th>Image</th><th>Name</th><th>Price</th><th>Quantity</th><th>Action</th></tr>";
    foreach ($_SESSION['cart'] as $index => $item) {
      echo "<tr>";
      echo "<td><img src='assets/img/products".$item['image']."' class='product-image'></td>";
      echo "<td>".$item['name']."</td>";
      echo "<td>".$item['price']."</td>";
      echo "<td>".$item['quantity']."</td>";
      echo "<td><a href='cart.php?remove=".$index."'>Remove</a></td>";
      echo "</tr>";
    }
    echo "</table>";
    echo "<p>Total Amount: ₱" . number_format($totalAmount, 2) . "</p>";
  } else {
    echo "<p>Cart is empty</p>";
  }
  ?>

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
    <div style="background-image: url(assets/img/theme/bg4.jpg); background-size: cover;" class="header  pb-8 pt-5 pt-md-8">
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
              <div class="col-md-12">
                <table class="table align-items-center table-flush" id="table-data-product">
                  <thead class="thead-light">
                  <h1>Cart</h1>

<?php
if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
  echo "<table>";
  echo "<tr><th>Image</th><th>Name</th><th>Price</th><th>Quantity</th><th>Action</th></tr>";
  foreach ($_SESSION['cart'] as $index => $item) {
    echo "<tr>";
    echo "<td><img src='assets/img/products".$item['image']."' class='product-image'></td>";
    echo "<td>".$item['name']."</td>";
    echo "<td>".$item['price']."</td>";
    echo "<td>".$item['quantity']."</td>";
    echo "<td><a href='cart.php?remove=".$index."'>Remove</a></td>";
    echo "</tr>";
  }
  echo "</table>";
  echo "<p>Total Amount: ₱" .number_format($totalAmount, 2). "</p>";
} else {
  echo "<p>Cart is empty</p>";
}
?>
</div>
                  </tbody>
                </table>
              </div>
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
// Add to Cart button click event
$(".add-to-cart").click(function() {
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

  // Save cart data in session
  $.ajax({
    url: "cart.php?item=" + JSON.stringify(item), // Include the image in the item object
    method: "GET",
    success: function(response) {
      alert("Item added to cart");
    }
  });
});

    // Live search product keyup event
    $("#live_search_product").keyup(function() {
      var input = $(this).val();

      if (input !== "") {
        $.ajax({
          url: "productso.php",
          method: "POST",
          data: {
            input: input
          },
          success: function(data) {
            $("#table-data-product").html(data);
          }
        });
      }
    });
  });
</script>
</html>