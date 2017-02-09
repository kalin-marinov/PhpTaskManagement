<?php
    session_start();
    require_once(__DIR__.'\..\factories\DataFactory.php');
    require_once(__DIR__.'\..\helpers\TaskValidator.php');
    require_once(__DIR__.'\..\helpers\common.php');
    require_once(__DIR__.'\..\data\models\Task.php');

    $taskManager = DataFactory::createTaskManager();
    $projectValidator = new ProjectValidator();
    $model = new ProjectViewModel();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $model->fromArray(Page::modifyAllInputs($_POST));
        $erros = $projectValidator->validate($model);

          if (count($errors) > 0) {
              $model->errors = json_encode($errors);
          } else {
            $newTask = new Task($model->projectName,$model->projectDescription);
            $result = $taskManager->addTask($newTask);
             if (strcasecmp($result, "success. affected 1 entries") == 0) {
            $successModel = new ViewModelBase("..\Views\createdProject.php");
            Page::View($successModel);
            }
          }
    } 
    Page::View($model,'..\Views\layout.php');
?>