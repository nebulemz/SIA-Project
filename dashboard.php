<?php
session_start();
include('config/config.php');

require_once('partials/_head.php');

?>
<style>
.form-container {
  width: 100%;
  max-width: 550px;
  flex-direction: column;
  align-items: left;
  display: flex;
  position: relative;
 
}

p.text {
  text-align: left;
  margin-top:80px ;
  margin-left: 100px;
  margin-bottom: 30px;
  font-weight: 800;
  line-height: 1.4;
  color:white;
}

.picture-container {
  width: 8rem;
  margin-left: 750px;
  object-fit: none;  
  object-position:right;
}

.picture {
  width: 100%;
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
  width: 20%;
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

<body>

  <!-- Sidenav -->
  <?php
  require_once('partials/_sidebar.php');
  ?>
  <!-- Main content -->
  <div class="main-content" style="color:#0F6973">
    <!-- Top navbar -->
    <?php
    require_once('partials/_topnav.php');
    ?>
    <div class= "form-container">
    <div class="picture-container">
        <img class="picture" src="assets/img/brand/office-interior-top-view_1284-6526-removebg-preview.png">
      </div>
      <p style="font-size: 55px;" class= "text">Visualize Your Network, <br> Optimize Your Performance</p>
    </div>
    <div class= "form-container-2">
      <p style="font-size: 20px;" class= "caption" >
      Revamp your network layout with ease: <br>
      Generate a network floor plan and <br>
      corresponding IP addresses in seconds.</p>
    </div>
    <div class= "submit-btn-container">
      <button type="submit" name="login" class="submit-btn">CREATE A LAYOUT</button>
    </div>
  </div>
  <!-- Argon Scripts -->
  <?php
  require_once('partials/_scripts.php');
  ?>
</body>

</html>

