<?php
session_start();
include('config/config.php');
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
              <h3>Assuming the room is Empty</h3>
            </div>
            <div class="card-body">
              <form action ="resultdata.php" form method="POST">
                <div class="form-row">
                  <div class="col-md-6">
                    <label>Length in meters</label>
                    <input type="text" name="net_length" class="form-control" placeholder="Input a number">
                  </div>
                  <div class="col-md-6">
                    <label>Width in meters</label>
                    <input type="text" name="net_width" class="form-control" placeholder="Input a number">
                  </div>
                </div>
                <hr>
                <div class="form-row">
                <div class="col-md-6">
                    <label>For which Institution? </label>
                    <select name="net_layout_institution" class="form-control">
                  
                    <option>-- Please Select Institution -- </option>"Please Select an Institution">
                    <option>School</option> 
                    <option>Office</option> 
                  </select>
                  </div>
                
                  <div class="col-md-6">
                    <label>Ergonomically Designed? </label>
                    <select name="net_layout_institution" class="form-control">
                  
                    <option>-- Yes or No-- </option>
                    <option>Yes</option> 
                    <option>No</option> 
                  </select>
                  </div>
                </div><hr>
                <div class="form-row text-center">
                  <div class="col-md-12">
                    <input type="button"  value="Generate" class="btn btn-success"  id="generate_area" onclick="myGenerate()">
                 

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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script type="text/javascript">    
    $(document).ready(function(){
        $("#generate_area").click(function(){
            var input = $(this).val();
            //alert(input);
            
            if(input !=""){
                $.ajax({
                    url:"resultdata.php",
                    method:"POST",
                    data:{input:input}, 
                    
                });
                }
        });
    });

</script>
</html>