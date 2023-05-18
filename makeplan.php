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
              <h3>Customize your Layout: 5x5 Dimension</h3>
            </div>
            <div class = "container">
            <div id = "form-container">
              <div class="row">
                     <div class="col-4"> <b style = "margin-left: -190px; margin-top: 10px;"> ITEMS: </b>
                        <div><button class="collapsible" style = "margin-left: -190px; margin-top: 10px;"><b>Cubicles</b></button> 
                          <div class="content" id = "scroll-box" style = "margin-left: -190px; display:none">
                            <div class="drag-element-source drag-element">
                              <div class="rect" style = "margin-bottom: 110px;"><img src="assets/img/items/cubicle.png" draggable="false"/>  
                                <div class="middle desc" style = "padding-left: 130px; padding-top: 100px;"> <b>L-shape Cubicle </b> <br>200cmX185cm</div>
                              </div>
                            </div>
                
                            <div class="drag-element-source drag-element">
                              <div class="rect" style = "margin-left: 100px; transform: rotate(90deg);"><img src="assets/img/items/U-shaped_cubicle.png" draggable="false"/></div>
                              <div class="middle desc" style = "margin-right:-300px; margin-top: 80px"> <b>U-shape Cubicle </b> <br>260cmX185cm</div>
                            </div>
                           </div>
                        </div>
                        <div><button class="collapsible"><b>Tables</b></button> 
                          <div class="content" id = "scroll-box" style = "margin-left: -190px; display:none">
                            <div class="drag-element-source drag-element">
                              <div class="rect" style = "margin-top: 10px; margin-left: 11px"><img src="assets/img/items/L-table.png" draggable="false"/></div>
                              <div class="middle desc" style = "margin-left: 60px; margin-top: 40px"> <b>L-shaped Table </b> <br>155cmX130cm</div>
                            </div>

                            <div class="drag-element-source drag-element">
                              <div class="rect" style = "margin-top: 70px; margin-left: -3px"><img src="assets/img/items/U-table.png" draggable="false"/></div>
                              <div class="middle desc" style = "margin-left: 55px; margin-top: 65px"> <b>U-shaped Table </b> <br>196cmX155cm</div>
                            </div>

                            <div class="drag-element-source drag-element">
                              <div class="rect" style = "margin-top: 80px"><img src="assets/img/items/office_table_chair.png" draggable="false"/></div>
                              <div class="middle desc" style = "margin-left: 65px; margin-top: 65px"> <b>Office Table w/ Chair </b> <br>162cmX112cm</div>
                            </div>
                          </div>
                        </div>

                        <div><button class="collapsible"><b>Chairs</b></button> 
                          <div class="content" id = "scroll-box" style = "margin-left: -190px; display:none">
                            <div class="drag-element-source drag-element">
                              <div class="rect" style = "margin-top: 20px; margin-left: 8px"><img src="assets/img/items/office_chair.png" draggable="false"/></div>
                              <div class="middle desc" style = "color:whitesmoke; margin-top: -10px; margin-left:-13px"> <b >Office Chair </b> <br>63cmX66cm</div>
                            </div>
                          </div>
                        </div>

                        <div><button class="collapsible"><b>Network Equipments</b></button> 
                          <div class="content" id = "scroll-box" style = "margin-left: -190px; display:none">
                            <div class="drag-element-source drag-element">
                              <div class="rect" style = "margin-top: 20px;"><img src="assets/img/items/computer.png" draggable="false"/></div>
                              <div class="middle desc" style = "margin-left: 0px; margin-top: -5px"> <b>Computer </b> <br>60cmX43cm</div>
                            </div>
                          </div>
                        </div>

                        <div><button class="collapsible"><b>Others</b></button> 
                          <div class="content" id = "scroll-box" style = "margin-left: -190px; display:none">
                            <div class="drag-element-source drag-element">
                              <div class="rect" style = "margin-left: 15px; margin-top: 20px;"><img src="assets/img/items/door.png" draggable="false"/></div>
                              <div class="middle desc" style = "margin-left: 0px; margin-top: -5px"> <b>Door </b> <br>68cmX68cm</div>
                            </div>
                          </div>
                        </div>

                      </div> 
                  <div class="col-6" id = "plane-container" style = "margin-left:-200px">
                    <div>
                      <p>5x5</p>
                    </div>
                  </div> 
                  <div class ="col-2">
                  <div class="dropzone element-trash" style = "text-align:center; font-size:smaller; position: absolute; height: 200px;"><b>DROP TO DELETE</b></div> 
                </div>
              </div>
              </div>
            </div>
            <hr>
            <div class="form-row text-center">
              <div class="col-md-12" style = "margin-bottom:25px; margin-left: -700px">
                <input type="submit" name="generate" value="Print" class="btn btn-success" value="">
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