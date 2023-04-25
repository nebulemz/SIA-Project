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

    //Object Product Quantity minus Product Count 
    

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
              Assuming the room is Empty
            </div>
                <div class="col-md-12">
                <input type="text" class="form-control" id="live_search_order" autocomplete="off" 
                placeholder="Search">
                </div>
              </div>
            </div>
          </div>
      </div>

</body>

<div id="searchresultorder"></div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script type="text/javascript">    
    $(document).ready(function(){
        $("#live_search_order").keyup(function(){
            var input = $(this).val();
            //alert(input);
            
            if(input !=""){
                $.ajax({
                    url:"resultdata.php",
                    method:"POST",
                    data:{input:input},
                    
                    success:function(data){
                        $("#searchresultorder").html(data).show();
                        $("#searchresultorder").css("display","block");
                    }
                });
            }else{
                $("#searchresultorder").css("display","block").show();
                }
        });
    });

</script>
    </body>
    </html> 
