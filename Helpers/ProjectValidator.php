<?php

 require_once(__DIR__.'\..\ViewModels\ProjectViewModel.php');

class ProjectValidator
{
    public function validate(ProjectViewModel $model) : array
    {
        $errors = array();

        if(empty($model->projectKey)){
            array_push($errors, 'The project key is mandatory!');
        }
        if (empty($model->projectName)) {
            array_push($errors, 'The project name should be added!');
        }
        if (empty($model->projectDescription)) {
            array_push($errors, 'The project description should be added!');
        }      

        return  $errors;
    }  
}
?>