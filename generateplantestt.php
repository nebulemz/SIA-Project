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
    <div style="background-image: url(assets/img/theme/bg4.jpg); background-size: cover;" class="header  pb-8 pt-5 pt-md-8">
    <span class="mask bg-gradient-dark opacity-8"></span>
      <div class="container-fluid">
        <div class="header-body">
        </div>
      </div>
    </div>
    <div class="container-fluid mt--8">
      <!-- Table -->
      <div class="row">
        <div class="col-md-6">
          <div class="card shadow">
            <div class="card-header border-6">
              <h3>Generate Your Layout:</h3>
            </div>
            <div class="card-body">

            <form method="POST" action="" onsubmit="return validateForm()">
            <div class="form-row">
              <div class="col-md-12">
                <label>Length (meter/s)</label><span id="lengthError" style="color: red;"></span>
                <input type="text" name="length" class="form-control" id="length" value="">
             
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-12" style="margin-top:10px;">
              <label>Width (meter/s)</label><span id="widthError" style="color: red;"></span>
              <input type="text" name="width" class="form-control" id="width" value="">
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-12" style="margin-top:10px;">
                <label for="net_institution">Institution</label>
                <select id="net_institution" name="net_institution" class="form-control">
                <option value="">-- Select --</option>
                <option value="Office">Office</option>
                <option value="School">School</option>
                </select>
              <span id="netInstitutionError" style="color: red;"></span>

                </div>
            </div>
            <hr>
            <div class="form-row text-left">
              <div class="col-md-6">
                <input type="submit" name="generate" value="Generate" class="btn btn-success" value="">
              </div>
            </div>
            
            <input type="hidden" name="input" value="<?php echo $input; ?>">
          </form>
            </div>
          </div>
        </div>

      <div class="col-md-6">
          <div class="card shadow">
            <div class="card-header border-6">
              <label><h3>Or You Can Create Your Own!</h3></label><br>
            </div>
            <div class="card-body">
                <label>Select Dimension to Customize:</label><span id="lengthError" style="color: red;"></span>
                <select id="Opt" class="form-control" style="font-size: 15px;">
                <option value="5x5">5x5</option>
                <option value="5x6">5x6</option>
                <option value="5x7">5x7</option>
                <option value="5x8">5x8</option>
                <option value="5x9">5x9</option>
                <option value="5x10">5x10</option>
                <option value=""></option>

                <option value="6x6">6x6</option>
                <option value="6x7">6x7</option>
                <option value="6x8">6x8</option>
                <option value="6x9">6x9</option>
                <option value="6x10">6x10</option>

                <option value=""></option>
                <option value="7x7">7x7</option>
                <option value="7x8">7x8</option>
                <option value="7x9">7x9</option>
                <option value="7x10">7x10</option>

                <option value=""></option>
                <option value="8x8">8x8</option>
                <option value="8x9">8x9</option>
                <option value="8x10">8x10</option>

                <option value=""></option>
                <option value="9x9">9x9</option>
                <option value="9x10">9x10</option>
                <option value="10x10">10x10</option>

                <option value=""></option>
                <option value="11x5">11x5</option>
                <option value="11x6">11x6</option>
                <option value="11x7">11x7</option>
                <option value="11x8">11x8</option>
                <option value="11x9">11x9</option>
                <option value="11x10">11x10</option>

                </select>


                <hr>
                <div class="form-row text-left">
                  <div class="col-md-6">
                    <input type="button" value="Create Own Layout" class="btn btn-success" id = "but"></a>
                  </div>
                </div>

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

<script>
$('#but').click(function(e){
  var choice = $("#Opt").val();
  if(choice == '5x5')
    location.href = "makeplan5x5.php";
  else if (choice == '5x6')
    location.href = "makeplan5x6.php"
  else if (choice == '5x7')
    location.href = "makeplan5x7.php"
  else if (choice == '5x8')
    location.href = "makeplan5x8.php"
  else if (choice == '5x9')
    location.href = "makeplan5x9.php"
  else if (choice == '5x10')
    location.href = "makeplan5x10.php"

  else if (choice == '6x6')
    location.href = "makeplan6x6.php"
  else if (choice == '6x7')
    location.href = "makeplan6x7.php"
  else if (choice == '6x8')
    location.href = "makeplan6x8.php"
  else if (choice == '6x9')
    location.href = "makeplan6x9.php"
  else if (choice == '6x10')
    location.href = "makeplan6x10.php"

  else if (choice == '7x7')
    location.href = "makeplan7x7.php"
  else if (choice == '7x8')
    location.href = "makeplan7x8.php"
  else if (choice == '7x9')
    location.href = "makeplan7x9.php"
  else if (choice == '7x10')
    location.href = "makeplan7x10.php"

  else if (choice == '8x8')
    location.href = "makeplan8x8.php"
  else if (choice == '8x9')
    location.href = "makeplan8x9.php"
  else if (choice == '8x10')
    location.href = "makeplan8x10.php"

  else if (choice == '9x9')
    location.href = "makeplan9x9.php"
  else if (choice == '9x10')
    location.href = "makeplan9x10.php"
  else if (choice == '10x10')
    location.href = "makeplan9x10.php"

  else if(choice == '11x5')
    location.href = "makeplan11x5.php";
  else if (choice == '11x6')
    location.href = "makeplan11x6.php"
  else if (choice == '11x7')
    location.href = "makeplan11x7.php"
  else if (choice == '11x8')
    location.href = "makeplan11x8.php"
  else if (choice == '11x9')
    location.href = "makeplan11x9.php"
  else if (choice == '11x10')
    location.href = "makeplan5x10.php"

});
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</html>