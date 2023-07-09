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
        $no_standard_table = $row ['no_standard_table'];
        $no_Lshape = $row ['no_Lshape'];
        $no_Ushape = $row ['no_Ushape'];
        $no_standard_school = $row ['no_standard_school'];
        
require_once('partials/_head.php');
?>

<head>
<link rel="stylesheet" href="makeplanstyle.css"></head>
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
          <div class="card shadow">
            <div class="card-header border-0">
              <div class = "row">
                <div class = "col-md-6">
                  <h2>Customize your Layout: 5x5 Dimension</h2>
                </div>
                <div class = "col-md-6">
                <a href="generateplantestt.php" class="btn btn-outline-success" style="float: right">
                         <i class="fas fa-user-plus"></i>
                            GENERATE ANOTHER LAYOUT
                         </a>
                </div>
              </div>  

              <div class = "row">
              <div class = "dropdown col-md-6" style = "float:left">
                          <div class="dropdown">
                                  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                                    Minimum
                                  </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style ="width:570px">
                                  <a class="dropdown-item" href=""><b>Details:</b>
                                    <div class = "row">
                                      <div class = "col-6">
                                        <strong>Number of PCs:</strong> <?php echo $no_pcs; ?> <br>
                                        <strong>Number of Tables:</strong> <?php echo $no_pcs; ?><b>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        Standard:</b> <?php echo $no_standard_table; ?> <b>&nbsp;&nbsp;&nbsp;L-shape:</b> <?php echo $no_Lshape; ?> <b>&nbsp;&nbsp;&nbsp; U-shape:</b> <?php echo $no_Ushape; ?><br>
                                        <strong>Number of Chairs:</strong> <?php echo $no_pcs; ?><br> <br>
                                        <strong>Switch Model:</strong> <?php echo $switch_model; ?> ports<br> <br>
                                        <br>

                                        <strong>Specs for Minimum:</strong><br>
                                        <strong>CPU</strong> - Intel Core I3-10100F Processor                               <br>
                                        <strong>MoBo</strong> - Asus Prime H610M-K D4, LGA1700, MATX, 2*Ddr4                <br>
                                        <strong>SSD</strong> - Kingston SSDNow A400 240GB SATA 2.5                          <br>
                                        <strong>RAM</strong> – Patriot CL19 RAM 8GB DDR4                                    <br>
                                        <strong>MONITOR</strong> – Nvision N2255-B 21.5" 75HZ IPS Monitor                     <br>
                                        <strong>UPS</strong> – Secure 650VA UPS Frequency:50hz – 60hz (BLACK)               <br>
                                        <strong>KB & M</strong> – A4Tech KRS-8572 Usb Keyboard and Mouse Black              <br>
                                        <strong>PSU</strong> – Gigabyte P450B 450 watts 80 Plus Bronze 120mm                <br>
                                        <strong>CASE</strong> – Honeycomb Micro ATX                                         <br></a>
                                      </div>
                                    
                                      <div class = "col-4" style = padding-left:130px><br><br><br><br><br><br><br>
                                      <a class="dropdown-item" href="">
                                      <b>(P4,695.00)</b><br>
                                      <b>(P4,625.00)</b><br>
                                      <b>(P969.00)</b><br>
                                      <b>(P1,495)</b><br>
                                      <b>(P3,495)</b><br>
                                      <b>(P1,650)</b><br>
                                      <b>(P490)</b><br>
                                      <b>(P2,150)</b><br>
                                      <b>(P436)</b>
                                      <hr>
                                      Total Price: <b><?php echo  ($no_pcs * (4695 + 4625 + 969 + 1495 + 3495 + 1650 + 490 + 2150 + 436 + 2999) + $no_standard_table * (4390) + $no_Lshape * (11990) + $no_Lshape * (15780)); ?> </b></a>
                                      </div>

                                    </div>
                            </div>
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
                                        <strong>Number of Tables:</strong> <?php echo $no_pcs; ?> <b> 
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        Standard:</b> <?php echo $no_standard_table; ?> <b>&nbsp;&nbsp;&nbsp;L-shape:</b> <?php echo $no_Lshape; ?> <b>&nbsp;&nbsp;&nbsp; U-shape:</b> <?php echo $no_Ushape; ?><br>
                                        <strong>Number of Chairs:</strong> <?php echo $no_pcs; ?><br> <br>
                                        <strong>Switch Model:</strong> <?php echo $switch_model; ?><br> <br>
                                        <br>

                                        <strong>Specs for Average:</strong><br>
                                        <strong>CPU</strong> - Intel Core I3-13100 Processor                                <br>
                                        <strong>MoBo</strong> - Asus Prime H610M-K D4, LGA1700, MATX, 2*Ddr4                <br>
                                        <strong>HDD</strong> - Western Digital 1tb Harddisk Drive Blue                      <br>
                                        <strong>SSD</strong> - Crucial MX500 250GB 3D NAND SATA 2.5-inch SSD                <br>
                                        <strong>RAM</strong> – Kingston Fury Beast 8GB DDR4                                 <br>
                                        <strong>MONITOR</strong> – 24" LG Ultragear 24GN60R-B LED 144hz                     <br>
                                        <strong>UPS</strong> – Secure 650VA UPS Frequency:50hz – 60hz (BLACK)               <br>
                                        <strong>KB & M</strong> – A4Tech KRS-8572 Usb Keyboard and Mouse Black              <br>
                                        <strong>PSU</strong> – Gigabyte P450B 450 watts 80 Plus Bronze 120mm                <br>
                                        <strong>CASE</strong> – Honeycomb Micro ATX                                         <br></a>
                                      </div>
                                    
                                      <div class = "col-6" style = padding-left:130px><br><br><br><br><br><br><br>
                                      <a class="dropdown-item" href="">
                                      <b>(P4,799.00)</b><br>
                                      <b>(P4,625.00)</b><br>
                                      <b>(P2,259.00)</b><br>
                                      <b>(P1,653.00)</b><br>
                                      <b>(P2,442)</b><br>
                                      <b>(P10,625)</b><br>
                                      <b>(P1,650)</b><br>
                                      <b>(P490)</b><br>
                                      <b>(P2,150)</b><br>
                                      <b>(P436)</b>
                                      <hr>
                                      Total Price: <b><?php echo $no_pcs * (4799 + 4625 + 2259 + 1653 + 2442 + 10625 + 1650 + 490 + 2150 + 436 + 2999) + $no_standard_table * (4390) + $no_Lshape * (11990) + $no_Lshape * (15780) + $no_standard_school * (1990)?> </b></a>
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
                                        <strong>Number of Tables:</strong> <?php echo $no_pcs; ?>
                                        <b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        Standard:</b> <?php echo $no_standard_table; ?> <b>&nbsp;&nbsp;&nbsp;L-shape:</b> <?php echo $no_Lshape; ?> <b>&nbsp;&nbsp;&nbsp; U-shape:</b> <?php echo $no_Ushape; ?><br>
                                        <strong>Number of Chairs:</strong> <?php echo $no_pcs; ?><br> <br>
                                        <strong>Switch Model:</strong> <?php echo $switch_model; ?><br> <br>
                                        <br>

                                        <strong>Specs for Average:</strong><br>
                                        <strong>Desktop</strong> - iMac    <br>
                                        <strong>CPU</strong> - Apple M1 chip with 8-core CPU                        <br>
                                        <strong>SSD</strong> - 256GB SSD storage                                    <br>
                                        <strong>RAM</strong> – 8GB unified memory                                   <br>
                                        <strong>MONITOR</strong> – Built-in 24-inch Apple Monitor                   <br>
                                        <strong>UPS</strong> –  Secure 650VA UPS Frequency:50hz – 60hz (BLACK)      <br>
                                        <strong>KB & M</strong> – Magic Mouse and Magic Keyboard                    <br>
                                        <br>Price per piece: <b> 79990 </b>
                                        <hr>
                                        Total Price: <b><?php echo $high_total_price; ?> </b></a>
                                      </div>
                                      
                                    </div>
                                </div>
                              </div>
                    </div>
                  </div>
                  <hr>
                </div>

            <!-- ITEMS COLUMN -->
            <div class = "col-md-12" id = "form-container">
              <div class="row">
                     <div class="col-md-4" style = "padding-right: 150px; padding-left: 30px;" > <b style = "margin-top: 10px;"> ITEMS TO ADD: </b>
                        <div><button class="collapsible" style = "margin-top: 10px;"><b>Cubicles</b></button> 
                          <div class="content" id = "scroll-box" style = "display:none">
                            <div class="drag-element-source drag-element">
                              <div class="rect" style = "margin-bottom: 110px;"><img src="assets/img/items/cubicle.png" draggable="false"/>  
                                <div class="middle desc" style = "padding-left: 110px; padding-top: 90px;"> <b>L-shape Cubicle </b> <br>200cmX185cm</div>
                              </div>
                            </div>
                
                            <div class="drag-element-source drag-element">
                              <div class="rect" style = "margin-left: 2px"><img src="assets/img/items/U-shaped_cubicle.png" draggable="false"/>
                              <div class="middle desc" style = "margin-left:45px; margin-top: 80px"> <b>U-shape Cubicle </b> <br>260cmX185cm</div>
                            </div>
                            </div>
                        </div>
                        </div>

                        <div><button class="collapsible"><b>Tables</b></button> 
                          <div class="content" id = "scroll-box" style = "display:none">
                            <div class="drag-element-source drag-element">
                              <div class="rect" style = "margin-top: 10px; margin-left: 11px"><img src="assets/img/items/L-table.png" draggable="false"/>
                              <div class="middle desc" style = "margin-left: 50px; margin-top: 30px"> <b>L-shaped Table </b> <br>155cmX130cm</div>
                              </div>
                            </div>

                            <div class="drag-element-source drag-element">
                              <div class="rect" style = "margin-top: 70px; margin-left: -3px"><img src="assets/img/items/U-table.png" draggable="false"/>
                              <div class="middle desc" style = "margin-left: 55px; margin-top: 30px"> <b>U-shaped Table </b> <br>195cmX155cm</div>
                            </div>
                            </div>

                            <div class="drag-element-source drag-element">
                              <div class="rect" style = "margin-top: 90px; margin-left:2px;"><img src="assets/img/items/table_standard.png" draggable="false"/>
                              <div class="middle desc" style = "margin-left: 16px; margin-top: -19px; color: white"> <b>Standard Table</b> <br>120cmX60cm</div>
                            </div>
                            </div>

                            <div class="drag-element-source drag-element">
                              <div class="rect" style = "margin-left: -4px; margin-top: -15px;"><img src="assets/img/items/computer_desk.png" draggable="false"/>
                              <div class="middle desc" style = "margin-left: 11px; margin-top: -15px;"> <b>Computer Desk</b> <br>100cmX60cm</div>
                            </div>
                            </div>

                            <div class="drag-element-source drag-element">
                              <div class="rect" style = "margin-left: 6px; margin-top: -15px;"><img src="assets/img/items/computer_table.png" draggable="false"/>
                              <div class="middle desc" style = "margin-left: -8px; margin-top: -28px;"> <b>Computer Table</b> <br>80cmX55cm</div>
                            </div>
                            </div>

                            <div class="drag-element-source drag-element">
                              <div class="rect" style = "margin-left: 9px; margin-top: -25px;"><img src="assets/img/items/workstation.png" draggable="false"/>
                              <div class="middle desc" style = "margin-left: 18px; margin-top: -28px;"> <b>Workstation</b> <br>140cmX60cm</div>
                            </div>
                            </div>

                          </div>
                        </div>

                        <div><button class="collapsible"><b>Chairs</b></button> 
                          <div class="content" id = "scroll-box" style = "display:none; height:200px">
                            <div class="drag-element-source drag-element">
                              <div class="rect" style = "margin-top: 20px; margin-left: 8px"><img src="assets/img/items/office_chair.png" draggable="false"/>
                              <div class="middle desc" style = "color:whitesmoke; margin-top: -20px; margin-left:-17px"> <b >Office Chair </b> <br>63cmX66cm</div>
                              </div>
                            </div>

                            <div class="drag-element-source drag-element">
                              <div class="rect" style = "margin-top: 20px; margin-left: -35px"><img src="assets/img/items/office_chair2.png" draggable="false"/>
                              <div class="middle desc" style = "color:gray; margin-top: -20px; margin-left: 0px"> <b >Small Office Chair </b> <br>53cmX57cm</div>
                              </div>
                            </div>

                            <div class="drag-element-source drag-element">
                              <div class="rect" style = "margin-top: -30px; margin-left: -12px"><img src="assets/img/items/school_chair.png" draggable="false"/>
                              <div class="middle desc" style = "margin-top: -20px; margin-left:0px"> <b >School Chair</b> <br>42cmX47cm</div>
                              </div>
                            </div>

                          
                          </div>
                        </div>

                        <div><button class="collapsible"><b>Network Equipments</b></button> 
                          <div class="content" id = "scroll-box" style = "display:none; height:200px">
                            <div class="drag-element-source drag-element">
                              <div class="rect" style = "margin-top: 20px;"><img src="assets/img/items/computer.png" draggable="false"/>
                              <div class="middle desc" style = "margin-left: -5px; margin-top: -20px"> <b>Computer </b> <br>60cmX43cm</div>
                              </div>
                            </div>

                            <div class="drag-element-source drag-element">
                              <div class="rect" style = "margin-top: -25px;"><img src="assets/img/items/switch.png" draggable="false"/>
                              <div class="middle desc" style = "margin-left: -30px; padding-left: 100px; margin-top: -27px"> <b>Switch </b> </div>
                              </div>
                            </div>

                            <div class="drag-element-source drag-element">
                              <div class="rect" style = "margin-top: -60px; margin-left: -3px;"><img src="assets/img/items/router.png" draggable="false"/>
                              <div class="middle desc" style = "margin-left: -30px; padding-left: 100px; margin-top: -27px"> <b>Router </b></div>
                              </div>
                            </div>

                          </div>
                        </div>

                        <div><button class="collapsible"><b>Others</b></button> 
                          <div class="content" id = "scroll-box" style = "display:none;">
                            <div class="drag-element-source drag-element">
                              <div class="rect" style = "margin-left: 15px; margin-top: 20px;"><img src="assets/img/items/door.png" draggable="false"/>
                              <div class="middle desc" style = "margin-left: -15px; margin-top: -18px"> <b>Door </b> <br>68cmX68cm</div>
                              </div>
                            </div>

                            <div class="drag-element-source drag-element">
                              <div class="rect" style = "margin-left: 0px; margin-top: -10px;"><img src="assets/img/items/cabinet.png" draggable="false"/>
                              <div class="middle desc" style = "margin-left: -20px; margin-top: -18px"> <b>File Cabinet</b> <br>43cmX52cm</div>
                              </div>
                            </div>

                            <div class="drag-element-source drag-element">
                              <div class="rect" style = "margin-left: 0px; margin-top: -10px;"><img src="assets/img/items/cabinet2.png" draggable="false"/>
                              <div class="middle desc" style = "margin-left: -4px; margin-top: -27px"> <b>Cupboard </b> <br>80cmX35cm</div>
                              </div>
                            </div>

                            <div class="drag-element-source drag-element">
                              <div class="rect" style = "margin-left: -15px; margin-top: -30px;"><img src="assets/img/items/cabinet3.png" draggable="false"/>
                              <div class="middle desc" style = "margin-left: 20px; margin-top: -18px; color:white"> <b> File Cabinet </b> <br>99cmX56cm</div>
                              </div>
                            </div>

                            <div class="drag-element-source drag-element">
                              <div class="rect" style = "margin-left: 0px; margin-top: -10px;"><img src="assets/img/items/cabinet4.png" draggable="false"/>
                              <div class="middle desc" style = "margin-left: 15px; margin-top: -20px"> <b>Office Cabinet </b> <br>117cmX53cm</div>
                              </div>
                            </div>

                            <div class="drag-element-source drag-element">
                              <div class="rect" style = "margin-left: 0px; margin-top: -20px;"><img src="assets/img/items/cabinet5.png" draggable="false"/>
                              <div class="middle desc" style = "margin-left:43px; margin-top: -20px"> <b>Cabinet </b> <br>160cmX45cm</div>
                              </div>
                            </div>


                          </div>
                        </div>
                      </div> 

                    <!-- EDIT COLUMN -->
                    <div class="col-md-6">
                      <div id = "plane-container" style = "height: 143mm; width: 143mm;">
                      <p><b>5x5</b></p>
                      <div class="drag-element" style = "margin-top: -2px; margin-left: 10px;">
                              <div class="rect"><img src="assets/img/items/cubicle.png" draggable="false"/>  
                                <div class="middle desc" style = "padding-left: 110px; padding-top: 90px;"> <b>L-shape Cubicle </b> <br>200cmX185cm</div>
                              </div>
                      </div>

                      <div class="drag-element" style = "margin-top: 200px; margin-left: 10px;">
                              <div class="rect"><img src="assets/img/items/cubicle.png" draggable="false"/>  
                                <div class="middle desc" style = "padding-left: 110px; padding-top: 90px;"> <b>L-shape Cubicle </b> <br>200cmX185cm</div>
                              </div>
                      </div>
           
                      <div class="drag-element" style = "margin-top: -2px; margin-left: 328px;">
                              <div class="rect"><img src="assets/img/items/cubicle.png" draggable="false"/>  
                                <div class="middle desc" style = "padding-left: 110px; padding-top: 90px;"> <b>L-shape Cubicle </b> <br>200cmX185cm</div>
                              </div>
                      </div>

                      <div class="drag-element" style = "margin-top: 200px; margin-left: 328px;">
                              <div class="rect"><img src="assets/img/items/cubicle.png" draggable="false"/>  
                                <div class="middle desc" style = "padding-left: 110px; padding-top: 90px;"> <b>L-shape Cubicle </b> <br>200cmX185cm</div>
                              </div>
                      </div>

                      <div class="drag-element" style = "margin-top: -5px; margin-left: 11px">
                              <div class="rect" ><img src="assets/img/items/L-table.png" draggable="false"/>
                              <div class="middle desc" style = "margin-left: 50px; margin-top: 30px"> <b>L-shaped Table </b> <br>155cmX130cm</div>
                              </div>
                      </div>

                      <div class="drag-element"  style = "margin-top: 65px; margin-left: 70px">
                              <div class="rect"><img src="assets/img/items/office_chair.png" draggable="false"/>
                              <div class="middle desc" style = "color:whitesmoke; margin-top: -20px; margin-left:-17px;"> <b >Office Chair </b> <br>63cmX66cm</div>
                              </div>
                      </div>
                      

                      <div class="drag-element" style = "margin-top: 197px; margin-left: 11px">
                              <div class="rect"><img src="assets/img/items/L-table.png" draggable="false"/>
                              <div class="middle desc" style = "margin-left: 50px; margin-top: 30px"> <b>L-shaped Table </b> <br>155cmX130cm</div>
                              </div>
                      </div>

                      <div class="drag-element" style = "margin-top: 267px; margin-left: 70px;">
                              <div class="rect"><img src="assets/img/items/office_chair.png" draggable="false"/>
                              <div class="middle desc" style = "color:whitesmoke; margin-top: -20px; margin-left:-17px;"> <b >Office Chair </b> <br>63cmX66cm</div>
                              </div>
                      </div>

                      <div class="drag-element" style = "margin-left: 425px; margin-top: 429px;">
                              <div class="rect"><img src="assets/img/items/door1.png" draggable="false"/>
                              <div class="middle desc" style = "margin-left: -15px; margin-top: -18px"> <b>Door </b> <br>68cmX68cm</div>
                              </div>
                            </div>

                      <div class="drag-element" style = "margin-top: 30px; margin-left: 410px;">
                              <div class="rect" ><img src="assets/img/items/L-table.png" draggable="false"style ="transform: rotate(180deg)"/>
                              <div class="middle desc" style = "margin-left: 50px; margin-top: 30px"> <b>L-shaped Table </b> <br>155cmX130cm</div>
                              </div>
                      </div>

                      <div class="drag-element"  style = "margin-top: 55px; margin-left: 405px">
                              <div class="rect"><img src="assets/img/items/office_chair.png" draggable="false" style ="transform: rotate(180deg)"/>
                              <div class="middle desc" style = "color:whitesmoke; margin-top: -20px; margin-left:-17px;"> <b >Office Chair </b> <br>63cmX66cm</div>
                              </div>
                      </div>

                      <div class="drag-element" style = "margin-top: 232px; margin-left: 410px;">
                              <div class="rect"><img src="assets/img/items/L-table.png" draggable="false" style ="transform: rotate(180deg)"/>
                              <div class="middle desc" style = "margin-left: 50px; margin-top: 30px"> <b>L-shaped Table </b> <br>155cmX130cm</div>
                              </div>
                      </div>

                      <div class="drag-element" style = "margin-top: 267px; margin-left: 405px">
                              <div class="rect"><img src="assets/img/items/office_chair.png" draggable="false" style ="transform: rotate(180deg)"/>
                              <div class="middle desc" style = "color:whitesmoke; margin-top: -20px; margin-left:-17px;"> <b >Office Chair </b> <br>63cmX66cm</div>
                              </div>
                      </div>

                    </div> 
                    </div>

                    <div class ="col-md-2">
                      <div class="dropzone element-trash" style = "text-align:center; font-size:smaller; position: absolute; height: 260px;"><b>DROP TO DELETE</b></div> 
                    </div>

              </div>                                                
                    <div class="form-row">
                        <div class="col-md-6">
                            <strong>Network Area:</strong> <?php echo $net_layout_area; ?> sqm<br>
                            <strong>Institution:</strong> <?php echo $net_institution; ?><br>
                            <strong>Ergonomics:</strong> <?php echo $net_ergo; ?><br>
                            <strong>Length:</strong> <?php echo $net_length; ?> m<br>
                            <strong>Width:</strong> <?php echo $net_width; ?> m<br></br>
                            <strong>Recommended Bandwidth:</strong> 
                            <?php 
                            
                            if ($no_pcs <= 4){

                              echo "5 - 25 Mbps";

                            } 

                            else if ($no_pcs > 4 && $no_pcs < 7 ) {

                              echo "25 - 50 Mbps";

                            }

                            else if ($no_pcs >= 7 && $no_pcs < 10 ) {

                              echo "50 - 100 Mbps";

                            }

                            else if ($no_pcs >= 10 && $no_pcs < 15 ){
                              echo "100 - 500 Mbps";
                            }

                            else {
                              echo "500 - 1000 Mbps";
                            }
                            
                            
                            
                            ?>
                            <strong><br>Recommended Topology: </strong>
                            <?php 
                            
                            if ($net_institution == "Office"){

                              echo "Star Topology";

                            } 

                            else {

                              echo "Bus Topology or Star Topology";

                            } 
                            ?>

                            </strong> <br></br>
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
            <div class="form-row text-left">
              <div class="col-md-12" style = "margin-bottom:25px; margin-left: 20px">
              <button type="button" class="btn btn-primary" onclick="window.print()">Print</button>
              </div>
            </div>
            <input type="hidden" name="input" value="<?php echo $input; ?>">
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
  </body>
  <!-- Argon Scripts -->
  <?php
  require_once('partials/_scripts.php');
  ?>
<script>

var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.display === "block") {
      content.style.display = "none";
    } else {
      content.style.display = "block";
    }
  });
}
  function validateForm() {
    let lengthInput = document.getElementById("length");
    let widthInput = document.getElementById("width");
    let lengthError = document.getElementById("lengthError");
    let widthError = document.getElementById("widthError");
    let length = lengthInput.value;
    let width = widthInput.value;
    let netInstitution = document.getElementById("net_institution").value;
    let netErgo = document.getElementById("net_ergo").value;
    let netInstitutionError = document.getElementById("netInstitutionError");
    let netErgoError = document.getElementById("netErgoError");

    if (isNaN(length)) {
      lengthError.innerHTML = " *Length must be a number.";
      lengthInput.focus();
      return false;
    } else {
      lengthError.innerHTML = "";
    }

    if (isNaN(width)) {
      widthError.innerHTML = " *Width must be a number.";
      widthInput.focus();
      return false;
    } else {
      widthError.innerHTML = "";
    }

    if (netInstitution === "") {
      netInstitutionError.innerHTML = " *Please select a net institution.";
      return false;
    } else {
      netInstitutionError.innerHTML = "";
    }

    return true;
  }

</script>
        <script src="http://cdn.jsdelivr.net/interact.js/1.2.4/interact.min.js"></script>
        <script src="http://code.jquery.com/jquery-1.8.3.js"></script>
        <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
        <script src="makeplanscript.js"></script>

        <?php
    }
}


?>