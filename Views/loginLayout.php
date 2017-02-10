<html>

<head>
  <link rel="stylesheet" href="/Assets/css/site.css">
  <script src='/Assets/js/jquery-3.1.1.min.js' type="text/javascript"></script>
</head>

<body>

  <div class="nav" role="nav">
    <div class="loginNav centered">
      <a href="/Pages/login.php">Login</a>
      <a href="/Pages/register.php">Register</a>
    </div>
  </div>

  <div class="body">
    <?php
      if (isset($_VIEW)) {
          include($_VIEW);
      }
    ?>
  </div>
</body>

</html>