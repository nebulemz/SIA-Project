<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
check_login();
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
    <?php
    require_once('partials/_topnav.php');
    ?>

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
  margin-top:-110px ;
  margin-left: 100px;
  margin-bottom: 30px;
  font-weight: 800;
  line-height: 1.4;
  color:white;
}

.picture-container {
  width: 6rem;
  margin-left: 1000px;
  object-fit: none;  
  object-position:right;
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
  margin-top:-30px ;
  margin-bottom: -50px;
  margin-left: 100px;
}

p.caption {
  font-weight: 600;
  color:white;
}

.submit-btn-container {
  display: grid;
  padding-left: center;
  width:300px ;
  margin-top: 3rem;
  margin-left: 100px;
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
  color:#0F6973;
}

.submit-btn {
  background: #0F6973;
  color: #fff;
  width: 100%;

}
</style>
  <!-- Header -->
  <div style="background-image: url(assets/img/theme/background.jpg); background-size: cover;" class="pb-9 pt-6 pt-md-9">
    <span class="mask bg-gradient-dark opacity-6"></span>
    <!-- Page content -->
    <div class="container-fluid">
      <!-- Table -->
      <div class="row">
        <div class="col">
              <div class="card-body">
              </div>
        </div>
      </div>
  <div class= "form-container">
    
      <p style="font-size: 80px;" class= "text">Visualize Your Network, <br> Optimize Your Performance</p>
    </div>
    <div class= "form-container-2">
      <p style="font-size: 22px;" class= "caption" >
      Revamp your network layout with ease: <br>
      Generate a network floor plan and <br>
      corresponding IP addresses in seconds.</p>
    </div>
    <div class="submit-btn-container">
      <a href="generateplantestt.php">
      <button type="submit" name="login" class="submit-btn">GENERATE A PLAN</button>
  </a>
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

</html>