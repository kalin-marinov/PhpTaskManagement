<html>

<head>
  <link rel="stylesheet" href="/Assets/css/loginPage.css">
  <script src='/Assets/js/jquery-3.1.1.min.js' type="text/javascript"></script>
  <script src="/Assets/js/Login.js" type="text/javascript"></script>
</head>

<body>
  <div id="wrap">
    <div id="regbar">
      <div id="navthing">
      <h2><a href="/Pages/login.php" id="loginform">Dashboard</a> | <a href="#" id="registerForm">Projects</a> | 
      <a href="#" id="registerForm">Tasks</a> | User logged: Test | <a href="/Pages/Logout.php" id="registerForm">Logout</a> </h2>

        <div class="body">
          <?php
            if (isset($_VIEW)) {
                include($_VIEW);
            }
          ?>
        </div>
      </div>
    </div>
  </div>
  </div>
</body>

</html>