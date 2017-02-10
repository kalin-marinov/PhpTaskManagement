<?php
require_once(__DIR__.'\..\helpers\common.php');
Page::Authorize();

require_once(__DIR__.'\..\factories\DataFactory.php');
require_once(__DIR__.'\..\ViewModels\TaskViewModel.php');

$taskManager = DataFactory::createTaskManager();
$taskKey = $_GET["key"];
$result = $taskManager->removeTask($taskKey);
      Page::Redirect("allTasks.php");
?>