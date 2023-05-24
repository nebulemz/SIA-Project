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
                                                                  style="width:150px;height:140px;"/></a>
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
                                                    <span class="mb-0 text-sm  font-weight-bold"><?php echo $admin_id; ?></span>
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
    <!-- Argon Scripts -->
    <?php
    require_once('partials/_scripts.php');
    ?>
</body>
</html>
