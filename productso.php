<?php
session_start();
include('config/config.php');
include('config/checklogin.php');

if (isset($_POST['input'])){
  $input = $_POST['input'];

  $ret = "SELECT * FROM  product WHERE prod_name LIKE '%{$input}%'";
  $stmt = $mysqli->prepare($ret); 
  $stmt->execute();
  $res = $stmt->get_result();

  if (mysqli_num_rows($res) > 0){?>
  
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                <tr>
                <th scope="col">Image</th>

                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Item Count</th>
                <th scope="col">Action</th>
              </tr> 
              </thead>
              <tbody>
              <?php
                while ($row = mysqli_fetch_assoc($res)) {

                  $prod_id = $row['prod_id'];
                  $prod_img = $row['prod_img'];
         
                  $prod_name = $row['prod_name'];
                  $prod_price = $row['prod_price'];
      
                  ?>
              <tr>
                  <td> <?php
                      if ($prod_img) {
                        echo "<img src='assets/img/products/$prod_img' height='60' width='60 class='img-thumbnail'>";
                      } else {
                        echo "<img src='assets/img/products/default.jpg' height='60' width='60 class='img-thumbnail'>";
                      }

                      ?></td>
          
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
                      </td>

              </tr>
              <?php
              }
              ?>
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
     <?php
  }else{  
      $err = "No Data Found";
  }
}
require_once('partials/_head.php');
?>

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
});
</script>

