<?php
require_once(__DIR__.'\..\helpers\common.php');
Page::Authorize();

require_once(__DIR__.'\..\factories\DataFactory.php');
require_once(__DIR__.'\..\ViewModels\CreateTaskViewModel.php');
require_once(__DIR__.'\..\helpers\TaskValidator.php');

$taskManager = DataFactory::createTaskManager();
$model = new CreateTaskViewModel();
$taskValidator = new TaskValidator();
$userManager = DataFactory::createUserManager();
$userTaskManager = DataFactory::createUserTaskManager();

if($_SERVER["REQUEST_METHOD"] == "GET")
{
    $taskKey = $_GET["key"];
    $task = $taskManager->findTask($taskKey);
    if(isset($task->userId) && $task->userId != null){
    $model->selectedUser = $userManager->findById($task->userId)->username;
}
    $model = new CreateTaskViewModel($task->key, $task->name,$task->description,
    $task->projectKey, $task->parentKey);
    $model->users = $userManager->getAll();
    
    if(isset($task->userId) && $task->userId != null){
        $model->selectedUser = $userManager->findById($task->userId)->username;
    }
    Page::View($model, 'editTask');
}
else if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $model->fromArray(Page::modifyAllInputs($_POST));
    $errors = $taskValidator->validate($model);
    $currentState = $taskManager->findTask($model->taskKey);
    
    if (count($errors) > 0) {
        $model->errors = json_encode($errors);
    } else {
        $newTask = $model->convertToTask();
        $result = $taskManager->editTask($newTask);
        
        if (strcasecmp($result, "success. affected 1 entries") == 0) {
            // Re-assign the user
            if(isset($currentState->userId) && $currentState->userId != null){
                $currentUser = $userManager->findById($currentState->userId)->username;
                $userTaskManager->unAssignUser($currentUser,  $model->taskKey);
                $userTaskManager->assignTask($model->selectedUser,  $model->taskKey);
            }
            
            Page::Redirect('/Pages/allTasks.php');
        }
        array_push($errors, 'Task was not updated! Please try again!');
        $model->errors = json_encode($errors);
    }
}

Page::View($model, 'editTask');

?>