<?php
    session_start();
    require_once(__DIR__.'\..\factories\DataFactory.php');
    require_once(__DIR__.'\..\helpers\TaskValidator.php');
    require_once(__DIR__.'\..\helpers\common.php');
    require_once(__DIR__.'\..\data\models\Task.php');

    $taskManager = DataFactory::createTaskManager();
    $projectValidator = new TaskValidator();
    $model = new TaskViewModel();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $model->fromArray(Page::modifyAllInputs($_POST));
        $errors = $projectValidator->validate($model);

          if (count($errors) > 0) {
              $model->errors = json_encode($errors);
          } else {
            $newTask = new Task($model->taskKey,$model->taskName,
            $model->taskDescription, $model->projectKey, $model->parentKey);
            $result = $taskManager->addTask($newTask);
             if (strcasecmp($result, "success. affected 1 entries") == 0) {
            $successModel = new ViewModelBase("..\Views\createdTask.php");
            Page::View($successModel);
            }
            array_push($errors, 'Task with the same key already exists!');
            $model->errors = json_encode($errors);
          }
    } 
    Page::View($model,'..\Views\layout.php');
?>