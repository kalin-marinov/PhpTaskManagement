<?php
require_once(__DIR__.'\..\helpers\common.php');
Page::Authorize();

require_once(__DIR__.'\..\factories\DataFactory.php');
require_once(__DIR__.'\..\ViewModels\TaskViewModel.php');

$taskManager = DataFactory::createTaskManager();
$commentManager = DataFactory::createCommentManager();
$userManager = DataFactory::createUserManager();

$taskKey = $_GET["key"];
$task = $taskManager->findTask($taskKey);
$comments = $commentManager->getComments($taskKey);
$model = new TaskViewModel($task->key, $task->name,$task->description,
$task->projectKey, $task->parentKey, $comments);

try{
    $model->user = $userManager->findById($task->userId)->username;
}
catch(Exception $ex){ 
    $model->user = "N/A";
}

Page::View($model, 'task');

?>