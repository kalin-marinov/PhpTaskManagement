<?php
require_once(__DIR__.'\..\helpers\common.php');
Page::Authorize();

require_once(__DIR__.'\..\factories\DataFactory.php');
require_once(__DIR__.'\..\ViewModels\CreateProjectViewModel.php');
require_once(__DIR__.'\..\helpers\ProjectValidator.php');

$projectManager = DataFactory::createProjectManager();
$model = new CreateProjectViewModel();
$projectValidator = new ProjectValidator();

if($_SERVER["REQUEST_METHOD"] == "GET")
{
$projectKey = $_GET["key"];
$project = $projectManager->findProject($projectKey);
$model = new CreateProjectViewModel($project->key, $project->name, $project->description);

Page::View($model, 'editProject');
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
           Page::Redirect('/Pages/allProjects.php');
        }
        array_push($errors, 'Task was not updated! Please try again!');
        $model->errors = json_encode($errors);
    }
}

Page::View($model, 'editProject');

?>