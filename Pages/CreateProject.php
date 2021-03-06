<?php
require_once(__DIR__.'/../helpers/common.php');
Page::Authorize();

require_once(__DIR__.'/../factories/DataFactory.php');
require_once(__DIR__.'/../helpers/ProjectValidator.php');
require_once(__DIR__.'/../data/models/Project.php');

$projectManager = DataFactory::createProjectManager();
$projectValidator = new ProjectValidator();
$model = new CreateProjectViewModel();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $model->fromArray(Page::modifyAllInputs($_POST));
    $errors = $projectValidator->validate($model);
    
    if (count($errors) > 0) {
        $model->errors = json_encode($errors);
    } else {
        $newProject = $model->convertToProject();
        $result = $projectManager->addProject($newProject);
        if (strcasecmp($result, "success. affected 1 entries") == 0) {
             Page::Redirect('/Pages/allProjects.php');
        }
        array_push($errors, 'Project with the same key already exists!');
        $model->errors = json_encode($errors);
    }
}

Page::View($model);

?>