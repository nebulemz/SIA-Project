<!DOCTYPE html> 
<html>
<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
check_login();
require_once('partials/_head.php');

?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $length = $_POST['length'];
  $width = $_POST['width'];
  $net_institution = $_POST['net_institution'];
  $net_ergo = $_POST['net_ergo'];
  $input = $length * $width;
  header("Location: result.php?length=$length&width=$width&input=$input&net_institution=$net_institution&net_ergo=$net_ergo");
  exit();
}
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
              <h3>Please Select and Fill the Field</h3>
            </div>
            <div class="card-body">

            <form method="POST" action="" onsubmit="return validateForm()">
            <div class="form-row">
              <div class="col-md-6">
                <label>Length (meter/s)</label><span id="lengthError" style="color: red;"></span>
                <input type="text" name="length" class="form-control" id="length" value="">
             
              </div>
              <div class="col-md-6">
                <label>Width (meter/s)</label><span id="widthError" style="color: red;"></span>
                <input type="text" name="width" class="form-control" id="width" value="">
                
              </div>
            </div>
            <hr>
            <div class="form-row">
              <div class="col-md-6">
              <label for="net_institution">Institution</label>
              <select id="net_institution" name="net_institution" class="form-control">
                <option value="">-- Select --</option>
                <option value="Office">Office</option>
                <option value="School">School</option>
              </select>
              <span id="netInstitutionError" style="color: red;"></span>
                </div>
                <div class="col-md-6">
                <label>You can create your own!</label><br><a href = makeplan5x5.php>
                <input type="" value="Create Own Layout" class="btn btn-success" value=""></a>
                </div>
            </div>
            <hr>
            <div class="form-row text-center">
              <div class="col-md-12">
                <input type="submit" name="generate" value="Generate" class="btn btn-success" value="">
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
</html>