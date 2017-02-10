<?php
require_once(__DIR__.'\..\helpers\common.php');
Page::Authorize();

require_once(__DIR__.'\..\factories\DataFactory.php');
require_once(__DIR__.'\..\ViewModels\TaskViewModel.php');

$taskManager = DataFactory::createTaskManager();
$commentManager = DataFactory::createCommentManager();
$taskKey = $_GET["key"];
$task = $taskManager->findTask($taskKey);
$comments = $commentManager->getComments($taskKey);
$model = new TaskViewModel($task->key, $task->name,$task->description,
                           $task->projectKey, $task->parentKey, $comments);

Page::View($model, 'task');

?>