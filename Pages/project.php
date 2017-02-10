<?php
require_once(__DIR__.'\..\helpers\common.php');
Page::Authorize();

require_once(__DIR__.'\..\factories\DataFactory.php');
require_once(__DIR__.'\..\ViewModels\TaskViewModel.php');

$taskManager = DataFactory::createTaskManager();
$projectKey = $_GET["key"];
$tasks = $taskManager->getAllTasks($projectKey);

Page::View($tasks, 'allTasks');

?>