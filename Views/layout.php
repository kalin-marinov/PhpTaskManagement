<?php
require_once(__DIR__.'\..\factories\DataFactory.php');

$userManager = DataFactory::createUserManager();
$username = $userManager->getCurrentUser()->username;
?>
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
      <h2><a href="/Pages/login.php" >Dashboard</a> | <a href="/Pages/CreateProject.php" > Create Projects</a> | 
      <a href="/Pages/CreateTask.php" >Create Tasks</a> | <a href="/Pages/CreateProject.php" > View Projects</a> | 
      <a href="/Pages/CreateTask.php" >View Tasks</a> |User logged: <?=$username?> | <a href="/Pages/Logout.php">Logout</a> </h2>

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