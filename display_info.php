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
        $no_pcs = $row ['no_pcs'];
        $low_total_price = $row ['low_total_price'];
        $ave_total_price = $row ['ave_total_price'];
        $high_total_price = $row ['high_total_price'];
        $switch_model = $row ['switch_model'];
        
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

<<<<<<< HEAD
                <div class = "dropdown col-6" style = "float:right">
                          <div class="dropdown">
                                  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                                    Minimum
                                  </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style ="width:570px">
                                  <a class="dropdown-item" href=""><b>Details:</b>
                                    <div class = "row">
                                      <div class = "col-6">
                                        <strong>Number of PCs:</strong> <?php echo $no_pcs; ?> <br>
                                        <strong>Number of Tables:</strong> <?php echo $no_pcs; ?><br>
                                        <strong>Number of Chairs:</strong> <?php echo $no_pcs; ?><br> <br>
                                        <strong>Switch Model:</strong> <?php echo $switch_model; ?><br> <br>
                                        <br>

                                        <strong>Specs for Minimum:</strong><br>
                                        <strong>CPU</strong> - Intel Core I3-10100F (3.6GHZ) Processor                      <br>
                                        <strong>SSD</strong> - Kingston SSDNow A400 240GB SATA 2.5                          <br>
                                        <strong>RAM</strong> – Patriot CL19 RAM 8GB DDR4                                    <br>
                                        <strong>MONITOR</strong> – Nvision N190HD 19 Inch LED Monitor                       <br>
                                        <strong>UPS</strong> –                                                              <br>
                                        <strong>KB & M</strong> – A4Tech KRS-8572 Usb Keyboard and Mouse Black              <br>
                                        <strong>PSU</strong> – Gigabyte P450B 450 watts 80 Plus Bronze 120mm                <br>
                                        <strong>CASE</strong> – Honeycomb Micro ATX                                         <br></a>
                                      </div>
                                    
                                      <div class = "col-6" style = padding-left:130px><br><br><br><br><br><br><br>
                                      <a class="dropdown-item" href="">
                                      <b>(P4,695.00)</b><br>
                                      <b>(P2,850.00)</b><br>
                                      <b>(P1425)</b><br>
                                      <b>(P1999)</b><br>
                                      <b>(P1650)</b><br>
                                      <b>(P490)</b><br>
                                      <b>(P2150)</b><br>
                                      <b>(P436)</b>
                                      <hr>
                                      Total Price: <b><?php echo $low_total_price; ?> </b></a>
                                      </div>

                                    </div>
                              </div>
=======
                         <div class="dropdown" style = "margin-left:650px">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Minimum
                           </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <a class="dropdown-item" href="#">Details:</a>
>>>>>>> parent of 41d4482 (Merge branch 'master' of https://github.com/nebulemz/SIA-Project)
                            </div>

                            <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style = "background-color:#FFCC33; color:white">
                            Average
                           </button>
                           <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style ="width:570px">
                                  <a class="dropdown-item" href=""><b>Details:</b>
                                    <div class = "row">
                                      <div class = "col-6">
                                        <strong>Number of PCs:</strong> <?php echo $no_pcs; ?> <br>
                                        <strong>Number of Tables:</strong> <?php echo $no_pcs; ?><br>
                                        <strong>Number of Chairs:</strong> <?php echo $no_pcs; ?><br> <br>
                                        <strong>Switch Model:</strong> <?php echo $switch_model; ?><br> <br>
                                        <br>

                                        <strong>Specs for Average:</strong><br>
                                        <strong>CPU</strong> - Intel Core I3-13100 Processor                                <br>
                                        <strong>SSD</strong> - Crucial MX500 250GB 3D NAND SATA 2.5-inch SSD                <br>
                                        <strong>RAM</strong> – Kingston Fury Beast 8GB DDR4                                 <br>
                                        <strong>MONITOR</strong> – Nvision N2255-B 21.5" 75HZ IPS Monitor                    <br>
                                        <strong>UPS</strong> –                                                              <br>
                                        <strong>KB & M</strong> – A4Tech KRS-8572 Usb Keyboard and Mouse Black               <br>
                                        <strong>PSU</strong> – Gigabyte P450B 450 watts 80 Plus Bronze 120mm                <br>
                                        <strong>CASE</strong> – Honeycomb Micro ATX                                         <br></a>
                                      </div>
                                    
                                      <div class = "col-6" style = padding-left:130px><br><br><br><br><br><br><br>
                                      <a class="dropdown-item" href="">
                                      <b>(P4,799.00)</b><br>
                                      <b>(P1,653.00)</b><br>
                                      <b>(P2442)</b><br>
                                      <b>(P3495)</b><br>
                                      <b>(P1650)</b><br>
                                      <b>(P490)</b><br>
                                      <b>(P2150)</b><br>
                                      <b>(P436)</b>
                                      <hr>
                                      Total Price: <b><?php echo $ave_total_price; ?> </b></a>
                                      </div>

                                    </div>
                              </div>
                            </div>

                          <div class="dropdown">
                            <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            High-End
                           </button>
                           <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style ="width:570px">
                                  <a class="dropdown-item" href=""><b>Details:</b>
                                    <div class = "row">
                                      <div class = "col-6">
                                        <strong>Number of PCs:</strong> <?php echo $no_pcs; ?> <br>
                                        <strong>Number of Tables:</strong> <?php echo $no_pcs; ?><br>
                                        <strong>Number of Chairs:</strong> <?php echo $no_pcs; ?><br> <br>
                                        <strong>Switch Model:</strong> <?php echo $switch_model; ?><br> <br>
                                        <br>

                                        <strong>Specs for Average:</strong><br>
                                        <strong>Desktop</strong> - iMac    <br>
                                        <strong>CPU</strong> - Apple M1 chip with 8-core CPU                             <br>
                                        <strong>SSD</strong> - 256GB SSD storage                <br>
                                        <strong>RAM</strong> – 8GB unified memory                                 <br>
                                        <strong>MONITOR</strong> – Built-in 24-inch Apple Monitor                   <br>
                                        <strong>UPS</strong> –                                                              <br>
                                        <strong>KB & M</strong> – Magic Mouse and Magic Keyboard             <br>
                                        <br>Price per piece: <b> 79990 </b><br>
                                        Total Price: <b><?php echo $high_total_price; ?> </b></a>
                                      </div>
                                      
                                    

                                    </div>
                              </div>
                            </div>
<<<<<<< HEAD
                      </div>
                  </div>
                </div>
                    <hr>
                 
=======
                         </div>
>>>>>>> parent of 41d4482 (Merge branch 'master' of https://github.com/nebulemz/SIA-Project)

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