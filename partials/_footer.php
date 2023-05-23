<style>
.footer-container {
  background-color: #f1f1f1;
  padding: 20px 0;
}

.footer-container {
  max-width: 1200px;
  margin: 0 auto;
  text-align: center;
}

.footer-container p {
  margin: 0;
  font-size: 14px;
  color: #888;
}

.footer-container ul {
  list-style-type: none;
  padding: 0;
  margin-top: 10px;
}

.footer-container ul li {
  display: inline-block;
  margin-right: 10px;
}

.footer-container ul li a {
  text-decoration: none;
  font-size: 14px;
  color: #888;
}

.footer-container ul li a:hover {
  color: #555;
}
</style>
<footer>
  <div class="footer-container">
    <p>&copy; <?php echo date("Y"); ?> Your Website Name. All rights reserved.</p>
    <ul>
      <li><a href="dashboard.php">Home</a></li>
      <li><a href="about.php">About</a></li>
      <li><a href="generateplantestt.php">Generate a Plan</a></li>
      <li><a href="forum.php">Forum</a></li>
    </ul>
  </div>
</footer>