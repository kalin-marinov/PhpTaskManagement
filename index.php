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
var_dump($tasks);

$secondTask = $taskProvider->findTask("T2");
$taskProvider->removeTask("T2");

$tasks = $taskProvider->getTasks();
var_dump($tasks);

// Users test:
$userProvider = new UserManager($connection);
var_dump($userProvider->getCurrentUser());

$user = new User('admin', 'administrator', 'admin@admin.com');
$userProvider->createUser($user, 'password');

$userProvider->signIn($user->username, "password");
var_dump($userProvider->getCurrentUser());

?>

<body>
  
 
</body>