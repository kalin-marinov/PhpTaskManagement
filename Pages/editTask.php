<?php
require_once(__DIR__.'\..\helpers\common.php');
Page::Authorize();

require_once(__DIR__.'\..\factories\DataFactory.php');
require_once(__DIR__.'\..\ViewModels\CreateTaskViewModel.php');
require_once(__DIR__.'\..\helpers\TaskValidator.php');

$taskManager = DataFactory::createTaskManager();
$model = new CreateTaskViewModel();
$taskValidator = new TaskValidator();

if($_SERVER["REQUEST_METHOD"] == "GET")
{
    $taskKey = $_GET["key"];
    $task = $taskManager->findTask($taskKey);
    $model = new CreateTaskViewModel($task->key, $task->name,$task->description,
    $task->projectKey, $task->parentKey);
    
    Page::View($model, 'editTask');
}
else if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $model->fromArray(Page::modifyAllInputs($_POST));
    $errors = $taskValidator->validate($model);
    
    if (count($errors) > 0) {
        $model->errors = json_encode($errors);
    } else {
        $newTask = $model->convertToTask();
        $result = $taskManager->editTask($newTask);
        if (strcasecmp($result, "success. affected 1 entries") == 0) {
            Page::View("Task edited succsesfully!", "editTask");
        }
        array_push($errors, 'Task was not updated! Please try again!');
        $model->errors = json_encode($errors);
    }
}

Page::View($model, 'editTask');

?>