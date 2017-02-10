<?php
require_once(__DIR__.'/../helpers/common.php');
Page::Authorize();

require_once(__DIR__.'\..\factories\DataFactory.php');
require_once(__DIR__.'\..\helpers\TaskValidator.php');
require_once(__DIR__.'\..\helpers\common.php');
require_once(__DIR__.'\..\data\models\Task.php');
require_once(__DIR__.'\..\ViewModels\CreateTaskViewModel.php');

$taskManager = DataFactory::createTaskManager();
$projectManager = DataFactory::createProjectManager();
$taskValidator = new TaskValidator();
$projectValidator = new TaskValidator();
$model = new CreateTaskViewModel();

$model->projectKeys = $projectManager->getProjects();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $model->fromArray(Page::modifyAllInputs($_POST));
    $errors = $taskValidator->validate($model);
    
    if (count($errors) > 0) {
        $model->errors = json_encode($errors);
    } else {
        $newTask = $model->convertToTask();
        $result = $taskManager->addTask($newTask);
        if (strcasecmp($result, "success. affected 1 entries") == 0) {
             Page::Redirect('/Pages/allTasks.php');
        }
        array_push($errors, 'Task with the same key already exists!');
        $model->errors = json_encode($errors);
    }
}

Page::View($model);

?>