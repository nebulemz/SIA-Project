<!DOCTYPE html> 
<html>
<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
check_login();
require_once('partials/_head.php');

?>
<head><link rel="stylesheet" href="makeplanstyle.css"></head>
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
              <h3>Customize your Layout: 6x6 Dimension</h3>
            </div>
            <div id = "form-container">
              <div class="row">
                     <div class="col-md-4" style = "padding-right: 150px; padding-left: 30px;" > <b style = "margin-top: 10px;"> ITEMS: </b>
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

                    <div class="col-md-6">
                      <div id = "plane-container" style = "height: 171mm; width: 171mm;">
                        <p>6x6</p>
                      </div>
                    </div> 

                    <div class ="col-md-2" style = "margin-top:106px">
                      <div class="dropzone element-trash" style = "text-align:center; font-size:smaller; position: absolute; height: 260px;"><b>DROP TO DELETE</b></div> 
                    </div>

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
</html>