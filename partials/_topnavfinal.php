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