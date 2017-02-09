<?php

require('data\TasksManager.php');
require('data\UserManager.php');
require('factories\ConnectionFactory.php');
require('data\models\task.php');
require('data\models\user.php');

session_start();

$connection =  ConnectionFactory::create();
$taskProvider = new TasksManager($connection);

$res = $taskProvider->addTask(new Task("T1", "firstTask", "write some php"));
$res = $taskProvider->addTask(new Task("T2", "secondTask", "write some css"));
$res = $taskProvider->addTask(new Task("T3", "thirdTask", "write some html"));

$tasks = $taskProvider->getTasks();
// var_dump($tasks);

$secondTask = $taskProvider->findTask("T2");
$taskProvider->removeTask("T2");

$tasks = $taskProvider->getTasks();
// var_dump($tasks);

// Users test:
$userProvider = new UserManager($connection);
// var_dump($userProvider->getCurrentUser());

$user = new User('admin', 'administrator', 'admin@admin.com');
$userProvider->createUser($user, 'password');

$userProvider->signIn($user->username, "password");
// var_dump($userProvider->getCurrentUser());

?>
<html>
    <head>
        <link rel="stylesheet" href="Assets/css/loginPage.css">
 <script src='Assets/js/jquery-3.1.1.min.js' type="text/javascript"></script>
    <script src="Assets/js/Login.js" type="text/javascript"></script>
</head>
<body>
  
  <div id="wrap">
  <div id="regbar">
    <div id="navthing">
      <h2><a href="#" id="loginform">Login</a> | <a href="#" id="registerForm">Register</a></h2>
    <div class="formContainer" id="login" >
      <div class="arrow-up"></div>       
           <form action="Pages\login.php\" method="POST">
             <label name="username">Username</label>
             <input type="text" name="username"/>
             <label name="password">Password</label>
             <input type="password" name="password"/>
             <input type="submit" value="Login" /> 
           </form>
    </div>
      <div class="formContainer" id="register">
      <div class="register-up"></div>      
           <form action="Pages\register.php\" method="POST">
             <label name="username">Username</label>
             <input type="text" name="username" maxlength="40" minLength="3"/>
             <label name="fullName">Full Name</label>
             <input type="text" name="fullName" maxlength="50" minLength="3"/>
             <label name="email">Email</label>
             <input type="email" name="loginEmail"/>
             <label name="password">Password</label>
             <input type="password" name="password"/>
              <label name="confirmPassword">Confirm Password</label>
             <input type="password" name="confirmPassword" />
             <input type="submit" value="Register" /> 
           </form>
    </div>
    </div>
  </div>
</div>
</body>
</html>