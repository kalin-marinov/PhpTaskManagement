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
    <script src="/Assets/js/site.js" type="text/javascript"></script>
  </head>

  <body>
    <div class="nav" role="nav">
      <div class="centered">
        <a href="/Pages/login.php">Dashboard</a> 
        <a href="/Pages/allProjects.php"> Projects</a> 
        <a href="/Pages/allTasks.php"> Tasks</a> 
        <a href="#"> User <?=$username?> </a>
         <a href="/Pages/Logout.php">Logout</a>
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