<?php
require_once(__DIR__.'\..\helpers\common.php');
Page::Authorize();

require_once(__DIR__.'\..\factories\DataFactory.php');

$taskManager = DataFactory::createTaskManager();
$allTasks = $taskManager->getTasks();

Page::View($allTasks, 'allTasks');

?>