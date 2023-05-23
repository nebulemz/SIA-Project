<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
check_login();
require_once('partials/_head.php');

$admin_id = $_SESSION['admin_id'];
//$login_id = $_SESSION['login_id'];
$ret = "SELECT * FROM admin WHERE admin_id = '$admin_id'";
$stmt = $mysqli->prepare($ret);
$stmt->execute();
$res = $stmt->get_result();

while ($admin = $res->fetch_object()) {
}
?>

<body>

<!-- Main content -->
<div class="main-content">
<!-- topnav -->
<?php
  require_once('partials/_topnavfinal.php');
  ?>

        <!-- Page content -->
        <div class="container-fluid">
            <!-- Table -->
            <div class="row">
                <div class="col-4">
                    <div class="card-body">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-container col-6">

                    <p style="font-size: 80px;" class="text">Visualize Your Network, <br> Optimize Your Performance
                    </p>
                    <div class="form-container" style="margin-left: 105px">
                        <p style="font-size: 22px;" class="caption">
                            Revamp your network layout with ease: <br>
                            Generate a network floor plan and <br>
                            corresponding IP addresses in seconds.
                        </p>
                    </div>

                    <div class="submit-btn-container">
                        <a href="generateplantestt.php">
                            <button type="submit" name="login" class="submit-btn">GENERATE A PLAN</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <?php
    require_once('partials/_footer.php');
    ?>
    <!-- Argon Scripts -->
    <?php
    require_once('partials/_scripts.php');
    ?>
    

</body>
</html>
