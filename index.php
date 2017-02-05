<?php

include('data\TasksDataProvider.php');
include('data\ConnectionFactory.php');
include('data\models\task.php');

$connection =  ConnectionFactory::create();
$taskProvider = new TasksDataProvider($connection);

$res = $taskProvider->addTask(new Task("T1", "firstTask", "write some php"));
$res = $taskProvider->addTask(new Task("T2", "secondTask", "write some css"));
$res = $taskProvider->addTask(new Task("T3", "thirdTask", "write some html"));

$tasks = $taskProvider->getTasks();
var_dump($tasks);

$secondTask = $taskProvider->findTask("T2");
$taskProvider->removeTask("T2");

$tasks = $taskProvider->getTasks();
var_dump($tasks);

?>