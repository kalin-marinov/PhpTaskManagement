<?php

require_once('data\TasksManager.php');
require_once('data\UserManager.php');
require_once('factories\ConnectionFactory.php');
require_once('data\models\task.php');

session_start();

$connection =  ConnectionFactory::create();
// $taskProvider = new TasksManager($connection);

// $res = $taskProvider->addTask(new Task("T1", "firstTask", "write some php"));
// $res = $taskProvider->addTask(new Task("T2", "secondTask", "write some css"));
// $res = $taskProvider->addTask(new Task("T3", "thirdTask", "write some html"));

// $tasks = $taskProvider->getTasks();
// // var_dump($tasks);

// $secondTask = $taskProvider->findTask("T2");
// $taskProvider->removeTask("T2");

// $tasks = $taskProvider->getTasks();
// // var_dump($tasks);

// // Users test:
// $userProvider = new UserManager($connection);
// // var_dump($userProvider->getCurrentUser());

// $user = new User('admin', 'administrator', 'admin@admin.com');
// $userProvider->createUser($user, 'password');

// $userProvider->signIn($user->username, "password");
// // var_dump($userProvider->getCurrentUser());

if (!isset($reg)) {
    $reg = (object)[];
}

if (!isset($login)) {
    $login = (object) array("userName" => "");
}


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
      <h2><a href="/Pages/login.php" id="loginform">Login</a> | <a href="#" id="registerForm">Register</a> </h2>
   
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
