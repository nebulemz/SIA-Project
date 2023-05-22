<?php
session_start();
include('config/config.php');
include('config/checklogin.php');

check_login();

if (isset($_GET['display'])) {
    $id = $_GET['display'];
    
    // Retrieve network layout details from the database
    $stmt = $mysqli->prepare("SELECT * FROM netlayout WHERE net_layout_id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $res = $stmt->get_result();
    
    if (mysqli_num_rows($res) == 1) {
        $row = mysqli_fetch_assoc($res);
        
        // Display network layout details on the page
        $net_layout_id = $row['net_layout_id'];
        $net_layout_area = $row['net_layout_area'];
        $net_institution = $row['net_institution'];
        $net_ergo = $row['net_ergo'];
        $net_length = $row['net_length'];
        $net_width = $row['net_width'];
        $net_image = $row ['net_image'];
        
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
                    <h2>Network Layout Details</h2>
                    <hr>
                    <a href="generateplantestt.php" class="btn btn-outline-success">
                         <i class="fas fa-user-plus"></i>
                            GENERATE ANOTHER LAYOUT
                         </a>

                         <div class="dropdown" style = "margin-left:650px">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Minimum
                           </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <a class="dropdown-item" href="#">Details</a>
                            </div>

                            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style = "background-color:#FFCC33; color:white">
                            Average
                           </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <a class="dropdown-item" href="#">Details</a>
                            </div>

                            <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            High-End
                           </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <a class="dropdown-item" href="#">Details</a>
                            </div>
                         </div>

                    <div class="card-body">
                        <div class="form-row">
                            <div class="col-md-6 center" style="margin-left: 50px";>
                            <img src="<?php echo $net_image ? 'assets/img/netlayout/' . $net_image : 'assets/img/products/default.jpg'; ?>" class="img-fluid mx-auto">
                        </div>
                    </div>                                                   
                    <div class="form-row">
                        <div class="col-md-6">
                            <strong>Network Area:</strong> <?php echo $net_layout_area; ?> sqm<br>
                            <strong>Institution:</strong> <?php echo $net_institution; ?><br>
                            <strong>Ergonomics:</strong> <?php echo $net_ergo; ?><br>
                            <strong>Length:</strong> <?php echo $net_length; ?> m<br>
                            <strong>Width:</strong> <?php echo $net_width; ?> m<br></br>
                            <strong>LEGEND:</strong><br>
                            <strong>R:</strong> Router
                            <strong>S:</strong> Switches
                            </div>
                            <div class="col-md-6" style="text-align: right;">
                            
                            <?php
                            
                                $stmt = $mysqli->prepare("SELECT no_pcs FROM netlayout");
                                $stmt->execute();
                                $res = $stmt->get_result();

                                if ($res->num_rows > 0) {
                                    $row = $res->fetch_assoc();
                                    $num_computers = intval($row["no_pcs"]);
                              
                                }
                                
                            ?>
                       
                            </div>
                        </div>
                        <hr>
                        </form>
                        <button type="button" class="btn btn-primary" onclick="window.print()">Print</button>
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

  ?>
    </body>

        <?php
    } else {
        // Network layout not found
        $err = "Network layout not found";
        header("location: index.php?err=$err");
    }
} else {
    // No network layout ID provided
    $err = "No network layout ID provided";
    header("location: index.php?err=$err");
}


?>