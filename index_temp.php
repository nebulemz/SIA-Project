<?php
session_start();
include('pos/admin/config/config.php');
//admin 
if (isset($_POST['login'])) {
  $admin_email = $_POST['admin_email'];
  $admin_password = sha1(md5($_POST['admin_password'])); //double encrypt to increase security
  $stmt = $mysqli->prepare("SELECT admin_email, admin_password, admin_id  FROM   rpos_admin WHERE (admin_email =? AND admin_password =?)"); //sql to log in user
  $stmt->bind_param('ss',  $admin_email, $admin_password); //bind fetched parameters
  $stmt->execute(); //execute bind 
  $stmt->bind_result($admin_email, $admin_password, $admin_id); //bind result
  $rs = $stmt->fetch();
  $_SESSION['admin_id'] = $admin_id;
  if ($rs) {
    //if its sucessfull
	
    header("location:main/ dashboard.php");
  } else {
    $err = "Incorrect Authentication Credentials ";
  }
} 
require_once('pos/admin/partials/_head.php');
?>

<style>
* {
  margin: 0;
  padding: 0;
  font-family: sans-serif;
}

.hero {
  height: 90%;
  width: 100%;
  background-color: linear-gradient(rgba (0, 0, 0, 0.4), rgba(0, 0, 0, 0.4));
  background-position: center;
  background-size: cover;
  position: absolute;
}

.form_pos {
  margin-top: 150px;
  margin-left: 100px;
}

.form-box {
  width: 380px;
  height: 380px;
  position: relative;
  margin: 6% auto;
  background: #fff;
  border-radius: 10px;
  box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
  padding: 5px;
  overflow: hidden;
}

.button-box {
  width: 225px;
  margin: 35px auto;
  position: relative;
  box-shadow: 0 0 20px 9px #8532121f;
  border-radius: 30px;
}

.toggle-btn {
  padding: 10px 25px;
  cursor: pointer;
  background: linear-gradient(to right, #695cfe, #00d4ff);
  border: 0;
  border-radius: 30px;
  width: 110px;
  height: 45px;
  font-size: 14px;
  outline: none;
  position: relative;
}

.toggle-btnn {
  padding: 10px 25px;
  cursor: pointer;
  background: transparent;
  border: 0;
  border-radius: 30px;
  width: 110px;
  height: 45px;
  font-size: 14px;
  outline: none;
  position: relative;
}

.input-groupp {
  top: 120px;
  position: absolute;
  width: 180px;
  transition: .5s;
}

#input-field {
  margin-top: 20px;
  height: 45px;
  width: 300px;
  font-size: 14px;
  background-color: #fff;
  padding-left: 20px;
  border-style: groove;
  border-radius: 5px;
  border-color: rgba(0, 0, 0, 0.35);
}

.submit-btn {
  width: 320px;
  height: 45px;
  padding: 10px 30px;
  cursor: pointer;
  display: block;
  margin-top: 40px;
  margin-left: 3px;
  font-size: 18px;
  background: linear-gradient(to right, #695cfe, #00d4ff);
  border: 0;
  outline: none;
  border-radius: 5px;
}

#admin {
  left: 30px;
}
</style>

<body>

  <!-- Page content -->
  <div class="hero">
    <div class="bg-image"></div>
    <div class="form_pos">
      <span class="logo"><img src="pos/admin/assets/img/brand/plm_merch_logo.png" alt=""
          style="float:left;width:522px;height:242px;margin-right:200px">
      </span>
      <div class="form-box">
        <div class="button-box">
          <button type="button" class="toggle-btn">Admin</button>
          <button type="button" class="toggle-btnn" onclick="document.location.href='second_index.php';">Staff</button>
        </div>
        <form method="post" id="admin" class="input-groupp" role="form">

          <input class="form-control" id="input-field" required name="admin_email" placeholder="Email" type="email">

          <input class="form-control" id="input-field" required name="admin_password" placeholder="Password"
            type="password">

          <div class="text-center">
            <button type="submit" name="login" class="submit-btn">Log In</button>
          </div>
        </form>

      </div>
    </div>
    <div class="row mt-3">
      <div class="col-6">
        <!-- <a href="forgot_pwd.php" class="text-light"><small>Forgot password?</small></a> -->
      </div>

    </div>
  </div>
  </div>
  </div>

  <!-- Argon Scripts -->

  <!-- Custom Scripts -->

  <?php
  require_once('pos/admin/partials/_scripts.php');
  ?>
</body>

</html>