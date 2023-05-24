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
  <!-- Main content -->
  <div class="main-content">
  <style>
        .form-container {
            width: 100%;
            max-width: 1100px;
            flex-direction: column;
            align-items: left;
            display: flex;
            position: relative;
        }

        p.text {
            text-align: left;
            margin-top: -110px;
            margin-left: 100px;
            margin-bottom: 30px;
            font-weight: 800;
            line-height: 1.4;
            color: white;
        }

        .picture-container {
            width: 6rem;
            margin-left: 1000px;
            object-fit: none;
            object-position: right;
        }

        .picture {
            width: 150px;
        }

        .form-container-2 {
            width: 100%;
            max-width: 450px;
            text-align: left;
            flex-direction: column;
            align-items: left;
            display: flex;
            position: relative;
            margin-top: -30px;
            margin-bottom: -50px;
            margin-left: 100px;
        }

        p.caption {
            font-weight: 600;
            color: white;
        }

        .submit-btn-container {
            display: grid;
            padding-left: center;
            width: 300px;
            margin-top: 3rem;
            margin-left: 100px;
            margin-bottom: 50px;
        }

        .submit-btn {
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 30px;
            outline: none;
            position: relative;
            font-weight: 900;
            font-size: 1rem;
            outline: none;
            border: none;
        }

        .submit-btn {
            width: 100%;
            border: 1px solid white;
            background-color: white;
            color: #0F6973;
        }

        .submit-btn {
            background: #0F6973;
            color: #fff;
            width: 100%;
        }
              /*-- navigation--*/

        .navigation.navbar {
            float: right;
            padding-top: 31px !important;
            padding: 0;
        }

        .navigation.navbar-dark .navbar-nav .nav-link {
            padding: 0 25px;
            color: #fff;
            font-size: 25px;
            line-height: 20px;
            font-weight: 500;
        }

        .navigation.navbar-dark .navbar-nav .nav-link:focus,
        .navigation.navbar-dark .navbar-nav .nav-link:hover {
            color: #30D5C8;
        }

        .navigation.navbar-dark .navbar-nav .active>.nav-link,
        .navigation.navbar-dark .navbar-nav .nav-link.active,
        .navigation.navbar-dark .navbar-nav .nav-link.show,
        .navigation.navbar-dark .navbar-nav .show>.nav-link {
            color: #30D5C8;
        }

        .navbar-expand-md .navbar-nav {
            padding-right: 10px;
        }

        .padd_right {
            padding-right: 10px;
        }

        .sign_btn {
            padding-left: 50px;
        }

        .sign_btn a {
            display: inline-block;
            padding: 7px 10px;
            color: #fff;
            font-size: 17px;
        }

        .sign_btn a:hover {
            color: #fff;
        }
      </style>
     <!-- Header -->
     <div style="background-image: url(assets/img/theme/bg4.jpg); background-size: cover;" class="pb-12 pt-md-12">
        <span class="mask bg-gradient-dark opacity-6"></span>

        <!-- header inner -->
        <div class="header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section" style=margin-top:30px;margin-bottom:100px>
                        <div class="full">
                            <div class="center-desk">
                                <div class="logo" style=padding-left:100px>
                                    <a href="dashboard.php"><img src="assets/img/brand/networkit logo 3.png"
                                                                  alt="#"
                                                                  style="width:150px;height:140px;margin-bottom:80px;"/></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                        <nav class="navigation navbar navbar-expand-md navbar-dark ">
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                    data-target="#navbarsExample04" aria-controls="navbarsExample04"
                                    aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarsExample04">
                                <ul class="navbar-nav mr-auto" style=margin-top:80px>
                                    <li class="nav-item active">
                                        <a class="nav-link" href="dashboard.php">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="about.php">About</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="generateplantestt.php">Generate A Plan</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="costpredict.php">Cost Prediction</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="products.php">Products</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="cart.php">Cart</a>
                                    </li>
                                    <li class="nav-item d_none">
                                        <a class="nav-link" href="#"><i class="fa fa-search"
                                                                         aria-hidden="true"></i></a>
                                    </li>
                                    <li class="nav-item d_none">
                                        <a class="nav-link" href="#">Login</a>
                                    </li>
                                </ul>
                                <ul class="navbar-nav align-items-center d-none d-md-flex">
                                    <li class="nav-item dropdown" style=margin-top:70px>
                                        <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown"
                                           aria-haspopup="true"
                                           aria-expanded="false">
                                            <div class="media align-items-center">
                                                <span class="avatar avatar-sm rounded-circle">
                                                  <img alt="Image placeholder" src="assets/img/theme/user-a-min.png">
                                                </span>
                                                <div class="media-body ml-2 d-none d-lg-block">
                                                    <span class="mb-0 text-sm  font-weight-bold">admin</span>
                                                </div>
                                            </div>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                                            <div class=" dropdown-header noti-title">
                                                <h6 class="text-overflow m-0">Welcome!</h6>
                                            </div>
                                            <a href="change_profile.php" class="dropdown-item">
                                                <i class="ni ni-single-02"></i>
                                                <span>My profile</span>
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <a href="logout.php" class="dropdown-item">
                                                <i class="ni ni-user-run"></i>
                                                <span>Logout</span>
                                            </a>

                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    <!-- Page content -->
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