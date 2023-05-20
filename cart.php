<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
?>

  <!-- Sidenav -->
  <?php
  require_once('partials/_sidebar.php');
  ?>
  <!-- Main content -->
  <div class="main-content">
    <!-- Top navbar -->

    <!-- Header -->
    <div style="background-image: url(assets/img/theme/restro00.jpg); background-size: cover;" class="header  pb-8 pt-5 pt-md-8">
      <span class="mask bg-gradient-dark opacity-8"></span>
      <div class="container-fluid">
        <div class="header-body">
        </div>
      </div>
    </div>
    
<?php

if (isset($_GET['item'])) {
  $item = json_decode($_GET['item'], true);

  // Process the item data and add it to the cart
  // You can store the cart data in the session or a database

  // Example: Storing the cart data in the session
  if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
  }

  $_SESSION['cart'][] = $item;

  // You can also redirect the user to a different page or display a success message
  // header("Location: cart.php");
  // exit();
}

// Remove item from the cart
if (isset($_GET['remove'])) {
  $removeIndex = $_GET['remove'];

  if (isset($_SESSION['cart'][$removeIndex])) {
    unset($_SESSION['cart'][$removeIndex]);
  }
}

// Calculate the total amount in the cart
$totalAmount = 0;
if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
  foreach ($_SESSION['cart'] as $item) {
    $totalAmount += $item['price'] * $item['quantity'];
  }
}

// Display the cart contents or any other cart-related functionality
?>
<!DOCTYPE html>
<html>
<head>
  <title>Cart</title>
  <style>
    .product-image {
      width: 60px;
      height: 60px;
      object-fit: cover;
    }
  </style>
</head>
<body>
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
    echo "<p>Total Amount: ₱" . number_format($totalAmount, 2) . "</p>";
  } else {
    echo "<p>Cart is empty</p>";
  }
  ?>
</body>
</html>






